<?php

namespace App\Models\AppointmentModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}