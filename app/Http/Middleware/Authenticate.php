<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // أي رابط خاص بالمستفيد
            if ($request->is('beneficiary/*')) {
                return route('beneficiary.login'); // توجيه لمستفيد
            }

            // روابط المستخدم العادي
            return route('login');
        }
    }
}
