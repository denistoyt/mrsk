
let getTableData = document.body.querySelectorAll('.tables-row');
getTableData.forEach((row) => {
    row.addEventListener('click', (e) => {
        let link = e.target;
        switch (link.dataset.btnAction) {
            // If Clicked 'Archive' Btn
            case "download":
                if (link.click) {
                    // Variables
                    let carBrandWB = link.closest(".tables-row").querySelector("input[name=carBrand]");
                    let carNumbWB = link.closest(".tables-row").querySelector("input[name=carNumb]");
                    let carTypeWB = link.closest(".tables-row").querySelector("input[name=carType]");
                    // Вставка типа автомобиля
                        let bigSmCar = "";
                        if(carTypeWB.value == 'Легковой') {
                            bigSmCar += "ЛЕГКОВОГО";
                        }
                        else if(carTypeWB.value == 'Грузовой'){
                            bigSmCar += "ГРУЗОВОГО";
                        };
                    let declSFLWB = link.closest(".tables-row").querySelector("input[name=declarSFL]");
                    let filDateWB = link.closest(".tables-row").querySelector("input[name=filDate]");
                    let filTimeWB = link.closest(".tables-row").querySelector("input[name=filTime]");
                    let filRightDate = filDateWB.value.substring(8, 10) + "." + filDateWB.value.substring(5, 7) + "." + filDateWB.value.substring(0, 4);
                    let addrWB = link.closest(".tables-row").querySelector("input[name=filAddr]");
                    let drivWB = link.closest(".tables-row").querySelector("input[name=driverSFL]");
                    // Document
                    pdfMake.fonts = {
                        Roboto: {
                            normal: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-normal.woff',
                            bold: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-normal.woff',
                            italics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-300-italic.woff',
                            bolditalics: 'https://cdn.jsdelivr.net/npm/@fontsource/montserrat@4.5.13/files/montserrat-all-500-italic.woff'
                        }
                    }
                    let dd = {
                        info: {
                            title: 'Путевой лист',
                            author: 'Denisto',
                            subject: 'Путевой лист МРСК-Урала',
                            keywords: 'Официальный сайт: rosseti-ural.ru'
                        },
                        pageSize: {
                            width: 795.28,
                            height: 510
                        },
                        pageMargins: [20, 10, 20, 10],
                        watermark: {text: 'mrsk-ural', angle: 35, opacity: 0.1, fontSize: 20},
                        alignment: 'center',
                        content: [
                                // Шапка документа
                            {
                                text: 'ПУТЕВОЙ ЛИСТ ' + bigSmCar +  ' АВТОМОБИЛЯ',
                                fontSize: 20,
                                alignment: 'center',
                                margin: [20, 10, 20, 20]
                            },
                                // Данные о фирме
                            {
                                fontSize: 16,
                                alignment: 'left',
                                margin: [60, 0, 0, 0],
                                text: '<<   >>                 2022г.'
                            },
                            {
                                fontSize: 14,
                                alignment: 'left',
                                margin: [150, 10, 0, 30],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Организация'
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'left',
                                        text: 'ООО "МРСК-Урала", г. Екатеринбург, ул. Мамина-Сибиряка, стр. 140',
                                        bold: false
                                    }
                                ],
                                columnGap: 92,
                            },
                            // Подписи к организации
                            {
                                fontSize: 10,
                                alignment: 'center',
                                margin: [70, -25, 0, 10],
                                text: 'наименование, адрес',
                                italics: true
                            },
                            {
                                fontSize: 12,
                                alignment: 'center',
                                margin: [90, -35, 0, 20],
                                text: '____________________________________'
                            },
                                // марка авто
                            {
                                fontSize: 16,
                                alignment: 'center',
                                margin: [156, 0, 0, 10],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Марка и модель автомобиля'
                                    },
                                    {
                                        width: '220',
                                        alignment: 'left',
                                        text: carBrandWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 72,
                            },
                            // Номер авто
                            {
                                fontSize: 16,
                                alignment: 'center',
                                margin: [156, 0, 0, 30],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Гос. номер'
                                    },
                                    {
                                        width: '220',
                                        alignment: 'left',
                                        text: carNumbWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 40,
                            },
                                // Тип авто
                            {
                                fontSize: 16,
                                alignment: 'center',
                                margin: [156, 0, 0, 10],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Тип авто'
                                    },
                                    {
                                        width: '220',
                                        alignment: 'left',
                                        text: carTypeWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 60,
                            },
                            // Водитель
                            {
                                fontSize: 16,
                                alignment: 'center',
                                margin: [156, 0, 0, 10],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Водитель'
                                    },
                                    {
                                        width: '220',
                                        alignment: 'left',
                                        text: drivWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 49,
                            },
                            // Предрейс
                            {
                                width: 20,
                                fontSize: 14,
                                alignment: 'left',
                                margin: [190, 10, 0, 20],
                                text: 'Предрейсовый контроль технического состояния\n транспортного средства провел',
                                bold: true
                            },
                            // Адрес
                            {
                                fontSize: 16,
                                alignment: 'end',
                                margin: [190, 0, 0, 10],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Адрес'
                                    },
                                    {
                                        width: '220',
                                        alignment: 'end',
                                        text: addrWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 97,
                            },
                            // Дата
                            {
                                fontSize: 16,
                                alignment: 'end',
                                margin: [190, 0, 0, 10],
                                columns: [
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'Дата'
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'end',
                                        text: filRightDate + "г.",
                                        bold: true
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'end',
                                        text: "Время",
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'end',
                                        text: filTimeWB.value,
                                        bold: true
                                    },
                                ],
                                columnGap: 47,
                            },
                            // Предрейс поля
                            {
                                fontSize: 16,
                                alignment: 'end',
                                margin: [190, 0, 0, 10],
                                columns: [
                                    {
                                        width: 147,
                                        alignment: 'end',
                                        text: 'Подпись',
                                        bold: true
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'center',
                                        text: 'ФИО'
                                    },
                                    {
                                        width: 'auto',
                                        alignment: 'end',
                                        text: declSFLWB.value,
                                        bold: true
                                    }
                                ],
                                columnGap: 77,
                            },
                        ],
                    };
                    pdfMake.createPdf(dd).open();
                    //pdfMake.createPdf(dd).download(patientSName + ' ' + firstLeName + '. ' + firstLeLName + ' Талон(' + receptDate + ').pdf');
                }
                break;
        }
    });
});

