<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogsDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'heading',
        'text',
        'description',
        'images',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['deleted_at'];
}
