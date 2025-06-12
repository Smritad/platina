<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BannerDetails;
use App\Models\AboutusDetail;
use App\Models\BrandEthosDetail;
use App\Models\MaterialsDetail;


class HomeController extends Controller
{

   public function home(Request $request)
{
    $banners = BannerDetails::orderBy('id', 'asc')->get();
    $about = AboutusDetail::latest()->first(); 
    $brandEthos = BrandEthosDetail::first(); 
    $materials = MaterialsDetail::first();
    return view('frontend.home', compact('banners', 'about', 'brandEthos', 'materials')); // ✅ Make sure it's passed

}



public function footer(Request $request)

{
    return view('components.frontend.footer');
}

}