<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('stage_id')->required();
            $table->string('client_id')->nullable();
            $table->string('client_name')->required();
            $table->string('opportunity')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('expected_price')->nullable();
            $table->string('probability')->nullable();
            $table->string('priority')->nullable();
            $table->string('tag')->nullable();
            $table->string('expected_closing')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
