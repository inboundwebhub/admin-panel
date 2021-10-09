<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileWorkExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_work_experience', function (Blueprint $table) {
            $table->id();
            $table->string('Duration')->nullable();
            $table->string('Company_Name')->nullable();
            $table->string('Company_Number')->nullable();
            $table->string('Company_Address')->nullable();
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
        Schema::dropIfExists('profile_work_experience');
    }
}
