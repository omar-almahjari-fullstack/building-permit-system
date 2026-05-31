<?php

namespace App\Services;

require base_path('libs/twilio-php-main/src/Twilio/autoload.php');

use Twilio\Rest\Client;

class TwilioService
{
    protected Client $twilio;

    public function __construct()
    {
        $this->twilio = new Client(
            env('TWILIO_SID'),
            env('TWILIO_AUTH_TOKEN')
        );
    }


    /**
     * إرسال رسالة نصية حرة (Body عادي)
     */
    public function sendWhatsApp(string $to, string $message)
    {
        return $this->twilio->messages->create(
            "whatsapp:" . $to,
            [
                "from" => env("TWILIO_WHATSAPP_FROM"),
                "body" => $message
            ]
        );
    }

    /**
     * إرسال Template Message مع متغيرات
     */
    public function sendTemplateMessage(string $to, string $contentSid, array $variables = [])
    {
        return $this->twilio->messages->create(
            "whatsapp:" . $to,
            [
                "from" => env("TWILIO_WHATSAPP_FROM"),
                "ContentSid" => $contentSid,
                "ContentVariables" => json_encode($variables)
            ]
        );
    }


    public function sendSMS(string $to, string $message)
{
    return $this->twilio->messages->create(
        $to,
        [
            "from" => env("TWILIO_SMS_FROM"), // رقم Twilio الخاص بالـ SMS
            "body" => $message
        ]
    );
}

}
