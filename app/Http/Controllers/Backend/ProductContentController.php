<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\ProductContent;
use Exception;

class ProductContentController extends Controller
{
    public function index()
{
    $product_category = ProductContent::leftJoin('users', 'Product_content.created_by', '=', 'users.id')
                                ->whereNull('Product_content.deleted_by')
                                ->select('Product_content.*', 'users.name as creator_name')
                                ->get();

    return view('backend.products.product-content.index', compact('product_category'));
}


    public function create()
    {
        return view('backend.products.product-content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Age Group Category Name field is required.',
            'category_name.string' => 'The Age Group Category Name must be a valid string.',
            'category_name.max' => 'The Age Group Category Name cannot exceed 255 characters.',
        ]);

        try {
            $slug = Str::slug($request->category_name, '-');

            ProductContent::create([
                'category_name' => $request->category_name,
                'slug' => $slug,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('product-content.index')->with('message', 'Age Group Category created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the Age Group Category. Please try again.'])->withInput();
        }
    }

    public function edit($id)
    {
        $category = ProductContent::findOrFail($id);
        return view('backend.products.product-content.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Age Group Category Name field is required.',
            'category_name.string' => 'The Age Group Category Name must be a valid string.',
            'category_name.max' => 'The Age Group Category Name cannot exceed 255 characters.',
        ]);

        try {
            $category = ProductContent::findOrFail($id);
            
            $category->update([
                'category_name' => $request->category_name,
                'slug' => Str::slug($request->category_name, '-'),
                'modified_by' => Auth::user()->id,
                'modified_at' => Carbon::now(),
            ]);

            return redirect()->route('product-content.index')->with('message', 'Age Group Category updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update the Age Group Category. Please try again.'])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $category = ProductContent::findOrFail($id);
            
            $category->update([
                'deleted_by' => Auth::user()->id,
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()->route('product-content.index')->with('message', 'Age Group deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $ex->getMessage());
        }
    }
}
