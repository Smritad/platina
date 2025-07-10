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

class AllProductsController extends Controller
{

public function index()
{
    $categories = ProductCategory::whereNull('deleted_at')->pluck('category_name', 'id');
    $tcs = ProductDetails::whereNull('deleted_at')->select('tc_name')->distinct()->pluck('tc_name');
    $ageGroups = AgeGroup::whereNull('deleted_at')->pluck('category_name', 'id');
    $collections = ProductDetails::whereNull('deleted_at')->select('collection')->distinct()->pluck('collection');
    $fabricTypes = FabricType::whereNull('deleted_at')->pluck('category_name', 'id');
    $sizes = SizeDetails::whereNull('deleted_at')->pluck('category_name', 'id');

    $products = ProductDetails::whereNull('deleted_at')->get();

    // Extract unique colors from comma-separated strings
    $uniqueColors = collect();
    foreach ($products as $product) {
        $colorArray = array_map('trim', explode(',', $product->colors));
        $uniqueColors = $uniqueColors->merge($colorArray);
    }
    $uniqueColors = $uniqueColors->unique()->values();

    return view('frontend.allproducts', compact(
        'categories', 'tcs', 'ageGroups', 'collections',
        'fabricTypes', 'sizes', 'uniqueColors', 'products'
    ));
}


    



public function footer(Request $request)

{
    return view('components.frontend.footer');
}

}