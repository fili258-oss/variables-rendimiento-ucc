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
            $table->string('institution')->nullable();
            $table->string('gradeAcademic')->nullable();
            $table->string('site')->nullable();
            $table->string('orgAcademic')->nullable();
            $table->string('idCourse')->nullable();
            $table->string('nameCourse')->nullable();
            $table->string('levelCourse')->nullable();
            $table->string('classNumber')->nullable();
            $table->string('academicPeriodId')->nullable();
            $table->bigInteger('enrolleds')->nullable();
            $table->bigInteger('enrolledWithoutCancellations')->nullable();
            $table->bigInteger('approved')->nullable();
            $table->bigInteger('notApproved')->nullable();
            $table->integer('quantityAllotments')->nullable();
            $table->integer('approvedAllotments')->nullable();
            $table->integer('cancellations')->nullable();
            $table->integer('repeaters')->nullable();
            $table->string('teacherId')->nullable();
            $table->string('teacherName')->nullable();
            $table->string('teacherNumberId')->nullable();
            $table->string('hiring')->nullable();
            $table->integer('rating')->nullable();            
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
