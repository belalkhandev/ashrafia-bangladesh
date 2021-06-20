<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mureed extends Model
{
    use HasFactory;
    
    protected $appends = ['age'];

    public function getPhotoAttribute($value)
    {
        $url = 'https://anjumaneashrafiabangladesh.com/';
        if ($value) {
            return $url.$value;
        }

        return null;
    }

    public function getSignatureAttribute($value)
    {
        $url = 'https://anjumaneashrafiabangladesh.com/';
        if ($value) {
            return $url.$value;
        }

        return null;
    }

    public function getAgeAttribute()
    {
        $birthdate = $this->attributes['birthdate'];
        $now = Carbon::now();
        $age = $now->diffInYears($birthdate);

        return $age;
    }
}
