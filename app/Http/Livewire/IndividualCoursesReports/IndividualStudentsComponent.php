<?php

namespace App\Http\Livewire\IndividualCoursesReports;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\IndividualReportCourse;
use Livewire\WithPagination;

class IndividualStudentsComponent extends Component
{
    public $totales;
    public $selectedPeriod = null, $selectedFaculty = null, $selectedCourse = null;
    public $periods, $facultys, $courses;
    public $academicPeriodKey;
    public $gradeAcadmicKey;    

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->periods = IndividualReportCourse::select('academicPeriod')->distinct()->get();
    }

    public function render()
    {
        
        
        $reports  = IndividualReportCourse::paginate(15);
        return view('livewire.individual-courses-reports.individual-students-component',[            
            'reports' => $reports,
            'periods' => $this->periods            

        ])->extends('layouts.app')->section('content');
    }
       
    public function updatedselectedPeriod($academicPeriodKey)
    {
        $this->academicPeriodKey = $academicPeriodKey;
        if(!is_null($academicPeriodKey)){
            $this->facultys = IndividualReportCourse::select('gradeAcademic')->where('academicPeriod', $academicPeriodKey)->distinct()->get();
        }                    
    }

    public function updatedselectedFaculty($gradeAcadmicKey)
    {    
        $this->gradeAcadmicKey = $gradeAcadmicKey;
        if(!is_null($gradeAcadmicKey)){
            $this->courses = IndividualReportCourse::select('nameCourse')->where('gradeAcademic', $gradeAcadmicKey)->distinct()->get();            
        }
    }    
}
