/*
$("#RouteSheet").on('click', function() {
    // Document
    pdfMake.fonts = {
        Roboto: {
            normal: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-normal.woff',
            bold: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-normal.woff',
            italics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-italic.woff',
            bolditalics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-italic.woff'
        }
    }
    let currDate = "10.11.2022";
    let dispSFL = "Ефимов Денис Эдуардович";
    let leader = "Иванов Иван Иванович";
    let test = $("input[name=orderIds]").val();
    console.log(test);
    let arr = [["N п/п","Наименование организации","Адрес","Транспорт, подтверждающий расходы документ", "Точка отправления", "Время отправления", "Точка прибытия", "Время прибытия", "Время в пути", "Цель поездки", "Подтверждающий документ", "Подпись принимающей стороны"]];
    let arr2 = [[test,test,test,test, test, test, test, test, test, test, test, test]];
    let dd = {
        info: {
            title: 'Маршрутный лист',
            author: 'Denisto',
            subject: 'Маршрутный лист МРСК-Урала',
            keywords: 'Официальный сайт: rosseti-ural.ru'
        },
        pageSize: {
            width: 1200,
            height: 'auto'
        },
        pageMargins: [20, 20, 20, 30],
        watermark: {text: 'mrsk-ural', angle: 35, opacity: 0.1, fontSize: 20},
        alignment: 'center',
        content: [
            // title
            {text: 'МАРШРУТНЫЙ ЛИСТ', style: 'header', alignment: "center", margin: [0, 0, 20, 10], bold: true},
            // company
            {text: "МРСК Урала", alignment: 'center', margin: [0, 2, 0, 10]},
            // sheet date
            {text: "На " + currDate, alignment: 'center', margin: [0, 2, 0, 10], bold: true},
            // dispatcher
            {text: "Диспетчер: " + dispSFL, alignment: "center", margin: [0, 10, 0, 10]},
            // table
            {
                table: {
                    body: 
                        arr.map(function(item){
                            return item.map(function(arr2){
                                return {text:arr2}
                            });
                        })
                }
            },
            // footer
            // leader
            {text: "Руководитель: " + leader, alignment: "left", margin: [60, 20, 0, 10]},
            // director sfl
            {text: "ФИО                    Директор МРСК Урала", alignment:'left', margin: [60, 10, 0, 10]},
            // director sfl place
            {text: "............................/...................................................................", alignment: 'left', margin: [60, -5, 0, 10]},
            // Mark and sfl
            {text: "(подпись)             (должность, Ф.И.О)", alignment: 'left', margin: [60, -5, 0, 10]}
        ]
    };
    pdfMake.createPdf(dd).open();
    //pdfMake.createPdf(dd).download(patientSName + ' ' + firstLeName + '. ' + firstLeLName + ' Талон(' + receptDate + ').pdf');
})
*/
$("#RouteSheet").on('click', function() {
    let externalDataRetrievedFromServer;
    let l = $("input[name=testInp").val();
    for(let i = 0; i < 10; i++) {
        externalDataRetrievedFromServer = (
            l
        );
    }

function buildTableBody(data, columns) {
let body = [];

    body.push(columns);

    data.forEach(function(row) {
    let dataRow = [];

        columns.forEach(function(column) {
            dataRow.push(row[column].toString());
        })

        body.push(dataRow);
    });

    return body;
}

function table(data, columns) {
    return {
        table: {
            headerRows: 1,
            body: buildTableBody(data, columns)
        }
    };
}
pdfMake.fonts = {
    Roboto: {
        normal: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-normal.woff',
        bold: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-normal.woff',
        italics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-italic.woff',
        bolditalics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-italic.woff'
    }
}
let dd = {
    content: [
        { text: 'Dynamic parts', style: 'header' },
        table(externalDataRetrievedFromServer, ['name', 'age'])
    ]
}
pdfMake.createPdf(dd).open();

});