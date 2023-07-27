<?php

namespace App\Http\Livewire\CoursesReports;

use App\Models\GeneralReportCourse;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class GeneralReportsComponent extends Component
{
    public $search;
    public $updateMode = false;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $institution,
        $gradeAcademic,
        $site,
        $orgAcademic,
        $idCourse,
        $nameCourse,
        $levelCourse,
        $classNumber,
        $academicPeriodId,
        $enrolleds,
        $enrolledWithoutCancellations,
        $approved,
        $notApproved,
        $quantityAllotments,
        $approvedAllotments,
        $cancellations,
        $repeaters,
        $teacherId,
        $teacherName,
        $teacherNumberId,
        $hiring,
        $rating,
        $reportId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reports = GeneralReportCourse::where('nameCourse', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);        
        return view('livewire.courses-reports.general-reports-component',['reports' => $reports])
            ->extends('layouts.app')
            ->section('content');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $report = GeneralReportCourse::find($id);
        $this->institution = $report->institution;
        $this->gradeAcademic = $report->gradeAcademic;
        $this->site = $report->site;
        $this->orgAcademic = $report->orgAcademic;
        $this->idCourse = $report->idCourse;
        $this->nameCourse = $report->nameCourse;
        $this->levelCourse = $report->levelCourse;
        $this->classNumber = $report->classNumber;
        $this->academicPeriodId = $report->academicPeriodId;
        $this->enrolleds = $report->enrolleds;
        $this->enrolledWithoutCancellations = $report->enrolledWithoutCancellations;
        $this->approved = $report->approved;
        $this->notApproved = $report->notApproved;
        $this->quantityAllotments = $report->quantityAllotments;
        $this->approvedAllotments = $report->approvedAllotments;
        $this->cancellations = $report->cancellations;
        $this->repeaters = $report->repeaters;
        $this->teacherId = $report->teacherId;
        $this->teacherName = $report->teacherName;
        $this->teacherNumberId = $report->teacherNumberId;
        $this->hiring = $report->hiring;
        $this->rating = $report->rating;
        $this->reportId = $id;
    }

    public function update()
    {
        $this->validate([
            'institution' => 'required|max:30',
            'gradeAcademic' => 'required|max:30',
            'site' => 'required|max:30',
            'orgAcademic' => 'required|max:30',
            'idCourse' => 'required|max:30',
            'nameCourse' => 'required|max:30',
            'levelCourse' => 'required|max:30',
            'classNumber' => 'required|max:30',
            'academicPeriodId' => 'required|max:30',
            'enrolleds' => 'required|numeric',
            'enrolledWithoutCancellations' => 'required|numeric',
            'approved' => 'required|numeric',
            'notApproved' => 'required|numeric',
            'quantityAllotments' => 'required|numeric',
            'approvedAllotments' => 'required|numeric',
            'cancellations' => 'required|numeric',
            'repeaters' => 'required|numeric',
            'teacherId' => 'required|max:30',
            'teacherName' => 'required|max:60',
            'teacherNumberId' => 'required|max:60',
            'hiring' => 'required|max:30',
            'rating' => 'required|max:30',            

        ], [], [
            'institution' => 'institución',
            'gradeAcademic' => 'programa académico',
            'site' => 'sede',
            'orgAcademic' => 'organización académica',
            'idCourse' => 'id de curso',
            'nameCourse' => 'nombre de curso',
            'levelCourse' => 'nivel de curso',
            'classNumber' => 'número de calse',
            'academicPeriodId' => 'período académico',
            'enrolleds' => 'matriculados',
            'enrolledWithoutCancellations' => 'matriculados sin cancelaciones',
            'approved' => 'aprovados',
            'notApproved' => 'no aprovados',
            'quantityAllotments' => 'cantidad habilitaciones',
            'approvedAllotments' => 'habilitaciones aprobadas',
            'cancellations' => 'cancelaciones',
            'repeaters' => 'repitentes',
            'teacherId' => 'id profesor',
            'teacherName' => 'nombre profesor',
            'teacherNumberId' => 'identificación',
            'hiring' => 'contratación',
            'rating' => 'calificación'            
        ]);

        $report = GeneralReportCourse::find($this->reportId);        

        $report->institution = $this->institution;
        $report->gradeAcademic = $this->gradeAcademic;
        $report->site = $this->site;
        $report->orgAcademic = $this->orgAcademic;
        $report->idCourse = $this->idCourse;
        $report->nameCourse = $this->nameCourse;
        $report->academicPeriodId = $this->academicPeriodId;
        $report->classNumber = $this->classNumber;
        $report->enrolleds = $this->enrolleds;
        $report->enrolledWithoutCancellations = $this->enrolledWithoutCancellations;
        $report->approved = $this->approved;
        $report->notApproved = $this->notApproved;
        $report->quantityAllotments = $this->quantityAllotments;
        $report->approvedAllotments = $this->approvedAllotments;
        $report->cancellations = $this->cancellations;
        $report->repeaters = $this->repeaters;
        $report->teacherId = $this->teacherId;
        $report->teacherName = $this->teacherName;
        $report->teacherNumberId = $this->teacherNumberId;
        $report->hiring = $this->hiring;
        $report->rating = $this->rating;

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
        $report = GeneralReportCourse::find($this->reportId);
        $report->delete();     
        $this->emit('close-modal');   
        $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Reporte eliminado correctamente.']);
        
    }

    public function resetInputFields()
    {
        $this->institution = '';
        $this->gradeAcademic = '';
        $this->site = '';
        $this->orgAcademic = '';
        $this->idCourse = '';
        $this->nameCourse = '';
        $this->levelCourse = '';
        $this->classNumber = '';
        $this->academicPeriodId = '';
        $this->enrolleds = '';
        $this->enrolledWithoutCancellations = '';
        $this->approved = '';
        $this->notApproved = '';
        $this->quantityAllotments = '';
        $this->approvedAllotments = '';
        $this->cancellations = '';
        $this->repeaters = '';
        $this->teacherId = '';
        $this->teacherName = '';
        $this->teacherNumberId = '';
        $this->hiring = '';
        $this->rating = '';
        $this->reportId = '';

    }

    public function cancel(){

        $this->updateMode = false;
        $this->resetInputFields();        
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->emit('close-modal');
    }
}
