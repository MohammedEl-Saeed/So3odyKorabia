<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->string('name')->nullable();
            $table->string('number')->unique();
            $table->enum('card_type', PaymentCardTypes::getPaymentCardTypes())->nullable();
            $table->unsignedSmallInteger('cvv')->nullable();
            $table->tinyInteger('end_month')->nullable();
            $table->unsignedSmallInteger('end_year')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_cards');
    }
}
