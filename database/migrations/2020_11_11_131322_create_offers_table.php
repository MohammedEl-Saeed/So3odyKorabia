<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->double('discount');
            $table->integer('uses_number')->nullable();
            $table->integer('count')->default(0);
            $table->enum('discount_type',array('percent','value'))->default('percent');
            $table->enum('status',array('Available','Unavailable', 'Expired','Closed','Reopened'))->default('Available');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
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
        Schema::dropIfExists('offers');
    }
}
