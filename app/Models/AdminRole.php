<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    /** @use HasFactory<\Database\Factories\AdminRoleFactory> */
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;



    public function admins(){
        return $this->hasMany(Admin::class);
    }
}
