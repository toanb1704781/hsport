<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('orderID');
            $table->integer('cusID')->unsigned()->nullable();
            $table->integer('statusID')->unsigned()->nullable();
            $table->integer('disID')->unsigned()->nullable();
            $table->integer('paymentID')->unsigned()->nullable();
            $table->text('note')->nullable();
            $table->integer('total')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
