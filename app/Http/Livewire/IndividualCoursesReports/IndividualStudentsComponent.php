<?php

namespace App\Http\Livewire\IndividualCoursesReports;

use App\Exports\UsersExportStudents;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\IndividualReportCourse;
use Livewire\WithPagination;

class IndividualStudentsComponent extends Component
{
    public $totales;
    public $selectedPeriod = null, $selectedFaculty = null, $selectedCourse = null, $selectedStatus = null;
    public $periods, $facultys, $courses, $ranges;
    public $academicPeriodKey;
    public $gradeAcadmicKey;
    public $percentageReportsAproveds, $percentageReportsReproveds;    

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        
        $this->periods = DB::table('individual_report_courses')->select('academicPeriod')->distinct()->pluck('academicPeriod');
        if ($this->selectedStatus == 0) {
            $this->ranges = '>=';
        }else{
            $this->ranges = '<';
        }
                
        $reportsWithoutPagination = $this->getReportsGeneralNoPagination();

        return view('livewire.individual-courses-reports.individual-students-component',[            
            'reports' => $this->getReports(),
            'periods' => $this->periods,  
            'countReportsAproveds' => $this->getPercentageAproveds($reportsWithoutPagination),                      
            'countReportsReproveds' => $this->getPercentageReproveds($reportsWithoutPagination)                   

        ])->extends('layouts.app')->section('content');
    }
    
    public function getReports()
    {
        $reports  = IndividualReportCourse::where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['gradeAcademic', '=', $this->selectedFaculty],
            ['nameCourse', '=', $this->selectedCourse],
            ['qualification', $this->ranges, 3.0],
        ])->paginate(15);
        
        return $reports;
    }

    public function getPercentageAproveds($reports)
    {   
        $percentageApproved = 0;
        $reportsTotal = $this->getReportsGeneral();
        if (!is_null($this->selectedStatus) && !is_null($this->selectedPeriod) && !is_null($this->selectedFaculty) && !is_null($this->selectedCourse) && $this->selectedStatus == 0) {
            $countReportsGenerals = count($reportsTotal);
            $countReportsAproveds = count($reports);
            $aprovedsDivided = $countReportsAproveds/$countReportsGenerals;
            $percentageApproved = $aprovedsDivided*100;
            return $percentageApproved;
        }else {
            return 0;
        }

    }
     
    public function getPercentageReproveds($reports)
    {
        $percentageReproved = 0;
        $reportsTotal = $this->getReportsGeneral();
        if (!is_null($this->selectedStatus) && !is_null($this->selectedPeriod) && !is_null($this->selectedFaculty) && !is_null($this->selectedCourse) && $this->selectedStatus == 1) {
            $countReportsGenerals = count($reportsTotal);
            $countReportsReproveds = count($reports);
            $reprovedsDivided = $countReportsReproveds/$countReportsGenerals;
            $percentageReproved = $reprovedsDivided*100;
            return $percentageReproved;
        }else{
            return 0;
        }
    }

    public function getReportsGeneral()
    {
        $reportsTotal  = IndividualReportCourse::where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['gradeAcademic', '=', $this->selectedFaculty],
            ['nameCourse', '=', $this->selectedCourse]])->get();
        return $reportsTotal;
    }

    public function getReportsGeneralNoPagination()
    {
        $reportsTotal  = IndividualReportCourse::where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['gradeAcademic', '=', $this->selectedFaculty],
            ['nameCourse', '=', $this->selectedCourse],
            ['qualification', $this->ranges, 3.0],])->get();
        return $reportsTotal;
    }

    public function updatedselectedPeriod($academicPeriodKey)
    {                
        if(!is_null($academicPeriodKey)){            
            $this->facultys = DB::table('individual_report_courses')->select('gradeAcademic')->where('academicPeriod', '=', $academicPeriodKey)->distinct()->pluck('gradeAcademic');
        }
        
        if(empty($academicPeriodKey)){
            $this->facultys = null;
            $this->courses = null;
            $this->selectedFaculty = null;
            $this->selectedCourse = null;
            
        }
    }

    public function updatedselectedFaculty($gradeAcadmicKey)
    {       
        if (!is_null($gradeAcadmicKey)) {
            $this->courses = DB::table('individual_report_courses')->select('nameCourse')->where('gradeAcademic', $gradeAcadmicKey)->distinct()->pluck('nameCourse');                          
        }                   
        
    }    

    public function clearQuery()
    {
        $this->selectedPeriod = '';
        $this->ranges = '';
    }

    public function exportRows()
    {
        $exportFileName = 'report_individual_students' . date('Y-m-d_H-i-s') . '.xlsx';
        return (new UsersExportStudents($this->selectedPeriod,$this->selectedFaculty,$this->selectedCourse,$this->selectedStatus,$this->ranges))->download($exportFileName);
    }
}