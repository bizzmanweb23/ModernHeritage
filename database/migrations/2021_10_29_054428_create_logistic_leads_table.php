<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_leads', function (Blueprint $table) {
            $table->id();
            $table->string('stage_id')->required();
            $table->string('unique_id')->required();
            $table->string('client_id')->required();
            $table->string('client_name')->required();
            $table->string('pickup_from')->required();
            $table->string('pickup_add_1')->required();
            $table->string('pickup_add_2')->required();
            $table->string('pickup_add_3')->required();
            $table->string('pickup_pin')->required();
            $table->string('pickup_state')->required();
            $table->string('pickup_country')->required();
            $table->string('pickup_location')->required();
            $table->string('pickup_email')->required();
            $table->string('pickup_phone')->required();
            $table->string('contact_name')->required();
            $table->string('contact_phone')->required();
            $table->string('delivered_to')->required();
            $table->string('delivery_add_1')->required();
            $table->string('delivery_add_2')->required();
            $table->string('delivery_add_3')->required();
            $table->string('delivery_pin')->required();
            $table->string('delivery_state')->required();
            $table->string('delivery_country')->required();
            $table->string('delivery_location')->required();
            $table->string('delivery_email')->required();
            $table->string('delivery_phone')->required();
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
        Schema::dropIfExists('logistic_leads');
    }
}
