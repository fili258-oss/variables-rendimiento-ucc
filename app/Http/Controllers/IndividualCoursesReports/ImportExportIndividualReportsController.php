<?php

namespace App\Http\Controllers\IndividualCoursesReports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportIndividualStudents;

class ImportExportIndividualReportsController extends Controller
{
    public function import(Request $request) 
    {                 
        $import = new ImportIndividualStudents;                    
        Excel::import($import, request()->file('file'));
        $count = $import->getRowCount();        
        return redirect()->route('importReportsIndividual')->with('success', $count.' Datos importados exitosamente');
    }
}
