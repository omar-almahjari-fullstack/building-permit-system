<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;

class WhatsAppController extends Controller
{
    protected TwilioService $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    // إرسال رسالة حرة
    public function sendMessage()
    {
        $to = "967779256969"; // بدون +
        $message = "مرحبا! هذه رسالة تجريبية من Laravel عبر Twilio Sandbox 🚀";

        $this->twilio->sendWhatsApp($to, $message);

        return response()->json([
            "status" => "تم إرسال الرسالة بنجاح!"
        ]);
    }

    // إرسال Template Message
    public function sendTemplate()
    {
        $to = "967779256969"; // بدون +
        $contentSid = "HXb5b62575e6e4ff6129ad7c8efe1f983e"; // معرف القالب
        $variables = [
            "1" => "12/1",
            "2" => "3pm"
        ];

        $this->twilio->sendTemplateMessage($to, $contentSid, $variables);

        return response()->json([
            "status" => "تم إرسال Template Message بنجاح!"
        ]);
    }
}
