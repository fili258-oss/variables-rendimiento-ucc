<?php

namespace App\Http\Controllers\CoursesReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralReportsController extends Controller
{
    

    public function reports()
    {        
        return view('general-reports.stats', [
            'periods' => $this->getAcademicsPeriods(),
            'facultys' => $this->getFaculty(),
            'courses' => $this->getCourses(),
            'levelsCourses' => $this->getLevelsAcademics()

        ]);
    }

    public function getAcademicsPeriods()
    {
        $periods = DB::table('general_report_courses')->select('academicPeriodId')->distinct()->get();
        return $periods;

    }

    public function getFaculty()
    {
        $facultys = DB::table('general_report_courses')->select('orgAcademic')->distinct()->get();
        return $facultys;
    }

    public function getCourses()
    {
        $courses = DB::table('general_report_courses')->select('nameCourse')->distinct()->get();
        return $courses;
    }

    public function getLevelsAcademics()
    {
        $levelsCourses = DB::table('general_report_courses')->select('levelCourse')->distinct()->get();
        return $levelsCourses;
    }

    public function import()
    {
        return view('general-reports.import');
    }
}
