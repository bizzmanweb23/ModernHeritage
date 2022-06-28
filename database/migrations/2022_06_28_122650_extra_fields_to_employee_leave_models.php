<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraFieldsToEmployeeLeaveModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_leave_models', function (Blueprint $table) {
            //
            $table->integer('casual_leave')->nullable();
            $table->integer('sick_leave')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_leave_models', function (Blueprint $table) {
            //
            $table->dropColumn('casual_leave');
            $table->dropColumn('sick_leave');
            
        });
    }
}
