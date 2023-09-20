<?php

namespace App\Http\Livewire\CoursesReports;

use App\Exports\ExportReportsGenerals;
use App\Models\GeneralReportCourse;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class GlobalReportsComponent extends Component
{
    public $academicYears;    
    public $selectedPeriod = null;
    public $selectedFaculty = null;
    public $facultys = null;    
    public $structuredReports = [];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->academicYears = DB::table('general_report_courses')->select('academicPeriodId')->distinct()->get();
        
        $reports  = GeneralReportCourse::select(
            'academicPeriodId',
            'levelCourse',
            'nameCourse',
            DB::raw('SUM(enrolleds) as totalEnrolleds'),
            DB::raw('SUM(approved) as totalApproved'),
            DB::raw('SUM(notApproved) as totalNotApproved'),
            DB::raw('SUM(cancellations) as totalCancellations'),
            DB::raw('SUM(repeaters) as totalRepeaters')
        )->where([
            ['academicPeriodId', '=', $this->selectedPeriod],
            ['orgAcademic', '=', $this->selectedFaculty],            
        ])->groupBy('academicPeriodId','levelCourse', 'nameCourse')->get();
        
        

        foreach ($reports as $report) {
            $academicPeriodId = $report->academicPeriodId;
            $levelCourse = $report->levelCourse;
            $nameCourse = $report->nameCourse;

            if (!isset($this->structuredReports[$academicPeriodId])) {
                $this->structuredReports[$academicPeriodId] = [];
            }

            if (!isset($this->structuredReports[$academicPeriodId][$levelCourse])) {
                $this->structuredReports[$academicPeriodId][$levelCourse] = [];
            }

            $this->structuredReports[$academicPeriodId][$levelCourse][] = [
            'nameCourse' => $nameCourse,
            'totalEnrolleds' => $report->totalEnrolleds,
            'totalApproved' => $report->totalApproved,
            'totalNotApproved' => $report->totalNotApproved,
            'totalCancellations' => $report->totalCancellations,
            'totalRepeaters' => $report->totalRepeaters,
        ];}
        
        return view('livewire.courses-reports.global-reports-component', [
            'reports' => $reports,
            'periods' => $this->academicYears,
            
        ])->extends('layouts.app')->section('content');
        
    }

    public function updatedselectedPeriod($academicPeriodKey)
    {
        if (!is_null($academicPeriodKey)) {
            $this->facultys = DB::table('general_report_courses')->select('orgAcademic')->where('academicPeriodId', '=', $academicPeriodKey)->distinct()->pluck('orgAcademic');
        }
        
    }

    public function exportToExcel()
    {
        $exportFileName = 'report_global_courses' . date('Y-m-d_H-i-s') . '.xlsx';
        
        // Itera sobre los datos para estructurarlos como se espera en la exportación
        $dataToExport = [];
        if ($this->structuredReports != null) {
            foreach ($this->structuredReports as $academicPeriodId => $semesters) {
                foreach ($semesters as $levelCourse => $courses) {
                    foreach ($courses as $course) {
                        $dataToExport[] = [
                            'academicPeriodId' => $academicPeriodId,
                            'levelCourse' => $levelCourse,
                            'nameCourse' => $course['nameCourse'],
                            'totalEnrolleds' => $course['totalEnrolleds'],
                            'totalApproved' => $course['totalApproved'],
                            'totalNotApproved' => $course['totalNotApproved'],
                            'totalCancellations' => $course['totalCancellations'],
                            'totalRepeaters' => $course['totalRepeaters'],
                        ];
                    }
                }
            }            
        }
        
        $this->structuredReports = null;
        return Excel::download(new ExportReportsGenerals($dataToExport), $exportFileName);
        
    }

    
}