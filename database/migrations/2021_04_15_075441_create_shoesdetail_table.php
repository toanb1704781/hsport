<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes_detail', function (Blueprint $table) {
            $table->increments('SKU');
            $table->integer('size')->unsigned()->nullable();
            $table->integer('shoesQuan')->unsigned()->nullable();
            $table->integer('shoescolorID')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoesdetails');
    }
}
