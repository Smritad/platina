<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Permission;
use App\Models\UsersPermission;
use App\Models\AboutusDetail;


class AboutusDetailsDetailsController extends Controller
{

    public function index()
{
    $aboutusDetails = AboutusDetail::whereNull('deleted_at')->get();

    return view('backend.home-page.aboutusdetails.index', compact('aboutusDetails'));
}

    public function create(Request $request)
    { 
        return view('backend.home-page.aboutusdetails.create');
    }



public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'description' => $request->description,
        'counter_text' => $request->has('counter_text') ? implode(',', array_filter($request->counter_text)) : null,
        'counter_description' => $request->has('counter_description') ? implode(',', array_filter($request->counter_description)) : null,
        'created_by' => Auth::id(),
    ];

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/platina/home/banner'), $filename);
        $data['image'] = $filename;
    }

    AboutusDetail::create($data);

    return redirect()->route('aboutus-details-platina.index')->with('message', 'About Us detail added successfully!');
}



    public function edit($id)
{
    $aboutus = AboutusDetail::findOrFail($id);
    return view('backend.home-page.aboutusdetails.edit', compact('aboutus'));
}



    public function update(Request $request, $id)
{
    $aboutus = AboutusDetail::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'description' => 'required',
    ]);

    $data = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'description' => $request->description,
        'counter_text' => $request->has('counter_text') ? implode(',', array_filter($request->counter_text)) : null,
        'counter_description' => $request->has('counter_description') ? implode(',', array_filter($request->counter_description)) : null,
        'updated_by' => Auth::id(),
    ];

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/platina/home/banner'), $filename);
        $data['image'] = $filename;
    }

    $aboutus->update($data);

    return redirect()->route('aboutus-details-platina.index')->with('message', 'About Us detail updated successfully!');
}


   public function destroy($id)
{
    $aboutus = AboutusDetail::findOrFail($id);
    $aboutus->update([
        'deleted_by' => Auth::id()
    ]);
    $aboutus->delete();

    return redirect()->route('aboutus-details-platina.index')->with('message', 'Deleted successfully!');
}


    

}