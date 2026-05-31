<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\TwilioService;

class CitizenController extends Controller
{
     public function getUsers()
   {
     $data = DB::table('beneficiaries')->get();
    return view('modules.auth.requests.create.Citizen_table', compact('data'));
   }

     public function getfirst()
   {
// جلب آخر صف كصفوف ضمن مجموعة
$data = DB::table('beneficiaries')
    ->orderByDesc('id')
    ->take(1)   // صف واحد فقط
    ->get();    // يعيد مجموعة حتى يتوافق مع كود عرض الجدول
    return view('modules.auth.requests.create.Citizen_table', compact('data'));
   }




   public function store(Request $request)
{
    if ($request->isMethod('post')) {

        // تحقق من الاسم المكرر
        $check = DB::table('beneficiaries')->where('name', $request->name)->first();

        // تحقق من البريد الإلكتروني المكرر
        $checkEmail = DB::table('beneficiaries')->where('email', $request->email)->first();

        if ($checkEmail) {
            return response()->json(['message' => 'البريد الإلكتروني الذي ادخلته موجود من قبل'], 422);
        }

        if (!$request->hasFile('personal_photo')) {
            return response()->json(['message' => 'يرجى رفع الصورة الشخصية '], 422);
        }

        if ($check) {
            return response()->json(['message' => 'الاسم الذي ادخلته موجود من قبل'], 422);
        }

        // حفظ الصورة كـ BLOB
        $personalPhotoContent = file_get_contents($request->file('personal_photo')->getRealPath());



        $password = 'user123'; // كلمة المرور الافتراضية


        // إدخال البيانات في قاعدة البيانات
        $id = DB::table('beneficiaries')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($password),
            'identity_type' => $request->identity_type,
            'identity_number' => $request->identity_number,
            'directorate_id' => $request->directorate_id,
            'address' => $request->address,
            'personal_photo' => $personalPhotoContent,
            'created_at' => now()
        ]);

        app(\App\Services\TwilioService::class)->sendWhatsApp(
            "967".$request->mobile, // رقم المواطن
            "📢 *وزارة النقل و الأشغال * ترحب بك عزيزي المواطن 🙏\n\n".
            "✅ تم إنشاء حسابك بنجاح في نظام تراخيص البناء الإلكتروني.\n\n".
            "👤 الاسم: {$request->name}\n".
            "🔑 رقم الهوية : {$request->identity_number}\n".
            "🛡️ كلمة المرور المؤقتة: {$password}\n\n".
            "📲 يمكنك الدخول إلى حسابك من هاتفك المحمول عبر الرابط التالي:\n".
            url('/login')."\n\n".
            "ثم تعبئة بياناتك وتقديم طلب ترخيص البناء بسهولة ويسر. 🏗️\n\n".
            "⚠️ يرجى تغيير كلمة المرور بعد أول تسجيل دخول للحفاظ على أمان حسابك. 🔒"
        );


        return response()->json(['data' => 1, 'id' => $id], 200, [], JSON_UNESCAPED_UNICODE);
    }
}



public function show($id)
{
    $show = DB::table('beneficiaries')->where('id', $id)->first();
    if (!$show) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // تحويل الصورة إلى Base64
    $show->personal_photo = $show->personal_photo ? 'data:image/jpeg;base64,' . base64_encode($show->personal_photo) : null;



    // التأكد من UTF-8 للنصوص
    foreach ($show as $key => $value) {
        if (is_string($value)) {
            $show->$key = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        }
    }

    return response()->json($show);
}


public function update($id, Request $request)
{
    // مصفوفة البيانات الأساسية
    $data = [
        'name'          => $request->name,
        'email'         => $request->email,
        'mobile'        => $request->mobile,
        'identity_type' => $request->identity_type,
        'identity_number'=> $request->identity_number,
        'directorate_id'   => $request->directorate_id,
        'address'       => $request->address,
        // 'updated_at'    => now()
    ];

    // تحديث الصورة الشخصية إذا تم رفعها
    if ($request->hasFile('personal_photo')) {
        $data['personal_photo'] = file_get_contents($request->file('personal_photo')->getRealPath());
    }

    // تحديث ملف PDF إذا تم رفعه
    // if ($request->hasFile('id_card_pdf')) {
    //     $pdfFile = $request->file('id_card_pdf');
    //     $pdfStoragePath = storage_path('app/public/attachments/pdfs');

    //     // إنشاء المجلد إذا لم يكن موجوداً
    //     if (!file_exists($pdfStoragePath)) {
    //         mkdir($pdfStoragePath, 0777, true);
    //     }

    //     $pdfFileName = 'id_card_' . time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $pdfFile->getClientOriginalName());
    //     $pdfFile->move($pdfStoragePath, $pdfFileName);

    //     $data['id_card_pdf'] = 'attachments/pdfs/' . $pdfFileName;
    // }

    // تحديث قاعدة البيانات
    DB::table('beneficiaries')->where('id', $id)->update($data);

    return response()->json(['data' => 1, 'message' => 'تم التحديث بنجاح']);
}

public function delete($id)
{
    $beneficiary = DB::table('beneficiaries')->where('id', $id)->first();

    if ($beneficiary) {
        // حذف ملف PDF إذا موجود
        if (!empty($beneficiary->id_card_pdf)) {
            $pdfPath = storage_path('app/public/' . $beneficiary->id_card_pdf);
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        }

        DB::table('beneficiaries')->where('id', $id)->delete();
    }

    return response()->json(['data' => 1, 'message' => 'تم الحذف بنجاح']);
}




   public function search(Request $request)
{
    $query = DB::table('beneficiaries');

    if ($request->has('name') && $request->name !== null) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->has('identity_number') && $request->identity_number !== null) {
        $query->orWhere('identity_number', 'like', '%' . $request->identity_number . '%');
    }

    $data = $query->get();

    return view('modules.auth.requests.create.Citizen_table', compact('data'))->render();
}

  // public function index(){

    //     $data = DB::table('users')->get();

    //      return view('user_Ajax',['data'=> $data]);

    // }

//    public function store(Request $request)
// {
//     try {
//         // التحقق من صحة البيانات
//         $validator = Validator::make($request->all(), [
//             'name' => 'required|string|max:100',
//             'email' => 'nullable|email',
//             'mobile' => 'required|string|max:15',
//             'identity_type' => 'required|in:1,2', // 1: بطاقة شخصية، 2: جواز
//             'identity_number' => 'required|string|max:20',
//             'directorate' => 'required|in:1,2,3', // 1: السبعين، 2: الثوره، 3: بني الحارث
//             'address' => 'nullable|string',
//             'personal_photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
//             'id_card_pdf' => 'required|file|mimes:pdf|max:5120'
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         // التحقق من عدم تكرار الاسم
//         if (DB::table('beneficiaries')->where('name', $request->name)->exists()) {
//             return response()->json(['error' => 'اسم المستفيد موجود مسبقاً'], 409);
//         }

//         // معالجة الملفات
//         $photoContent = null;
//         $pdfContent = null;

//         if ($request->hasFile('personal_photo')) {
//             $photoContent = file_get_contents($request->file('personal_photo')->getRealPath());
//             $photoContent = mb_convert_encoding($photoContent, 'UTF-8', 'UTF-8');
//         }

//         if ($request->hasFile('id_card_pdf')) {
//             $pdfContent = file_get_contents($request->file('id_card_pdf')->getRealPath());
//             $pdfContent = mb_convert_encoding($pdfContent, 'UTF-8', 'UTF-8');
//         }

//         // إدخال البيانات
//         DB::table('beneficiaries')->insert([
//             'name' => $request->name,
//             'email' => $request->email,
//             'mobile' => $request->mobile,
//             'identity_type' => $request->identity_type,
//             'identity_number' => $request->identity_number,
//             'directorate' => $request->directorate,
//             'address' => $request->address,
//             'personal_photo' => $photoContent,
//             'id_card_pdf' => $pdfContent,
//             'created_at' => now()
//         ]);

//         return response()->json([
//             'success' => true,
//             'message' => 'تم حفظ البيانات بنجاح'
//         ], 200, [], JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);

//     } catch (\Exception $e) {
//         \Log::error('Error in store: ' . $e->getMessage());
//         return response()->json([
//             'error' => 'حدث خطأ في الخادم: ' . $e->getMessage()
//         ], 500);
//     }
// }


// public function store(Request $request)
// {
//     if ($request->isMethod('post')) {
//         try {
//             // التحقق من وجود المستفيد
//             $check = DB::table('beneficiaries')->where('name', $request->name)->first();

//             if ($check) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'اسم المستفيد موجود مسبقاً',
//                     'data' => 0
//                 ]);
//             }

//             // التحقق من وجود الملفات
//             if (!$request->hasFile('personal_photo') || !$request->hasFile('id_card_pdf')) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'يجب رفع الصورة الشخصية وملف البطاقة',
//                     'data' => null
//                 ], 422);
//             }

//             // قراءة محتوى الملفات بدون تحويل الترميز
//             $photoContent = file_get_contents($request->file('personal_photo')->getRealPath());
//             $pdfContent = file_get_contents($request->file('id_card_pdf')->getRealPath());

//             // إدخال البيانات مع معالجة الترميز للنصوص فقط
//             DB::table('beneficiaries')->insert([
//                 'name' => $this->ensureUtf8($request->name),
//                 'email' => $request->email ? $this->ensureUtf8($request->email) : null,
//                 'mobile' => $request->mobile,
//                 'identity_type' => $request->identity_type,
//                 'identity_number' => $request->identity_number,
//                 'directorate' => $request->directorate,
//                 'address' => $request->address ? $this->ensureUtf8($request->address) : null,
//                 'personal_photo' => $photoContent, // محتوى الملف كما هو
//                 'id_card_pdf' => $pdfContent, // محتوى الملف كما هو
//                 'created_at' => now()
//             ]);

//             return response()->json([
//                 'success' => true,
//                 'message' => 'تم الحفظ بنجاح',
//                 'data' => 1
//             ], 200, [], JSON_UNESCAPED_UNICODE);

//         } catch (\Exception $e) {
//             \Log::error('Store Error: ' . $e->getMessage());

//             return response()->json([
//                 'success' => false,
//                 'message' => 'حدث خطأ في الخادم',
//                 'error' => config('app.debug') ? $e->getMessage() : null,
//                 'data' => null
//             ], 500);
//         }
//     }
// }

// // دالة مساعدة داخلية لضمان ترميز UTF-8 للنصوص
// private function ensureUtf8($string)
// {
//     if (is_string($string)) {
//         return mb_convert_encoding($string, 'UTF-8', mb_list_encodings());
//     }
//     return $string;
// }

}
