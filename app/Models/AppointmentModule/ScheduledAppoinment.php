<?php

namespace App\Models\AppointmentModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledAppoinment extends Model
{
    use HasFactory;

    protected $fillable = ['remission_id', 'student_id', 'psychologist_id', 'scheduled_date', 'scheduled_time', 'referal_document', 'status'];
}
