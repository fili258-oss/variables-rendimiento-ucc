<?php

namespace App\Http\Livewire\CoursesReports;

use App\Models\GeneralReportCourse;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GeneralReportsComponent extends Component
{
    public $search;

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

        $this->resetInputFields();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('close-modal');
    }
}
