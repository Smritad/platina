<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PlatinaBrandDetail;




class PlatinaBrndController extends Controller
{
   public function index(Request $request)
{
    $about = PlatinaBrandDetail::first();

    // Convert pipe-separated values into arrays
    $extraImages = $about->extra_image ? explode('|', $about->extra_image) : [];
    $contentHeadingDescriptions = $about->content_heading_descriptions ? explode('|', $about->content_heading_descriptions) : [];

    return view('frontend.platina-brand', compact('about', 'extraImages', 'contentHeadingDescriptions'));
}


}