<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarCodeCard extends Model
{
    /** @use HasFactory<\Database\Factories\BarCodeCardFactory> */
    use HasFactory;
    protected $guarded = ['id', 'passenger_id', 'created_at'];

    public function passenger(){
        return $this->belongsTo(Passenger::class);
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
