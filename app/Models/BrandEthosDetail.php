<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandEthosDetail extends Model
{
use SoftDeletes;

    protected $fillable = [
        'title',
        'heading',
        'counter_text',
        'counter_description',
        'counter_images',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
        protected $dates = ['deleted_by'];

}
