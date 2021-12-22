<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model_name')->required();            
            $table->string('license_plate_no')->required();            
            $table->string('driver_id')->required();            
            $table->string('chassis_no')->required();            
            $table->string('model_colour')->nullable();            
            $table->string('model_year')->nullable();            
            $table->string('vehicle_image')->nullable();            
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
        Schema::dropIfExists('vehicles');
    }
}
