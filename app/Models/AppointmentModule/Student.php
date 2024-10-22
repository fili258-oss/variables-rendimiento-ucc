<?php

namespace App\Models\AppointmentModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['active', 'name', 'lastname', 'identificaion', 'email', 'student_code', 'phone', 'place_of_expedition', 'stratum', 'civil_status_id', 'date_of_birth', 'country_birth_id', 'town_birth_id', 'city_birth_id ', 'address', 'locality_comuna', 'study_day', 'gender_id', 'faculty_id', 'program_id', 'semester_id', 'type_document_id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocuments::class);
    }

    public function civilStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function countryBirth()
    {
        return $this->belongsTo(Country::class);
    }

    public function townBirth()
    {
        return $this->belongsTo(Town::class);
    }

    public function cityBirth()
    {
        return $this->belongsTo(City::class);
    }
}
