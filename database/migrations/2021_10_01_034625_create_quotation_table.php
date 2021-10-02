<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->requied();
            $table->string('gst_treatment')->nullable();
            $table->string('quotation_template')->nullable();
            $table->string('expiration')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('product_id')->nullable();            
            $table->string('quantity')->nullable();            
            $table->string('tax')->nullable();            
            $table->string('total')->nullable();            
            $table->string('terms')->nullable();            
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
        Schema::dropIfExists('quotation');
    }
}
