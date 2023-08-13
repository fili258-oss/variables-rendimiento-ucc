<?php

namespace App\Imports;

use App\Models\GeneralReportCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportReportsCourses implements ToModel, WithHeadingRow
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
        return new GeneralReportCourse([
            'institution'     => $row['institucion'],
            'gradeAcademic'    => $row['grado_academico'],
            'site'    => $row['sede'],
            'orgAcademic'    => $row['organizacion_academica'],
            'idCourse'    => $row['idcurso'],
            'nameCourse'    => $row['nombre_curso'],
            'levelCourse'    => $row['nivel_curso'],
            'classNumber'    => $row['no_clase'],
            'academicPeriodId'    => $row['ciclo'],
            'enrolleds'    => $row['matriculados'],
            'enrolledWithoutCancellations'    => $row['matriculados_sin_cancelaciones'],
            'approved'    => $row['aprobados'],
            'notApproved'    => $row['no_aprobados'],
            'quantityAllotments'    => $row['cantidad_habilitaciones'],
            'approvedAllotments'    => $row['habilitaciones_aprobadas'],
            'cancellations'    => $row['cancelaciones'],
            'repeaters'    => $row['repitentes'],
            'teacherId'    => $row['id_profesor'],
            'teacherName'    => $row['nombre_profesor'],
            'teacherNumberId'    => $row['identificacion'],            
            'hiring'    => $row['contratacion'],
            'rating'    => $row['calificacion']
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}


