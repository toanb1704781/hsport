<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllFkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee', function(Blueprint $table) {
            $table->foreign('roleID')->references('roleID')->on('role');
            $table->foreign('infoID')->references('infoID')->on('information');
        });

        Schema::table('customer', function(Blueprint $table) {
            $table->foreign('infoID')->references('infoID')->on('information');
        });

        Schema::table('slider', function(Blueprint $table) {
            $table->foreign('empID')->references('empID')->on('employee')->onDelete('set null');
        });

        Schema::table('news', function(Blueprint $table) {
            $table->foreign('empID')->references('empID')->on('employee')->onDelete('set null');
        });

        Schema::table('import_goods', function(Blueprint $table) {
            $table->foreign('supID')->references('supID')->on('supplier')->onDelete('cascade');
            $table->foreign('empID')->references('empID')->on('employee')->onDelete('set null');
        });

        Schema::table('order', function(Blueprint $table) {
            $table->foreign('cusID')->references('cusID')->on('customer')->onDelete('cascade');
            $table->foreign('statusID')->references('statusID')->on('order_status');
            $table->foreign('disID')->references('disID')->on('discount')->onDelete('set null');
            $table->foreign('paymentID')->references('paymentID')->on('payment');
        });

        Schema::table('import_detail', function(Blueprint $table) {
            $table->foreign('SKU')->references('SKU')->on('shoes_detail');
            $table->foreign('importID')->references('importID')->on('import_goods')->onDelete('cascade');
            $table->primary(['importID', 'SKU']);
        });

        Schema::table('shoes_color', function(Blueprint $table) {
            $table->foreign('shoesID')->references('shoesID')->on('shoes')->onDelete('cascade');
            $table->foreign('colorID')->references('colorID')->on('color');
        });

        Schema::table('shoes_img', function(Blueprint $table) {
            $table->foreign('shoescolorID')->references('shoescolorID')->on('shoes_color')->onDelete('cascade');
        });

        Schema::table('order_detail', function(Blueprint $table) {
            $table->foreign('orderID')->references('orderID')->on('order');
            $table->foreign('SKU')->references('SKU')->on('shoes_detail');
            $table->primary(['orderID', 'SKU']);
        });

        Schema::table('shoes', function(Blueprint $table) {
            $table->foreign('typeID')->references('typeID')->on('shoestype')->onDelete('cascade');
            $table->foreign('brandID')->references('brandID')->on('shoesbrand')->onDelete('cascade');
        });

        Schema::table('shoes_detail', function(Blueprint $table) {
            $table->foreign('shoescolorID')->references('shoescolorID')->on('shoes_color')->onDelete('cascade');
            $table->foreign('size')->references('size')->on('size');
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
