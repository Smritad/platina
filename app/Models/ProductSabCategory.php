<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSabCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_product_category';
    public $timestamps = false;

    protected $fillable = [
        'product_mast_category_id',
        'sab_category_name',
        'slug',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
