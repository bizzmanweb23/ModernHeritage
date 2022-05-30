<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFieldsToProducts extends Migration
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
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('sub_cat')->nullable();
            $table->string('length')->nullable();
            $table->string('coverage')->nullable();
            $table->string('per_pallet')->nullable();
            $table->string('per_box')->nullable();
            $table->string('pac_bags')->nullable();
            $table->string('loose_per_lorry')->nullable();

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
            $table->dropColumn('height');
            $table->dropColumn('width');
            $table->dropColumn('sub_cat');
            $table->dropColumn('length');
            $table->dropColumn('coverage');
            $table->dropColumn('per_pallet');
            $table->dropColumn('per_box');
            $table->dropColumn('pac_bags');
            $table->dropColumn('loose_per_lorry');
        });
    }
}
