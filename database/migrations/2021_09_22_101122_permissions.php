<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission',function(Blueprint $table){
             $table->bigIncrements('id');
             $table->string('Permission_name');
             $table->string('Permission_description');
            //  $table->timestamp('created at')->nullable();
             $table->timestamps();
             $table->string('module_ID')->references('id')->on('modules');

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
