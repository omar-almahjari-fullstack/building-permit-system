<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   public static function getContent($pageName, $userRole)
    {
        // Your business logic here
        return "Sample content for {$pageName} (User: {$userRole})";
    }
}
