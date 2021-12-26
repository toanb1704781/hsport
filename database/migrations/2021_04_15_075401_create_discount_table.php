<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->increments('disID');
            $table->text('disDesc')->nullable();
            $table->integer('disCondition')->unsigned()->nullable();
            $table->integer('disQuan')->unsigned()->nullable();
            $table->integer('discount')->unsigned()->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
