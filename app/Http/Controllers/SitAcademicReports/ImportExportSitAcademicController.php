<?php

namespace App\Http\Controllers\SitAcademicReports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportSitAcademicStudents;

class ImportExportSitAcademicController extends Controller
{
    public function import(Request $request) 
    {                 
        $import = new ImportSitAcademicStudents;                    
        Excel::import($import, request()->file('file'));
        $count = $import->getRowCount();        
        return redirect()->route('importReportsIndividual')->with('success', $count.' Datos importados exitosamente');
    }
}