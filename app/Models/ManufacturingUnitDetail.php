<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManufacturingUnitDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'banner_image', 'title', 'content_image',
        'content_heading', 'description_content'
    ];
}
