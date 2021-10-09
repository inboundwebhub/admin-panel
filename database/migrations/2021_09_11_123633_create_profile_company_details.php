<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCompanyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_company_details', function (Blueprint $table) {
            $table->id();
            $table->string('Date_of_joining')->nullable();
            $table->string('Employee_id')->nullable();
            $table->string('Department')->nullable();
            $table->string('Designation')->nullable();
            $table->string('Job_Profile')->nullable();
            $table->string('Role')->nullable();
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
        Schema::dropIfExists('profile_company_details');
    }
}
