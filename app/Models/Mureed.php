<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Mureed extends Model
{
    use HasFactory;
    
    protected $appends = ['age'];

    public function getPhotoAttribute($value)
    {
        $url= URL::to('/').'/';
        if ($value) {
            return $url.$value;
        }

        return null;
    }

    public function getSignatureAttribute($value)
    {
        $url= URL::to('/').'/';
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

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }
}
