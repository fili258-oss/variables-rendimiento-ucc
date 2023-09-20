<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportReportsGenerals implements FromCollection, WithHeadings
{
    protected $dataToExport;

    public function __construct($dataToExport)
    {
        $this->dataToExport = $dataToExport;
    }

    public function collection()
    {
        return collect($this->dataToExport);
    }

    public function headings(): array
    {
        return [
            'Periodo Académico',
            'Nivel de Curso',
            'Nombre del Curso',
            'Total de Matriculados',
            'Total Aprobados',
            'Total No Aprobados',
            'Total Cancelaciones',
            'Total Repetidores',
        ];
    }
}