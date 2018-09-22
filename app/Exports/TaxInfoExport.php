<?php

namespace App\Exports;

use App\TaxInfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaxInfoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TaxInfo::where('property_class', 'R - Resetential')->get();
    }
}
