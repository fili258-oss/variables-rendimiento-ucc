<?php

namespace App\Http\Livewire\CoursesReports;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FilterChartReportsComponent extends Component
{
    public $periods = null, $selectedPeriod = null;
    public $facultys = null, $selectedFaculty = null;
    public $courses = null, $selectedCourse = null;
    public $levelsCourses = null, $selectedLevelCourse = null;

    
    public function render()
    {
        $this->periods = DB::table('general_report_courses')->select('academicPeriodId')->distinct()->pluck('academicPeriodId');
        return view('livewire.courses-reports.filter-chart-reports-component');
    }

    public function updatedselectedPeriod($academicPeriodKey)
    {                
        if(!is_null($academicPeriodKey)){            
            $this->facultys = DB::table('general_report_courses')->select('orgAcademic')->where('academicPeriodId', '=', $academicPeriodKey)->distinct()->pluck('orgAcademic');
        }
        
        if(empty($academicPeriodKey)){
            $this->facultys = null;
            $this->courses = null;
            $this->levelsCourses = null;
            $this->selectedFaculty = null;
            $this->selectedCourse = null;
            $this->selectedLevelCourse = null;            
        }
    }

    public function updatedselectedFaculty($orgAcademicKey)
    {       
        if (!is_null($orgAcademicKey)) {
            $this->levelsCourses = DB::table('general_report_courses')->select('levelCourse')->where('orgAcademic', '=', $orgAcademicKey)->distinct()->pluck('levelCourse');                          
        }    
        
        if(empty($orgAcademicKey)){
            $this->facultys = null;            
            $this->courses = null;   
            $this->selectedCourse = null;         
            $this->selectedLevelCourse = null;            
        }        
        
    }    

    public function updatedselectedLevelCourse($levelCourseKey)
    {               
        if (!is_null($levelCourseKey)) {
            $this->courses = DB::table('general_report_courses')->select('nameCourse')->where([
                ['academicPeriodId', '=', $this->selectedPeriod],
                ['orgAcademic', '=', $this->selectedFaculty],
                ['levelCourse', '=', $levelCourseKey],
            ])->distinct()->pluck('nameCourse');                          
        }    
        
        if(empty($levelCourseKey)){
            $this->facultys = null;            
            $this->courses = null;   
            $this->selectedCourse = null;
            $this->selectedFaculty = null;            
            
        }
        
    } 
}