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



class ProductsListingDetailsController extends Controller
{
   public function index(Request $request, $slug)
{
    // Get sub category by slug
    $subCategory = ProductSabCategory::where('slug', $slug)
                    ->whereNull('deleted_at')
                    ->first();

    if (!$subCategory) {
        // Optional: redirect or show 404 if not found
        abort(404, 'Subcategory not found');
    }

    // Get products in this sub category
    $products = ProductDetails::where('product_sab_category_id', $subCategory->id)
                ->whereNull('deleted_at')
                ->get();
     $categories = ProductCategory::whereNull('deleted_at')->pluck('category_name', 'id');
    // Other data for filters
    $categories = ProductCategory::whereNull('deleted_at')->pluck('category_name', 'id');
    $tcs = ProductDetails::whereNull('deleted_at')->select('tc_name')->distinct()->pluck('tc_name');
    $ageGroups = AgeGroup::whereNull('deleted_at')->pluck('category_name', 'id');
    $collections = ProductDetails::whereNull('deleted_at')->select('collection')->distinct()->pluck('collection');
    $fabricTypes = FabricType::whereNull('deleted_at')->pluck('category_name', 'id');
    $sizes = SizeDetails::whereNull('deleted_at')->pluck('category_name', 'id');
    // Extract unique colors
    $uniqueColors = collect();
    foreach ($products as $product) {
        $colorArray = array_map('trim', explode(',', $product->colors));
        $uniqueColors = $uniqueColors->merge($colorArray);
    }
    $uniqueColors = $uniqueColors->unique()->values();

    return view('frontend.product-category-listing', compact(
    'categories', 'tcs', 'ageGroups', 'collections',
    'fabricTypes', 'sizes', 'uniqueColors', 'products', 'subCategory'
));


    
}



}