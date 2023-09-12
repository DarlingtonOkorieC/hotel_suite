<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('room_no')->nullable();
            $table->bigInteger('price_tag')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->text('descr')->nullable();
            $table->string('photo')->nullable();
            $table->string('banner')->nullable();
            $table->bigInteger('staff')->nullable();
            $table->boolean('restaurant')->nullable();
            $table->integer('pricing_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('booker_id')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
