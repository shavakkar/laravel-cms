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
    const apiUrl = "/getKyc";

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
            // loader.classList.add("hide");
            // console.log(tabledata1);
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    function demo(tabledata) {
        //Download Data from Tabulator
        //Build Tabulator
        var table = new Tabulator("#basic-table", {
            // layout: "fitColumns",
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
                    width: 130,
                    formatter: "textarea",
                },
                {
                    title: "Email",
                    field: "email",
                },
                {
                    title: "Mobile",
                    field: "mobile",
                },
                {
                    title: "Aadhar",
                    field: "aadhar",
                },
                {
                    title: "Pan Number",
                    field: "pan",
                },
                {
                    title: "Permanent Address 1",
                    field: "permAddress1",
                    formatter: "textarea",
                },
                {
                    title: "Permanent Address 2",
                    field: "permAddress2",
                    formatter: "textarea",
                },
                {
                    title: "Permanent State",
                    field: "permState",
                },
                {
                    title: "Permanent City",
                    field: "permCity",
                },
                {
                    title: "Pincode",
                    field: "permPin",
                },
                {
                    title: "Current Address 1",
                    field: "currentAddress1",
                    formatter: "textarea",
                },
                {
                    title: "Current Address 2",
                    field: "currentAddress2",
                    formatter: "textarea",
                },
                {
                    title: "Current State",
                    field: "currentState",
                },
                {
                    title: "Current City",
                    field: "currentCity",
                },
                {
                    title: "Pincode",
                    field: "currentPin",
                },
                {
                    title: "Aadhar Photo",
                    field: "aadharphoto",
                    formatter: "image",
                    formatterParams: {
                        height: "100px",
                        width: "220px",
                        urlPrefix: "/storage/",
                        urlSuffix: "",
                    },
                },
                {
                    title: "Pan Photo",
                    field: "panphoto",
                    formatter: "image",
                    formatterParams: {
                        height: "100px",
                        width: "220px",
                        urlPrefix: "/storage/",
                        urlSuffix: "",
                    },
                },
                {
                    title: "Photo",
                    field: "userphoto",
                    formatter: "image",
                    formatterParams: {
                        height: "130px",
                        width: "100px",
                        urlPrefix: "/storage/",
                        urlSuffix: "",
                    },
                },
                {
                    title: "Download",
                    headerSort: false,
                    formatter: function (cell) {
                        //create Download button
                        const downBt = document.createElement("a");

                        downBt.style.backgroundColor = "blue";
                        downBt.innerHTML = '<i class="ti ti-download"></i>';
                        downBt.classList.add("btn-edit");
                        downBt.setAttribute("target", "_blank");
                        downBt.addEventListener("click", function () {
                            var id = cell.getRow(cell).getData().id;
                            downBt.setAttribute("href", "/kycPrint/" + id + "");
                        });

                        var buttonHolder = document.createElement("span");
                        buttonHolder.className = "btn-holder";
                        buttonHolder.appendChild(downBt);
                        // buttonHolder.appendChild(modalBtn);

                        return buttonHolder;
                    },
                },
            ],
        });
    }
})();
