<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCurrentContactDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_current_contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('Current_Address')->nullable();
            $table->string('Current_City')->nullable();
            $table->string('Current_State')->nullable();
            $table->bigInteger('Current_Zipcode')->unsigned()->nullable();
            $table->bigInteger('Personal_Contact_number')->unsigned()->nullable();
            $table->bigInteger('Local_Contact_number')->unsigned()->nullable();
            $table->string('Company_Skypeid')->nullable();
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
        Schema::dropIfExists('profile_current_contact_details');
    }
}
