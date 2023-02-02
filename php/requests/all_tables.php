<?
    session_start();
    require_once('php/db/connect.php');
    // Get All Data From 'Passengers'
    $passengers_req = "SELECT * FROM `passengers` WHERE `is_archive` = 0";
    $passengers_data = $pdo->query($passengers_req);
    $passengers_line = $passengers_data->fetchAll();
?>