<?php

namespace App\Http\Livewire\SitAcademicReports;

use App\Imports\ImportSitAcademicStudents;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Helpers\FileTypeDetector;
use App\Models\SitAcademicReportStudent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class SitAcademicStudentsComponent extends Component
{
    
    public $search;
    use WithFileUploads;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public 
        $site,
        $academicPeriod,
        $gradeAcademic,  
        $orgAcademic,
        $programAcademic,
        $idStudent,
        $typeDocument,
        $numberDocument,
        $firstName,
        $lastName,
        $firstSurname,       
        $lastSurname,        
        $levelCourse,
        $averageSemester,
        $averageAccumulated,
        $academicSituation,
        $file,      
        $reportId;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $reports = SitAcademicReportStudent::where('firstName', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        return view('livewire.sit-academic-reports.sit-academic-students-component',[
            'reports' => $reports
        ])->extends('layouts.app')->section('content');
    }

    public function import(Request $request) 
    {                 
                
        $import = new ImportSitAcademicStudents;
                            
        Excel::import($import, request()->file($this->file));
        $count = $import->getRowCount();        
        return redirect()->route('importReportsIndividual')->with('success', $count.' Datos importados exitosamente');
    }
    public function edit($id)
    {        
        $report = SitAcademicReportStudent::find($id);
        $this->site = $report->site;
        $this->academicPeriod = $report->academicPeriod;
        $this->gradeAcademic = $report->gradeAcademic;
        $this->orgAcademic = $report->orgAcademic;
        $this->programAcademic = $report->programAcademic;
        $this->idStudent = $report->idStudent;
        $this->typeDocument = $report->typeDocument;
        $this->numberDocument = $report->numberDocument;
        $this->firstName = $report->firstName;
        $this->lastName = $report->lastName;
        $this->firstSurname = $report->firstSurname;
        $this->lastSurname = $report->lastSurname;        
        $this->levelCourse = $report->levelCourse;        
        $this->averageSemester = $report->averageSemester;
        $this->averageAccumulated = $report->averageAccumulated;
        $this->academicSituation = $report->academicSituation;
        $this->reportId = $id;
    }

    public function update()
    {
        $this->validate([
            'site' => 'required|max:30',
            'academicPeriod' => 'required|max:30',
            'gradeAcademic' => 'required|max:30',
            'orgAcademic' => 'required|max:30',
            'programAcademic' => 'required|max:30',
            'idStudent' => 'required|max:30',
            'typeDocument' => 'required|max:30',
            'numberDocument' => 'required|max:30',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'firstSurname' => 'required|max:30',
            'lastSurname' => 'required|max:30',
            'levelCourse' => 'required|max:30',
            'averageSemester' => 'required|numeric',
            'averageAccumulated' => 'required|numeric',
            'academicSituation' => 'required|max:30'                        

        ], [], [
            'site' => 'sede',
            'academicPeriod' => 'período acádemico',
            'gradeAcademic' => 'grado académico',
            'orgAcademic' => 'código programa',
            'programAcademic' => 'programa acádemico',
            'idStudent' => 'ID estudiante',
            'typeDocument' => 'tipo de documento',
            'numberDocument' => 'numero documento',
            'firstName' => 'primer nombre',
            'lastName' => 'segundo nombre',
            'firstSurname' => 'required|max:30',
            'lastSurname' => 'required|max:30',
            'levelCourse' => 'nivel curso',
            'averageSemester' => 'promedio semestre',
            'averageAccumulated' => 'promedio acumulado',
            'academicSituation' => 'situación acádemica',                       
        ]);

        $report = SitAcademicReportStudent::find($this->reportId);        

        $report->site = $this->site ;
        $report->academicPeriod = $this->academicPeriod;
        $report->gradeAcademic = $this->gradeAcademic;            
        $report->orgAcademic = $this->orgAcademic;
        $report->programAcademic = $this->programAcademic;
        $report->idStudent = $this->idStudent;
        $report->typeDocument = $this->typeDocument;
        $report->numberDocument = $this->numberDocument;        
        $report->firstName = $this->firstName;
        $report->lastName = $this->lastName;
        $report->firstSurname = $this->firstSurname;
        $report->lastSurname = $this->lastSurname;
        $report->levelCourse = $this->levelCourse;
        $report->averageSemester = $this->averageSemester;        
        $report->averageAccumulated = $this->averageAccumulated;        
        $report->academicSituation = $this->academicSituation;                    
        $report->update();
        $this->emit('close-modal');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Reporte actualizado exitosamente']);
        $this->resetInputFields();
        
    }

    public function delete($id)
    {
        $this->reportId = $id;
        
    }

    public function destroy()
    {
        $report = SitAcademicReportStudent::find($this->reportId);
        $report->delete();     
        $this->emit('close-modal');   
        $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Reporte eliminado correctamente.']);
        
    }

    public function resetInputFields()
    {
        $this->site = '';
        $this->academicPeriod = '';
        $this->gradeAcademic = '';
        $this->orgAcademic = '';
        $this->programAcademic = '';
        $this->idStudent = '';
        $this->typeDocument = '';
        $this->numberDocument = '';
        $this->firstName = '';
        $this->lastName = '';
        $this->firstSurname = '';
        $this->lastSurname = '';
        $this->levelCourse = '';
        $this->averageSemester = '';
        $this->averageAccumulated = '';
        $this->academicSituation = '';
        $this->reportId = '';

    }

    public function cancel()
    {        
        $this->resetInputFields();        
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->emit('close-modal');
    }
}