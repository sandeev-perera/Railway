<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarCodeCard extends Model
{
    /** @use HasFactory<\Database\Factories\BarCodeCardFactory> */
    use HasFactory;
    protected $guarded = [];

    public function passenger(){
        return $this->belongsTo(Passenger::class);
    }

    public function cardConfig(){
        return $this->belongsTo(CardConfig::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
