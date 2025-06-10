<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutusDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'counter_text',
        'counter_description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
