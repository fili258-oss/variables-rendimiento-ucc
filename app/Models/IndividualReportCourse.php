<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualReportCourse extends Model
{
    use HasFactory;

    protected $fillable = ['site', 'orgAcademic','gradeAcademic','planAcademic','idStudent','typeDocument','numberDocument','firstSurname','lastSurname','firstName','lastName','academicPeriod','idCourse','nameCourse','classNumber','qualification','numberCredits','typeQualification','averageSemester'];
}
