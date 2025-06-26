<?php

namespace App\Http\Controllers\Backend\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManufacturingUnitDetail;

class ManufacturingUnitDetailsController extends Controller
{
    public function index()
    {
        $records = ManufacturingUnitDetail::latest()->get();
        return view('backend.aboutus-page.manufacturing-unit.index', compact('records'));
    }

    public function create()
    {
        return view('backend.aboutus-page.manufacturing-unit.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'banner_image' => 'nullable|image',
        'title' => 'required|string|max:255',
        'content_image' => 'nullable|image',
        'description_content' => 'required|string',
    ]);

    $banner = $request->file('banner_image');
    $content = $request->file('content_image');

    $bannerName = $banner ? time().'_banner_'.$banner->getClientOriginalName() : null;
    $contentName = $content ? time().'_content_'.$content->getClientOriginalName() : null;

    if ($banner) $banner->move(public_path('uploads/manufacturing_unit'), $bannerName);
    if ($content) $content->move(public_path('uploads/manufacturing_unit'), $contentName);

    ManufacturingUnitDetail::create([
        'banner_image' => $bannerName,
        'title' => $request->title,
        'content_image' => $contentName,
        'description_content' => $request->description_content,
        'created_by' => auth()->id(),
    ]);

    return redirect()->route('manage-manufacturing-unit.index')->with('message', 'Manufacturing detail added successfully!');
}


    public function edit($id)
    {
        $record = ManufacturingUnitDetail::findOrFail($id);
        return view('backend.aboutus-page.manufacturing-unit.edit', compact('record'));
    }

    public function update(Request $request, $id)
{
    $record = ManufacturingUnitDetail::findOrFail($id);

    $request->validate([
        'banner_image' => 'nullable|image',
        'title' => 'required|string|max:255',
        'content_image' => 'nullable|image',
        'description_content' => 'required|string',
    ]);

    $bannerName = $record->banner_image;
    $contentName = $record->content_image;

    if ($request->hasFile('banner_image')) {
        $banner = $request->file('banner_image');
        $bannerName = time().'_banner_'.$banner->getClientOriginalName();
        $banner->move(public_path('uploads/manufacturing_unit'), $bannerName);
    }

    if ($request->hasFile('content_image')) {
        $content = $request->file('content_image');
        $contentName = time().'_content_'.$content->getClientOriginalName();
        $content->move(public_path('uploads/manufacturing_unit'), $contentName);
    }

    $record->update([
        'banner_image' => $bannerName,
        'title' => $request->title,
        'content_image' => $contentName,
        'description_content' => $request->description_content,
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('manage-manufacturing-unit.index')->with('message', 'Manufacturing detail updated successfully!');
}


    public function destroy($id)
{
    $record = ManufacturingUnitDetail::findOrFail($id);
    $record->deleted_by = auth()->id();
    $record->save();
    $record->delete();

    return redirect()->route('manage-manufacturing-unit.index')->with('message', 'Deleted successfully!');
}

}
