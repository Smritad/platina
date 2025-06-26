<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamLeadershipDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'banner_image',
    'title',
    'description',
    'description_content',
    'person_image',
    'person_name',
    'person_designation',
    'person_description',
    'social_icons',
    'created_by',
    'updated_by',
     'deleted_by',
];
       
}
