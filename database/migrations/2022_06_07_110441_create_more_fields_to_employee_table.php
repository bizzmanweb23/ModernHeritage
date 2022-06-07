<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreFieldsToEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->integer('ren_rate')->nullable();
            $table->string('blood_grp')->nullable();
            $table->string('medical_con')->nullable();
            $table->string('drug_allergy')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('driving_license',500)->nullable();
            $table->date('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->dropColumn('ren_rate');
            $table->dropColumn('blood_grp');
            $table->dropColumn('medical_con');
            $table->dropColumn('drug_allergy');
            $table->dropColumn('vehicle_no');
            $table->dropColumn('driving_license');
            $table->dropColumn('expiry_date');

        });
    }
}
