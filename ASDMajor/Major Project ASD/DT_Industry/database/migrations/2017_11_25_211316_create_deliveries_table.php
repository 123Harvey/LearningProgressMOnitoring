<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('delivery_id');
            $table->date('notice_to_proceed');
            $table->date('delivery_completion');
            $table->date('acceptance_turnover');
            $table->string('ci_no');
            $table->integer('number_of_days_po_to_delivery');
            $table->integer('number_of_days_delivery_to_cashier');
            $table->integer('pr_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->foreign('pr_id')->references('pr_id')->on('particulars');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
