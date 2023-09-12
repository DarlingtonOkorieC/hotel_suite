<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('phone');
            $table->integer('user_id');
            $table->integer('hotel_id');
            $table->string('photo');
            $table->boolean('opened')->default(0);
            $table->string('location');
            $table->integer('room_id')->nullable();
            $table->bigInteger('duration')->nullable();
            $table->string('requirement')->nullable();
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
        Schema::dropIfExists('bookers');
    }
}
