<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodissuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodissues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('addnumber');
            $table->string('adddate');
            $table->string('addtype');
            $table->integer('warehouse_issue_from');
            $table->integer('store_issue_to');
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
        Schema::dropIfExists('goodissues');
    }
}
