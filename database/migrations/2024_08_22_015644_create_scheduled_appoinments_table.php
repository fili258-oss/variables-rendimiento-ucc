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
        Schema::create('scheduled_appoinments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remission_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('psychologist_id');
            $table->unsignedBigInteger('type_consultation_id');
            $table->date('scheduled_date');
            $table->time('scheduled_time', $precision = 0);
            $table->string('referral_document', 30);
            $table->enum('status', ['Scheduled', 'Completed', 'Cancelled', 'No Show', 'Rescheduled', 'Pending']);
            $table->timestamps();
            $table->foreign('remission_id')->references('id')->on('remissions')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('psychologist_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_consultation_id')->references('id')->on('type_consultations')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_appoinments');
    }
};
