<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sit_academic_report_students', function (Blueprint $table) {
            $table->id();
            $table->string('site')->nullable();
            $table->string('academicPeriod')->nullable();
            $table->string('gradeAcademic')->nullable();
            $table->string('orgAcademic')->nullable();
            $table->string('programAcademic')->nullable();
            $table->string('idStudent')->nullable();
            $table->string('typeDocument')->nullable();
            $table->string('numberDocument')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('firstSurname')->nullable();
            $table->string('lastSurname')->nullable();
            $table->string('levelCourse')->nullable();
            $table->float('averageSemester')->nullable();
            $table->float('averageAccumulated')->nullable();            
            $table->string('academicSituation')->nullable();                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sit_academic_report_students');
    }
};