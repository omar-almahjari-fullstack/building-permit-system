<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
     public function showUsers()
    {
        // $users = DB::table('login')
        //     ->where('active', 1) // مثال لشرط إضافي
        //     ->orderBy('id', 'desc')
        //     ->get();

        // return view('users.index', compact('users'));
    }
}
