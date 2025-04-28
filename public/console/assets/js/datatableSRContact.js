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

    var tabledata1 = [];

    // Specify the API endpoint for user data
    const apiUrl = "/getContact";

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
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    function demo(tabledata) {
        //Download Data from Tabulator
        //Build Tabulator
        var table = new Tabulator("#basic-table", {
            layout: "fitColumns",
            pagination: "local",
            paginationSize: 10,
            paginationSizeSelector: [5, 10, 15, 20, 25],
            paginationCounter: "rows",
            movableColumns: true,
            reactiveData: true, //turn on data reactivity
            data: tabledata, //load data into table
            columns: [
                {
                    title: "S.No",
                    field: "id",
                    width: 130,
                },
                {
                    title: "Name",
                    field: "name",
                },
                {
                    title: "Email",
                    field: "email",
                },
                {
                    title: "Mobile",
                    field: "mobile",
                    // formatter: function (cell) {
                    //     var mobile = cell.getRow(cell).getData().mobile;

                    //     const spanTag = document.createElement("span");
                    //     spanTag.setAttribute("role", "tooltip");
                    //     spanTag.className =
                    //         "hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm dark:bg-slate-700";
                    //     spanTag.textContent = mobile;

                    //     const aTag = document.createElement("a");
                    //     aTag.className =
                    //         "m-0 hs-tooltip-toggle relative w-auto h-";
                    //     aTag.textContent = mobile;
                    //     aTag.appendChild(spanTag);

                    //     const divTag = document.createElement("div");
                    //     divTag.className = "hs-tooltip ti-main-tooltip";
                    //     divTag.appendChild(aTag);
                    //     return divTag;
                    // },
                },
                {
                    title: "Message",
                    field: "message",
                    formatter: "textarea",
                    width: 300,
                },
                {
                    title: "Created at",
                    field: "created_at",
                    formatter: "datetime",
                    formatterParams: {
                        inputFormat: "iso",
                    },
                },
            ],
        });
    }
})();
