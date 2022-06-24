<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_structures', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->float('commission', 9, 2)->nullable();
            $table->float('cpf', 9, 2)->nullable();
            $table->float('insurance', 9, 2)->nullable();
            $table->float('medical_leave_entitlement', 9, 2)->nullable();
            $table->float('medical_allowance', 9, 2)->nullable();
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
        Schema::dropIfExists('pay_structures');
    }
}
