<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    // 📦 أخذ نسخة احتياطية
    public function backup()
    {
        try {
            $dbHost = env('DB_HOST', '127.0.0.1');
            $dbUser = env('DB_USERNAME', 'root');
            $dbPass = env('DB_PASSWORD', '');
            $dbName = env('DB_DATABASE', 'laravel');

            // مسار أدوات MySQL في XAMPP
            $mysqlDump = 'D:/xampp/mysql/bin/mysqldump.exe';

            // مجلد مؤقت لحفظ النسخة
            $backupPath = storage_path('app/backups');
            if (!is_dir($backupPath)) mkdir($backupPath, 0777, true);

            $fileName = $backupPath . '/backup_' . date('Y-m-d_H-i-s') . '.sql';

            // أمر النسخ الاحتياطي
            $command = "\"{$mysqlDump}\" -h {$dbHost} -u {$dbUser} " .
                       ($dbPass ? "-p{$dbPass} " : "") .
                       "{$dbName} > \"{$fileName}\"";

            system($command, $output);

            // تحميل الملف للمستخدم
            return response()->download($fileName, basename($fileName))->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
     // 📦 أخذ نسخة احتياطية من اي سيرفر خارجي
    // public function backup()
    // {
    //     try {
    //         $dbName = env('DB_DATABASE');

    //         // 📌 اجلب كل الجداول
    //         $tables = DB::select('SHOW TABLES');
    //         $tables = array_map('current', $tables);

    //         $sqlScript = "-- Backup for database: {$dbName}\n";
    //         $sqlScript .= "-- Created at: " . now() . "\n\n";

    //         foreach ($tables as $table) {
    //             // 🟢 جلب Create Table
    //             $createTable = DB::select("SHOW CREATE TABLE `$table`")[0]->{'Create Table'};
    //             $sqlScript .= "DROP TABLE IF EXISTS `$table`;\n";
    //             $sqlScript .= $createTable . ";\n\n";

    //             // 🟢 جلب بيانات الجدول
    //             $rows = DB::table($table)->get();
    //             foreach ($rows as $row) {
    //                 $values = array_map(function ($val) {
    //                     return isset($val) ? "'" . addslashes($val) . "'" : 'NULL';
    //                 }, (array) $row);

    //                 $sqlScript .= "INSERT INTO `$table` VALUES(" . implode(',', $values) . ");\n";
    //             }
    //             $sqlScript .= "\n\n";
    //         }

    //         // 📁 حفظ الملف
    //         $backupPath = storage_path('app/backups');
    //         if (!is_dir($backupPath)) mkdir($backupPath, 0777, true);

    //         $fileName = $backupPath . '/backup_' . date('Y-m-d_H-i-s') . '.sql';
    //         File::put($fileName, $sqlScript);

    //         // 📤 تنزيل النسخة للمستخدم
    //         return response()->download($fileName, basename($fileName))->deleteFileAfterSend(true);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }


    // ♻️ استعادة نسخة احتياطية
    public function recover(Request $request)
    {
        try {
            $request->validate([
                'backup_file' => 'required|file',
            ]);

            $file = $request->file('backup_file');
            $filePath = $file->getRealPath();

            $dbHost = env('DB_HOST', '127.0.0.1');
            $dbUser = env('DB_USERNAME', 'root');
            $dbPass = env('DB_PASSWORD', '');
            $dbName = env('DB_DATABASE', 'laravel');

            // مسار MySQL
            $mysql = 'D:/xampp/mysql/bin/mysql.exe';

            // أمر الاستعادة
            $command = "\"{$mysql}\" -h {$dbHost} -u {$dbUser} " .
                       ($dbPass ? "-p{$dbPass} " : "") .
                       "{$dbName} < \"{$filePath}\"";

            system($command, $output);

            return response()->json([
                'status' => 'success',
                'message' => "♻️ تم استعادة النسخة الاحتياطية بنجاح"
            ]);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }



}
