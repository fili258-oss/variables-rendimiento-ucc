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
        Schema::create('students', function (Blueprint $table) {
            $table->id();                        
            $table->integer('active');            
            $table->string('name', 60);
            $table->string('lastname', 60);            
            $table->string('identification', 11);
            $table->string('email', 255);
            $table->string('student_code', 10);
            $table->string('phone', 15);
            $table->string('place_of_expedition', 120)->nullable();
            $table->integer('stratum')->nullable();            
            $table->unsignedBigInteger('civil_status_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->unsignedBigInteger('country_birth_id')->nullable();
            $table->unsignedBigInteger('town_birth_id')->nullable();
            $table->unsignedBigInteger('city_birth_id')->nullable();
            $table->string('address', 60)->nullable();
            $table->string('locality_comuna', 60)->nullable();
            $table->string('study_day', 60)->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('program_id');            
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('type_document_id');                                
            $table->timestamps();

            // Agregar las claves foráneas
            $table->foreign('civil_status_id')->references('id')->on('marital_statuses')->onDelete('cascade');
            $table->foreign('country_birth_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('town_birth_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreign('city_birth_id')->references('id')->on('cities')->onDelete('cascade');

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('type_document_id')->references('id')->on('type_documents')->onDelete('cascade');
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
