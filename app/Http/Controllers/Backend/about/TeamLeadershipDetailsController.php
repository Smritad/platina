<?php

namespace App\Http\Controllers\Backend\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeamLeadershipDetail;

class TeamLeadershipDetailsController extends Controller
{
    public function index()
    {
        $records = TeamLeadershipDetail::whereNull('deleted_at')->get();
        return view('backend.aboutus-page.team-leadership.index', compact('records'));
    }

    public function create()
    {
        return view('backend.aboutus-page.team-leadership.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'description_content']);
        $data['created_by'] = Auth::id();

        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = time() . '_banner_' . $banner->getClientOriginalName();
            $banner->move(public_path('uploads/platina_brand'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Prepare pipe-separated values
        $personNames = $request->person_name ? implode('|', $request->person_name) : '';
        $personDesignations = $request->person_designation ? implode('|', $request->person_designation) : '';
        $personDescriptions = $request->person_description ? implode('|', $request->person_description) : '';
        $socialIcons = $request->social_icons ? implode('|', $request->social_icons) : '';

        // Handle multiple person images
        $personImages = [];
        if ($request->hasFile('person_image')) {
            foreach ($request->file('person_image') as $img) {
                $imgName = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('uploads/platina_brand'), $imgName);
                $personImages[] = $imgName;
            }
        }
        $data['person_image'] = implode('|', $personImages);
        $data['person_name'] = $personNames;
        $data['person_designation'] = $personDesignations;
        $data['person_description'] = $personDescriptions;
        $data['social_icons'] = $socialIcons;

        TeamLeadershipDetail::create($data);

        return redirect()->route('manage-team-leadership.index')->with('message', 'Team Leadership details saved!');
    }

    public function edit($id)
    {
        $record = TeamLeadershipDetail::findOrFail($id);
        return view('backend.aboutus-page.team-leadership.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'description_content' => 'required|string',
            'banner_image' => 'nullable|image',
        ]);

        $record = TeamLeadershipDetail::findOrFail($id);
        $data = $request->only(['title', 'description', 'description_content']);
        $data['updated_by'] = auth()->id();

        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = time() . '_banner_' . $banner->getClientOriginalName();
            $banner->move(public_path('uploads/platina_brand'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Process team member data with |
        $data['person_name'] = implode('|', $request->person_name ?? []);
        $data['person_designation'] = implode('|', $request->person_designation ?? []);
        $data['person_description'] = implode('|', $request->person_description ?? []);
        $data['social_icons'] = implode('|', $request->social_icons ?? []);

        // Handle person images
        $personImages = $record->person_image ? explode('|', $record->person_image) : [];

        if ($request->hasFile('person_image')) {
            foreach ($request->file('person_image') as $key => $img) {
                if ($img) {
                    $imgName = time() . '_person_' . $key . '_' . $img->getClientOriginalName();
                    $img->move(public_path('uploads/platina_brand'), $imgName);
                    $personImages[$key] = $imgName;
                }
            }
        }

        $data['person_image'] = implode('|', $personImages);

        $record->update($data);

        return redirect()->route('manage-team-leadership.index')->with('message', 'Team detail updated successfully!');
    }

    public function destroy($id)
    {
        $record = TeamLeadershipDetail::findOrFail($id);
        $record->deleted_by = Auth::id();
        $record->save();
        $record->delete();

        return redirect()->route('manage-team-leadership.index')->with('message', 'Deleted successfully!');
    }
}
