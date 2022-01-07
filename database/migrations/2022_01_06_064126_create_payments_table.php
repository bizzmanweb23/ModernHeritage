<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('breakup_price_id')->required();
            $table->string('payment_type')->required();
            $table->string('amount')->required();
            $table->string('dd_no')->nullable();
            $table->string('dd_date')->nullable();
            $table->string('checq_no')->nullable();
            $table->string('checq_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('online_date')->nullable();
            $table->string('transaction_no')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
