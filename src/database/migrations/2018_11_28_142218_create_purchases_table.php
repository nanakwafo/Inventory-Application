<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('datereceived');
            $table->string('productcode');
            $table->integer('productcategory_id');
          
            $table->string('unit');
            $table->string('unitprice');
            $table->string('payamount');
            $table->string('quantity');
            $table->integer('supplier_id');
            $table->string('purchaseordernumber');
            $table->text('remark');
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
        Schema::dropIfExists('purchases');
    }
}
