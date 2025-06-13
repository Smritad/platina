<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AboutHayagreevasDetail;




class AbouthayagreevasController extends Controller
{
   public function index(Request $request)
{
    $about = AboutHayagreevasDetail::first();
    return view('frontend.about-hayagreevas', compact('about'));
}


}