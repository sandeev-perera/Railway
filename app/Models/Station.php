<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /** @use HasFactory<\Database\Factories\StationFactory> */
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    
    public function startroute(){
        return $this->hasMany(Route::class, "start_station_id");
    }

    public function endroute(){
        return $this->hasMany(Route::class, "end_station_id");
    }

    public function barcodeScanners(){
        return $this->hasMany(BarcodeScanner::class);
    }

    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
