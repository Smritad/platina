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

    
        $ageGroups = AgeGroup::whereNull('deleted_at')->pluck('category_name', 'id');

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
$uniqueColors = collect();
        foreach ($products as $product) {
            $colorArray = array_map('trim', explode(',', $product->colors));
            $uniqueColors = $uniqueColors->merge($colorArray);
        }
        $uniqueColors = $uniqueColors->unique()->values();

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
public function filter_inside(Request $request)
{
    $query = DB::table('product_details')->whereNull('deleted_at');

    if (!empty($request->tc_name) && $request->tc_name !== 'Select') {
        $query->where('tc_name', $request->tc_name);
    }

    if (!empty($request->age_group) && $request->age_group !== 'Select') {
        $query->where('age_group_id', (int) $request->age_group);
    }

    if (!empty($request->collection_name) && $request->collection_name !== 'Select') {
        $query->where('collection', $request->collection_name);
    }

    if (!empty($request->fabric_types)) {
        $query->whereIn('fabric_type_id', $request->fabric_types);
    }

    if (!empty($request->colors)) {
        $query->where(function ($q) use ($request) {
            foreach ($request->colors as $color) {
                $q->orWhereRaw("FIND_IN_SET(?, colors)", [$color]);
            }
        });
    }

    if (!empty($request->size) && $request->size !== 'Select') {
    $query->where('size_id', (int) $request->size);
   }

    if (
        $request->min_price !== null &&
        $request->max_price !== null &&
        $request->min_price > 0 &&
        $request->max_price > 0
    ) {
        $query->whereBetween('mrp', [(float) $request->min_price, (float) $request->max_price]);
    }

    $products = $query->get();

    $html = '<div class="row mb-minus-24 room-popup">';

    if ($products->isEmpty()) {
        $html .= '<div class="col-12"><p class="text-center">No products found.</p></div>';
    } else {
        foreach ($products as $product) {
            $images = json_decode($product->thumbnail_image ?? '[]');
            $defaultImage = $images[0] ?? '';
            $hoverImage = $images[1] ?? $defaultImage;
            $fabricName = DB::table('fabric_type')->where('id', $product->fabric_type_id)->value('category_name');
            $catSlug = DB::table('sub_product_category')->where('id', $product->product_sab_category_id)->value('slug');

            $html .= '<div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">';
            $html .= '<div class="product-main-box-sec">';
            $html .= '<div class="product-box-front hover-image-wrap">';
            $html .= '<a href="#">';
            $html .= '<img src="' . asset('uploads/products/thumbnails/' . $defaultImage) . '" alt="' . e($product->product_name) . '" class="img-default">';
            $html .= '<img src="' . asset('uploads/products/thumbnails/' . $hoverImage) . '" alt="' . e($product->product_name) . '" class="img-hover">';
            $html .= '</a>';
            $html .= '<div class="product-name-wrap">';
            $html .= '<a href="' . route("product.categoryproduct", [$catSlug, $product->slug]) . '">';
            $html .= '<div class="product-inner-contact">';
            $html .= '<h4>' . e($product->product_name) . '</h4>';
            $html .= '<h5 class="product-price">₹ ' . number_format($product->mrp) . '</h5>';
            $html .= '<h5 class="product-fabric">' . e($fabricName) . '</h5>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    }

    $html .= '</div>';

    return response($html);
}




}