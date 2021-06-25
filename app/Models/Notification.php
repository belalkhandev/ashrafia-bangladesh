<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Notification extends Model
{
    use HasFactory;

    public function getImageAttribute($value)
    {
        $url= URL::to('/').'/';
        if ($value) {
            return $url.$value;
        }

        return null;
    }
}
