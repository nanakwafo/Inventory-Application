<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepurchaseorderhistoryRecordView extends Migration
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
            CREATE VIEW purchaseorderhistory 
            AS
            select `purchaseorderitems`.`id` AS `id`,`purchaseorderitems`.`purchaseordernumber` AS `purchaseordernumber`,`purchaseorderitems`.`productid` AS `productid`,`purchaseorderitems`.`quantity` AS `quantity`,`purchaseorderitems`.`rate` AS `rate`,`purchaseorderitems`.`amount` AS `amount`,`purchaseorderitems`.`status` AS `status`,`purchaseorders`.`date` AS `purchaseorderdate`,`purchaseorders`.`supplier_id` AS `supplier_id`,`purchaseorders`.`expecteddeliverydate` AS `expecteddeliverydate` from (`purchaseorderitems` join `purchaseorders` on((`purchaseorderitems`.`purchaseordernumber` = `purchaseorders`.`purchaseordernumber`))) group by `purchaseorderitems`.`productid`,`purchaseorderitems`.`purchaseordernumber`
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
        Schema::dropIfExists('purchaseorderhistory');
    }
}
