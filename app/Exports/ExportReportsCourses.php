<?php

namespace App\Exports;

use App\Models\GeneralReportCourse;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportReportsCourses implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GeneralReportCourse::all();
    }
}
