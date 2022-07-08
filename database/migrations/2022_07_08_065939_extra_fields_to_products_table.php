<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraFieldsToProductsTable extends Migration
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
            $table->string('casual_leave')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('battery_chemistry')->nullable();
            $table->string('max_capacity')->nullable();
            $table->string('drilling_capacity')->nullable();
            $table->string('no_load_speed')->nullable();
            $table->string('photo_gallery')->nullable();
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
            $table->dropColumn('casual_leave');
            $table->dropColumn('battery_capacity');
            $table->dropColumn('battery_chemistry');
            $table->dropColumn('max_capacity');
            $table->dropColumn('drilling_capacity');
            $table->dropColumn('no_load_speed');
            $table->dropColumn('photo_gallery');
        });
    }
}
