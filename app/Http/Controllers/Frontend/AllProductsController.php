<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\ProductSabCategory;
use App\Models\SizeDetails;
use App\Models\AgeGroup;
use App\Models\FabricType;

class AllProductsController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::whereNull('deleted_at')->get();
        $subCategories = ProductSabCategory::whereNull('deleted_at')->get()->groupBy('product_mast_category_id');
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

        if ($request->tc_name && $request->tc_name !== 'Select') {
            $query->where('tc_name', $request->tc_name);
        }

        if ($request->age_group && $request->age_group !== 'Select') {
            $ageGroupId = AgeGroup::where('category_name', $request->age_group)->value('id');
            if ($ageGroupId) {
                $query->where('age_group_id', $ageGroupId);
            }
        }

        if ($request->collection_name && $request->collection_name !== 'Select') {
            $query->where('collection', $request->collection_name);
        }

        if ($request->fabric_types) {
            $query->whereIn('fabric_type_id', $request->fabric_types);
        }

        if ($request->colors && is_array($request->colors)) {
            $query->where(function($q) use ($request) {
                foreach ($request->colors as $color) {
                    $q->orWhereRaw("FIND_IN_SET(?, colors)", [$color]);
                }
            });
        } elseif ($request->colors && !is_array($request->colors)) {
            $query->whereRaw("FIND_IN_SET(?, colors)", [$request->colors]);
        }

        if ($request->size && $request->size !== 'Select') {
            $sizeId = SizeDetails::where('category_name', $request->size)->value('id');
            if ($sizeId) {
                $query->where('size_id', $sizeId);
            }
        }

       if ($request->min_price !== null && $request->max_price !== null && $request->min_price > 0 && $request->max_price > 0) {
    $query->whereBetween('mrp', [(float)$request->min_price, (float)$request->max_price]);
}


        $products = $query->get();

        if ($products->isEmpty()) {
            return '<div class="col-12"><p class="text-center">No products found.</p></div>';
        }

        $html = "";
        foreach ($products as $product) {
            $images = json_decode($product->thumbnail_image ?? '[]');
            $defaultImage = $images[0] ?? '';
            $hoverImage = $images[1] ?? $defaultImage;
            $fabricName = FabricType::where('id', $product->fabric_type_id)->value('category_name');
            $catSlug = ProductSabCategory::where('id', $product->product_sab_category_id)->value('slug');

            $html .= '<div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">';
            $html .= '<div class="product-main-box-sec">';
            $html .= '<div class="product-box-front hover-image-wrap">';
            $html .= '<a href="#">';
            $html .= '<img src="' . asset('uploads/products/thumbnails/' . $defaultImage) . '" alt="' . $product->product_name . '" class="img-default">';
            $html .= '<img src="' . asset('uploads/products/thumbnails/' . $hoverImage) . '" alt="' . $product->product_name . '" class="img-hover">';
            $html .= '</a>';
            $html .= '<div class="product-name-wrap">';
            $html .= '<a href="' . route('product.categoryproduct', [$catSlug, $product->slug]) . '">';
            $html .= '<div class="product-inner-contact">';
            $html .= '<h4>' . $product->product_name . '</h4>';
            $html .= '<h5 class="product-price">₹ ' . number_format($product->mrp, 2) . '</h5>';
            $html .= '<h5 class="product-fabric">' . $fabricName . '</h5>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        return $html;
    }

    public function footer(Request $request)
    {
        return view('components.frontend.footer');
    }
}
