<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uom', function (Blueprint $table) {
            $table->id();
            $table->string('uom')->requied();
            $table->string('active')->requied();
            $table->string('category')->requied();
            $table->string('rounding_precision')->requied();
            $table->string('gst_uqc')->requied();
            $table->string('uom_type')->requied();
            $table->string('ratio')->nullable();
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
        Schema::dropIfExists('uom');
    }
}
