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
use App\Models\BrandEthosDetail;


class BrandEthosDetailsDetailsController extends Controller
{

    public function index()
{
    $records = BrandEthosDetail::whereNull('deleted_at')->get();
    return view('backend.home-page.brandethos.index', compact('records'));
}

public function create()
{
    return view('backend.home-page.brandethos.create');
}




public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'heading' => 'required',
    ]);

    $data = $request->only(['title', 'heading']);
    $data['created_by'] = auth()->id();

    // Store counter text and descriptions
    $data['counter_text'] = implode(',', $request->counter_text ?? []);
    $data['counter_description'] = implode(',', $request->counter_description ?? []);

    // Store counter images
    $counterImages = [];

    if ($request->hasFile('counter_image')) {
        foreach ($request->file('counter_image') as $image) {
            if ($image && $image->isValid()) {
                $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/platina/home/brandethos'), $filename);
                $counterImages[] = $filename;
            } else {
                $counterImages[] = ''; // maintain array index
            }
        }
    }

    $data['counter_images'] = implode(',', $counterImages);

    BrandEthosDetail::create($data);

    return redirect()->route('brand-ethos-details.index')
                     ->with('message', 'Brand Ethos added successfully!');
}


public function edit($id)
{
    $brandEthosDetails = BrandEthosDetail::findOrFail($id);

    // Convert comma-separated values to arrays
    $texts = explode(',', $brandEthosDetails->counter_text);
    $descriptions = explode(',', $brandEthosDetails->counter_description);
    $images = explode(',', $brandEthosDetails->counter_images);

    $counterItems = [];
    foreach ($texts as $i => $text) {
        $counterItems[] = [
            'text' => $text ?? '',
            'description' => $descriptions[$i] ?? '',
            'image' => $images[$i] ?? '',
        ];
    }

    return view('backend.home-page.brandethos.edit', compact('brandEthosDetails', 'counterItems'));
}
public function update(Request $request, $id)
{
    $brandEthos = BrandEthosDetail::findOrFail($id);

    $texts = $request->counter_text ?? [];
    $descriptions = $request->counter_description ?? [];
    $existingImages = $request->existing_images ?? [];
    $newImages = $request->file('counter_image');

    $finalImages = [];

    foreach ($texts as $i => $text) {
        if (!empty($newImages[$i])) {
            $file = $newImages[$i];
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/platina/home/brandethos'), $filename);
            $finalImages[] = $filename;
        } else {
            $finalImages[] = $existingImages[$i] ?? '';
        }
    }

    $brandEthos->update([
        'title' => $request->title,
        'heading' => $request->heading,
        'counter_text' => implode(',', $texts),
        'counter_description' => implode(',', $descriptions),
        'counter_images' => implode(',', $finalImages),
        'updated_by' => auth()->user()->id,
    ]);

    return redirect()->route('brand-ethos-details.index')->with('success', 'Updated successfully!');
}

public function destroy($id)
{
    $record = BrandEthosDetail::findOrFail($id);

    $record->update([
        'deleted_by' => auth()->id(),
    ]);

    $record->delete(); // Must call this for soft delete

    return redirect()->route('brand-ethos-details.index')
        ->with('message', 'Brand Ethos deleted successfully!');
}



    

}