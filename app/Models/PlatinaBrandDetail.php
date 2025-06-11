<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlatinaBrandDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'content_heading', 'content_heading_descriptions',
        'content_description', 'banner_image', 'extra_image', 'content_image',
        'created_by', 'updated_by', 'deleted_by'
    ];
}

