<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_logins', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->dateTime('login_date',3)->nullable();
            $table->dateTime('logout_date',3)->nullable();
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
        Schema::dropIfExists('employee_logins');
    }
}
