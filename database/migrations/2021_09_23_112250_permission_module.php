<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_module',function(Blueprint $table){
           $table->id();
           $table->string('allowed_permissions');
           $table->bigInteger('module_id')->unsigned()->index()->nullable();
           $table->foreign('module_id')->references('id')->on('modules');

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
