<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileEmergencyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_emergency_details', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Relation');
            $table->bigInteger('Contact_number');
            $table->string('Address');           
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
        Schema::dropIfExists('profile_emergency_details');
            // Schema::table('profile_emergency_details', function($table) {
            //     $table->dropColumn('user_id');
            // });
    }
}
