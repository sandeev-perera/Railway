<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $guarded = ['id', 'passenger_id', 'created_at'];


    public function passenger(){
        return $this->belongsTo(Passenger::class);
    }

}

