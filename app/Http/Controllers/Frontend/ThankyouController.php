<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThankyouController extends Controller
{
   public function index()
{
    

    return view('frontend.thankyou');
}


}