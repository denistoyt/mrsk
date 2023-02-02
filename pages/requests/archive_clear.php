<?
    session_start();
    require_once('../../php/db/connect.php');
    // Clear Archive
    $archive_clear = "DELETE FROM `passengers` WHERE `is_archive` = 1";
    $archive_clear_data = $pdo->query($archive_clear);
?>