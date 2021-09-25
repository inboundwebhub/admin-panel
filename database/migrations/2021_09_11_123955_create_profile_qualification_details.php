<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileQualificationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_qualification_details', function (Blueprint $table) {
            $table->id();
            $table->string('Education_Detail');
            $table->string('Degree');
            $table->string('University');
            $table->string('Passing_year', 200);
            $table->string('Grade');
            $table->string('Skills');
            $table->string('Known_language');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('profile_personal_details')->onDelete('cascade')->onUpdate('cascade');                         

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
        Schema::dropIfExists('profile_qualification_details');
    }
}
