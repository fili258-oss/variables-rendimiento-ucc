<?php

namespace App\Imports;

use App\Models\SitAcademicReportStudent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSitAcademicStudents implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null    
    */
    
    private $rows = 0;
    
    public function model(array $row)
    {
        ++$this->rows;
        dd($row);
        
        return new SitAcademicReportStudent([
            'site'     => $row['codigo_sede'],
            'academicPeriod'    => $row['grado_academico'],
            'gradeAcademic'    => $row['programa_academico'],
            'orgAcademic'    => $row['plan_acad'],
            'programAcademic'    => $row['id_estudiante'],
            'idStudent'    => $row['tipo_documento'],
            'typeDocument'    => $row['nro_documento'],
            'numberDocument'    => $row['primer_apellido'],
            'firstName'    => $row['segundo_apellido'],
            'lastName'    => $row['primer_nombre'],
            'firstSurname'    => $row['segundo_nombre'],
            'lastSurname'    => $row['ciclo_lectivo'],
            'levelCourse'    => $row['id_curso'],
            'averageSemester'    => $row['nombre_curso'],
            'averageAccumulated'    => $row['nro_clase'],
            'academicSituation'    => $row['calificacion']            
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}