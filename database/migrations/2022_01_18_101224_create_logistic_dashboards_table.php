<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('logistic_dashboards')) {
        Schema::create('logistic_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('driver_id')->required();           
            $table->string('start_time')->required();            
            $table->string('end_time')->required();            
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistic_dashboards');
    }
}
