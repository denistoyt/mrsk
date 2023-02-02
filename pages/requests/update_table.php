<?php
    session_start();
    require_once('../../php/db/connect.php');
    // Update All Data From Passengers
    $pass_update = "UPDATE `passengers` SET `car_brand` = ?, `car_number` = ?, `car_type` = ?, `declarer_sfl` = ?, `filing_date`= ?, `filing_time` = ?, `return_date` = ?, `return_time` = ?, `route` = ?, `filing_address` = ?, `passengers_count` = ?, `driver_sfl` = ?, `order_status` = ?, `is_archive` = 0 WHERE `id` = ?";
    $pass_update_d = $pdo->prepare($pass_update);
    $pass_update_d->execute(array("$_POST[carBrand]", "$_POST[carNumb]", "$_POST[carType]", "$_POST[declrSFL]", "$_POST[filDate]", "$_POST[filTime]","$_POST[retDate]", "$_POST[retTime]", "$_POST[route]","$_POST[filAddr]", "$_POST[passCount]", "$_POST[drSFL]", "$_POST[status]", "$_POST[listId]"));
?>