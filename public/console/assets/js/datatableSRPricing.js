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
    const apiUrl = "/getPrice";

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

    function demo(tabledata, tabledata2) {
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
                { title: "S.No", field: "id" },
                {
                    title: "Service",
                    field: "name",
                },
                {
                    title: "Monthly",
                    field: "monthly",
                },
                {
                    title: "Quartly",
                    field: "quartly",
                },
                {
                    title: "Half Yearly",
                    field: "halfyearly",
                },
                {
                    title: "Yearly",
                    field: "yearly",
                },
                {
                    title: "Status",
                    field: "status",
                    formatter: function (cell) {
                        const statBtn = document.createElement("span");

                        const status = cell.getRow(cell).getData().status;
                        statBtn.textContent = status;

                        if (status === "active") {
                            statBtn.className =
                                "badge bg-green-500 rounded-sm text-white";
                        } else {
                            statBtn.className =
                                "badge bg-[#00acee] rounded-sm text-white";
                        }

                        var statHolder = document.createElement("div");
                        statHolder.classList.add("stat-holder");
                        statHolder.appendChild(statBtn);

                        return statHolder;
                    },
                },
                {
                    title: "Options",
                    formatter: function (cell) {
                        const editPricing =
                            document.querySelector("#editPricing");
                        const addPricing =
                            document.querySelector("#addPricing");
                        const cancelBtn = document.querySelector("#cancelBtn");

                        cancelBtn.addEventListener("click", function () {
                            if (addPricing.classList.contains("hide")) {
                                addPricing.classList.remove("hide");
                                editPricing.classList.add("hide");
                            }
                        });

                        //create edit button
                        const editBt = document.createElement("a");

                        editBt.style.backgroundColor = "blue";
                        editBt.textContent = "Edit";
                        editBt.innerHTML = '<i class="ti ti-edit"></i>';
                        editBt.classList.add("btn-edit");

                        editBt.addEventListener("click", function () {
                            // if (editPricing.classList.contains("hide")) {
                                editPricing.classList.remove("hide");
                                addPricing.classList.add("hide");
                                editPricing.scrollIntoView();
                            // } else {
                                // editPricing.classList.add("hide");
                                // addPricing.classList.remove("hide");
                            // }

                            var id = cell.getRow(cell).getData().id;

                            $.ajax({
                                url: "/getPrice/" + id,
                                method: "get",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $("#pricingId").val(response.id);
                                    $("#priceService_id")
                                        .val(response.service_id)
                                        .attr("selected", true);
                                    // $("#priceService_id").val(response.service);
                                    $("#priceMonthly").val(response.monthly);
                                    $("#priceQuartly").val(response.quartly);
                                    $("#priceHalfyearly").val(
                                        response.halfyearly
                                    );
                                    $("#priceYearly").val(response.yearly);

                                    $("#priceStatus")
                                        .val(response.status)
                                        .attr("selected", true);
                                },
                            });
                        });

                        // var delBt = document.createElement("a");
                        // delBt.style.backgroundColor = "red";
                        // delBt.textContent = "Delete";
                        // delBt.classList.add("btn-edit");

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
                                    .post("/pricing-destroy/" + id, {
                                        _method: "delete",
                                    })
                                    .then((res) => {
                                        window.location = "/pricing";
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
