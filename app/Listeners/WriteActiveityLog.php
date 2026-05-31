<?php
namespace App\Listeners;

use App\Events\BeneficiaryAction;
use Illuminate\Support\Facades\DB;

class WriteActivityLog
{
    public function handle(BeneficiaryAction $event)
    {
        DB::table('activity_logs')->insert([
            'beneficiary_id' => $event->beneficiaryId,
            'activity_type'  => $event->type,
            'description'    => $event->desc,
            'ip_address'     => $event->ip,
            'device_info'    => $event->device,
            'location'       => $event->location,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}