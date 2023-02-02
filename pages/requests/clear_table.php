<?php
    session_start();
    require_once('../../php/db/connect.php');
    // Clear 'Passengers' table Where Button 'Clear Table' is hold
    $pass_clear = "DELETE FROM `passengers` WHERE `is_archive` = 0";
    $pass_clear_data = $pdo->query($pass_clear);
?>