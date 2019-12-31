<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchaseordernumber');
            $table->string('supplier_id');
            $table->string('date');
            $table->string('expecteddeliverydate');
            $table->string('subamount');
            $table->string('vat');
            $table->string('subtotal');
            $table->string('discount');
            $table->string('grandtotal');
            $table->string('payamount');
            $table->string('dueamount');
            $table->string('paymenttype');
            $table->string('account');
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
        Schema::dropIfExists('purchaseorders');
    }
}
