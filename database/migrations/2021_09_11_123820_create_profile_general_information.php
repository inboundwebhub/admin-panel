<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileGeneralInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_general_information', function (Blueprint $table) {
            $table->id();
            $table->string('Date_of_birth')->nullable();
            $table->string('Blood_group')->nullable();
            $table->string('Marital_Status')->nullable();
            $table->string('Driving_License_number')->nullable();
            $table->string('Passport_number')->nullable();
            $table->string('Bio')->nullable();
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
        Schema::dropIfExists('profile_general_information');
    }
}
