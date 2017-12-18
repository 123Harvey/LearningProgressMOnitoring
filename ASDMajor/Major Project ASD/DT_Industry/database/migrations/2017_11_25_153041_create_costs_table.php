<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('po_id');
            $table->timestamps();
            $table->string('po_no');
            $table->integer('total_actual_cost');
            $table->integer('total_approved_budget_cost');
            $table->integer('accounting_id')->unsigned();
            $table->foreign('accounting_id')->references('accounting_id')->on('accountings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costs');
    }
}
