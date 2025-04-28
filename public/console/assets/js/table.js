(function () {
    "use strict";
    /* Start::Choices JS */
    document.addEventListener("DOMContentLoaded", function () {
        var genericExamples = document.querySelectorAll("[data-trigger]");
        for (let i = 0; i < genericExamples.length; ++i) {
            var element = genericExamples[i];
            new Choices(element, {
                allowHTML: false,
            });
        }
    });

    //define data
    var tabledata = [
        {
            id: 1,
            name: "Tiger Jackson",
            "IP Address": "System Designer",
            Datetime: 41,
        },
        {
            id: 2,
            name: "Vadett Summers",
            "IP Address": "UI Developer",
            Datetime: 28,
        },
        {
            id: 3,
            name: "Lisbon Mox",
            "IP Address": "Junior Lecturer",
            Datetime: 45,
        },
        {
            id: 4,
            name: "Medric Belly",
            "IP Address": "Javascript Developer",
            Datetime: 25,
        },
        {
            id: 5,
            name: "Ayri Satovu",
            "IP Address": "Senior Engineer",
            Datetime: 25,
        },
        {
            id: 6,
            name: "Billie William",
            "IP Address": "Software Engineer",
            Datetime: 52,
        },
        {
            id: 7,
            name: "Merrod Sailor",
            "IP Address": "Sales Assosiative",
            Datetime: 35,
        },
        {
            id: 8,
            name: "Khona David",
            "IP Address": "DBMS Engineer",
            Datetime: 25,
        },
        {
            id: 9,
            name: "Coolio Hornet",
            "IP Address": "Angular Developer",
            Datetime: 39,
        },
        {
            id: 10,
            name: "Sonia Fraust",
            "IP Address": "Software Developer",
            Datetime: 32,
        },
        {
            id: 11,
            name: "Jennie Lora",
            "IP Address": "Bank ManDatetimer",
            Datetime: 45,
        },
        {
            id: 12,
            name: "Flynn Hank",
            "IP Address": "Cloud Developer",
            Datetime: 25,
        },
        {
            id: 13,
            name: "Ricky Martin",
            "IP Address": "React Developer",
            Datetime: 48,
        },
        {
            id: 14,
            name: "Halsey Kep",
            "IP Address": "Marketing Executive",
            Datetime: 26,
        },
        {
            id: 15,
            name: "Alaric Saltzman",
            "IP Address": "History Teacher",
            Datetime: 32,
        },
        {
            id: 16,
            name: "Katherina Kat",
            "IP Address": "Event Planner",
            Datetime: 57,
        },
        {
            id: 17,
            name: "Paulson Pal",
            "IP Address": "Data Analyst",
            Datetime: 23,
        },
        {
            id: 18,
            name: "Glory Sam",
            "IP Address": "System Administrator",

            Datetime: 32,
        },
        {
            id: 19,
            name: "Bradley Cooper",
            "IP Address": "Civil Engineer",
            Datetime: 26,
        },
        {
            id: 20,
            name: "Keera Dsoa",
            "IP Address": "Cloud Developer",
            Datetime: 53,
        },
        {
            id: 21,
            name: "Alia Max",
            "IP Address": "Project Manager",
            Datetime: 26,
        },
        {
            id: 22,
            name: "Yuri Gagarin",
            "IP Address": "Data Scientist",
            Datetime: 42,
        },
        {
            id: 23,
            name: "cisaro Pals",
            "IP Address": "Sales Executive",
            Datetime: 25,
        },
        {
            id: 24,
            name: "Amberson Pet",
            "IP Address": "Sales Manager",
            Datetime: 25,
        },
        {
            id: 25,
            name: "peter Parker",
            "IP Address": "Piolet",
            Datetime: 24,
        },
    ];

    //Download Data from Tabulator
    //Build Tabulator
    var table = new Tabulator("#download-table", {
        width: 100,
        minWidth: 40,
        layout: "fitColumns",
        pagination: "local",
        paginationSize: 10,
        paginationSizeSelector: [5, 10, 15, 20, 25],
        paginationCounter: "rows",
        movableColumns: true,
        reactiveData: true, //turn on data reactivity
        data: tabledata, //load data into table
        columns: [
            { title: "Name", field: "name", sorter: "string" },
            { title: "IP Address", field: "IP Address", sorter: "string" },
            { title: "Datetime", field: "Datetime", sorter: "number" },
        ],
    });

    //trigger download of data.csv file
    document
        .getElementById("download-csv")
        .addEventListener("click", function () {
            table.download("csv", "data.csv");
        });

    //trigger download of data.xlsx file
    document
        .getElementById("download-xlsx")
        .addEventListener("click", function () {
            table.download("xlsx", "data.xlsx", { sheetName: "My Data" });
        });

    //trigger download of data.pdf file
    document
        .getElementById("download-pdf")
        .addEventListener("click", function () {
            table.download("pdf", "data.pdf", {
                orientation: "portrait", //set page orientation to portrait
                title: "Example Report", //add title to report
            });
        });

    //trigger download of data.html file
    document
        .getElementById("download-html")
        .addEventListener("click", function () {
            table.download("html", "data.html", { style: true });
        });

    document.querySelector("#switcher-rtl").addEventListener("click", () => {
        document.querySelectorAll(".tabulator").forEach((ele) => {
            ele.classList.add("tabulator-rtl");
        });
    });

    document.querySelector("#switcher-ltr").addEventListener("click", () => {
        document.querySelectorAll(".tabulator").forEach((ele) => {
            ele.classList.remove("tabulator-rtl");
        });
    });

    document.querySelector("#reset-all").addEventListener("click", () => {
        document.querySelectorAll(".tabulator").forEach((ele) => {
            ele.classList.remove("tabulator-rtl");
        });
    });
})();
