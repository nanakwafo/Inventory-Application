<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryonhandRecordView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \DB::statement("
            CREATE VIEW warehousesummary 
            AS
   select `warehouseitems`.`goodreceive_grnnumber` AS `goodreceive_grnnumber`,`warehouseitems`.`warehouse_id` AS `warehouse_id`,`warehouseitems`.`supplier_id` AS `supplier_id`,`warehouseitems`.`productcode` AS `productcode`,`warehouseitems`.`description` AS `description`,`warehouseitems`.`unit` AS `unit`,`warehouseitems`.`quantity` AS `quantity`,`goodreceives`.`grndate` AS `grndate`,`goodreceives`.`grntype` AS `grntype` from (`warehouseitems` join `goodreceives` on((`warehouseitems`.`goodreceive_grnnumber` = `goodreceives`.`grnnumber`))) group by `warehouseitems`.`warehouse_id`,`goodreceives`.`grnnumber`;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('warehousesummary');
    }
}
