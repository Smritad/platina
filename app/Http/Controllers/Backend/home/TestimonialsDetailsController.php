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
use App\Models\TestimonialsDetail;


class TestimonialsDetailsController extends Controller
{

   public function index()
{
    $testimonials = TestimonialsDetail::latest()->get();
    return view('backend.home-page.testimonials-details.index', compact('testimonials'));
}

public function create()
{
    return view('backend.home-page.testimonials-details.create');
}






public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'heading' => 'required|string|max:255',
        'text.*' => 'nullable|string|max:255',
        'description.*' => 'nullable|string|max:1000',
        'designation.*' => 'nullable|string|max:255',
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $texts = $request->input('text', []);
    $descriptions = $request->input('description', []);
    $designations = $request->input('designation', []);
    $uploadedImages = [];

    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $img) {
            if ($img && $img->isValid()) {
                $filename = Str::random(40) . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('/platina/home/testimonials'), $filename);
                $uploadedImages[] = $filename;
            } else {
                $uploadedImages[] = '';
            }
        }
    }

    TestimonialsDetail::create([
    'title' => $request->input('title'),
    'heading' => $request->input('heading'),
    'text' => implode(',', $texts),              // Changed from '|' to ','
    'description' => implode(',', $descriptions),// Changed from '|' to ','
    'designations' => implode(',', $designations), // Changed from '|' to ','
    'image' => implode(',', $uploadedImages),    // Changed from '|' to ','
    'created_by' => Auth::id(),
    'created_at' => now(),
]);


    return redirect()->route('testimonials-details.index')
                     ->with('message', 'Testimonial details added successfully!');
}



public function edit($id)
{
    $premiumDetails = TestimonialsDetail::findOrFail($id);

    // Correct field names used for splitting
    $texts = explode(',', $premiumDetails->text);
    $designations = explode(',', $premiumDetails->designations);
    $descriptions = explode(',', $premiumDetails->description);
    $images = explode(',', $premiumDetails->image);

    $counterItems = [];
    $count = max(count($texts), count($designations), count($descriptions), count($images));

    for ($i = 0; $i < $count; $i++) {
        $counterItems[] = [
            'text' => $texts[$i] ?? '',
            'designations' => $designations[$i] ?? '',
            'description' => $descriptions[$i] ?? '',
            'image' => $images[$i] ?? '',
        ];
    }

    return view('backend.home-page.testimonials-details.edit', compact('premiumDetails', 'counterItems'));
}



public function update(Request $request, $id)
{
    $premium = TestimonialsDetail::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'heading' => 'required|string|max:255',
        'text.*' => 'nullable|string|max:255',
        'designations.*' => 'nullable|string|max:255',
        'description.*' => 'nullable|string|max:1000',
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $counterTexts = $request->input('text', []);
    $counterDesignations = $request->input('designations', []);
    $counterDescriptions = $request->input('description', []);
    $existingImages = $request->input('existing_images', []);
    $newImages = $request->file('image'); // Can be null

    $counterImages = [];

    foreach ($counterTexts as $index => $text) {
        if ($newImages && isset($newImages[$index]) && $newImages[$index]->isValid()) {
            $image = $newImages[$index];
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/platina/home/testimonials'), $filename);
            $counterImages[] = $filename;
        } else {
            $counterImages[] = $existingImages[$index] ?? '';
        }
    }

    // Store as comma-separated values
    $premium->title = $request->input('title');
    $premium->heading = $request->input('heading');
    $premium->text = implode(',', $counterTexts);
    $premium->description = implode(',', $counterDescriptions);
    $premium->designations = implode(',', $counterDesignations); // You need this field in DB
    $premium->image = implode(',', $counterImages);
    $premium->updated_by = Auth::id();
    $premium->updated_at = now();

    $premium->save();

    return redirect()->route('testimonials-details.index')->with('success', 'Testimonial details updated successfully!');
}

public function destroy($id)
{
    $record = TestimonialsDetail::findOrFail($id);

    $record->update([
        'deleted_by' => auth()->id(),
    ]);

    $record->delete(); // Must call this for soft delete

    return redirect()->route('testimonials-details.index')
        ->with('message', 'Premium  deleted successfully!');
}



    

}