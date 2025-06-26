<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\ProductSabCategory;
use App\Models\SizeDetails;
use App\Models\AgeGroup;
use App\Models\FabricType;
use App\Models\ProductContent;


class CategoryProductsListingDetailsController extends Controller
{

public function index($slug)
{
    // Get master category by slug (slug generated from category_name)
    $masterCategory = DB::table('master_product_category')
        ->whereRaw('LOWER(REPLACE(category_name, " ", "-")) = ?', [$slug])
        ->first();

    if (!$masterCategory) {
        abort(404, 'Category not found');
    }

    // Get products for this master category
    $products = DB::table('product_details')
        ->where('product_category_id', $masterCategory->id)
        ->get();

    // Get filter data
    $categories = DB::table('sub_product_category')
        ->where('id', $masterCategory->id)
        ->pluck('sab_category_name', 'id');

    $tcs = DB::table('product_details')
        ->where('product_category_id', $masterCategory->id)
        ->pluck('tc_name')
        ->unique()
        ->filter();

    $ageGroups = DB::table('product_details')
        ->where('product_category_id', $masterCategory->id)
        ->pluck('age_group_id')
        ->unique()
        ->filter();

    $collections = DB::table('product_details')
        ->where('product_category_id', $masterCategory->id)
        ->pluck('collection')
        ->unique()
        ->filter();

    $fabricTypes = DB::table('fabric_type')
        ->pluck('category_name', 'id');

    $uniqueColors = DB::table('product_details')
        ->where('product_category_id', $masterCategory->id)
        ->pluck('colors')
        ->unique()
        ->filter();

    $sizes = DB::table('size_details')
        ->pluck('category_name', 'id');

   return view('frontend.category', compact(
    'products', 
    'categories', 
    'tcs', 
    'ageGroups',
    'collections', 
    'fabricTypes', 
    'uniqueColors', 
    'sizes'
))->with('masterCategoryName', $masterCategory->category_name);

}



}