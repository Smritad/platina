<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PremiumDetail extends Model
{
    use SoftDeletes;

    protected $table = 'premium_details';

    protected $fillable = [
        'title',
        'heading',
        'counter_text',
        'counter_description',
        'counter_image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = ['deleted_at'];
}
