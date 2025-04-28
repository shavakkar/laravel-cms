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

    const loader = document.getElementById("loader");

    // <----- API START ----->

    var tabledata1 = [];

    // Specify the API endpoint for user data
    const apiUrl = "/MasterPanel/public/api/get-swm";

    fetch(apiUrl)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((protectedData) => {
            tabledata1 = [...protectedData];
            demo(tabledata1);
            loader.classList.add("hide");
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    // <----- API END ----->

    function demo(tabledata) {
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
                { title: "S.No", field: "id", sorter: "number" },
                { title: "Name", field: "name", sorter: "string" },
                {
                    title: "Browser",
                    field: "browser",
                    sorter: "string",
                    formatter: "textarea",
                },
                { title: "IP Address", field: "ip", sorter: "string" },
                { title: "Datetime", field: "datetime", sorter: "string" },
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
                    title: "Report", //add title to report
                });
            });
    }
})();
