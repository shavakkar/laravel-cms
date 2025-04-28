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
    // const apiUrl = CONSOLE_URL + "getDisposalYear";
    const apiUrl = "/getDisposalYear";

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
            paginationSize: 5,
            paginationSizeSelector: [5, 10, 15, 20, 25],
            paginationCounter: "rows",
            movableColumns: true,
            reactiveData: true, //turn on data reactivity
            data: tabledata, //load data into table
            columns: [
                { title: "S.No", field: "id" },
                {
                    title: "Year",
                    field: "year",
                },
                {
                    title: "Complaints Carried",
                    field: "forward",
                },
                {
                    title: "Received",
                    field: "received",
                },
                {
                    title: "Resolved",
                    field: "resolved",
                },
                {
                    title: "Pending",
                    field: "pending",
                },
                {
                    title: "Options",
                    formatter: function (cell) {
                        const editService =
                            document.querySelector("#editService");
                        const addService =
                            document.querySelector("#addService");
                        const cancelBtn = document.querySelector("#cancelBtn");

                        cancelBtn.addEventListener("click", function () {
                            if (addService.classList.contains("hide")) {
                                addService.classList.remove("hide");
                                editService.classList.add("hide");
                            }
                        });

                        const editBt = document.createElement("a");
                        editBt.style.backgroundColor = "blue";
                        editBt.textContent = "Edit";
                        editBt.innerHTML = '<i class="ti ti-edit"></i>';
                        editBt.classList.add("btn-edit");
                        editBt.addEventListener("click", function () {
                            var id = 0;
                            // if (editService.classList.contains("hide")) {
                                editService.classList.remove("hide");
                                addService.classList.add("hide");
                                editService.scrollIntoView();
                            // } else {
                                // editService.classList.add("hide");
                                // addService.classList.remove("hide");
                            // }

                            id = cell.getRow(cell).getData().id;

                            $.ajax({
                                url: "/getDisposalYear/" + id,
                                method: "get",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $("#disposalId").val(response.id);
                                    $("#disposalYear").val(response.year);
                                    $("#disposalForward").val(response.forward);
                                    $("#disposalReceived").val(
                                        response.received
                                    );
                                    $("#disposalResolved").val(
                                        response.resolved
                                    );
                                    $("#disposalPending").val(response.pending);
                                },
                            });
                        });

                        const modalBtn = document.createElement("a");
                        modalBtn.setAttribute("href", "javascript:void(0)");
                        modalBtn.setAttribute(
                            "data-hs-overlay",
                            "#hs-vertically-centered-modal"
                        );
                        modalBtn.setAttribute("class", "btn-edit");
                        modalBtn.textContent = "Delete";
                        modalBtn.style.background = "red";
                        modalBtn.innerHTML = '<i class="ti ti-trash"></i>';
                        modalBtn.addEventListener("click", function () {
                            var id = cell.getRow(cell).getData().id;

                            const delBtn = document.querySelector("#delBtn1");
                            delBtn.setAttribute("href", "javascript:void(0)");
                            delBtn.setAttribute("id", "delBtn");
                            delBtn.textContent = "Delete";
                            delBtn.style.background = "red";
                            delBtn.classList.add("btn-edit");

                            delBtn.addEventListener("click", function () {
                                axios
                                    .post("/disposalYear-destroy/" + id, {
                                        _method: "delete",
                                    })
                                    .then((res) => {
                                        window.location = "/disposalYear";
                                        res.json();
                                    })
                                    .then((response) => {
                                        console.log(response);
                                    });
                            });
                        });

                        var buttonHolder = document.createElement("span");
                        buttonHolder.classList.add("btn-holder");
                        buttonHolder.appendChild(editBt);
                        buttonHolder.appendChild(modalBtn);

                        return buttonHolder;
                    },
                },
            ],
        });
    }
})();
