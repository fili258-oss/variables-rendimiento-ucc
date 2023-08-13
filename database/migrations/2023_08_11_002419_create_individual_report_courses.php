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
        Schema::create('individual_report_courses', function (Blueprint $table) {
            $table->id();
            $table->string('site')->nullable();
            $table->string('orgAcademic')->nullable();
            $table->string('gradeAcademic')->nullable();
            $table->string('planAcademic')->nullable();
            $table->string('idStudent')->nullable();
            $table->string('typeDocument')->nullable();
            $table->string('numberDocument')->nullable();
            $table->string('firstSurname')->nullable();
            $table->string('lastSurname')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('academicPeriod')->nullable();            
            $table->string('idCourse')->nullable();
            $table->string('nameCourse')->nullable();
            $table->string('classNumber')->nullable();            
            $table->float('qualification')->nullable();  
            $table->integer('numberCredits')->nullable();  
            $table->string('typeQualification')->nullable();
            $table->float('averageSemester')->nullable();  
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
        Schema::dropIfExists('individual_report_courses');
    }
};
