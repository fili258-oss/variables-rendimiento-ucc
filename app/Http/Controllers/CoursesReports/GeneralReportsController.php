<?php

namespace App\Http\Controllers\CoursesReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralReportsController extends Controller
{
    public function index()
    {
        return view('general-reports.index');
    }
}