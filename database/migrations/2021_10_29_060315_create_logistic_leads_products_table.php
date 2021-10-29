<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticLeadsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_leads_products', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id')->required();
            $table->string('product_name')->required();
            $table->string('dimension')->required();
            $table->string('quantity')->required();
            $table->string('uom')->required();
            $table->string('area')->required();
            $table->string('weight')->required();
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
        Schema::dropIfExists('logistic_leads_products');
    }
}
