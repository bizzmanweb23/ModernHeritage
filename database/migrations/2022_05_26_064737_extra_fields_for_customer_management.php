<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtraFieldsForCustomerManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_management', function (Blueprint $table) {
            //
            $table->bigInteger('phone')->nullable();
            $table->string('delivery_address_1')->nullable();
            $table->string('billing_address_1')->nullable();
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_management', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('delivery_address_1');
            $table->dropColumn('billing_address_1');
            $table->dropColumn('website');
            
        });
    }
}
