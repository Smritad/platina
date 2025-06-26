<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'product_sab_category_id',
        'product_name',
        'slug',
        'tc_name',
        'age_group_id',
        'fabric_type_id',
        'size_id',
        'shipping',
        'return_exchange',
        'colors',
        'dimension',
         'collection',
        'product_content_id',
        'style_no',
        'mrp',
        'description',
        'thumbnail_image',
        'media_files',
        'created_by',
        'updated_by',
        'deleted_by',
         'deleted_at'
    ];

    protected $casts = [
        'media_files' => 'array'
    ];

    public function category()
{
    return $this->belongsTo(ProductCategory::class, 'product_category_id');
}

public function ageGroup()
{
    return $this->belongsTo(AgeGroup::class, 'age_group_id');
}

public function fabricType()
{
    return $this->belongsTo(FabricType::class, 'fabric_type_id');
}

public function size()
{
    return $this->belongsTo(SizeDetails::class, 'size_id');
}

public function productContent()
{
    return $this->belongsTo(ProductContent::class, 'product_content_id');
}

}
