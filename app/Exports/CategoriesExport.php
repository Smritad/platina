<?php

namespace App\Exports;

use App\Models\MasterCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriesExport implements FromCollection
{
    public function collection()
    {
        return MasterCategory::all();
    }
}
