<?php

namespace App;

use App\Warga;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImportWargaRequest extends FromCollection
{
    public function collection()
    {   
        return Warga::all();
    }
}
