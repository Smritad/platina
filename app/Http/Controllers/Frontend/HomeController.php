<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BannerDetails;
use App\Models\AboutusDetail;
use App\Models\BrandEthosDetail;
use App\Models\MaterialsDetail;
use App\Models\PremiumDetail;
use App\Models\TestimonialsDetail;
use App\Models\BlogsDetail;


class HomeController extends Controller
{

   public function home(Request $request)
{
    $banners = BannerDetails::orderBy('id', 'asc')->get();
    $about = AboutusDetail::latest()->first(); 
    $brandEthos = BrandEthosDetail::first(); 
    $materials = MaterialsDetail::first();
    $premium = PremiumDetail::first(); 
    $testimonials = TestimonialsDetail::first(); 
    $blogsdetails = BlogsDetail::first(); 

    return view('frontend.home', compact('banners', 'about', 'brandEthos', 'materials', 'premium', 'testimonials', 'blogsdetails'));
}



public function footer(Request $request)

{
    return view('components.frontend.footer');
}

}