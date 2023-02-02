$(document).ready(function() {
        /*
            ORDER PAGE
        */
    // Display None Spinner & Toast
    let spinner = $('#spinnerBlock');
    let toast = $('#liveToast');
    let body = $('body');
    spinner.css({'display': 'flex', 'visibility': 'hidden'});
    toast.css({'display': 'block', 'visibility': 'hidden'});
        /*
            SPINNER AND TOAST FUNC
        */
    // Show Circle
    function showWindowCircle() {
        spinner.css('visibility', 'visible');
        body.css('overflow-y', 'hidden');
    }
    function hideWindowCircle() {
        spinner.css('visibility', 'hidden');
        body.css('overflow-y', 'visible');
    }
    // Show Toast
    function showToastFine() {
        toast.css('visibility', 'visible');
        $('#reguestImg').attr("src", "../icn/accept.png");
        $('#requestType').html("Успех!");
        $("#requestMessage").html("Ваша заявка успешно создана!");
    }
    function showToastWrong() {
        toast.css('visibility', 'visible');
        $('#reguestImg').attr("src", "../icn/error.png");
        $("#requestType").html("Ошибка!");
        $("#requestMessage").html("Что-то пошло не так! Проверьте правильность введенных данных!");
    }
    function hideToast() {
        toast.css('visibility', 'hidden');
    }
        /*
            START FUNCS WHEN BUTTONS CLICK
        */
    // Passengers 'Send' Btn Click
    $('#orderSendBtn').on('click', function() {
        let carMark = $('#carMark').val();
        let carNumb = $('#carNumb').val();
        let carType = $('#carType').val();
        let driverSFL = $('#driverSFL').val();
        let orderDate = $('#orderDate').val();
        let orderTime = $('#orderTime').val();
        let returnDate = $('#returnDate').val();
        let returnTime = $('#returnTime').val();
        let routePlace = $('#routePlace').val();
        let routeAddr = $('#routeAddr').val();
        let passCount = $('#passCount').val();
        let driver = $('#driver').val();
        // timeout of showing elements
        setTimeout(showWindowCircle, 0);
        setTimeout(hideWindowCircle, 2000);
        if(driverSFL == '' && driver == '') {
            setTimeout(showToastWrong, 2100);
        }
        else {
            setTimeout(showToastFine, 2100);
        }
        setTimeout(hideToast, 4200);
    });
    // Cargo 'Send' Btn Click
    $('#orderSendBtnCarg').on('click', function() {
        let carMark = $('#carMarkCarg').val();
        let carNumb = $('#carNumbCarg').val();
        let carType = $('#carTypeCarg').val();
        let driverSFL = $('#driverSFLCarg').val();
        let orderDate = $('#orderDateCarg').val();
        let orderTime = $('#orderTimeCarg').val();
        let returnDate = $('#returnDateCarg').val();
        let returnTime = $('#returnTimeCarg').val();
        let routePlace = $('#routePlaceCarg').val();
        let routeAddr = $('#routeAddrCarg').val();
        let passCount = $('#passCountCarg').val();
        let driver = $('#driverCarg').val();
        // timeout of showing elements
        setTimeout(showWindowCircle, 0);
        setTimeout(hideWindowCircle, 2000);
        if(driverSFL == '' && driver == '') {
            setTimeout(showToastWrong, 2100);
        }
        else {
            setTimeout(showToastFine, 2100);
        }
        setTimeout(hideToast, 4200);
    });
    // Liftings 'Send' Btn Click
    $('#orderSendBtnLift').on('click', function() {
        let carMark = $('#carMarkLift').val();
        let carNumb = $('#carNumbLift').val();
        let carType = $('#carTypeLift').val();
        let driverSFL = $('#driverSFLLift').val();
        let orderDate = $('#orderDateLift').val();
        let orderTime = $('#orderTimeLift').val();
        let returnDate = $('#returnDateLift').val();
        let returnTime = $('#returnTimeLift').val();
        let routePlace = $('#routePlaceLift').val();
        let routeAddr = $('#routeAddrLift').val();
        let passCount = $('#passCountLift').val();
        let driver = $('#driverLift').val();
        // timeout of showing elements
        setTimeout(showWindowCircle, 0);
        setTimeout(hideWindowCircle, 2000);
        if(driverSFL == '' && driver == '') {
            setTimeout(showToastWrong, 2100);
        }
        else {
            setTimeout(showToastFine, 2100);
        }
        setTimeout(hideToast, 4200);
    });
        /*
            ADMIN PAGE
        */
    // redirect to archive page
    $('#adminArchive').on('click', function() {
        location.href='archive.php';
    })
})