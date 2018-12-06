<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ordernumber');
            $table->string('subamount');
            $table->string('totalamount');
            $table->string('discount');
            $table->string('paidamount');
            $table->string('dueamount');
            $table->string('paymenttype');
            $table->string('paymentstatus');
            
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
        Schema::dropIfExists('paymentorders');
    }
}
