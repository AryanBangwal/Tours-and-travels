<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function images()
    {
        return $this->hasMany(File::class);
    }

}
