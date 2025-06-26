<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    public $timestamps = false; // because we are manually handling `created_at`

    protected $fillable = [
        'email',
        'otp',
        'created_at',
    ];
}
