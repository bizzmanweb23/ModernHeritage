<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticLeadsQuotatiosnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_leads_quotations', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id')->required();
            $table->string('quotation_id')->required();
            $table->string('sales_id')->nullable();
            $table->string('gst_treatment')->nullable();
            $table->string('quotation_template')->nullable();
            $table->string('expiration')->nullable();
            $table->string('payment_terms')->nullable();            
            $table->string('terms_condition')->nullable();
            $table->string('product')->nullable();
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('tax')->nullable();
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
        Schema::dropIfExists('logistic_leads_quotations');
    }
}
