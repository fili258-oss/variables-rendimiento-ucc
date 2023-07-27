<?php

namespace App\Http\Controllers\CoursesReports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReportsCourses;
use App\Imports\ImportReportsCourses;

class ImportExportReportGeneralController extends Controller
{
         
    public function index()
    {
        $reports = DB::table('general_report_courses')->orderBy('id', 'desc')->paginate(15);
        return view('general-reports.import-export.import', ['reports' => $reports]);
    }

    public function export() 
    {
        return Excel::download(new ExportReportsCourses, 'exportreportscourses.xlsx');
    }

    public function import(Request $request) 
    {         
        $import = new ImportReportsCourses;                    
        Excel::import($import, request()->file('file'));
        $count = $import->getRowCount();        
        return redirect()->route('importReportsGeneral')->with('success', $count.' Datos importados exitosamente');
    }
}
