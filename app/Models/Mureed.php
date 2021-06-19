<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mureed extends Model
{
    use HasFactory;

    public function getPhotoAttribute($value)
    {
        if ($value) {
            return URL().'/'.$value;
        }

        return null;
    }

    public function getSignatureAttribute($value)
    {
        if ($value) {
            return URL().'/'.$value;
        }

        return null;
    }
}
