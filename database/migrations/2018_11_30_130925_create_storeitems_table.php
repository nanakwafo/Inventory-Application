<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goodissue_addnumber');
            $table->string('date');
            $table->integer('warehouse_issue_from');
            $table->integer('store_issue_to');
            $table->integer('productcode');
            $table->integer('rate');
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
        Schema::dropIfExists('storeitems');
    }
}
