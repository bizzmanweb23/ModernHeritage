<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraFieldsToVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
            $table->date('road_tax_expiry')->nullable();
            $table->date('inspection_due_date')->nullable();
            $table->string('parf_eligibility')->nullable();
            $table->string('parf_rebate_amount')->nullable();
            $table->date('coe_expiry_date')->nullable();
            $table->string('coe_rebate_amount')->nullable();
            $table->string('total_rebate_amount')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('vehicle_scheme')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
            $table->dropColumn('road_tax_expiry');
            $table->dropColumn('inspection_due_date');
            $table->dropColumn('parf_eligibility');
            $table->dropColumn('parf_rebate_amount');
            $table->dropColumn('coe_expiry_date');
            $table->dropColumn('coe_rebate_amount');
            $table->dropColumn('total_rebate_amount');
            $table->dropColumn('engine_no');
            $table->dropColumn('vehicle_type');
            $table->dropColumn('brand_id');
            $table->dropColumn('vehicle_no');
            $table->dropColumn('vehicle_scheme');
            

        });
    }
}
