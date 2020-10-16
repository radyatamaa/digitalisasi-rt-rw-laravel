<?php

namespace App\Http\Requests;

use App\Warga;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImportWargaRequest implements FromCollection
{
    public function collection()
    {   
        return Warga::all();
    }
}
