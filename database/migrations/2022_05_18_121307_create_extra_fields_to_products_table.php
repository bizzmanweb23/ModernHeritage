<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('mrp_price')->nullable();
            $table->integer('status')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->integer('speed')->nullable();
            $table->string('power_source')->nullable();
            $table->integer('voltage')->nullable();
            $table->string('sku')->nullable();
            $table->string('supplier_code')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('brand')->nullable();
            $table->decimal('tax', 3, 2)->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('material')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('mrp_price');
            $table->dropColumn('status');
            $table->dropColumn('color');
            $table->dropColumn('size');
            $table->dropColumn('weight');
            $table->dropColumn('speed');
            $table->dropColumn('power_source');
            $table->dropColumn('voltage');
            $table->dropColumn('sku');
            $table->dropColumn('supplier_code');
            $table->dropColumn('bar_code');
            $table->dropColumn('brand');
            $table->dropColumn('tax');
            $table->dropColumn('cat_id');
            $table->dropColumn('material');
        });
    }
}
