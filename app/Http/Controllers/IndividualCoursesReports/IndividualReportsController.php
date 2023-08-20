<?php

namespace App\Http\Controllers\IndividualCoursesReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndividualReportsController extends Controller
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
}
