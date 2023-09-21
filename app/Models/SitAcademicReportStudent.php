<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitAcademicReportStudent extends Model
{
    use HasFactory;

    protected $fillable = ['site','academicPeriod','gradeAcademic','orgAcademic','programAcademic','idStudent','typeDocument','numberDocument','firstName','lastName','firstSurname','lastSurname','levelCourse','averageSemester','averageAccumulated','academicSituation'];
}