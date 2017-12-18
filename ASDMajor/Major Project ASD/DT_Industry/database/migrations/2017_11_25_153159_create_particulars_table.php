<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particulars', function (Blueprint $table) {
            $table->increments('pr_id');
            $table->timestamps();
            $table->string('pr_no');
            $table->date('date_required');
            $table->string('requesting_division');
            $table->text('particulars_details');
            $table->integer('po_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('po_id')->references('po_id')->on('costs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('particulars');
    }
}
