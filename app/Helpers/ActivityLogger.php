<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogger
{
    public static function log($activityType, $activityTable, $recordId, $description = null, $status = 'success')
    {
        return DB::table('activity_logs')->insertGetId([
            'user_id'        => Auth::id(),
            'activity_type'  => $activityType,   // create, update, delete, login ...
            'activity_table' => $activityTable,  // users, orders, products ...
            'record_id'      => $recordId,
            'description'    => $description,
            'ip_address'     => Request::ip(),
            'device_info'    => Request::header('User-Agent'),
            'location'       => null, // ممكن تضيف لاحقاً GeoIP
            'status'         => $status,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
