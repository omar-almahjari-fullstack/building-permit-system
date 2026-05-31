<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
 use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * عرض جميع الإشعارات
     */
    public function index()
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        return view('modules.auth.notifications.notifications_table', compact('notifications'));
    }

    /**
     * إضافة إشعار جديد
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'type'         => 'required|string|max:100',
            'description'  => 'required|string',
            'related_to'   => 'nullable|string|max:100',
            'reference_id' => 'nullable|string|max:50',
            'priority'     => 'required|string|in:عادي,متوسط,مرتفع,حرج',
            'scheduled_at' => 'nullable|date_format:Y-m-d\TH:i',
            'expires_at'   => 'nullable|date_format:Y-m-d\TH:i', // ✅ الحقل الجديد
            'is_important' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'errors'  => $validator->errors(),
                'message' => 'لم يتم حفظ الإشعار. تحقق من المدخلات.',
            ], 422);
        }

        $scheduled_at = $request->scheduled_at
            ? Carbon::parse(str_replace('T', ' ', $request->scheduled_at))->format('Y-m-d H:i:s')
            : null;

        $expires_at = $request->expires_at
            ? Carbon::parse(str_replace('T', ' ', $request->expires_at))->format('Y-m-d H:i:s')
            : null;

        $id = DB::table('notifications')->insertGetId([
            'title'        => $request->title,
            'type'         => $request->type,
            'description'  => $request->description,
            'related_to'   => $request->related_to,
            'reference_id' => $request->reference_id,
            'priority'     => $request->priority,
            'scheduled_at' => $scheduled_at,
            'expires_at'   => $expires_at, // ✅ تخزين الانتهاء
            'is_important' => $request->is_important ? 1 : 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
            'created_by'   => auth()->id(), // <--- هنا نضع معرف المستخدم الحالي
        ]);

        $notification = DB::table('notifications')->where('id', $id)->first();

        return response()->json([
            'status'       => 'success',
            'message'      => 'تمت إضافة الإشعار بنجاح.',
            'notification' => $notification,
        ]);
    }

    /**
     * تحديث إشعار
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'type'         => 'required|string|max:100',
            'description'  => 'required|string',
            'related_to'   => 'nullable|string|max:100',
            'reference_id' => 'nullable|string|max:50',
            'priority'     => 'required|string|in:عادي,متوسط,مرتفع,حرج',
            'scheduled_at' => 'nullable|date_format:Y-m-d\TH:i',
            'expires_at'   => 'nullable|date_format:Y-m-d\TH:i', // ✅ الحقل الجديد
            'is_important' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'errors'  => $validator->errors(),
                'message' => 'لم يتم تحديث الإشعار. تحقق من المدخلات.',
            ], 422);
        }

        $scheduled_at = $request->scheduled_at
            ? Carbon::parse(str_replace('T', ' ', $request->scheduled_at))->format('Y-m-d H:i:s')
            : null;

        $expires_at = $request->expires_at
            ? Carbon::parse(str_replace('T', ' ', $request->expires_at))->format('Y-m-d H:i:s')
            : null;

        $updated = DB::table('notifications')->where('id', $id)->update([
            'title'        => $request->title,
            'type'         => $request->type,
            'description'  => $request->description,
            'related_to'   => $request->related_to,
            'reference_id' => $request->reference_id,
            'priority'     => $request->priority,
            'scheduled_at' => $scheduled_at,
            'expires_at'   => $expires_at, // ✅ تخزين الانتهاء
            'is_important' => $request->is_important ? 1 : 0,
            'updated_at'   => Carbon::now(),
        ]);

        if (!$updated) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الإشعار غير موجود أو لم يتم تعديل أي بيانات.',
            ], 404);
        }

        $notification = DB::table('notifications')->where('id', $id)->first();

        return response()->json([
            'status'       => 'success',
            'message'      => 'تم تحديث الإشعار بنجاح.',
            'notification' => $notification,
        ]);
    }



   //////////////////////////////////////////////////

// إعادة تحميل الجدول
public function reloadNotifications(Request $request)
{
    $query = DB::table('notifications');

    // فقط مثال: فلترة إذا احتجت لاحقًا
    $notifications = $query->orderBy('created_at', 'desc')->get();

    return view('modules.auth.notifications.notifications_table', compact('notifications'));
}

//////////// تمييز الكل كمقروء
public function markAllRead()
{
    DB::table('notifications')->update(['is_read' => 1]);
    return response()->json(['status' => 'success', 'message' => 'تم تمييز كل الإشعارات كمقروء']);
}

////////////////////////////////////////



}
