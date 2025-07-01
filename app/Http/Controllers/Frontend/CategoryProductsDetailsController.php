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



class CategoryProductsDetailsController extends Controller
{
   public function index(Request $request, $catSlug, $productSlug)
{
    $product = ProductDetails::where('slug', $productSlug)->firstOrFail();

    $categoryName = DB::table('master_product_category')
        ->where('id', $product->product_category_id)
        ->value('category_name');

    $sizeName = DB::table('size_details')
        ->where('id', $product->size_id)
        ->value('category_name');

    $fabricName = DB::table('fabric_type')
        ->where('id', $product->fabric_type_id)
        ->value('category_name');

    // Fetch related products (same sub-category, exclude current product)
    $products = ProductDetails::where('product_sab_category_id', $product->product_sab_category_id)
        ->where('id', '!=', $product->id)
        ->get();
    // dd($products);

    return view('frontend.product-category-details', compact(
        'product',
        'categoryName',
        'sizeName',
        'fabricName',
        'products'
        
    ));
}


}