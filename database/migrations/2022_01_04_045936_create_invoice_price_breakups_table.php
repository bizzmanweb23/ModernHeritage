<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePriceBreakupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_price_breakups', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->required();
            $table->string('breakup_type')->nullable();
            $table->string('breakup_amount')->required();
            $table->tinyInteger('is_paid')->required();
            $table->string('due_date')->nullable();
            $table->string('pay_date')->nullable();
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
        Schema::dropIfExists('invoice_price_breakups');
    }
}
