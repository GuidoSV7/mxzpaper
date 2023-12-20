<?php

namespace App\Exports;

use App\Models\Bitacora;
use Maatwebsite\Excel\Concerns\FromCollection;

class BitacorasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bitacora::all();
    }
}
