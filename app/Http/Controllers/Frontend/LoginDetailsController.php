<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\RegisterDetails;




class LoginDetailsController extends Controller
{
   public function index()
{
   
    return view('frontend.login');
}


}