<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait Status
{
    public static function getStatusOptions()
    {
        return [
            0 => "Enable",
            1 => "Disable"
        ];
    }
}
