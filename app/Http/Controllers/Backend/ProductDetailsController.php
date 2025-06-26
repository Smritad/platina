<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\ProductSabCategory;
use App\Models\SizeDetails;
use App\Models\AgeGroup;
use App\Models\FabricType;
use App\Models\ProductContent;

use Exception;

class ProductDetailsController extends Controller
{
   public function index()
{
    $products = ProductDetails::with([
        'category',
        'ageGroup',
        'fabricType',
        'size',
        'productContent'
    ])->get();

    return view('backend.products.product-details.index', compact('products'));
}


    public function create()
{
    $categories = DB::table('master_product_category')->get();
    $subcategories = DB::table('sub_product_category')->get();
    $age_groups = DB::table('age_group')->get();
    $fabric_types = DB::table('fabric_type')->get();
    $sizes = DB::table('size_details')->get();
    $contents = DB::table('Product_content')->get();

    return view('backend.products.product-details.create', compact('categories', 'subcategories', 'age_groups', 'fabric_types', 'sizes', 'contents'));
}

public function store(Request $request)
{
    $request->validate([
        'product_category_id' => 'required',
        'product_sab_category_id' => 'required',
        'product_name' => 'required|string|max:255',
        'age_group_id' => 'required',
        'fabric_type_id' => 'required',
        'size_id' => 'required',
        'colors' => 'required|array',
        'mrp' => 'nullable|numeric',
        'thumbnail_image' => 'required|array',
        'thumbnail_image.*' => 'image|mimes:jpeg,png,jpg,webp|max:20480000',
        'media_files.*' => 'nullable|mimes:webp,png,jpeg,jpg,mp4,mp3|max:20480000'
    ]);

    try {
        $slug = Str::slug($request->product_name, '-');

        // Upload and store thumbnail images
        $thumbnail_paths = [];
        if ($request->hasFile('thumbnail_image')) {
            foreach ($request->file('thumbnail_image') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/thumbnails'), $filename);
                $thumbnail_paths[] = $filename;
            }
        }

        // Upload and store media files
        $media_paths = [];
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/media'), $filename);
                $media_paths[] = $filename;
            }
        }

        ProductDetails::create([
            'product_category_id' => $request->product_category_id,
            'product_sab_category_id' => $request->product_sab_category_id,
            'product_name' => $request->product_name,
            'slug' => $slug,
            'tc_name' => $request->tc_name,
            'age_group_id' => $request->age_group_id,
            'fabric_type_id' => $request->fabric_type_id,
            'size_id' => $request->size_id,
            'colors' => implode(',', $request->colors),
            'dimension' => $request->dimension,
            'collection' => $request->collection,
            'product_content_id' => $request->product_content_id,
            'style_no' => $request->style_no,
            'mrp' => $request->mrp,
            'shipping' => $request->Shipping,  // NEW FIELD
    'return_exchange' => $request->Return,  // NEW FIELD
            'description' => $request->description,
            'thumbnail_image' => json_encode($thumbnail_paths),
            'media_files' => json_encode($media_paths),
            'created_by' => Auth::id(),
            'created_at' => now(),
        ]);

        return redirect()->route('product-details.index')->with('success', 'Product details added successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to add product details: ' . $e->getMessage()])->withInput();
    }
}


public function edit($id)
{
    $product = ProductDetails::findOrFail($id);
    $categories = ProductCategory::all();
    $subcategories = ProductSabCategory::all();
    $age_groups = AgeGroup::all();
    $fabric_types = FabricType::all();
    $sizes = SizeDetails::all();
    $contents = ProductContent::all();

    return view('backend.products.product-details.edit', compact(
        'product', 'categories', 'subcategories', 'age_groups', 'fabric_types', 'sizes', 'contents'
    ));
}

public function update(Request $request, $id)
{
    $request->validate([
        'product_category_id' => 'required',
        'product_sab_category_id' => 'nullable',
        'product_name' => 'required|string|max:255',
        'age_group_id' => 'required',
        'fabric_type_id' => 'required',
        'size_id' => 'required',
        'product_content_id' => 'required',
        'mrp' => 'nullable|numeric',
        'thumbnail_image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'media_files.*' => 'nullable|mimes:webp,png,jpeg,jpg,mp4,mp3|max:20480',
    ]);

    try {
        $product = ProductDetails::findOrFail($id);
        $thumbnail_paths = json_decode($product->thumbnail_image ?? '[]', true);
        $media_paths = json_decode($product->media_files ?? '[]', true);

        // Remove files marked for deletion
        $removedThumbs = json_decode($request->removed_thumbnails ?? '[]', true);
        $removedMedia = json_decode($request->removed_media_files ?? '[]', true);

        $thumbnail_paths = array_filter($thumbnail_paths, function ($path) use ($removedThumbs) {
            if (in_array($path, $removedThumbs)) {
                @unlink(public_path('uploads/products/thumbnails/' . $path));
                return false;
            }
            return true;
        });

        $media_paths = array_filter($media_paths, function ($path) use ($removedMedia) {
            if (in_array($path, $removedMedia)) {
                @unlink(public_path('uploads/products/media/' . $path));
                return false;
            }
            return true;
        });

        // Handle new thumbnail uploads
        if ($request->hasFile('thumbnail_image')) {
            foreach ($request->file('thumbnail_image') as $file) {
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/thumbnails'), $filename);
                $thumbnail_paths[] = $filename;
            }
        }

        // Handle new media uploads
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/media'), $filename);
                $media_paths[] = $filename;
            }
        }
        $slug = Str::slug($request->product_name, '-');

        $product->update([
            'product_category_id' => $request->product_category_id,
            'product_sab_category_id' => $request->product_sab_category_id,
            'product_name' => $request->product_name,
             'slug' => $slug,
            'tc_name' => $request->tc_name,
            'age_group_id' => $request->age_group_id,
            'fabric_type_id' => $request->fabric_type_id,
            'size_id' => $request->size_id,
            'colors' => $request->colors ? implode(',', $request->colors) : null,
            'dimension' => $request->dimension,
            'collection' => $request->collection,
            'product_content_id' => $request->product_content_id,
            'style_no' => $request->style_no,
            'mrp' => $request->mrp,
            'description' => $request->description,
           'shipping' => $request->shipping,
'return_exchange' => $request->return_exchange,

            'thumbnail_image' => json_encode(array_values($thumbnail_paths)),
            'media_files' => json_encode(array_values($media_paths)),
            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()->route('product-details.index')->with('success', 'Product updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to update product: ' . $e->getMessage()])->withInput();
    }
}


 public function destroy($id)
    {
        try {
            $category = ProductDetails::findOrFail($id);
            
            $category->update([
                'deleted_by' => Auth::user()->id,
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()->route('product-details.index')->with('message', 'product details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $ex->getMessage());
        }
    }



}
