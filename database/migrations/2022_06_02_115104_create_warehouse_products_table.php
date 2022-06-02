<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_products', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_id')->nullable();
            $table->decimal('selling_price',10,2)->nullable();
            $table->string('min_stock')->nullable();
            $table->string('max_stock')->nullable();
            $table->string('avl_stock')->nullable();
            $table->integer('status')->nullable();
            $table->integer('ware_house_id')->nullable();
            $table->string('sku')->nullable();
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
        Schema::dropIfExists('warehouse_products');
    }
}
