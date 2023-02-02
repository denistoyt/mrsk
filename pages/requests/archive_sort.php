<?php
    session_start();
    require_once('../../php/db/connect.php');
    // Find With 'Date'
    $dateFind = "SELECT * FROM `passengers` WHERE `filing_date` = ? and `is_archive` = 1";
    $dateFind_d = $pdo->prepare($dateFind);
    $dateFind_d->execute(array("$_POST[filDate]"));
    $dateFind_l = $dateFind_d->fetchAll();
    foreach($dateFind_l as $dateSort) {
        echo '
            <tr class="tables-row">
                <td data-label="ID" id="orderId">'
                    .$dateSort['id'].'
                </td>
                <td data-label="Марка Авто">
                    '.$dateSort['car_brand'].'
                </td>
                <td data-label="Гос номер авто">
                    '.$dateSort['car_number'].'
                </td>
                <td data-label="Тип авто">
                    '.$dateSort['car_type'].'
                </td>
                <td data-label="Фио заявителя">
                    '.$dateSort['declarer_sfl'].'
                </td>
                <td data-label="Дата и время подачи" class="archiveFilDate">
                    '.$dateSort['filing_date'], " " ,$dateSort['filing_time'].'
                </td>
                <td data-label="Дата и время возврата">
                    '.$dateSort['return_date'], " ",$dateSort['return_time'].'
                </td>
                <td data-label="Маршрут">
                    '.$dateSort['route'].'
                </td>
                <td data-label="Адрес подачи">
                    '.$dateSort['filing_address'].'
                </td>
                <td data-label="Кол-во пассажиров">
                    '.$dateSort['passengers_count'].'
                </td>
                <td data-label="Водитель">
                    '.$dateSort['driver_sfl'].'
                </td>
                <td data-label="Статус">
                    '.$dateSort['order_status'].'
                </td>
            </tr>';
    }
    // Find From 'Date' To 'Date'
    $filDateInterval = "SELECT * FROM `passengers` WHERE `filing_date` BETWEEN ? and ? and `is_archive` = 1";
    $filDateInterval_d = $pdo->prepare($filDateInterval);
    $filDateInterval_d->execute(array("$_POST[startDate]", "$_POST[endDate]"));
    $filDateInterval_l = $filDateInterval_d->fetchAll();
    foreach($filDateInterval_l as $intervals) {
        echo '
            <tr class="tables-row">
                <td data-label="ID" id="orderId">'
                    .$intervals['id'].'
                </td>
                <td data-label="Марка Авто">
                    '.$intervals['car_brand'].'
                </td>
                <td data-label="Гос номер авто">
                    '.$intervals['car_number'].'
                </td>
                <td data-label="Тип авто">
                    '.$intervals['car_type'].'
                </td>
                <td data-label="Фио заявителя">
                    '.$intervals['declarer_sfl'].'
                </td>
                <td data-label="Дата и время подачи" class="archiveFilDate">
                    '.$intervals['filing_date'], " " ,$intervals['filing_time'].'
                </td>
                <td data-label="Дата и время возврата">
                    '.$intervals['return_date'], " ",$intervals['return_time'].'
                </td>
                <td data-label="Маршрут">
                    '.$intervals['route'].'
                </td>
                <td data-label="Адрес подачи">
                    '.$intervals['filing_address'].'
                </td>
                <td data-label="Кол-во пассажиров">
                    '.$intervals['passengers_count'].'
                </td>
                <td data-label="Водитель">
                    '.$intervals['driver_sfl'].'
                </td>
                <td data-label="Статус">
                    '.$intervals['order_status'].'
                </td>
            </tr>';
    }
    // Find With 'Declar SFL'
    $declarFind = "SELECT * FROM `passengers` WHERE `declarer_sfl` = ?";
    $declarFind_d = $pdo->prepare($declarFind);
    $declarFind_d->execute(array("$_POST[declarer_sfl]"));
    $declarFind_l = $declarFind_d->fetchAll();
    foreach($declarFind_l as $declSFL) {
        echo '
            <tr class="tables-row">
                <td data-label="ID" id="orderId">'
                    .$declSFL['id'].'
                </td>
                <td data-label="Марка Авто">
                    '.$declSFL['car_brand'].'
                </td>
                <td data-label="Гос номер авто">
                    '.$declSFL['car_number'].'
                </td>
                <td data-label="Тип авто">
                    '.$declSFL['car_type'].'
                </td>
                <td data-label="Фио заявителя">
                    '.$declSFL['declarer_sfl'].'
                </td>
                <td data-label="Дата и время подачи" class="archiveFilDate">
                    '.$declSFL['filing_date'], " " ,$declSFL['filing_time'].'
                </td>
                <td data-label="Дата и время возврата">
                    '.$declSFL['return_date'], " ",$declSFL['return_time'].'
                </td>
                <td data-label="Маршрут">
                    '.$declSFL['route'].'
                </td>
                <td data-label="Адрес подачи">
                    '.$declSFL['filing_address'].'
                </td>
                <td data-label="Кол-во пассажиров">
                    '.$declSFL['passengers_count'].'
                </td>
                <td data-label="Водитель">
                    '.$declSFL['driver_sfl'].'
                </td>
                <td data-label="Статус">
                    '.$declSFL['order_status'].'
                </td>
            </tr>';
    }
?>