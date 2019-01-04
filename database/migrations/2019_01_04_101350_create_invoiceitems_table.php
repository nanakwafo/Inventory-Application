<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('invoiceitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoicenumber');
            $table->string('store');
            $table->string('duedate');
            $table->string('invoicedate');
            $table->string('customer');
            $table->string('product');
            $table->string('rate');
            $table->string('quantity');
            $table->string('total');
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
        Schema::dropIfExists('invoiceitems');
    }
}
