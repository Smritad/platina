<?php

namespace App\Http\Controllers\Backend\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PlatinaBrandDetail;

class PlatinaBrandDetailsController extends Controller
{
    public function index()
    {
        $records = PlatinaBrandDetail::latest()->get();
        return view('backend.aboutus-page.platina-brand.index', compact('records'));
    }

    public function create()
    {
        return view('backend.aboutus-page.platina-brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_heading' => 'required|string|max:255',
            'content_heading_descriptions' => 'required|array',
            'content_heading_descriptions.*' => 'required|string|max:1000',
            'extra_image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'content_heading', 'content_description']);
        $data['content_heading_descriptions'] = implode('|', $request->content_heading_descriptions);

        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = time() . '_banner_' . $banner->getClientOriginalName();
            $banner->move(public_path('uploads/platina_brand'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Handle content image
        if ($request->hasFile('content_image')) {
            $content = $request->file('content_image');
            $contentName = time() . '_content_' . $content->getClientOriginalName();
            $content->move(public_path('uploads/platina_brand'), $contentName);
            $data['content_image'] = $contentName;
        }

        // Handle extra images
        if ($request->hasFile('extra_image')) {
            $extraImages = [];
            foreach ($request->file('extra_image') as $index => $image) {
                $imageName = time() . "_extra_{$index}_" . $image->getClientOriginalName();
                $image->move(public_path('uploads/platina_brand'), $imageName);
                $extraImages[] = $imageName;
            }
            $data['extra_image'] = implode('|', $extraImages);
        }

        $data['created_by'] = Auth::id();

        PlatinaBrandDetail::create($data);

        return redirect()->route('manage-platina-brand.index')->with('message', 'Platina Brand detail added successfully!');
    }

    public function edit($id)
    {
        $record = PlatinaBrandDetail::findOrFail($id);
        return view('backend.aboutus-page.platina-brand.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = PlatinaBrandDetail::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_heading' => 'required|string|max:255',
            'content_heading_descriptions' => 'required|array',
            'content_heading_descriptions.*' => 'required|string|max:1000',
            'content_description' => 'required|string',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'content_heading', 'content_description']);
        $data['content_heading_descriptions'] = implode('|', $request->content_heading_descriptions);

        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = time() . '_banner_' . $banner->getClientOriginalName();
            $banner->move(public_path('uploads/platina_brand'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Handle content image
        if ($request->hasFile('content_image')) {
            $content = $request->file('content_image');
            $contentName = time() . '_content_' . $content->getClientOriginalName();
            $content->move(public_path('uploads/platina_brand'), $contentName);
            $data['content_image'] = $contentName;
        }

        // Handle extra images
        $existingImages = $request->input('existing_extra_images', []);
        $newImages = [];

        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                $imageName = time() . "_extra_{$index}_" . $image->getClientOriginalName();
                $image->move(public_path('uploads/platina_brand'), $imageName);
                $newImages[] = $imageName;
            }
        }

        $allImages = array_merge($existingImages, $newImages);
        $data['extra_image'] = implode('|', $allImages);

        $data['updated_by'] = Auth::id();

        $record->update($data);

        return redirect()->route('manage-platina-brand.index')->with('message', 'Platina Brand detail updated successfully!');
    }

    public function destroy($id)
    {
        $record = PlatinaBrandDetail::findOrFail($id);
        $record->deleted_by = Auth::id();
        $record->save();
        $record->delete();

        return redirect()->route('manage-platina-brand.index')->with('message', 'Deleted successfully!');
    }
}
