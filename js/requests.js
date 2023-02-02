$(document).ready(function() {
    // Remove Inputs Attributes
    
        // Insert Order To 'Passengers'
    $('#orderSendBtn').on('click', function() {
        let carBrand = $('#carMark').val();
        let carNumber = $('#carNumb').val();
        let carType = $('#carType').val();
        let declarerSFL = $('#driverSFL').val();
        let filDate = $('#orderDate').val();
        let filTime = $('#orderTime').val();
        let retDate = $('#returnDate').val();
        let retTime = $('#returnTime').val();
        let route = $('#routePlace').val();
        let routeAddr = $('#routeAddr').val();
        let passCount = $('#passCount').val();
        let driverSFL = $('#driver').val();
        // request
        $.ajax({
            method: "POST",
            url: '../php/requests/passengers.php',
            data: {cBrand: carBrand, cNumb: carNumber, cType: carType, dSFL: declarerSFL, fDate: filDate, fTime: filTime, rDate: retDate, rTime: retTime, route: route, fAddr: routeAddr, pCount: passCount, dSFL: driverSFL}
        });
    });
});
// Add Lists to Archive
let tableRows = document.body.querySelectorAll('.tables-row');
tableRows.forEach((row) => {
    row.addEventListener('click', (e) => {
        let link = e.target;
        switch (link.dataset.btnAction) {
            // If Clicked 'Archive' Btn
            case "check":
                if (link.checked) {
                    // Selected List Id
                    let listId = link.closest(".tables-row").querySelector("input[name=orderIds]");
                    row.setAttribute('data-row-hide', 'hidden');
                    // Добавление выбранной записи в архив
                    $.ajax({
                        method: "POST",
                        url: "../php/requests/move_archive.php",
                        data: {list_Id: listId.value},
                        success: location.href = 'admin.php'
                    })
                }
                break;
            // If Clicked 'Redact' Btn
            case "click":
                if(link.click) {
                    let redactBtn = link.closest(".tables-row").querySelector(".admin__redact__btn");
                    $(redactBtn).css('display', 'none');
                }
                let carBr = link.closest(".tables-row").querySelector("input[name=carBrand]").removeAttribute('hidden');
                let carNum = link.closest(".tables-row").querySelector("input[name=carNumb]").removeAttribute('hidden');
                let carType = link.closest(".tables-row").querySelector("input[name=carType]").removeAttribute('hidden');
                let decSFL = link.closest(".tables-row").querySelector("input[name=declarSFL]").removeAttribute('hidden');
                let filDate = link.closest(".tables-row").querySelector("input[name=filDate]").removeAttribute('hidden');
                let filTime = link.closest(".tables-row").querySelector("input[name=filTime]").removeAttribute('hidden');
                let retDate = link.closest(".tables-row").querySelector("input[name=retDate]").removeAttribute('hidden');
                let retTime = link.closest(".tables-row").querySelector("input[name=retTime]").removeAttribute('hidden');
                let route = link.closest(".tables-row").querySelector("input[name=route]").removeAttribute('hidden');
                let filAddr = link.closest(".tables-row").querySelector("input[name=filAddr]").removeAttribute('hidden');
                let pasCount = link.closest(".tables-row").querySelector("input[name=passCount]").removeAttribute('hidden');
                let driver = link.closest(".tables-row").querySelector("input[name=driverSFL]").removeAttribute('hidden');
                let stat = link.closest(".tables-row").querySelector("input[name=ordStat]").removeAttribute('hidden');
                let acceptBtn = link.closest(".tables-row").querySelector(".admin__accept__btn").removeAttribute('hidden');
                break;
            // If Clicked 'Accept' Btn
            case "accept":
                if(link.click){
                    let carBr = link.closest(".tables-row").querySelector("input[name=carBrand]");
                    let carNum = link.closest(".tables-row").querySelector("input[name=carNumb]");
                    let carType = link.closest(".tables-row").querySelector("input[name=carType]");
                    let decSFL = link.closest(".tables-row").querySelector("input[name=declarSFL]");
                    let filDate = link.closest(".tables-row").querySelector("input[name=filDate]");
                    let filTime = link.closest(".tables-row").querySelector("input[name=filTime]");
                    let retDate = link.closest(".tables-row").querySelector("input[name=retDate]");
                    let retTime = link.closest(".tables-row").querySelector("input[name=retTime]");
                    let route = link.closest(".tables-row").querySelector("input[name=route]");
                    let filAddr = link.closest(".tables-row").querySelector("input[name=filAddr]");
                    let pasCount = link.closest(".tables-row").querySelector("input[name=passCount]");
                    let driver = link.closest(".tables-row").querySelector("input[name=driverSFL]");
                    let stat = link.closest(".tables-row").querySelector("input[name=ordStat]");
                    let acceptBtn = link.closest(".tables-row").querySelector(".admin__accept__btn");
                    let Id = link.closest(".tables-row").querySelector("input[name=orderIds]");
                    $.ajax({
                        method: "POST",
                        url: 'requests/update_table.php',
                        data: {carBrand: carBr.value, carNumb: carNum.value, carType: carType.value, declrSFL: decSFL.value, filDate: filDate.value, filTime: filTime.value, retDate: retDate.value, retTime: retTime.value, route: route.value, filAddr: filAddr.value, passCount: pasCount.value, drSFL: driver.value, status: stat.value, listId: Id.value},
                        success: location.href = "admin.php"
                    })
                }
                break;
        }
    });
});
// Очистка таблицы
$("#clearTable").on('click', function() {
    $.ajax({
        method: "GET",
        url: 'requests/clear_table.php',
        success: location.href = 'admin.php'
    })
});
    /*
        ARCHIVE
    */ 
// Find With 'Date'
$("#dateFindBtn").on('click', function() {
    let filingDate = $("input[name=dateFind]").val();
    $.ajax({
        method: "POST",
        url: "requests/archive_sort.php",
        data: {filDate: filingDate},
        success: (res)=> {
            $(".archive__main_table").remove();
            $(".archive__table__body").html(res);
        }
    });
})
// Find With 'Date to Date'
$("#dateRangeBtn").on('click', function() {
    let dateStart = $("input[name=dateStart]").val();
    let dateEnd = $("input[name=dateEnd]").val();
    $.ajax({
        method: "POST",
        url: "requests/archive_sort.php",
        data: {startDate: dateStart, endDate: dateEnd},
        success: (res)=> {
            $(".archive__main_table").remove();
            $(".archive__table__body").html(res);
        }
    });
})
//Find With 'Declr SFL'
$("#declarSFLFindBtn").on('click', function() {
    let declSFL = $("input[name=driverSFL]").val();
    $.ajax({
        method: "POST",
        url: "requests/archive_sort.php",
        data: {declarer_sfl: declSFL},
        success: (res)=> {
            $(".archive__main_table").remove();
            $(".archive__table__body").html(res);
        }
    });
})
// Clear Archive
$("#archiveClear").on('click', function(){
    $.ajax({
        method: "POST",
        url: "requests/archive_clear.php",
        success: location.href='archive.php'
    })
})