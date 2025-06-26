<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TeamLeadershipDetail;




class TeamController extends Controller
{
   public function index(Request $request)
{
    $about = TeamLeadershipDetail::first();
    return view('frontend.team', compact('about'));
}



}