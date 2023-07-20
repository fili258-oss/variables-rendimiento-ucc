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
        Schema::create('general_report_courses', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('gradeAcademic');
            $table->string('site');
            $table->string('orgAcademic');
            $table->string('idCourse');
            $table->string('nameCourse');
            $table->string('levelCourse');
            $table->string('classNumber');
            $table->unsignedBigInteger('academicPeriodId');
            $table->bigInteger('enrolleds');
            $table->bigInteger('enrolledWithoutCancellations');
            $table->bigInteger('approved');
            $table->bigInteger('notApproved');
            $table->integer('quantityAllotments');
            $table->integer('approvedAllotments');
            $table->integer('cancellations');
            $table->integer('repeaters');
            $table->string('teacherId');
            $table->string('teacherName');
            $table->string('teacherNumberId');
            $table->string('hiring');
            $table->integer('rating');
            $table->foreign('academicPeriodId')->references('id')->on('academic_periods')->onDelete('cascade');            
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
        Schema::dropIfExists('general_report_courses');
    }
};
