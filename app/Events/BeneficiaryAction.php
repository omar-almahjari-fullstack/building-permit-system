<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BeneficiaryAction
{
    use Dispatchable, SerializesModels;

    public $beneficiaryId;
    public $type;        // login / update / submit / approve / pay ...
    public $desc;
    public $ip;
    public $device;      // user-agent مختصر
    public $location;    // اختياري

    public function __construct($beneficiaryId, $type, $desc, $ip = null, $device = null, $location = null)
    {
        $this->beneficiaryId = $beneficiaryId;
        $this->type   = $type;
        $this->desc   = $desc;
        $this->ip     = $ip ?? request()->ip();
        $this->device = $device ?? substr(request()->userAgent() ?? '', 0, 190);
        $this->location = $location;
    }
}