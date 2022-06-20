<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->date('order_date')->nullable();
            $table->time('order_time')->nullable();
            $table->string('type')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('remarks')->nullable();
            $table->string('po_number')->nullable();
            $table->integer('order_status')->nullable();
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
        Schema::dropIfExists('fleet_orders');
    }
}
