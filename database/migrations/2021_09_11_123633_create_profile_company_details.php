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
            $table->string('Date_of_joining');
            $table->string('Employee_id');
            $table->string('Department');
            $table->string('Designation');
            $table->string('Job_Profile');
            $table->string('Role');
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
