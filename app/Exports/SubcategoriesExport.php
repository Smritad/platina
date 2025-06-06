<?php

namespace App\Exports;

use App\Models\MasterSubCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoriesExport implements FromCollection
{
    public function collection()
    {
        return MasterSubCategory::all();
    }
}
