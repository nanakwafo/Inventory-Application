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
            CREATE VIEW inventoryonhand 
            AS
            SELECT
storeitems.id AS id,
storeitems.date AS date,
storeitems.store_issue_to AS store_issue_to,
storeitems.productcode AS productcode,
storeitems.rate AS rate,
storeitems.description AS description,
storeitems.unit AS unit,
Sum(storeitems.quantity) AS quantity,
productcodes.`name` AS `name`,
products.productcategory_id AS productcategory_id,
products.supplier_id AS supplier_id,
products.reorderlimit AS reorderlimit

from ((`storeitems` join `productcodes` on((`productcodes`.`productcode` = `storeitems`.`productcode`))) join `products` on((`storeitems`.`productcode` = `products`.`productcode`)))
group by `storeitems`.`productcode`,`storeitems`.`store_issue_to`
order by `storeitems`.`date`
;
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
    }
}
