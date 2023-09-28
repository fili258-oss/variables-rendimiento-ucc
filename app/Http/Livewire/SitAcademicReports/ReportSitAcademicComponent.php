<?php

namespace App\Http\Livewire\SitAcademicReports;

use App\Exports\ExportSitAcademicStudents;
use App\Models\SitAcademicReportStudent;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ReportSitAcademicComponent extends Component
{
    public $totales;
    public $selectedPeriod = null, $selectedProgram = null, $selectedAcademicLevel = null, $selectedSitAcademic = null;
    public $periods, $programs, $academicLevels, $sitAcademics;
    public $academicPeriodKey;
    public $programKey;
    public $percentageReportsAproveds, $percentageReportsReproveds; 

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $this->periods = DB::table('sit_academic_report_students')->select('academicPeriod')->distinct()->pluck('academicPeriod');
                        
        return view('livewire.sit-academic-reports.report-sit-academic-component',[
            'reports' => $this->getReports()
            
        ])
        
        ->extends('layouts.app')->section('content');
    }

    public function getReports(){
        $reports  = SitAcademicReportStudent::where([
            ['academicPeriod', '=', $this->selectedPeriod],
            ['programAcademic', '=', $this->selectedProgram],
            ['levelCourse', '=', $this->selectedAcademicLevel],
            ['academicSituation', $this->selectedSitAcademic],
        ])->paginate(15);
        
        return $reports;
    }
    
    public function updatedselectedPeriod($academicPeriodKey)
    {                
        if(!is_null($academicPeriodKey)){                        
            $this->programs = DB::table('sit_academic_report_students')->select('programAcademic')->where('academicPeriod', '=', $academicPeriodKey)->distinct()->pluck('programAcademic');
        }
        
        if(empty($academicPeriodKey)){            
            $this->programs = null;            
            $this->selectedPeriod = null;
            $this->selectedProgram = null;
            
        }
    }

    public function updatedselectedProgram($programKey)
    {       
        if (!is_null($programKey)) {            
            $this->academicLevels = DB::table('sit_academic_report_students')->select('levelCourse')
            ->where([
                ['academicPeriod', '=', $this->selectedPeriod],
                ['programAcademic', '=', $programKey],
            ])->distinct()->pluck('levelCourse');                          
        }                   
        
    }

    public function updatedselectedAcademicLevel($levelAcademicKey)
    {       
        if (!is_null($levelAcademicKey)) {            
            $this->sitAcademics = DB::table('sit_academic_report_students')->select('academicSituation')
            ->where([
                ['academicPeriod', '=', $this->selectedPeriod],
                ['programAcademic', '=', $this->selectedProgram],
                ['levelCourse', '=', $this->selectedAcademicLevel],
            ])->distinct()->pluck('academicSituation');                          
        }                   
        
    }

    public function exportRows()
    {
        $exportFileName = 'report_sit_academic_students' . date('Y-m-d_H-i-s') . '.xlsx';
        return (new ExportSitAcademicStudents($this->selectedPeriod,$this->selectedProgram,$this->selectedAcademicLevel,$this->selectedSitAcademic))->download($exportFileName);
    }
}