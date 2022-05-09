<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_management', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('image',500)->nullable();
            $table->string('gst_treatment')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_country')->nullable();
            $table->integer('delivery_zipcode')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('customer_management');
    }
}
