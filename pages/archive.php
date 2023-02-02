<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icn/MRSK-Logo.png" type="image/x-icon">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/css/uikit.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/archive.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Архив заявок</title>
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
            <nav class="header__nav archive__header__nav">
                <ul class="p-0 m-0">
                    <li class="header__nav__option header__nav__autorize">
                        <h3 class="m-0 fw-semibold">Архив заявок на пассажиров</h3>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- main content -->
    <main>
        <!-- filters -->
        <div class="archive__filters__wrapper">
            <div class="archive__filters__date-search archive__filters">
                <label for="dateFind">Поиск по дате</label>
                <input type="date" name="dateFind" id="dateFind">
                <button class="archive__filters__date-search-btn button-color archive-search-btns" id="dateFindBtn">Поиск</button>
            </div>
            <div class="archive__filters__date-range-search archive__filters">
                <label for="dateStart">Поиск по периоду дат от:</label>
                <input type="date" name="dateStart" id="dateStart">
                <label for="dateEnd">до:</label>
                <input type="date" name="dateEnd" id="dateEnd">
                <button class="archive__filters__date-range-search-btn button-color archive-search-btns" id="dateRangeBtn">Поиск</button>
            </div>
            <div class="archive__filters__driver-search archive__filters">
                <label for="driverSFL">Поиск по ФИО Заявителя</label>
                <input type="text" name="driverSFL" id="driverSFL">
                <button class="archive__filters__driver-search-btn button-color archive-search-btns" id="declarSFLFindBtn">Поиск</button>
            </div>
            <div class="archive__filters__clear_archive archive__filters">
                <button class="archive__filters__clear-btn button-color" id="archiveClear">Очистить архив</button>
            </div>
        </div>
        <!-- table -->
        <div class="archive__table__wrapper">
            <? require_once('requests/all_tables.php');?>
            <table class="archive__table">
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
                  </tr>
                </thead>
                <tbody class="archive__table__body">
                <? foreach($pass_arch_line as $passengers) {
                    echo '
                    <tr class="tables-row archive__main_table">
                        <td data-label="ID" id="orderId">'
                            .$passengers['id'].'
                        </td>
                        <td data-label="Марка Авто">
                            '.$passengers['car_brand'].'
                        </td>
                        <td data-label="Гос номер авто">
                            '.$passengers['car_number'].'
                        </td>
                        <td data-label="Тип авто">
                            '.$passengers['car_type'].'
                        </td>
                        <td data-label="Фио заявителя">
                            '.$passengers['declarer_sfl'].'
                        </td>
                        <td data-label="Дата и время подачи" class="archiveFilDate">
                            '.$passengers['filing_date'], " " ,$passengers['filing_time'].'
                        </td>
                        <td data-label="Дата и время возврата">
                            '.$passengers['return_date'], " ",$passengers['return_time'].'
                        </td>
                        <td data-label="Маршрут">
                            '.$passengers['route'].'
                        </td>
                        <td data-label="Адрес подачи">
                            '.$passengers['filing_address'].'
                        </td>
                        <td data-label="Кол-во пассажиров">
                            '.$passengers['passengers_count'].'
                        </td>
                        <td data-label="Водитель">
                            '.$passengers['driver_sfl'].'
                        </td>
                        <td data-label="Статус">
                            '.$passengers['order_status'].'
                        </td>
                    </tr>';}?>
                </tbody>
            </table>
            <div id="testId">
                <p></p>
            </div>
        </div>
    </main>

    <footer>
        Copyright © Efimov IS-41 2022
    </footer>


    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit-icons.min.js"></script>
    <!-- bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Script -->
    <script src="../js/script.js"></script>
    <script src="../js/requests.js"></script>
</body>
</html>