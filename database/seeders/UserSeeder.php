<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة مستخدم واحد فقط
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'name' => 'المسؤول النظام',
            'email' => 'admin@gmail.com',
            'phone' => '774360827',
            'department_id' => 1, // القسم رقم 1
            'is_active' => 1,
            'failed_login_attempts' => 0,
            'account_locked_until' => null,
            'last_password_change' => now(),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
