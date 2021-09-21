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
            $table->string('Current_Address');
            $table->string('Current_City');
            $table->string('Current_State');
            $table->string('Current_Zipcode');
            $table->bigInteger('Personal_Contact_number');
            $table->bigInteger('Local_Contact_number');
            $table->string('Company_Skypeid');
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
