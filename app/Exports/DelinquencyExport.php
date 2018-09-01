<?php

namespace App\Exports;

use App\Delinquency;
use Maatwebsite\Excel\Concerns\FromCollection;

class DelinquencyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Delinquency::where('property_class', 1)->get();
    }
}
