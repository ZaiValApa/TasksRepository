<?php

namespace App\Exports;

use App\Models\Tarea;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaskExport implements Fromcollection, WithHeadings
{
    protected $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function collection()
    {
        return $this->tasks;
    }

    public function headings(): array
    {
        return [
            'Tarea',
            'Descripción',
            'Urgencia',
            'Autor',
            'Email Autor'
        ];
    }
}
