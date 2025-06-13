<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\PremiumDetail;

class PremiumDetailsController extends Controller
{
    public function index()
    {
        $premiumDetails = PremiumDetail::latest()->get();
        return view('backend.home-page.Premium-details.index', compact('premiumDetails'));
    }

    public function create()
    {
        return view('backend.home-page.Premium-details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'counter_text.*' => 'nullable|string|max:255',
            'counter_description.*' => 'nullable|string|max:1000',
            'counter_image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $counterTexts = $request->input('counter_text', []);
        $counterDescriptions = $request->input('counter_description', []);
        $counterImages = [];

        if ($request->hasFile('counter_image')) {
            foreach ($request->file('counter_image') as $image) {
                if ($image && $image->isValid()) {
                    $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/platina/home/Premium'), $filename);
                    $counterImages[] = $filename;
                } else {
                    $counterImages[] = '';
                }
            }
        }

        PremiumDetail::create([
            'title' => $request->input('title'),
            'heading' => $request->input('heading'),
            'counter_text' => implode('|', $counterTexts),
            'counter_description' => implode('|', $counterDescriptions),
            'counter_image' => implode('|', $counterImages),
            'created_by' => Auth::id(),
            'created_at' => now(),
        ]);

        return redirect()->route('Premium-details.index')->with('message', 'Premium details added successfully!');
    }

    public function edit($id)
    {
        $premiumDetails = PremiumDetail::findOrFail($id);

        $counterTexts = explode('|', $premiumDetails->counter_text);
        $counterDescriptions = explode('|', $premiumDetails->counter_description);
        $counterImages = explode('|', $premiumDetails->counter_image);

        $counterItems = [];
        for ($i = 0; $i < count($counterTexts); $i++) {
            $counterItems[] = [
                'text' => $counterTexts[$i] ?? '',
                'description' => $counterDescriptions[$i] ?? '',
                'image' => $counterImages[$i] ?? '',
            ];
        }

        return view('backend.home-page.Premium-details.edit', compact('premiumDetails', 'counterItems'));
    }

    public function update(Request $request, $id)
    {
        $premium = PremiumDetail::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'counter_text.*' => 'nullable|string|max:255',
            'counter_description.*' => 'nullable|string|max:1000',
            'counter_image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $counterTexts = $request->input('counter_text', []);
        $counterDescriptions = $request->input('counter_description', []);
        $existingImages = $request->input('existing_images', []);
        $newImages = $request->file('counter_image');

        $counterImages = [];

        foreach ($counterTexts as $index => $text) {
            if ($newImages && isset($newImages[$index]) && $newImages[$index]->isValid()) {
                $image = $newImages[$index];
                $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/platina/home/Premium'), $filename);
                $counterImages[] = $filename;
            } else {
                $counterImages[] = $existingImages[$index] ?? '';
            }
        }

        $premium->title = $request->input('title');
        $premium->heading = $request->input('heading');
        $premium->counter_text = implode('|', $counterTexts);
        $premium->counter_description = implode('|', $counterDescriptions);
        $premium->counter_image = implode('|', $counterImages);
        $premium->updated_by = Auth::id();
        $premium->updated_at = now();

        $premium->save();

        return redirect()->route('Premium-details.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $record = PremiumDetail::findOrFail($id);

        $record->update([
            'deleted_by' => auth()->id(),
        ]);

        $record->delete();

        return redirect()->route('Premium-details.index')->with('message', 'Premium deleted successfully!');
    }
}
