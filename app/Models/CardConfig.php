<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardConfig extends Model
{
    /** @use HasFactory<\Database\Factories\CardConfigFactory> */
    use HasFactory;
    protected $guarded = [];


    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function barcodecards(){
        return $this->hasMany(BarCodeCard::class);
    }

    public function passengers()
    {
    return $this->hasManyThrough(
        Passenger::class,
        BarCodeCard::class, 
        'card_config_id',   
        'id',               
        'id',               
        'passenger_id'      
    );
}
}
