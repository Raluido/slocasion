<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id("id")->unsigned();
            $table->foreignId('user_id')->constrained('users');
            $table->string("car_soldOrBooked");
            $table->string("car_brand");
            $table->string("car_model");
            $table->string("car_numberPlate");
            $table->string("car_color");
            $table->string("car_motorFuel");
            $table->string("car_doors");
            $table->integer("car_cylinder");
            $table->string("car_horsePower");
            $table->string("car_km");
            $table->float("car_price");
            $table->longText("car_equipment");
            $table->longText("car_observations");
            $table->string("car_gear");
            $table->string("car_body");
            $table->date("car_registration_date");
            $table->string("car_photo_main")->nullable();
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
        Schema::dropIfExists('cars');
    }
}
