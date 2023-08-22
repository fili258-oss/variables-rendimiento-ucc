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
        
        
        
        $this->periods = IndividualReportCourse::select('academicPeriod')->distinct()->get();
        if ($this->selectedStatus == 0) {
            $this->ranges = '>=';
        }else{
            $this->ranges = '<';
        }
        $reports  = IndividualReportCourse::where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['gradeAcademic', '=', $this->selectedFaculty],
            ['nameCourse', '=', $this->selectedCourse],
            ['qualification', $this->ranges, 3.0],
        ])->paginate(15);

        return view('livewire.individual-courses-reports.individual-students-component',[            
            'reports' => $reports,
            'periods' => $this->periods,  
            'countReportsAproveds' => $this->getPercentageAproveds($reports),                      
            'countReportsReproveds' => $this->getPercentageReproveds($reports)                   

        ])->extends('layouts.app')->section('content');
    }

    public function getPercentageAproveds($reports)
    {   
        $percentageApproved = 0;
        $reportsTotal = $this->getReportsGeneral();
        if (!is_null($this->selectedStatus) && $this->selectedStatus == 0) {
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
        if (!is_null($this->selectedStatus) && $this->selectedStatus == 1) {
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

    public function updatedselectedPeriod($academicPeriodKey)
    {                
        if(!is_null($academicPeriodKey)){
            $this->facultys = IndividualReportCourse::select('gradeAcademic')->where('academicPeriod', $academicPeriodKey)->distinct()->get();
        }                    
    }

    public function updatedselectedFaculty($gradeAcadmicKey)
    {              
        $this->courses = IndividualReportCourse::select('nameCourse')->where('gradeAcademic', $gradeAcadmicKey)->distinct()->get();                          
        /* if(!is_null($gradeAcadmicKey)){
            
        } */
    }    

    public function clearQuery()
    {
        $this->selectedPeriod = '';
        $this->ranges = '';
    }

    public function exportRows()
    {
        return (new UsersExportStudents($this->selectedPeriod,$this->selectedFaculty,$this->selectedCourse,$this->selectedStatus,$this->ranges))->download('invoices.xlsx');
    }
}
