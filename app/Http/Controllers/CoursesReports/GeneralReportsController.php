<?php

namespace App\Http\Controllers\CoursesReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralReportsController extends Controller
{
    

    public function reports()
    {        
        return view('general-reports.stats');
    }

    public function import()
    {
        return view('general-reports.import');
    }
}
