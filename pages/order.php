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
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.3/dist/css/uikit.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Создание заявки</title>
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
            <!-- <nav class="header__nav">
                <form action="" method="get">
                    <ul class="p-0 m-0">
                        <li class="header__nav__option header__nav__autorize">
                            <input type='submit' class="header__nav__option__item button-color" name='admin_logout' value="Выход">
                        </li>
                    </ul>
                </form>
            </nav> -->
        </div>
    </header>
    <!-- main content -->
    <main>
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
                </ul>
                <ul class="uk-switcher">
                    <!-- Пассажиры -->
                    <li class="uk-padding-remove passengers__wrapper order__wrapper">
                        <div class="orders">
                            <div class="orders__top p-0">
                                <h2>Заявка на пассажиров</h2>
                            </div>
                            <!-- Car & Driver Info -->
                            <div class="orders__car_info orders__content">
                                <!-- car mark -->
                                <label for="carMark">Марка автомобиля:</label>
                                <input type='text' name="carMark" id="carMark">
                                <!-- car number -->
                                <label for="carNumb">Гос. номер автомобиля:</label>
                                <input type="text" id="carNumb">
                                <!-- car type -->
                                <label for="carType">Тип автомобиля:</label>
                                <select name="carType" id="carType">
                                    <option value="Легковой">Легковой</option>
                                    <option value="Грузовой">Грузовой</option>
                                </select>
                                <!-- SFL driver -->
                                <label for="driverSFL">ФИО заявителя:</label>
                                <input type="text" id="driverSFL">
                            </div>
                            <!-- Order Time -->
                            <div class="orders__order-time orders__content">
                                <div class="orders__order-time_top p-0">
                                    <h3>Дата и время подачи</h3>
                                </div>
                                <div class="orders__order-time_content p-0">
                                    <!-- Date -->
                                    <label for="orderDate">Дата</label>
                                    <input type="date" name="orderDate" id="orderDate">
                                    <!-- Time -->
                                    <label for="orderTime">Время</label>
                                    <input type="time" name="orderTime" id="orderTime">
                                </div>
                            </div>
                            <!-- Return Time -->
                            <div class="orders__return-time orders__content">
                                <div class="orders__return-time_top p-0">
                                    <h3>Дата и время возврата</h3>
                                </div>
                                <div class="orders__return-time_content p-0">
                                    <!-- Date -->
                                    <label for="returnDate">Дата</label>
                                    <input type="date" name="returnDate" id="returnDate">
                                    <!-- Time -->
                                    <label for="returnTime">Время</label>
                                    <input type="time" name="returnTime" id="returnTime">
                                </div>
                            </div>
                            <!-- Route -->
                            <div class="orders__route orders__content">
                                <!-- Route Place -->
                                <label for="routePlace">Маршрут:</label>
                                <input type="text" id="routePlace">
                                <!-- Route Address -->
                                <label for="routeAddr">Адрес:</label>
                                <input type="text" id="routeAddr">
                                <!-- Passengers Count -->
                                <label for="passCount">Количество пассажиров:</label>
                                <input type="number" id="passCount">
                                <!-- Driver -->
                                <label for="driver">Водитель:</label>
                                <input type="text" id="driver">
                                <!-- Send -->
                                
                            </div>
                            <button class="orders__send" name="orders__send" id="orderSendBtn">Отправить</button>
                        </div>
                    </li>
                    <!-- Грузы -->
                    <li class="uk-padding-remove cargo__wrapper order__wrapper">
                        <div class="orders">
                            <div class="orders__top p-0">
                                <h2>Заявка на грузы</h2>
                            </div>
                            <!-- Car & Driver Info -->
                            <div class="orders__car_info orders__content">
                                <!-- car mark -->
                                <label for="carMarkCarg">Марка автомобиля:</label>
                                <input type='text' name="carMarkCarg" id="carMarkCarg">
                                <!-- car number -->
                                <label for="carNumbCarg">Гос. номер автомобиля:</label>
                                <input type="text" id="carNumbCarg">
                                <!-- car type -->
                                <label for="carTypeCarg">Тип автомобиля:</label>
                                <select name="carTypeCarg" id="carTypeCarg">
                                    <option value="Легковой">Легковой</option>
                                    <option value="Грузовой">Грузовой</option>
                                </select>
                                <!-- SFL driver -->
                                <label for="driverSFLCarg">ФИО заявителя:</label>
                                <input type="text" id="driverSFLCarg">
                            </div>
                            <!-- Order Time -->
                            <div class="orders__order-time orders__content">
                                <div class="orders__order-time_top p-0">
                                    <h3>Дата и время подачи</h3>
                                </div>
                                <div class="orders__order-time_content p-0">
                                    <!-- Date -->
                                    <label for="orderDateCarg">Дата</label>
                                    <input type="date" name="orderDateCarg" id="orderDateCarg">
                                    <!-- Time -->
                                    <label for="orderTime">Время</label>
                                    <input type="time" name="orderTimeCarg" id="orderTimeCarg">
                                </div>
                            </div>
                            <!-- Return Time -->
                            <div class="orders__return-time orders__content">
                                <div class="orders__return-time_top p-0">
                                    <h3>Дата и время возврата</h3>
                                </div>
                                <div class="orders__return-time_content p-0">
                                    <!-- Date -->
                                    <label for="returnDateCarg">Дата</label>
                                    <input type="date" name="returnDateCarg" id="returnDateCarg">
                                    <!-- Time -->
                                    <label for="returnTimeCarg">Время</label>
                                    <input type="time" name="returnTimeCarg" id="returnTimeCarg">
                                </div>
                            </div>
                            <!-- Route -->
                            <div class="orders__route orders__content">
                                <!-- Route Place -->
                                <label for="routePlaceCarg">Маршрут:</label>
                                <input type="text" id="routePlaceCarg">
                                <!-- Route Address -->
                                <label for="routeAddrCarg">Адрес:</label>
                                <input type="text" id="routeAddrCarg">
                                <!-- Passengers Count -->
                                <label for="passCountCarg">Количество пассажиров:</label>
                                <input type="number" id="passCountCarg">
                                <!-- Driver -->
                                <label for="driverCarg">Водитель:</label>
                                <input type="text" id="driverCarg">
                                <!-- Send -->
                                
                            </div>
                            <button class="orders__send" name="orders__sendCarg" id="orderSendBtnCarg">Отправить</button>
                        </div>
                    </li>
                    <!-- Грузоподъемные -->
                    <li class="uk-padding-remove lifting__wrapper order__wrapper">
                        <div class="orders">
                            <div class="orders__top p-0">
                                <h2>Заявка на грузоподъемные</h2>
                            </div>
                            <!-- Car & Driver Info -->
                            <div class="orders__car_info orders__content">
                                <!-- car mark -->
                                <label for="carMarkLift">Марка автомобиля:</label>
                                <input type='text' name="carMarkLift" id="carMarkLift">
                                <!-- car number -->
                                <label for="carNumbLift">Гос. номер автомобиля:</label>
                                <input type="text" id="carNumbLift">
                                <!-- car type -->
                                <label for="carTypeLift">Тип автомобиля:</label>
                                <select name="carTypeLift" id="carTypeLift">
                                    <option value="Легковой">Легковой</option>
                                    <option value="Грузовой">Грузовой</option>
                                </select>
                                <!-- SFL driver -->
                                <label for="driverSFLLift">ФИО заявителя:</label>
                                <input type="text" id="driverSFLLift">
                            </div>
                            <!-- Order Time -->
                            <div class="orders__order-time orders__content">
                                <div class="orders__order-time_top p-0">
                                    <h3>Дата и время подачи</h3>
                                </div>
                                <div class="orders__order-time_content p-0">
                                    <!-- Date -->
                                    <label for="orderDateLift">Дата</label>
                                    <input type="date" name="orderDateLift" id="orderDateLift">
                                    <!-- Time -->
                                    <label for="orderTimeLift">Время</label>
                                    <input type="time" name="orderTimeLift" id="orderTimeLift">
                                </div>
                            </div>
                            <!-- Return Time -->
                            <div class="orders__return-time orders__content">
                                <div class="orders__return-time_top p-0">
                                    <h3>Дата и время возврата</h3>
                                </div>
                                <div class="orders__return-time_content p-0">
                                    <!-- Date -->
                                    <label for="returnDateLift">Дата</label>
                                    <input type="date" name="returnDateLift" id="returnDateLift">
                                    <!-- Time -->
                                    <label for="returnTimeLift">Время</label>
                                    <input type="time" name="returnTimeLift" id="returnTimeLift">
                                </div>
                            </div>
                            <!-- Route -->
                            <div class="orders__route orders__content">
                                <!-- Route Place -->
                                <label for="routePlaceLift">Маршрут:</label>
                                <input type="text" id="routePlaceLift">
                                <!-- Route Address -->
                                <label for="routeAddrLift">Адрес:</label>
                                <input type="text" id="routeAddrLift">
                                <!-- Passengers Count -->
                                <label for="passCountLift">Количество пассажиров:</label>
                                <input type="number" id="passCountLift">
                                <!-- Driver -->
                                <label for="driverLift">Водитель:</label>
                                <input type="text" id="driverLift">
                                <!-- Send -->
                                
                            </div>
                            <button class="orders__send" name="orders__sendLift" id="orderSendBtnLift">Отправить</button>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Spinner -->
        <div class="circle-main-screen" id="spinnerBlock">
            <div class="spinner-border p-0" role="status">
                <span class="visually-hidden">Подождите...</span>
            </div>
        </div>
        <!-- Toast -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <!-- Img -->
                <img src="" class="rounded me-2 me-1 toast__img" alt="error-img" id="reguestImg">
                <!-- Text -->
                <strong class="me-auto toast__info" id="requestType">Успех!</strong>
                <small><?date_default_timezone_set('Asia/Yekaterinburg'); echo date('H:i')?></small>
              </div>
              <!-- Content -->
              <div class="toast-body toast__message" id="requestMessage">
                Ваша заявка успешно создана!
              </div>
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