<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users');
            $table->double('total_price')->default(0);
            $table->double('items_price')->default(0);
            $table->double('delivery_cost')->default(0);
            $table->integer('delivery_time')->nullable();
            $table->double('offer_cost')->default(0);
            $table->text('address')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->text('transfer_image')->nullable();
            $table->boolean('payment_completed')->default(0);
            $table->enum('status', ['Waiting','Accepted', 'Rejected','InProgress','InWay','Done']);
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
        Schema::dropIfExists('orders');
    }
}
