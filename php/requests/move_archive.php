<?php
    session_start();
    require_once('../db/connect.php');
    $sql = "UPDATE `passengers` SET `is_archive` = 1 WHERE `id` = ?";
    $edit = $pdo->prepare($sql);
    $edit->execute(array("$_POST[list_Id]"));
?>