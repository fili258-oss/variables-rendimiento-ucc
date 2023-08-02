<?php

namespace App\Http\Controllers\CoursesReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralReportsController extends Controller
{
    
    public $coursesAprobeds;
    public $coursesNotAprobeds;
    public $cancellations;
    public $repeaters;
    public $totales;

    public function reports()
    {        
        $this->totales = '';

        return view('general-reports.stats', [
            'periods' => $this->getAcademicsPeriods(),
            'facultys' => $this->getFaculty(),
            'courses' => $this->getCourses(),
            'levelsCourses' => $this->getLevelsAcademics(),
            'totales' => $this->totales              

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

    public function drawingChart(Request $request)
    {        
        
        $this->totales = DB::table('general_report_courses')
        ->where([
            ['academicPeriodId', '=', $request->period],
            ['orgAcademic', '=', $request->faculty],
            ['nameCourse', '=', $request->course],
            ['levelCourse', '=', $request->level]
            
        ])->selectRaw('SUM(repeaters) as repeaters')
          ->selectRaw('SUM(approved) as approveds')
          ->selectRaw('SUM(notApproved) as notApproveds')
          ->selectRaw('SUM(cancellations) as cancellations')
          ->first();
         
        return view('general-reports.stats', [
            'periods' => $this->getAcademicsPeriods(),
            'facultys' => $this->getFaculty(),
            'courses' => $this->getCourses(),
            'levelsCourses' => $this->getLevelsAcademics(),
            'totales' => $this->totales

        ]);
        
    }

    public function import()
    {
        return view('general-reports.import');
    }
}
