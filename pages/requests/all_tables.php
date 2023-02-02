<?
    session_start();
    require_once('../php/db/connect.php');
    // Get All Data From 'Passengers' WHERE is_archive = 0
    $passengers_req = "SELECT * FROM `passengers` WHERE `is_archive` = 0";
    $passengers_data = $pdo->query($passengers_req);
    $passengers_line = $passengers_data->fetchAll();
    // Get All Data From 'Passengers' WHERE is_archive = 1
    $pass_arch = "SELECT * FROM `passengers` WHERE `is_archive` = 1";
    $pass_arch_data = $pdo->query($pass_arch);
    $pass_arch_line = $pass_arch_data->fetchAll();
?>