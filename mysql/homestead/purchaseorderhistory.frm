TYPE=VIEW
query=select `homestead`.`purchaseorderitems`.`id` AS `id`,`homestead`.`purchaseorderitems`.`purchaseordernumber` AS `purchaseordernumber`,`homestead`.`purchaseorderitems`.`productid` AS `productid`,`homestead`.`purchaseorderitems`.`quantity` AS `quantity`,`homestead`.`purchaseorderitems`.`rate` AS `rate`,`homestead`.`purchaseorderitems`.`amount` AS `amount`,`homestead`.`purchaseorderitems`.`status` AS `status`,`homestead`.`purchaseorders`.`date` AS `purchaseorderdate`,`homestead`.`purchaseorders`.`supplier_id` AS `supplier_id`,`homestead`.`purchaseorders`.`expecteddeliverydate` AS `expecteddeliverydate` from (`homestead`.`purchaseorderitems` join `homestead`.`purchaseorders` on((`homestead`.`purchaseorderitems`.`purchaseordernumber` = `homestead`.`purchaseorders`.`purchaseordernumber`))) group by `homestead`.`purchaseorderitems`.`productid`,`homestead`.`purchaseorderitems`.`purchaseordernumber`
md5=aae4e642bd3b6568f1b09f752e00b9f8
updatable=0
algorithm=0
definer_user=homestead
definer_host=%
suid=2
with_check_option=0
timestamp=2019-12-31 18:38:56
create-version=1
source=select `purchaseorderitems`.`id` AS `id`,`purchaseorderitems`.`purchaseordernumber` AS `purchaseordernumber`,`purchaseorderitems`.`productid` AS `productid`,`purchaseorderitems`.`quantity` AS `quantity`,`purchaseorderitems`.`rate` AS `rate`,`purchaseorderitems`.`amount` AS `amount`,`purchaseorderitems`.`status` AS `status`,`purchaseorders`.`date` AS `purchaseorderdate`,`purchaseorders`.`supplier_id` AS `supplier_id`,`purchaseorders`.`expecteddeliverydate` AS `expecteddeliverydate` from (`purchaseorderitems` join `purchaseorders` on((`purchaseorderitems`.`purchaseordernumber` = `purchaseorders`.`purchaseordernumber`))) group by `purchaseorderitems`.`productid`,`purchaseorderitems`.`purchaseordernumber`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `homestead`.`purchaseorderitems`.`id` AS `id`,`homestead`.`purchaseorderitems`.`purchaseordernumber` AS `purchaseordernumber`,`homestead`.`purchaseorderitems`.`productid` AS `productid`,`homestead`.`purchaseorderitems`.`quantity` AS `quantity`,`homestead`.`purchaseorderitems`.`rate` AS `rate`,`homestead`.`purchaseorderitems`.`amount` AS `amount`,`homestead`.`purchaseorderitems`.`status` AS `status`,`homestead`.`purchaseorders`.`date` AS `purchaseorderdate`,`homestead`.`purchaseorders`.`supplier_id` AS `supplier_id`,`homestead`.`purchaseorders`.`expecteddeliverydate` AS `expecteddeliverydate` from (`homestead`.`purchaseorderitems` join `homestead`.`purchaseorders` on((`homestead`.`purchaseorderitems`.`purchaseordernumber` = `homestead`.`purchaseorders`.`purchaseordernumber`))) group by `homestead`.`purchaseorderitems`.`productid`,`homestead`.`purchaseorderitems`.`purchaseordernumber`
