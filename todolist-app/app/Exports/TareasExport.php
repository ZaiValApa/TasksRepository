<?php

namespace App\Exports;

use App\Models\Tarea;
use Maatwebsite\Excel\Concerns\FromCollection;

class TareasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tarea::all();
    }
}
