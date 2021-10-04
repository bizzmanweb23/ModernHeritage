<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->requied();
            $table->string('gst_treatment')->nullable();
            $table->string('quotation_template')->nullable();
            $table->string('expiration')->nullable();
            $table->string('payment_terms')->nullable();            
            $table->string('terms_condition')->nullable();            
            $table->string('sales_id')->nullable();            
            $table->string('leads_id')->required();            
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
        Schema::dropIfExists('quotations');
    }
}
