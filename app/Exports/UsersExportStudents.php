<?php

namespace App\Exports;

use App\Models\IndividualReportCourse;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExportStudents implements FromQuery, WithHeadings
{
    use Exportable;

    public
        $selectedPeriod,
        $selectedFaculty,
        $selectedCourse,
        $selectedStatus,
        $ranges;

    public function __construct($selectedPeriod,$selectedFaculty,$selectedCourse,$selectedStatus,$ranges)
    {
        $this->selectedPeriod = $selectedPeriod;
        $this->selectedFaculty = $selectedFaculty;
        $this->selectedCourse = $selectedCourse;
        $this->selectedStatus = $selectedStatus;
        $this->ranges = $ranges;
    }

    public function headings(): array
    {
        return [
            '#',
            'Codigo Sede',
            'Grado Académico',            
            'Programa Académico',            
            'Plan Académico',            
            'ID Estudiante',
            'Tipo Documento',
            'Nro Documento',
            'Primer Apellido',
            'Segundo Apellido',
            'Primer Nombre',
            'Segundo Nombre',
            'Ciclo Lectivo',
            'ID Curso',
            'Nombre Curso',
            'Nro Clase',
            'Calificación',
            'Nro. Créditos',
            'Tipo Calificación',
            'Promedio Semestre'
        ];
    }

    public function query()
    {
        return IndividualReportCourse::query()->where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['gradeAcademic', '=', $this->selectedFaculty],
            ['nameCourse', '=', $this->selectedCourse],
            ['qualification', $this->ranges, 3.0],
        ]);
    }
}
