<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGeodiv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geodivs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('geodiv');
            $table->string('namegeodiv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geodiv', function (Blueprint $table) {
            //
        });
    }
}
