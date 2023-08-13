<?php

namespace App\Http\Livewire\IndividualCoursesReports;

use App\Models\IndividualReportCourse;
use Livewire\Component;
use Livewire\WithPagination;

class IndividualCoursesComponent extends Component
{
    public $search;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public 
        $site,
        $orgAcademic,
        $gradeAcademic,  
        $planAcademic,
        $idStudent,
        $typeDocument,
        $numberDocument,
        $firstSurname,
        $lastSurname,
        $firstName,
        $lastName,
        $academicPeriod,
        $idCourse,
        $nameCourse,
        $classNumber,
        $qualification,
        $numberCredits,
        $typeQualification,
        $averageSemester,        
        $reportId;

    public function updatingSearch()
    {
        $this->resetPage();
    }        
    public function render()
    {
        $reports = IndividualReportCourse::where('nameCourse', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        return view('livewire.individual-courses-reports.individual-courses-component',['reports' => $reports])->extends('layouts.app')->section('content');
    }

    public function edit($id)
    {        
        $report = IndividualReportCourse::find($id);
        $this->site = $report->site;
        $this->orgAcademic = $report->orgAcademic;
        $this->gradeAcademic = $report->gradeAcademic;
        $this->planAcademic = $report->planAcademic;
        $this->idStudent = $report->idStudent;
        $this->typeDocument = $report->typeDocument;
        $this->numberDocument = $report->numberDocument;
        $this->firstSurname = $report->firstSurname;
        $this->lastSurname = $report->lastSurname;
        $this->firstName = $report->firstName;
        $this->lastName = $report->lastName;
        $this->academicPeriod = $report->academicPeriod;
        $this->idCourse = $report->idCourse;
        $this->nameCourse = $report->nameCourse;
        $this->classNumber = $report->classNumber;
        $this->qualification = $report->qualification;
        $this->numberCredits = $report->numberCredits;
        $this->typeQualification = $report->typeQualification;
        $this->averageSemester = $report->averageSemester;
        $this->reportId = $id;
    }

    public function update()
    {
        $this->validate([
            'site' => 'required|max:30',
            'orgAcademic' => 'required|max:30',
            'gradeAcademic' => 'required|max:30',
            'planAcademic' => 'required|max:30',
            'idStudent' => 'required|max:30',
            'typeDocument' => 'required|max:30',
            'numberDocument' => 'required|max:30',
            'firstSurname' => 'required|max:30',
            'lastSurname' => 'required|max:30',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'academicPeriod' => 'required|numeric',
            'idCourse' => 'required|numeric',
            'nameCourse' => 'required|max:30',
            'classNumber' => 'required|max:30',
            'qualification' => 'required|numeric',
            'numberCredits' => 'required|numeric',
            'typeQualification' => 'required|max:30',
            'averageSemester' => 'required|max:60'                        

        ], [], [
            'site' => 'sede',
            'orgAcademic' => 'organización académica',
            'gradeAcademic' => 'programa académico',
            'planAcademic' => 'plan académico',
            'idStudent' => 'id de estudiante',
            'typeDocument' => 'tipo documento',
            'numberDocument' => 'número de documento',
            'firstSurname' => 'primer apellido',
            'lastSurname' => 'segundo apellido',
            'firstName' => 'primer nombre',
            'lastName' => 'segundo nombre',
            'academicPeriod' => 'período académico',
            'idCourse' => 'ID curso',
            'nameCourse' => 'nombre curso',
            'classNumber' => 'N.o clase',
            'qualification' => 'calificación',
            'numberCredits' => 'N.o créditos',
            'typeQualification' => 'tipo calificación',
            'averageSemester' => 'promedio semestre'                       
        ]);

        $report = IndividualReportCourse::find($this->reportId);        

        $report->site = $this->site ;
        $report->orgAcademic = $this->orgAcademic;
        $report->gradeAcademic = $this->gradeAcademic;
        $report->planAcademic = $this->planAcademic;
        $report->idStudent = $this->idStudent;
        $report->typeDocument = $this->typeDocument;
        $report->numberDocument = $this->numberDocument;
        $report->firstSurname = $this->firstSurname;
        $report->lastSurname = $this->lastSurname;
        $report->firstName = $this->firstName;
        $report->lastName = $this->lastName;
        $report->academicPeriod = $this->academicPeriod;
        $report->idCourse = $this->idCourse;
        $report->nameCourse = $this->nameCourse;
        $report->classNumber = $this->classNumber;
        $report->qualification = $this->qualification;
        $report->numberCredits = $this->numberCredits;
        $report->typeQualification = $this->typeQualification;
        $report->averageSemester = $this->averageSemester;        

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
        $report = IndividualReportCourse::find($this->reportId);
        $report->delete();     
        $this->emit('close-modal');   
        $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Reporte eliminado correctamente.']);
        
    }

    public function resetInputFields()
    {
        $this->site = '';
        $this->orgAcademic = '';
        $this->gradeAcademic = '';
        $this->planAcademic = '';
        $this->idStudent = '';
        $this->typeDocument = '';
        $this->numberDocument = '';
        $this->firstSurname = '';
        $this->lastSurname = '';
        $this->firstName = '';
        $this->lastName = '';
        $this->academicPeriod = '';
        $this->idCourse = '';
        $this->nameCourse = '';
        $this->classNumber = '';
        $this->qualification = '';
        $this->numberCredits = '';
        $this->typeQualification = '';
        $this->averageSemester = '';
        $this->reportId = '';

    }

    public function cancel(){        
        $this->resetInputFields();        
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->emit('close-modal');
    }
}
