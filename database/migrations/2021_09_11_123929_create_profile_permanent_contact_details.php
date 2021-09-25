<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePermanentContactDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_permanent_contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('Permanent_Address');
            $table->string('Permanent_City');
            $table->string('Permanent_State');
            $table->bigInteger('Permanent_Zipcode');
            $table->bigInteger('Parents_Contact_number1');
            $table->bigInteger('Parents_Contact_number2');
            $table->string('Personal_Emailid');
            $table->string('Personal_Skypeid');
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
        Schema::dropIfExists('profile_permanent_contact_details');
    }
}
