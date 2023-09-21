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
        
        return new SitAcademicReportStudent([
            'site'     => $row['codigo_sede'],
            'academicPeriod'    => $row['ciclo'],
            'gradeAcademic'    => $row['grado_academico'],
            'orgAcademic'    => $row['codigo_programa'],
            'programAcademic'    => $row['programa_academico'],
            'idStudent'    => $row['id_estudiante'],
            'typeDocument'    => $row['tipo_documento'],
            'numberDocument'    => $row['nro_documento'],
            'firstName'    => $row['primer_nombre'],
            'lastName'    => $row['segundo_nombre'],
            'firstSurname'    => $row['primer_apellido'],
            'lastSurname'    => $row['segundo_apellido'],
            'levelCourse'    => $row['nivel_academico'],
            'averageSemester'    => $row['promedio_semestre'],
            'averageAccumulated'    => $row['promedio_acumulado'],
            'academicSituation'    => $row['situacion_academica']            
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}