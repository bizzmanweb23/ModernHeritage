<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticLeadsInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_leads_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('logistic_lead_id')->required();
            $table->string('unique_id')->required();
            $table->string('invoice_type')->required();
            $table->string('down_payment')->nullable();
            $table->string('quotation_reference')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('due_date')->nullable();
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
        Schema::dropIfExists('logistic_leads_invoices');
    }
}
