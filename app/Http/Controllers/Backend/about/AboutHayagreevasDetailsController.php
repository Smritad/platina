<?php

namespace App\Http\Controllers\Backend\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutHayagreevasDetail;

class AboutHayagreevasDetailsController extends Controller
{
    public function index()
    {
        $records = AboutHayagreevasDetail::latest()->get();
        return view('backend.aboutus-page.about-hayagreevas.index', compact('records'));
    }

    public function create()
    {
        return view('backend.aboutus-page.about-hayagreevas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_image' => 'nullable|image',
            'content_heading' => 'required|string|max:255',
            'description_content' => 'required|string',
        ]);

        $banner = $request->file('banner_image');
        $content = $request->file('content_image');

        $bannerName = $banner ? time().'_banner_'.$banner->getClientOriginalName() : null;
        $contentName = $content ? time().'_content_'.$content->getClientOriginalName() : null;

        if ($banner) $banner->move(public_path('uploads/about_hayagreevas'), $bannerName);
        if ($content) $content->move(public_path('uploads/about_hayagreevas'), $contentName);

        AboutHayagreevasDetail::create([
            'banner_image' => $bannerName,
            'title' => $request->title,
            'description' => $request->description,
            'content_image' => $contentName,
            'content_heading' => $request->content_heading,
            'description_content' => $request->description_content,
        ]);

        return redirect()->route('manage-about-hayagreevas.index')->with('message', 'About Us detail added successfully!');
    }

    public function edit($id)
    {
        $record = AboutHayagreevasDetail::findOrFail($id);
        return view('backend.aboutus-page.about-hayagreevas.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = AboutHayagreevasDetail::findOrFail($id);

        $request->validate([
            'banner_image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_image' => 'nullable|image',
            'content_heading' => 'required|string|max:255',
            'description_content' => 'required|string',
        ]);

        $bannerName = $record->banner_image;
        $contentName = $record->content_image;

        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = time().'_banner_'.$banner->getClientOriginalName();
            $banner->move(public_path('uploads/about_hayagreevas'), $bannerName);
        }

        if ($request->hasFile('content_image')) {
            $content = $request->file('content_image');
            $contentName = time().'_content_'.$content->getClientOriginalName();
            $content->move(public_path('uploads/about_hayagreevas'), $contentName);
        }

        $record->update([
            'banner_image' => $bannerName,
            'title' => $request->title,
            'description' => $request->description,
            'content_image' => $contentName,
            'content_heading' => $request->content_heading,
            'description_content' => $request->description_content,
        ]);

        return redirect()->route('manage-about-hayagreevas.index')->with('message', 'About Us detail updated successfully!');
    }

    public function destroy($id)
    {
        $record = AboutHayagreevasDetail::findOrFail($id);
        $record->delete();
        return redirect()->route('manage-about-hayagreevas.index')->with('message', 'Deleted successfully!');
    }
}
