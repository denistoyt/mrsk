<?
    session_start();
    require_once('../php/db/logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icn/MRSK-Logo.png" type="image/x-icon">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/css/uikit.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Страница Администратора: <?=$_SESSION['admin_nick']?> </title>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="../index.php" class="header__logo__item">
                    <img src="../icn/MRSK-Logo-Main.png" alt="site-logo" class="header__logo__item__img">
                </a>
                <p class="header__logo__description m-0 p-0">
                    Заявки на авто ОАО "МРСК Урала" <br> ОАО "МРСК Урала" - "Свердловэнерго"
                </p>
            </div>
            <nav class="header__nav">
                <form action="" method="get">
                    <ul class="p-0 m-0">
                        <li class="header__nav__option header__nav__autorize">
                            <input type='submit' class="header__nav__option__item button-color admin__nav__exit" name='admin_logout' value="Выход">
                        </li>
                    </ul>
                </form>
            </nav>
        </div>
    </header>
    <!-- Main Content -->
    <main>
        <section>
            <!-- Menu Changer -->
            <div class="delivery__variants">
                <ul class='uk-subnav delivery__variants__top' uk-switcher>
                    <li id="passRecept">
                        <a href="#" class="delivery__variants__item">Пассажиры</a></li>
                    <li id="cargoRecept">
                        <a href="#" class="delivery__variants__item">Грузы</a>
                    </li>
                    <li id="liftingRecept">
                        <a href="#" class="delivery__variants__item">Грузоподъемные</a>
                    </li>
                    <!-- <a href="order.html" class="delivery__variants__item delivery__variants__recept_btn">Оформить заявку</a> -->
                </ul>
                <ul class="p-0 d-flex admin__options__wrapper">
                    <!-- <li>
                        <button class="button-color">Отправить заявки в архив</button>
                    </li> -->
                    <li>
                        <button class="button-color" id="clearTable">Очистить таблицу</button>
                    </li>
                    <li>
                        <button class="button-color" id="RouteSheet">Отчёт</button>
                    </li>
                    <li>
                        <button class="button-color" id="adminArchive">Архив</button>
                    </li>
                </ul>
                <ul class="uk-switcher">
                    <? require_once('requests/all_tables.php');?>
                    <!-- Пассажиры -->
                    <li class="uk-padding-remove passengers__wrapper">
                        <h3>Таблица "Пассажиры"</h3>
                        <table class="passengers__table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Марка авто</th>
                                <th>Гос номер авто</th>
                                <th>Тип Авто</th>
                                <th>Фио заявителя</th>
                                <th>Дата и время подачи</th>
                                <th>Дата и время возврата</th>
                                <th>Маршрут</th>
                                <th>Адрес подачи</th>
                                <th>Кол-во пассажиров</th>
                                <th>Водитель</th>
                                <th>Статус</th>
                                <th>Архив</th>
                                <th>Редактировать</th>
                                <th>Путевой лист</th>
                              </tr>
                            </thead>
                            <tbody>
                            <? foreach($passengers_line as $passengers) {
                                echo '
                              <tr class="tables-row">
                                <td data-label="ID" id="orderId">'
                                    .$passengers['id'].'
                                    <br>
                                    <input name="orderIds" type="text" value="'.$passengers['id'].'" hidden>
                                </td>
                                <td data-label="Марка Авто">
                                    '.$passengers['car_brand'].'
                                    <br>
                                    <input type="text" value="'.$passengers['car_brand'].'" class="admin__table__inputs" name="carBrand" hidden>
                                </td>
                                <td data-label="Гос номер авто">
                                    '.$passengers['car_number'].'
                                    <br>
                                    <input type="text" value="'.$passengers['car_number'].'" class="admin__table__inputs" name="carNumb" hidden>
                                </td>
                                <td data-label="Тип авто">
                                    '.$passengers['car_type'].'
                                    <br>
                                    <input type="text" value="'.$passengers['car_type'].'" class="admin__table__inputs" name="carType" hidden>
                                </td>
                                <td data-label="Фио заявителя">
                                    '.$passengers['declarer_sfl'].'
                                    <br>
                                    <input type="text" value="'.$passengers['declarer_sfl'].'" class="admin__table__inputs" name="declarSFL" hidden>
                                </td>
                                <td data-label="Дата и время подачи">
                                    '.$passengers['filing_date'], " " ,$passengers['filing_time'].'
                                    <br>
                                    <input type="datetime-local" class="admin__table__inputs" value="'.$passengers['filing_date'], " " ,$passengers['filing_time'].'" hidden>
                                    <input type="date" value="'.$passengers['filing_date'].'" name="filDate" hidden>
                                    <input type="time" value="'.$passengers['filing_time'].'" name="filTime" hidden>
                                </td>
                                <td data-label="Дата и время возврата">
                                    '.$passengers['return_date'], " ",$passengers['return_time'].'
                                    <br>
                                    <input type="datetime-local" class="admin__table__inputs" value="'.$passengers['return_date'], " ",$passengers['return_time'].'" hidden>
                                    <input type="date" value="'.$passengers['return_date'].'" name="retDate" hidden>
                                    <input type="time" value="'.$passengers['return_time'].'" name="retTime" hidden>
                                </td>
                                <td data-label="Маршрут">
                                    '.$passengers['route'].'
                                    <br>
                                    <input type="text" value="'.$passengers['route'].'" class="admin__table__inputs" name="route" hidden>
                                </td>
                                <td data-label="Адрес подачи">
                                    '.$passengers['filing_address'].'
                                    <br>
                                    <input type="text" value="'.$passengers['filing_address'].'" class="admin__table__inputs" name="filAddr" hidden>
                                </td>
                                <td data-label="Кол-во пассажиров">
                                    '.$passengers['passengers_count'].'
                                    <br>
                                    <input type="text" value="'.$passengers['passengers_count'].'" class="admin__table__inputs" name="passCount" hidden>
                                </td>
                                <td data-label="Водитель">
                                    '.$passengers['driver_sfl'].'
                                    <br>
                                    <input type="text" value="'.$passengers['driver_sfl'].'" class="admin__table__inputs" name="driverSFL" hidden>
                                </td>
                                <td data-label="Статус">
                                    '.$passengers['order_status'].'
                                    <br>
                                    <input type="text" value="'.$passengers['order_status'].'" class="admin__table__inputs" name="ordStat" hidden data-row-hide="hidden">
                                </td>
                                <td data-label="Архив">
                                    <input type="checkbox" data-btn-action="check" name="listIdCheck" id="listCheckBox">
                                </td>
                                <td data-label="Редактирование">
                                    <button class="admin__redact__btn" data-btn-action="click">✎</button>
                                    <button class="admin__accept__btn" name="acceptBtn" data-btn-action="accept" hidden>✔</button>
                                </td>
                                <td data-label="Путевой лист">
                                    <button class="route__list__download button-color"  data-btn-action="download">Скачать</button>
                                </td>
                              </tr>';}?>
                              <input type="text" name='testInp' value='
                            <? foreach($passengers_line as $arr) {
                                echo $arr['id'].";";
                            }?>
                            '>
                        </tbody>
                        </table>
                    </li>
                    <!-- Грузы -->
                    <li class="uk-padding-remove cargo__wrapper">
                        <h3>Таблица "Грузы"</h3>
                        <table class="cargo__table">
                            <!-- <p id="hiddenId"></p> -->
                        </table>
                    </li>
                    <!-- Грузоподъемные -->
                    <li class="uk-padding-remove lifting__wrapper">
                        <h3>Таблица "Грузоподъемные"</h3>
                        <table class="liftings__table">
                           
                        </table>
                    </li>
                </ul>
            </div>
        </section>
    </main>


    <footer>
        Copyright © Efimov IS-41 2022
    </footer>


    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit-icons.min.js"></script>
    <!-- JS -->
    <script src="../js/script.js"></script>
    <script src="../js/requests.js"></script>
    <!-- Routes PDF -->
    <script src="../js/waybill.js"></script>
    <script src="../js/route_sheet.js"></script>
    <!-- PDFMake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
</body>
</html>