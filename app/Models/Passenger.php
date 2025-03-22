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
    public function cardConfig(){
        return $this->hasOneThrough(
            CardConfig::class,  
            BarCodeCard::class,
            'passenger_id',     
            'id',               
            'id',               
            'card_config_id'    
        );
}
}
