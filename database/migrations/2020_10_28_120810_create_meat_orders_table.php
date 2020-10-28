<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('meat_product_id')->unsigned();
            $table->foreign('meat_product_id')->references('id')->on('meat_products')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('slicer_id')->unsigned();
            $table->foreign('slicer_id')->references('id')->on('slicers')->onDelete('cascade')->onUpdate('cascade');


            $table->bigInteger('prepation_id')->unsigned();
            $table->foreign('prepation_id')->references('id')->on('prepations')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('bowel_id')->unsigned();
            $table->foreign('bowel_id')->references('id')->on('bowels')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('product_count')->unsigned();
            $table->integer('price');
            
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
        Schema::dropIfExists('meat_orders');
    }
}
