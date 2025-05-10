<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
        protected $guarded = [];
        protected $casts = [
            'checked_out_time' => 'datetime',
        ];

        public function passenger(){
           return $this->hasOne(Passenger::class);
        }

        public function startstation(){
            return $this->belongsTo(Station::class, "start_station_id");
        }

        public function endstation(){
            return $this->belongsTo(Station::class, "end_station_id");
        }
}
