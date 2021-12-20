<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticLeadsSalespersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_leads_salespersons', function (Blueprint $table) {
            $table->id();
            $table->string('sale_person_name')->required();            
            $table->string('sale_person_id')->required();            
            $table->string('logistic_lead_id')->nullable();            
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
        Schema::dropIfExists('logistic_leads_salespersons');
    }
}
