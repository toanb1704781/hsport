<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoescolorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes_color', function (Blueprint $table) {
            $table->increments('shoescolorID');
            $table->integer('shoesID')->unsigned()->nullable();
            $table->integer('colorID')->unsigned()->nullable();
            $table->char('shoesAvatar', 255)->nullable();
            $table->integer('shoesPrice')->unsigned()->nullable();
            $table->integer('salePrice')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->text('shoesDesc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoescolors');
    }
}
