<?php

namespace App\Http\Livewire\AppointmentModule\Students;

use App\Models\AppointmentModule\City;
use App\Models\AppointmentModule\Country;
use App\Models\AppointmentModule\Faculty;
use App\Models\AppointmentModule\Gender;
use App\Models\AppointmentModule\MaritalStatus;
use App\Models\AppointmentModule\Program;
use App\Models\AppointmentModule\Semester;
use App\Models\AppointmentModule\Student;
use App\Models\AppointmentModule\Town;
use App\Models\AppointmentModule\TypeDocuments;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsComponent extends Component
{
    public $search;

    public
        $genderId,
        $name,
        $lastname,
        $typeDocumentId,
        $identification,
        $selectedFaculty = null,
        $selectedCountryBirth = null,
        $selectedTownBirth = null,
        $selectedCityBirth = null,
        $programs = null,        
        $towns = [],
        $cities = [],
        $programId,
        $studentCode,
        $phone,
        $address,
        $localityComuna,
        $studyDay,
        $placeOfExpedition,
        $stratum,
        $civilStatusId,
        $dateOfBirth,        
        $email,
        $semesterId,        
        $steep = 0,
        $studentId;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';         
        

    public function updatingSearch()
    {
        $this->resetPage();
    } 

    public function render()
    {        
        $allStudents = $this->getStudents();
        $faculties = Faculty::where("active",1)->get();        
        $genders = Gender::where("active",1)->get();
        $semesters = Semester::where("active",1)->get();
        $typesDocuments = TypeDocuments::where("active",1)->get();
        $countries = Country::where("active",1)->get();
 
        $maritalStatuses = MaritalStatus::where("active",1)->get();
        

        return view('livewire.appointment-module.students.students-component',[
            "students" => $allStudents,
            "faculties" => $faculties,
            "semesters" => $semesters,
            "genders" => $genders,
            "typesDocuments" => $typesDocuments,
            "countries" => $countries,
            "maritalStatuses" => $maritalStatuses

        ])->extends('layouts.app')->section('content');
    }

    public function getStudents()
    {
        $students = Student::select('students.*','programs.name as programName')
        ->leftJoin('programs', 'programs.id','students.program_id')
        ->where('identification', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        return $students;
    }

    public function store()
    {
        try {
            // Intentamos validar los datos
            $this->validate([
                'genderId' => 'required',
                'name' => 'required|max:60',
                'lastname' => 'required|max:60',
                'typeDocumentId' => 'required',
                'identification' => 'required|numeric',
                'selectedFaculty' => 'required',
                'programId' => 'required',
                'studentCode' => 'required|numeric',
                'phone' => 'required|max:10',
                'email' => 'required|unique:students|email',
                'semesterId' => 'required',
            ], [], [
                'genderId' => 'género',
                'name' => 'nombre',
                'lastname' => 'apellidos',
                'typeDocumentId' => 'tipo documento',
                'identification' => 'identificación',
                'selectedFaculty' => 'facultad',
                'programId' => 'programa',
                'studentCode' => 'id estudiante',
                'phone' => 'celular',
                'email' => 'correo',
                'semesterId' => 'semestre'
            ]);

            // Si la validación es exitosa, continuamos con la creación del estudiante
            $student = new Student();
            $student->active = 1;            
            $student->name = $this->name;
            $student->lastname = $this->lastname;
            $student->identification = $this->identification;
            $student->email = $this->email;            
            $student->student_code = $this->studentCode;
            $student->phone = $this->phone;
            $student->place_of_expedition = $this->placeOfExpedition;            
            $student->stratum = $this->stratum;
            $student->civil_status_id = $this->civilStatusId;
            $student->date_of_birth = $this->dateOfBirth;
            $student->country_birth_id = $this->selectedCountryBirth;
            $student->town_birth_id = $this->selectedTownBirth;
            $student->city_birth_id = $this->selectedCityBirth;
            $student->address = $this->address;
            $student->locality_comuna = $this->localityComuna;
            $student->study_day = $this->studyDay;
            $student->gender_id = $this->genderId;
            $student->faculty_id = $this->selectedFaculty;            
            $student->program_id = $this->programId;
            $student->semester_id = $this->semesterId;
            $student->type_document_id = $this->typeDocumentId;
            $student->save();

            // Emitimos un evento y mostramos un mensaje de éxito
            $this->emit('close-modal');
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Estudiante creado exitosamente']);
            $this->resetInputFields();

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Si ocurre una excepción de validación, redirigimos al paso 0
            $this->steep = 0;

            // Puedes opcionalmente volver a lanzar la excepción si deseas manejar los errores de la validación normalmente
            throw $e;
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $this->studentId = $student->id;

        if($student != "")
        {
            $this->name = $student->name;
            $this->lastname = $student->lastname;
            $this->identification = $student->identification;
            $this->email = $student->email;
            $this->studentCode = $student->student_code;
            $this->phone = $student->phone;
            $this->placeOfExpedition = $student->place_of_expedition;
            $this->stratum = $student->stratum;
            $this->civilStatusId = $student->civil_status_id;
            $this->dateOfBirth = $student->date_of_birth;
            $this->selectedCountryBirth = $student->countryBirth->id;
            $this->setTownsEdit($student->countryBirth->id);            
            $this->selectedTownBirth = $student->townBirth->id;
            $this->setCityEdit($student->townBirth->id);
            $this->selectedCityBirth = $student->cityBirth->id;
            $this->address = $student->address;
            $this->localityComuna = $student->locality_comuna;
            $this->studyDay = $student->study_day;
            $this->genderId = $student->gender_id;
            $this->selectedFaculty = $student->faculty->id;
            $this->setProgramsEdit($student->program->id);
            $this->programId = $student->program->id;            
            $this->semesterId = $student->semester_id;
            $this->typeDocumentId = $student->type_document_id;            
            
        }
        
       
    }

    public function update()
    {
        
        try {
            // Intentamos validar los datos
            $student = Student::find($this->studentId);
            $this->validate([
                'genderId' => 'required',
                'name' => 'required|max:60',
                'lastname' => 'required|max:60',
                'typeDocumentId' => 'required',
                'identification' => 'required|numeric',
                'selectedFaculty' => 'required',
                'programId' => 'required',
                'studentCode' => 'required|numeric',
                'phone' => 'required|max:10',
                'email' => $student->email === $this->email ? 'required|email' : 'required|unique:students|email',
                'semesterId' => 'required',
            ], [], [
                'genderId' => 'género',
                'name' => 'nombre',
                'lastname' => 'apellidos',
                'typeDocumentId' => 'tipo documento',
                'identification' => 'identificación',
                'selectedFaculty' => 'facultad',
                'programId' => 'programa',
                'studentCode' => 'id estudiante',
                'phone' => 'celular',
                'email' => 'correo',
                'semesterId' => 'semestre'
            ]);
            
            $student->active = 1;            
            $student->name = $this->name;
            $student->lastname = $this->lastname;
            $student->identification = $this->identification;
            $student->email = $this->email;            
            $student->student_code = $this->studentCode;
            $student->phone = $this->phone;
            $student->place_of_expedition = $this->placeOfExpedition;            
            $student->stratum = $this->stratum;
            $student->civil_status_id = $this->civilStatusId;
            $student->date_of_birth = $this->dateOfBirth;
            $student->country_birth_id = $this->selectedCountryBirth;
            $student->town_birth_id = $this->selectedTownBirth;
            $student->city_birth_id = $this->selectedCityBirth;
            $student->address = $this->address;
            $student->locality_comuna = $this->localityComuna;
            $student->study_day = $this->studyDay;
            $student->gender_id = $this->genderId;
            $student->faculty_id = $this->selectedFaculty;            
            $student->program_id = $this->programId;
            $student->semester_id = $this->semesterId;
            $student->type_document_id = $this->typeDocumentId;
            $student->uptdate();

            // Emitimos un evento y mostramos un mensaje de éxito
            $this->emit('close-modal');
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Estudiante creado exitosamente']);
            $this->resetInputFields();

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Si ocurre una excepción de validación, redirigimos al paso 0
            $this->steep = 0;

            // Puedes opcionalmente volver a lanzar la excepción si deseas manejar los errores de la validación normalmente
            throw $e;
        }
    }
    

    public function updatedselectedFaculty($facultyKey)
    {
        $this->programs = Program::where("faculty_id", $facultyKey)
        ->where("active", 1)
        ->get();
    }


    public function resetInputFields()
    {


    }

    public function setProgramsEdit($idFaculty)
    {
        $this->programs = Program::where("faculty_id",$idFaculty)
        ->where("active",1)->get();
    }

    public function setTownsEdit($idCountry)
    {
        $this->towns = Town::where("country_id",$idCountry)
        ->where("active",1)->get();
    }

    public function setCityEdit($idTown)
    {
        $this->cities = City::where("town_id",$idTown)
        ->where("active",1)->get();
    }

    public function nextSteep()
    {
        $this->steep++;
    }

    public function returnSteep()
    {
        $this->steep--;
    }

    public function cancel()
    {        
        $this->resetInputFields();        
        $this->resetErrorBag();
        $this->resetValidation();        
        $this->emit('close-modal');
    }

}
