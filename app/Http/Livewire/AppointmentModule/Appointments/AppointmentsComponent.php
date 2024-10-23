<?php

namespace App\Http\Livewire\AppointmentModule\Appointments;

use App\Models\AppointmentModule\ScheduledAppoinment;
use App\Models\AppointmentModule\Student;
use App\Models\AppointmentModule\TypeConsultation;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentsComponent extends Component
{
    public $search, $searchStudents;
    public 
        $students,
        $typeConsultationId,
        $scheduledDate,
        $scheduledTime,
        $referralDocument,
        $status;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $allAppointments = $this->getAppointments();
        $students = Student::where("active", 1)->get();
        $typeConsultations = TypeConsultation::where("active", 1)->get();
        return view('livewire.appointment-module.appointments.appointments-component', [
            "appoinments" => $allAppointments,
            "students" => $students,
            "typeConsultations" => $typeConsultations
        ])->extends('layouts.app')->section('content');
    }

    public function getAppointments()
    {
        $appoinments = ScheduledAppoinment::select('scheduled_appoinments.*', 'students.name as nameStudent', 'students.lastname as lastNameStudent', 'students.identification as idetificationStudent', 'type_consultations.name as typeConusltation')
        ->leftJoin('students', 'students.id','scheduled_appoinments.student_id')
        ->leftJoin('type_consultations', 'type_consultations.id','scheduled_appoinments.type_consultation_id')
        ->where('students.identification', 'like', '%' . $this->search . '%')->orderBy('scheduled_appoinments.id', 'desc')->paginate(15);
        return $appoinments;
    }

    public function updatedsearchStudents($Query)
    {
        $this->students = Student::select('students.*')        
        ->where('students.identification', 'like', '%' . $Query . '%')
        ->orWhere('students.name', 'like', '%' . $Query . '%')
        ->orWhere('students.lastname', 'like', '%' . $Query . '%')
        ->orderBy('students.name', 'asc')->get();
        
    }

    public function resetInputFields()
    {
        
    }
    public function cancel()
    {        
        $this->resetInputFields();        
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->emit('close-modal');
    }
}
