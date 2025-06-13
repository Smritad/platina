<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManufacturingUnitDetail;

class ManufacturingController extends Controller
{
    public function index(Request $request)
    {
        // Assuming you want the first active record
        $record = ManufacturingUnitDetail::whereNull('deleted_at')->first();

        return view('frontend.manufacturing-unit', compact('record'));
    }
}
