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

    public function render()
    {
        $reports = GeneralReportCourse::where('nameCourse', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);        
        return view('livewire.courses-reports.general-reports-component',['reports' => $reports]);
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
        $this->reportId = $report->reportId;
    }

    public function update()
    {

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
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Reporte eliminado correctamente.']);
        
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
