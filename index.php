<?
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icn/MRSK-Logo.png" type="image/x-icon">
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/css/uikit.min.css" />
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.css">
    <title>«МРСК Урала»</title>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="#" class="header__logo__item">
                    <img src="icn/MRSK-Logo-Main.png" alt="site-logo" class="header__logo__item__img">
                </a>
                <p class="header__logo__description m-0 p-0">
                    Заявки на авто ОАО "МРСК Урала" <br> ОАО "МРСК Урала" - "Свердловэнерго"
                </p>
            </div>
            <nav class="header__nav">
                <ul class="p-0 m-0">
                    <li class="header__nav__option header__nav__autorize">
                        <?
                            if($_SESSION['autorized'] == true) {
                                echo "<a href='pages/admin.php ' class='admin__page__redirect button-color'>Панель Администратора</a>";
                            }
                            else {
                                echo '<button class="header__nav__option__item" uk-toggle="target: #adminAutorize" type="button">Авторизация</button>';
                            }
                        ?>
                        <!-- Autorize Modal -->
                        <div id="adminAutorize" uk-modal class="admin__autorize__modal">
                            <div class="uk-modal-dialog uk-modal-body admin__autorize__modal__window">
                                <h2>Авторизация</h2>
                                <div class="admin__autorize__form">
                                    <form action="php/requests/login.php" method="get" class="admin__autorize__form">
                                        <!-- login -->
                                        <input type="text" class="admin__autorize__form__input" placeholder="Имя пользователя" id="adminLogin" name="admin_login">
                                        <!-- passw -->
                                        <input type="password" class="admin__autorize__form__input" placeholder="Пароль" id="adminPassw" name="admin_password">
                                        <!-- Error Message -->
                                        <?
                                            if($_SESSION['data_error'] == true) {
                                                echo '<script type="text/javascript"> alert("Введены неверные данные!")</script>';
                                            }
                                            else {
                                                
                                            }
                                        ?>
                                        <!-- autorize -->
                                        <input type="submit" class="admin__autorize__modal__submit button-color" id="adminSubmit" value="Войти">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Main Content -->
    <main >
        <section class="delivery">
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
                    <a href="pages/order.php" class="delivery__variants__item delivery__variants__recept_btn">Оформить заявку</a>
                </ul>
                <ul class="uk-switcher">
                    <? require_once('php/requests/all_tables.php')?>
                    <!-- Пассажиры -->
                    <li class="uk-padding-remove passengers__wrapper">
                        <h3>Таблица "Пассажиры"</h3>
                        <table class="passengers__table">
                            <thead>
                              <tr>
                                <th hidden>ID</th>
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
                            <tbody class="main__tables__tbody">
                            <? foreach($passengers_line as $passengers) {
                                echo '
                              <tr>
                                <td data-label="ID" hidden>'
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
                                <td data-label="Дата и время подачи">
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
                    </li>
                    <!-- Грузы -->
                    <li class="uk-padding-remove cargo__wrapper">
                        <h3>Таблица "Грузы"</h3>
                        <table class="cargo__table">
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
                            <tbody>
                              <tr>
                                <td data-label="ID">3</td>
                                <td data-label="Марка Авто">Renault</td>
                                <td data-label="Гос номер авто">...</td>
                                <td data-label="Тип авто">Легковой</td>
                                <td data-label="Фио заявителя">...</td>
                                <td data-label="Дата и время подачи">21.10.2022 11:00</td>
                                <td data-label="Дата и время возврата">...</td>
                                <td data-label="Маршрут">НТУРЭС</td>
                                <td data-label="Адрес подачи">МРСК</td>
                                <td data-label="Кол-во пассажиров">2</td>
                                <td data-label="Водитель">Петров И.М.</td>
                                <td data-label="Статус">...</td>
                              </tr>
                            </tbody>
                        </table>
                    </li>
                    <!-- Грузоподъемные -->
                    <li class="uk-padding-remove lifting__wrapper">
                        <h3>Таблица "Грузоподъемные"</h3>
                        <table class="liftings__table">
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
                            <tbody>
                              <tr>
                                <td data-label="ID">3</td>
                                <td data-label="Марка Авто">Renault</td>
                                <td data-label="Гос номер авто">м345мр 196</td>
                                <td data-label="Тип авто">Легковой</td>
                                <td data-label="Фио заявителя">Марченко А.О.</td>
                                <td data-label="Дата и время подачи">21.10.2022 11:00</td>
                                <td data-label="Дата и время возврата">21.10.2022 15:34</td>
                                <td data-label="Маршрут">НТУРЭС</td>
                                <td data-label="Адрес подачи">МРСК</td>
                                <td data-label="Кол-во пассажиров">2</td>
                                <td data-label="Водитель">Петров И.М.</td>
                                <td data-label="Статус">Ожидание...</td>
                              </tr>
                              <tr>
                                <td data-label="ID">3</td>
                                <td data-label="Марка Авто">Renault</td>
                                <td data-label="Гос номер авто">м345мр 196</td>
                                <td data-label="Тип авто">Легковой</td>
                                <td data-label="Фио заявителя">Марченко А.О.</td>
                                <td data-label="Дата и время подачи">21.10.2022 11:00</td>
                                <td data-label="Дата и время возврата">21.10.2022 15:34</td>
                                <td data-label="Маршрут">НТУРЭС</td>
                                <td data-label="Адрес подачи">МРСК</td>
                                <td data-label="Кол-во пассажиров">2</td>
                                <td data-label="Водитель">Петров И.М.</td>
                                <td data-label="Статус">Ожидание...</td>
                              </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <footer>
        Copyright © Efimov IS-41 2022
    </footer>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/js/uikit-icons.min.js"></script>
    <!-- bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>
    <!-- Auto-Send Orders To Archive -->
    <script src="js/archive_auto_send.js"></script>
</body>
</html>