<?
    session_start();
    require_once('../../php/db/connect.php');
    // Current Date Variable
    $currDate = date('Y-m-d');
    // Get All Orders
    $orders = "SELECT * FROM `passengers`";
    $orders_d = $pdo->query($orders);
    $orders_l = $orders_d->fetchAll();

    foreach($orders_l as $ord) {
        $ordersDates = $ord['filing_date'];
        $ordersId = $ord['id'];
        $arc = $ord['is_archive'];
        // Check If Filing Date > or < Then Current Date
        if($ordersDates < $currDate) {
            // If < then set 'is_archive' = 1
            $toArch = "UPDATE `passengers` SET `is_archive` = 1 WHERE `id` = $ordersId and `order_status` like 'Выполнен'";
            $toArch_d = $pdo->query($toArch);
        }
        else if($ordersDates > $currDate) {
            // If > then set 'is_archive' = 1 too
            $toArch = "UPDATE `passengers` SET `is_archive` = 1 WHERE `id` = $ordersId and `order_status` like 'Выполнен'";
            $toArch_d = $pdo->query($toArch);
        }
        // If = Then Do Nothing
        else {}
    }
    
?>