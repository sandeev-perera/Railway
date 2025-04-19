<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
    protected $guarded = ['id', 'contactable_id', 'created_at'];


    public function contactable()
    {
        return $this->morphTo();
    }
}
