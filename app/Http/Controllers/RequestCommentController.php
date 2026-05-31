<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestCommentController extends Controller
{

    // عرض التعليقات الخاصة بالطلب
    public function index($requestId)
    {
        $comments = DB::table('request_comments')
            ->join('users', 'request_comments.user_id', '=', 'users.id')
            ->where('request_comments.request_id', $requestId)
            ->select('request_comments.*', 'users.name as user_name')
            ->orderBy('request_comments.created_at', 'asc') // الأقدم أولًا
            ->get();

        return response()->json($comments);
    }

    // إضافة تعليق جديد
    public function store(Request $request, $requestId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $id = DB::table('request_comments')->insertGetId([
            'request_id' => $requestId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'created_at' => now(),
        ]);

        $comment = DB::table('request_comments')
            ->join('users', 'request_comments.user_id', '=', 'users.id')
            ->where('request_comments.id', $id)
            ->select('request_comments.*', 'users.name as user_name')
            ->first();

        return response()->json($comment);
    }
}


