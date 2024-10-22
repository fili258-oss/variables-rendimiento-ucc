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
        Schema::create('initial_interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appoinment_id');
            $table->longText('document_interview');
            $table->timestamps();
            $table->foreign('appoinment_id')->references('id')->on('scheduled_appoinments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('initial_interviews');
    }
};
