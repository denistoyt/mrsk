<?
    require_once('../db/connect.php');
    $pass_ins = "INSERT INTO `passengers` SET `car_brand` = ? , `car_number` = ?, `car_type` = ?, `declarer_sfl` = ?, `filing_date` = ?, `filing_time` = ?, `return_date` = ?, `return_time` = ?, `route` = ?, `filing_address` = ?, `passengers_count` = ?, `driver_sfl` = ?, `is_archive` = 0";
    $insert = $pdo->prepare($pass_ins);
    $insert-> execute(array("$_POST[cBrand]", "$_POST[cNumb]", "$_POST[cType]", "$_POST[dSFL]", "$_POST[fDate]", "$_POST[fTime]", "$_POST[rDate]", "$_POST[rTime]", "$_POST[route]", "$_POST[fAddr]", "$_POST[pCount]", "$_POST[dSFL]"));
?>