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
use App\Models\SizeDetails;


class SizeController extends Controller
{

    public function index()
    {
        $product_category = SizeDetails::leftJoin('users', 'size_details.created_by', '=', 'users.id')
                                        ->whereNull('size_details.deleted_by')
                                        ->select('size_details.*', 'users.name as creator_name')
                                        ->get();
        return view('backend.products.product-size.index', compact('product_category'));
    }

    public function create(Request $request)
    { 
        return view('backend.products.product-size.create');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Product Category Name field is required.',
            'category_name.string' => 'The Product Category Name must be a valid string.',
            'category_name.max' => 'The Product Category Name cannot exceed 255 characters.',
        ]);
        
        try {
            $slug = Str::slug($request->category_name, '-');

            SizeDetails::create([
                'category_name' => $request->category_name,
                'slug' => $slug,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('product-size.index')->with('message', 'Product ize created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the Product Category. Please try again.'])->withInput();
        }
    }

    public function edit($id)
    {
        $category = SizeDetails::findOrFail($id);

        return view('backend.products.product-size.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ], [
            'category_name.required' => 'The Product Category Name field is required.',
            'category_name.string' => 'The Product Category Name must be a valid string.',
            'category_name.max' => 'The Product Category Name cannot exceed 255 characters.',
        ]);

        try {
            $category = SizeDetails::findOrFail($id);

            $category->update([
                'category_name' => $request->category_name,
                'modified_by' => Auth::user()->id, 
                'modified_at' => Carbon::now(),
            ]);

            return redirect()->route('product-size.index')->with('message', 'Product Size updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update the Product Category. Please try again.'])->withInput();
        }
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = SizeDetails::findOrFail($id);
            $industries->update($data);

            return redirect()->route('product-size.index')->with('message', 'Product Size deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}