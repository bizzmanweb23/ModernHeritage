<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->integer('basic_pay')->nullable();
            $table->integer('cpf')->nullable();
            $table->integer('medical_leave')->nullable();
            $table->integer('earning')->nullable();
            $table->integer('deduction')->nullable();
            $table->integer('designation')->nullable();
            $table->integer('commission')->nullable();
            $table->integer('insurance')->nullable();
            $table->integer('medical_allowance')->nullable();
            $table->integer('net_pay')->nullable();
            $table->integer('per_trip_charge')->nullable();
            $table->integer('no_trip')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('employee_salaries');
    }
}
