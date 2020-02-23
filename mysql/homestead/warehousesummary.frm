TYPE=VIEW
query=select `homestead`.`warehouseitems`.`goodreceive_grnnumber` AS `goodreceive_grnnumber`,`homestead`.`warehouseitems`.`warehouse_id` AS `warehouse_id`,`homestead`.`warehouseitems`.`supplier_id` AS `supplier_id`,`homestead`.`warehouseitems`.`productcode` AS `productcode`,`homestead`.`warehouseitems`.`description` AS `description`,`homestead`.`warehouseitems`.`unit` AS `unit`,`homestead`.`warehouseitems`.`quantity` AS `quantity`,`homestead`.`goodreceives`.`grndate` AS `grndate`,`homestead`.`goodreceives`.`grntype` AS `grntype` from (`homestead`.`warehouseitems` join `homestead`.`goodreceives` on((`homestead`.`warehouseitems`.`goodreceive_grnnumber` = `homestead`.`goodreceives`.`grnnumber`))) group by `homestead`.`warehouseitems`.`warehouse_id`,`homestead`.`goodreceives`.`grnnumber`
md5=2c25ba075e44a8ecb13d6d6f9e08774b
updatable=0
algorithm=0
definer_user=homestead
definer_host=%
suid=2
with_check_option=0
timestamp=2020-02-23 18:10:58
create-version=1
source=select `warehouseitems`.`goodreceive_grnnumber` AS `goodreceive_grnnumber`,`warehouseitems`.`warehouse_id` AS `warehouse_id`,`warehouseitems`.`supplier_id` AS `supplier_id`,`warehouseitems`.`productcode` AS `productcode`,`warehouseitems`.`description` AS `description`,`warehouseitems`.`unit` AS `unit`,`warehouseitems`.`quantity` AS `quantity`,`goodreceives`.`grndate` AS `grndate`,`goodreceives`.`grntype` AS `grntype` from (`warehouseitems` join `goodreceives` on((`warehouseitems`.`goodreceive_grnnumber` = `goodreceives`.`grnnumber`))) group by `warehouseitems`.`warehouse_id`,`goodreceives`.`grnnumber`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `homestead`.`warehouseitems`.`goodreceive_grnnumber` AS `goodreceive_grnnumber`,`homestead`.`warehouseitems`.`warehouse_id` AS `warehouse_id`,`homestead`.`warehouseitems`.`supplier_id` AS `supplier_id`,`homestead`.`warehouseitems`.`productcode` AS `productcode`,`homestead`.`warehouseitems`.`description` AS `description`,`homestead`.`warehouseitems`.`unit` AS `unit`,`homestead`.`warehouseitems`.`quantity` AS `quantity`,`homestead`.`goodreceives`.`grndate` AS `grndate`,`homestead`.`goodreceives`.`grntype` AS `grntype` from (`homestead`.`warehouseitems` join `homestead`.`goodreceives` on((`homestead`.`warehouseitems`.`goodreceive_grnnumber` = `homestead`.`goodreceives`.`grnnumber`))) group by `homestead`.`warehouseitems`.`warehouse_id`,`homestead`.`goodreceives`.`grnnumber`
