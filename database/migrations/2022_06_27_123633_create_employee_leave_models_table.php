<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_models', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('type')->nullable();
            $table->string('reason')->nullable();
            $table->integer('status')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('no_of_day')->nullable();
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
        Schema::dropIfExists('employee_leave_models');
    }
}
