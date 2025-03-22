<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarcodeScanner extends Model
{
    /** @use HasFactory<\Database\Factories\BarcodeScannerFactory> */
    use HasFactory;
    protected $guarded = [];
    
    public function station(){
        return $this->belongsTo(Station::class);    
    }
}
