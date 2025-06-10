<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialsDetail extends Model
{
    use SoftDeletes;

    protected $table = 'testimonials_details';

    protected $fillable = [
         'title',
        'heading',
        'text',
        'description',
        'designations',
        'image',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}
