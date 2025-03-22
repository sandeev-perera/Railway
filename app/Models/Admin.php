<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    protected $guarded = [];


    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function adminrole(){
        return $this->belongsTo(AdminRole::class);
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
