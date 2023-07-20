<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralReportCourse extends Model
{
    use HasFactory;

    protected $fillable = ['institution', 'gradeAcademic','site','orgAcademic','idCourse','nameCourse','levelCourse','classNumber','academicPeriodId','enrolleds','enrolledWithoutCancellations','approved','notApproved','quantityAllotments','approvedAllotments','cancellations','repeaters','teacherId','teacherName','teacherNumberId','hiring','rating','academicPeriodId'];

    //Relación de uno a muchos inversa
    public function period(){
        return $this->belongsTo(AcademicPeriod::class);
    }
}
