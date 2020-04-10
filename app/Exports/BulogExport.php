<?php

namespace App\Exports;

use App\Bulog;
use Maatwebsite\Excel\Concerns\FromCollection;

class BulogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bulog::all();
    }
}
