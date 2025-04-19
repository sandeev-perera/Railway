<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    protected $guarded = ['id', 'email'];


    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function adminrole(){
        //I have no freaking idea why this specific rellationship require a 2nd parameter to work.
        //so better more about this
        return $this->belongsTo(AdminRole::class, 'admin_role_id');}

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
