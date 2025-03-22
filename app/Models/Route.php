<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /** @use HasFactory<\Database\Factories\RouteFactory> */
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;



    public function startstation(){
        return $this->belongsTo(Station::class, "start_station_id");

    }

    public function endstation(){
        return $this->belongsTo(Station::class, "end_station_id");
    }

    public function cardConfigs(){
        return $this->hasMany(CardConfig::class);
    }

}
