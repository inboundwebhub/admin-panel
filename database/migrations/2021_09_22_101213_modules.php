<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('module_name');
            $table->string('module_description');
            $table->enum('Activate_Deactivate',['Activate','Deactivate'])->default('Activate');
            $table->enum('isGeneralModule',['True','False'])->default('False');
            $table->string('permission_id')->references('id')->on('permission');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
