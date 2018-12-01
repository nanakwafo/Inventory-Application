<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouseitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goodreceive_grnnumber');
            $table->integer('warehouse_id');
            $table->integer('supplier_id');
            $table->integer('productcode');
            $table->text('description');
            $table->string('unit');
           
            $table->integer('quantity');
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
        Schema::dropIfExists('warehouseitems');
    }
}
