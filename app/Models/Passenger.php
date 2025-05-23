<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    /** @use HasFactory<\Database\Factories\PassengerFactory> */
    use HasFactory;
    protected $guarded = [];


    public function Applicant(){
        return $this->belongsTo(Applicant::class);
    }

    public function BarcodeCard(){
        return $this->hasOne(BarCodeCard::class);
    }

    //make sure this is correct when testing later.
    public function route(){
        return $this->hasOneThrough(
            Route::class,  
            BarCodeCard::class,
            'passenger_id',     
            'id',               
            'id',               
            'route_id'    
        );
    }
    public function Payments(){
        return $this->hasMany(Payment::class);
    }

    public function journeys(){
        return $this->hasMany(Journey::class);
    }

    public function latestJourney(){
        return $this->hasOne(Journey::class)->latestOfMany();
    }
}
