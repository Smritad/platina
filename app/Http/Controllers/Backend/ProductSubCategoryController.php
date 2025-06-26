<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ProductSabCategory;
use App\Models\ProductCategory;
use App\Models\ProductDetails;


class ProductSubCategoryController extends Controller
{

    public function index()
    {
        $product_category = ProductSabCategory::leftJoin('users', 'sub_product_category.created_by', '=', 'users.id')
                                        ->whereNull('sub_product_category.deleted_by')
                                        ->select('sub_product_category.*', 'users.name as creator_name')
                                        ->get();
        return view('backend.products.product-subcategory.index', compact('product_category'));
    }

    public function create(Request $request)
    { 
       $categories = DB::table('master_product_category')->get();
        return view('backend.products.product-subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'product_category_id' => 'required',
            'category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Product Category Name field is required.',
            'category_name.string' => 'The Product Category Name must be a valid string.',
            'category_name.max' => 'The Product Category Name cannot exceed 255 characters.',
        ]);
        
        try {
            $slug = Str::slug($request->category_name, '-');

            ProductSabCategory::create([
                'product_mast_category_id' => $request->product_category_id,
                'sab_category_name' => $request->category_name,
                'slug' => $slug,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('product-subcategory.index')->with('message', 'Product Sab Category created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the Product Category. Please try again.'])->withInput();
        }
    }

    public function edit($id)
    {
          $category = ProductSabCategory::findOrFail($id);
          $categories = ProductCategory::all();

        //   dd($category);
        return view('backend.products.product-subcategory.edit', compact('category','categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'product_category_id' => 'required',
            'sab_category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Product Category Name field is required.',
            'category_name.string' => 'The Product Category Name must be a valid string.',
            'category_name.max' => 'The Product Category Name cannot exceed 255 characters.',
        ]);

        try {
            $category = ProductSabCategory::findOrFail($id);

            $category->update([
                'product_category_id' => $request->product_category_id,
                'sab_category_name' => $request->category_name,
                'modified_by' => Auth::user()->id, 
                'modified_at' => Carbon::now(),
            ]);

            return redirect()->route('product-subcategory.index')->with('message', 'Product Sab Category updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update the Product Category. Please try again.'])->withInput();
        }
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ProductSabCategory::findOrFail($id);
            $industries->update($data);

            return redirect()->route('product-subcategory.index')->with('message', 'Product Sab Category deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}