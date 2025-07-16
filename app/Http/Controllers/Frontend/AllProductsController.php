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
    $categories = ProductCategory::whereNull('deleted_at')->get();

    $subCategories = ProductSabCategory::whereNull('deleted_at')->get()->groupBy('product_mast_category_id');
//dd($subCategories);
    $tcs = ProductDetails::whereNull('deleted_at')->select('tc_name')->distinct()->pluck('tc_name');
    $ageGroups = AgeGroup::whereNull('deleted_at')->pluck('category_name', 'id');
    $collections = ProductDetails::whereNull('deleted_at')->select('collection')->distinct()->pluck('collection');
    $fabricTypes = FabricType::whereNull('deleted_at')->pluck('category_name', 'id');
    $sizes = SizeDetails::whereNull('deleted_at')->pluck('category_name', 'id');

    $products = ProductDetails::whereNull('deleted_at')->get();

    $uniqueColors = collect();
    foreach ($products as $product) {
        $colorArray = array_map('trim', explode(',', $product->colors));
        $uniqueColors = $uniqueColors->merge($colorArray);
    }
    $uniqueColors = $uniqueColors->unique()->values();

    return view('frontend.allproducts', compact(
        'categories', 'subCategories', 'tcs', 'ageGroups',
        'collections', 'fabricTypes', 'sizes', 'uniqueColors', 'products'
    ));
}


public function filter(Request $request)
{
    $query = ProductDetails::whereNull('deleted_at');

    if ($request->tc_name) {
        $query->where('tc_name', $request->tc_name);
    }

    if ($request->fabric_types) {
        $query->whereIn('fabric_type_id', $request->fabric_types);
    }

    if ($request->color) {
        $query->where('colors', 'like', '%' . $request->color . '%');
    }

    if ($request->min_price && $request->max_price) {
        $query->whereBetween('mrp', [$request->min_price, $request->max_price]);
    }

    $products = $query->get();

    // Return Blade-rendered HTML using the same code block as in your main view
    $html = "";
    foreach ($products as $product) {
        $images = json_decode($product->thumbnail_image ?? '[]');
        $defaultImage = $images[0] ?? '';
        $hoverImage = $images[1] ?? $defaultImage;
        $fabricName = DB::table('fabric_type')->where('id', $product->fabric_type_id)->value('category_name');
        $catSlug = DB::table('sub_product_category')->where('id', $product->product_sab_category_id)->value('slug');

        $html .= '<div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
            <div class="product-main-box-sec">
                <div class="product-box-front hover-image-wrap">
                    <a href="#">
                        <img src="' . asset('uploads/products/thumbnails/' . $defaultImage) . '" alt="' . $product->product_name . '" class="img-default">
                        <img src="' . asset('uploads/products/thumbnails/' . $hoverImage) . '" alt="' . $product->product_name . '" class="img-hover">
                    </a>
                    <div class="product-name-wrap">
                        <a href="' . route('product.categoryproduct', [$catSlug, $product->slug]) . '">
                            <div class="product-inner-contact">
                                <h4>' . $product->product_name . '</h4>
                                <h5 class="product-price">₹ ' . number_format($product->mrp) . '</h5>
                                <h5 class="product-fabric">' . $fabricName . '</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
    }

    return $html;
}





    



public function footer(Request $request)

{
    return view('components.frontend.footer');
}

}