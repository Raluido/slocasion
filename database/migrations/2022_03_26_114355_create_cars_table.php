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




            // $table->string("car_photo1")->nullable();
            // $table->string("car_photo2")->nullable();
            // $table->string("car_photo3")->nullable();
            // $table->string("car_photo4")->nullable();
            // $table->string("car_photo5")->nullable();
            // $table->string("car_photo6")->nullable();
            // $table->string("car_photo7")->nullable();
            // $table->string("car_photo8")->nullable();
            // $table->string("car_photo9")->nullable();
            // $table->string("car_photo10")->nullable();
            // $table->string("car_brand11")->nullable();
            // $table->string("car_photo12")->nullable();
            // $table->string("car_photo13")->nullable();
            // $table->string("car_photo14")->nullable();
            // $table->string("car_photo15")->nullable();
            // $table->string("car_photo16")->nullable();
            // $table->string("car_photo17")->nullable();
            // $table->string("car_photo18")->nullable();
            // $table->string("car_photo19")->nullable();
            // $table->string("car_photo20")->nullable();
