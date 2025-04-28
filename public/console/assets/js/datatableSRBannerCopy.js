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
    const apiUrl = "/api/getBanner";

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
            width: 100,
            minWidth: 40,
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
                    title: "Image",
                    field: "image",
                    formatter: "image",
                    formatterParams: {
                        height: "100px",
                        width: "350px",
                        urlPrefix: "/storage/",
                        urlSuffix: "",
                    },
                },
                {
                    title: "Title",
                    field: "title",
                },
                {
                    title: "Status",
                    field: "status",
                    formatter: function (cell) {
                        const statBtn = document.createElement("span");

                        var status = cell.getRow(cell).getData().status;
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
                        const editBanner =
                            document.querySelector("#editBanner");
                        const addBanner = document.querySelector("#addBanner");
                        const cancelBtn = document.querySelector("#cancelBtn");

                        cancelBtn.addEventListener("click", function () {
                            if (addBanner.classList.contains("hide")) {
                                addBanner.classList.remove("hide");
                                editBanner.classList.add("hide");
                            }
                        });

                        // Edit button
                        const editBt = document.createElement("a");
                        editBt.style.backgroundColor = "blue";
                        editBt.textContent = "Edit";
                        editBt.innerHTML = '<i class="ti ti-edit"></i>';
                        editBt.className = "btn-edit";

                        editBt.addEventListener("click", function () {
                            var id = 0;
                            if (editBanner.classList.contains("hide")) {
                                editBanner.classList.remove("hide");
                                addBanner.classList.add("hide");
                            } else {
                                editBanner.classList.add("hide");
                                addBanner.classList.remove("hide");
                            }

                            id = cell.getRow(cell).getData().id;

                            $.ajax({
                                url: "/api/getBanner/" + id,
                                method: "get",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $("#imgId").val(response.id);
                                    $("#imgTitle").val(response.title);
                                    $("#image1").html(
                                        `<img src="storage/${response.image}" width="300" />`
                                    );
                                    $("#imgStatus")
                                        .val(response.status)
                                        .attr("selected", true);
                                },
                            });
                        });

                        var re1 = cell.getRow(cell); // get the row of the cell that was clicked
                        var id1 = re1.getData().id;

                        let url1 = "/banner-destroy/:id";
                        url1 = url1.replace(":id", id1);

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

                            const delBtn = document.querySelector("#delBtn");
                            delBtn.setAttribute("href", "javascript:void(0)");
                            delBtn.textContent = "Delete";
                            delBtn.style.background = "red";
                            delBtn.classList.add("btn-edit");

                            delBtn.addEventListener("click", function () {
                                axios
                                    .post("/banner-destroy/" + id, {
                                        _method: "delete",
                                    })
                                    .then((res) => {
                                        window.location = "/banner";
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
