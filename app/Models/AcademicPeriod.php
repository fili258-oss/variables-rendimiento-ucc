<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    //Relación uno a muchos con reportes
    public function reports(){
        return $this->hasMany(GeneralReportCourse::class);
    }
}
