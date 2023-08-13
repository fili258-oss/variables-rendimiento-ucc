<?php

namespace App\Imports;

use App\Models\IndividualReportCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportIndividualStudents implements ToModel, WithHeadingRow
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
        return new IndividualReportCourse([
            'site'     => $row['codigo_sede'],
            'orgAcademic'    => $row['grado_academico'],
            'gradeAcademic'    => $row['programa_academico'],
            'planAcademic'    => $row['plan_acad'],
            'idStudent'    => $row['id_estudiante'],
            'typeDocument'    => $row['tipo_documento'],
            'numberDocument'    => $row['nro_documento'],
            'firstSurname'    => $row['primer_apellido'],
            'lastSurname'    => $row['segundo_apellido'],
            'firstName'    => $row['primer_nombre'],
            'lastName'    => $row['segundo_nombre'],
            'academicPeriod'    => $row['ciclo_lectivo'],
            'idCourse'    => $row['id_curso'],
            'nameCourse'    => $row['nombre_curso'],
            'classNumber'    => $row['nro_clase'],
            'qualification'    => $row['calificacion'],
            'numberCredits'    => $row['nro_creditos'],
            'typeQualification'    => $row['tipo_calificacion'],
            'averageSemester'    => $row['promedio_semestre']           
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
