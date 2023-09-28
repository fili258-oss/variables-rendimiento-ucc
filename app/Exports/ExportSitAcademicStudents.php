<?php

namespace App\Exports;

use App\Models\SitAcademicReportStudent;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportSitAcademicStudents implements FromQuery, WithHeadings
{
    use Exportable;

    public
        $selectedPeriod,
        $selectedProgram,
        $selectedAcademicLevel,
        $selectedSitAcademic;        

    public function __construct($selectedPeriod,$selectedProgram,$selectedAcademicLevel,$selectedSitAcademic)
    {
        $this->selectedPeriod = $selectedPeriod;
        $this->selectedProgram = $selectedProgram;
        $this->selectedAcademicLevel = $selectedAcademicLevel;
        $this->selectedSitAcademic = $selectedSitAcademic;        
    }

    public function headings(): array
    {
        return [
            '#',
            'Codigo Sede',
            'Ciclo',            
            'Grado académico',            
            'Código de programa',            
            'Programa académico',
            'ID estudiante',
            'Tipo documento',
            'Nro. documento',
            'Primer nombre',
            'Segundo nombre',
            'Primer apellido',
            'Segundo apellido',
            'Nivel académico',
            'Promedio semestre',
            'Promedio acumulado',
            'Situación académica'            
        ];
    }

    public function query()
    {
        return SitAcademicReportStudent::query()->where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['programAcademic', '=', $this->selectedProgram],
            ['levelCourse', '=', $this->selectedAcademicLevel],
            ['academicSituation', $this->selectedSitAcademic,],
        ]);
    }
}