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
    const apiUrl = "http://127.0.0.1:8000/api/getBanner";

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
                { title: "S.No", field: "id" },
                {
                    title: "Image",
                    field: "image",
                    formatter: "image",
                    formatterParams: {
                        height: "100px",
                        width: "350px",
                        urlPrefix: "http://127.0.0.1:8000/storage/",
                        urlSuffix: "",
                    },
                },
                {
                    title: "Title",
                    field: "title",
                },
                { title: "Status", field: "status" },
                {
                    title: "Options",
                    formatter: function (cell) {
                        //create edit button
                        var editBt = document.createElement("a");
                        editBt.style.backgroundColor = "green";
                        editBt.textContent = "Edit";

                        var re = cell.getRow(cell); // get the row of the cell that was clicked
                        var id = re.getData().id;

                        let url = "/banner/:id";
                        url = url.replace(":id", id);
                        editBt.setAttribute("href", url);
                        editBt.classList.add("btn-edit");

                        // var delBt = document.createElement("a");
                        // delBt.style.backgroundColor = "red";
                        // delBt.textContent = "Delete";
                        // delBt.classList.add("btn-edit");

                        var re1 = cell.getRow(cell); // get the row of the cell that was clicked
                        var id1 = re1.getData().id;

                        let url1 = "/banner-destroy/:id";
                        url1 = url1.replace(":id", id1);
                        // delBt.setAttribute("href", url1);
                        // editBt.classList.add("btn-edit");

                        const modalBtn = document.createElement("a");
                        modalBtn.setAttribute("href", "javascript:void(0)");
                        modalBtn.setAttribute(
                            "data-hs-overlay",
                            "#hs-vertically-centered-modal"
                        );
                        modalBtn.setAttribute("class", "btn-edit");
                        modalBtn.textContent = "Delete";
                        modalBtn.style.background = "red";
                        modalBtn.addEventListener("click", function () {
                            id = cell.getRow(cell).getData().id;
                            const delBtn = document.querySelector("#delBtn");
                            delBtn.setAttribute("href", "javascript:void(0)");
                            delBtn.setAttribute("id", "delBtn");
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

    //define data
    // var tabledata = [
    //     {
    //         id: 1,
    //         name: "Tiger Jackson",
    //         position: "System Designer",
    //         office: "Sed at",
    //         age: 41,
    //         salary: "",
    //     },
    //     {
    //         id: 2,
    //         name: "Vadett Summers",
    //         position: "UI Developer",
    //         office: "Japan",
    //         age: 28,
    //         salary: "$270,750",
    //     },
    //     {
    //         id: 3,
    //         name: "Lisbon Mox",
    //         position: "Junior Lecturer",
    //         office: "San Deigo",
    //         age: 45,
    //         salary: "$286,000",
    //     },
    //     {
    //         id: 4,
    //         name: "Medric Belly",
    //         position: "Javascript Developer",
    //         office: "Eden Gards",
    //         age: 25,
    //         salary: "$1,060",
    //     },
    //     {
    //         id: 5,
    //         name: "Ayri Satovu",
    //         position: "Senior Engineer",
    //         office: "Elitr stet",
    //         age: 25,
    //         salary: "$262,700",
    //     },
    //     {
    //         id: 6,
    //         name: "Billie William",
    //         position: "Software Engineer",
    //         office: "Paris",
    //         age: 52,
    //         salary: "$472,000",
    //     },
    //     {
    //         id: 7,
    //         name: "Merrod Sailor",
    //         position: "Sales Assosiative",
    //         office: "Sydney",
    //         age: 35,
    //         salary: "$237,500",
    //     },
    //     {
    //         id: 8,
    //         name: "Khona David",
    //         position: "DBMS Engineer",
    //         office: "France",
    //         age: 25,
    //         salary: "$427,900",
    //     },
    //     {
    //         id: 9,
    //         name: "Coolio Hornet",
    //         position: "Angular Developer",
    //         office: "Stet stet",
    //         age: 39,
    //         salary: "$205,500",
    //     },
    //     {
    //         id: 10,
    //         name: "Sonia Fraust",
    //         position: "Software Developer",
    //         office: "Magna lorem",
    //         age: 32,
    //         salary: "$303,600",
    //     },
    //     {
    //         id: 11,
    //         name: "Jennie Lora",
    //         position: "Bank Manager",
    //         office: "UK",
    //         age: 45,
    //         salary: "590,560",
    //     },
    //     {
    //         id: 12,
    //         name: "Flynn Hank",
    //         position: "Cloud Developer",
    //         office: "Mexico",
    //         age: 25,
    //         salary: "$442,000",
    //     },
    //     {
    //         id: 13,
    //         name: "Ricky Martin",
    //         position: "React Developer",
    //         office: "Sed sit",
    //         age: 48,
    //         salary: "$870,600",
    //     },
    //     {
    //         id: 14,
    //         name: "Halsey Kep",
    //         position: "Marketing Executive",
    //         office: "Takimata sit",
    //         age: 26,
    //         salary: "$513,500",
    //     },
    //     {
    //         id: 15,
    //         name: "Alaric Saltzman",
    //         position: "History Teacher",
    //         office: "Mystic Falls",
    //         age: 32,
    //         salary: "$385,750",
    //     },
    //     {
    //         id: 16,
    //         name: "Katherina Kat",
    //         position: "Event Planner",
    //         office: "Accusam est",
    //         age: 57,
    //         salary: "$98,500",
    //     },
    //     {
    //         id: 17,
    //         name: "Paulson Pal",
    //         position: "Data Analyst",
    //         office: "Manchester",
    //         age: 23,
    //         salary: "$325,000",
    //     },
    //     {
    //         id: 18,
    //         name: "Glory Sam",
    //         position: "System Administrator",
    //         office: "Sit Invidunt",
    //         age: 32,
    //         salary: "$337,500",
    //     },
    //     {
    //         id: 19,
    //         name: "Bradley Cooper",
    //         position: "Civil Engineer",
    //         office: "Aliquyam",
    //         age: 26,
    //         salary: "$332,000",
    //     },
    //     {
    //         id: 20,
    //         name: "Keera Dsoa",
    //         position: "Cloud Developer",
    //         office: "Sylvia",
    //         age: 53,
    //         salary: "$717,500",
    //     },
    //     {
    //         id: 21,
    //         name: "Alia Max",
    //         position: "Project Manager",
    //         office: "Old York",
    //         age: 26,
    //         salary: "$435,000",
    //     },
    //     {
    //         id: 22,
    //         name: "Yuri Gagarin",
    //         position: "Data Scientist",
    //         office: "Sun",
    //         age: 42,
    //         salary: "$989,900",
    //     },
    //     {
    //         id: 23,
    //         name: "cisaro Pals",
    //         position: "Sales Executive",
    //         office: "Kambodia",
    //         age: 25,
    //         salary: "$706,450",
    //     },
    //     {
    //         id: 24,
    //         name: "Amberson Pet",
    //         position: "Sales Manager",
    //         office: "Kidney",
    //         age: 25,
    //         salary: "$185,600",
    //     },
    //     {
    //         id: 25,
    //         name: "peter Parker",
    //         position: "Piolet",
    //         office: "Web Spal",
    //         age: 24,
    //         salary: "$900,000",
    //     },
    // ];

    // //Basic Tabulator
    // var table = new Tabulator("#basic-table", {
    //     width: 100,
    //     minWidth: 100,
    //     layout: "fitColumns",
    //     pagination: "local",
    //     paginationSize: 10,
    //     // responsiveLayout:true, // enable responsive layouts
    //     paginationSizeSelector: [5, 10, 15, 20, 25],
    //     paginationCounter: "rows",
    //     // movableColumns: true,
    //     data: tabledata, //load data into table
    //     columns: [
    //         { title: "S.No", field: "id", sorter: "string" },
    //         { title: "Image", field: "name", sorter: "string" },
    //         { title: "Title", field: "age", sorter: "number" },
    //         { title: "Status", field: "office", sorter: "string" },
    //         {
    //             title: "",
    //             headerSort: false,
    //             formatter: function (cell) {
    //                 //create edit button
    //                 var editBt = document.createElement("a");
    //                 editBt.style.backgroundColor = "red";
    //                 editBt.textContent = "editBtn";
    //                 editBt.setAttribute("href", "#");
    //                 editBt.classList.add("btn-edit");

    //                 let url = "{{ route('banner.edit', ':id') }}";

    //                 var re = cell.getRow(cell); // get the row of the cell that was clicked
    //                 var id = re.getData().id;
    //                 url = url.replace(":id", id);
    //                 document.location.href = url;

    //                 // editBt.addEventListener("click", function () {
    //                 //     var re = cell.getRow(cell); // get the row of the cell that was clicked
    //                 //     var thenum = re.getData().name; // gets the value of column "id" in the same row
    //                 //     // var theurl = "editTransaction.php?trans=" + thenum; // creates my url
    //                 //     console.log(thenum);
    //                 // });

    //                 //create delete button
    //                 var delBt = document.createElement("button");
    //                 delBt.style.backgroundColor = "blue";
    //                 delBt.type = "button";
    //                 delBt.textContent = "delBt";
    //                 delBt.classList.add("btn-del");
    //                 delBt.addEventListener("click", function () {
    //                     console.log("Hello");
    //                 });

    //                 //create update button
    //                 var updateBt = document.createElement("button");
    //                 updateBt.type = "button";
    //                 updateBt.textContent = "updateBt";
    //                 updateBt.classList.add("btn-update");
    //                 updateBt.addEventListener("click", function () {
    //                     updateRow(cell);
    //                 });

    //                 //create cancel button
    //                 var cancelBt = document.createElement("button");
    //                 cancelBt.type = "button";
    //                 cancelBt.textContent = "editBt";
    //                 cancelBt.classList.add("btn-cancel");
    //                 cancelBt.addEventListener("click", function () {
    //                     cancelRow(cell);
    //                 });

    //                 //add buttons to cell (just the edit and delete buttons to start with)
    //                 var buttonHolder = document.createElement("span");
    //                 buttonHolder.appendChild(editBt);
    //                 buttonHolder.appendChild(delBt);

    //                 return buttonHolder;
    //             },
    //         },
    //     ],
    //     rowFormatter: function (row) {
    //         var row1 = row.getData();
    //         console.log(row1);
    //     },
    // });

    //     //Sortable Tabulator

    //     var fieldEl = document.getElementById("sort-field");
    //     var dirEl = document.getElementById("sort-direction");
    //     var table1 = new Tabulator("#sort-table", {
    //         width: 40,
    //         minWidth: 30,
    //         layout: "fitColumns",
    //         pagination: "local",
    //         paginationSize: 10,
    //         paginationSizeSelector: [5, 10, 20, 30, 40, 50, 60],
    //         paginationCounter: "rows",
    //         movableColumns: true,
    //         data: tabledata, //load data into table
    //         columns: [
    //             { title: "Name", field: "name", sorter: "string" },
    //             { title: "Position", field: "position", sorter: "string" },
    //             { title: "Office", field: "office", sorter: "string" },
    //             { title: "Age", field: "age", sorter: "number" },
    //             { title: "Salary", field: "salary", sorter: "string" },
    //         ],
    //     });
    //     document
    //         .getElementById("sort-trigger")
    //         .addEventListener("click", function () {
    //             table1.setSort(
    //                 fieldEl.options[fieldEl.selectedIndex].value,
    //                 dirEl.options[dirEl.selectedIndex].value
    //             );
    //         });

    //     //Data Reactivity Tabulator
    //     var table1 = new Tabulator("#reactivity-table", {
    //         width: 100,
    //         minWidth: 40,
    //         layout: "fitColumns",
    //         pagination: "local",
    //         paginationSize: 10,
    //         paginationSizeSelector: [5, 10, 15, 20, 25],
    //         paginationCounter: "rows",
    //         movableColumns: true,
    //         addRowPos: "top",
    //         reactiveData: true, //turn on data reactivity
    //         data: tabledata, //load data into table
    //         columns: [
    //             { title: "Name", field: "name", sorter: "string" },
    //             { title: "Position", field: "position", sorter: "string" },
    //             { title: "Office", field: "office", sorter: "string" },
    //             { title: "Age", field: "age", sorter: "number" },
    //             { title: "Salary", field: "salary", sorter: "string" },
    //         ],
    //     });

    //     //add row to bottom of table on button click
    //     document
    //         .getElementById("reactivity-add")
    //         .addEventListener("click", function () {
    //             table1.addRow({
    //                 name: "Added a New Row",
    //                 position: "New",
    //                 Office: "New",
    //             });
    //         });

    //     //remove bottom row from table on button click
    //     document
    //         .getElementById("reactivity-delete")
    //         .addEventListener("click", function () {
    //             if (
    //                 document.getElementById("reactivity-table").children[1]
    //                     .children[0].children[0]
    //             ) {
    //                 if (
    //                     document.getElementById("reactivity-table").children[1]
    //                         .children[0].children[0].childNodes.length > 0
    //                 ) {
    //                     tabledata.pop();
    //                 }
    //             }
    //         });

    //     //Clear table on "Empty the table" button click
    //     document.getElementById("clear").addEventListener("click", function () {
    //         table1.clearData();
    //     });

    //     //Reset table contents on "Reset the table" button click
    //     document.getElementById("reset").addEventListener("click", function () {
    //         table1.addRow({
    //             name: "Added a New Row",
    //             position: "New",
    //             Office: "New",
    //         });
    //         table1.setData(tabledata);
    //     });

    //     //Download Data from Tabulator
    //     //Build Tabulator
    //     var table = new Tabulator("#download-table", {
    //         width: 100,
    //         minWidth: 40,
    //         layout: "fitColumns",
    //         pagination: "local",
    //         paginationSize: 10,
    //         paginationSizeSelector: [5, 10, 15, 20, 25],
    //         paginationCounter: "rows",
    //         movableColumns: true,
    //         reactiveData: true, //turn on data reactivity
    //         data: tabledata, //load data into table
    //         columns: [
    //             { title: "Name", field: "name", sorter: "string" },
    //             { title: "Position", field: "position", sorter: "string" },
    //             { title: "Office", field: "office", sorter: "string" },
    //             { title: "Age", field: "age", sorter: "number" },
    //             { title: "Salary", field: "salary", sorter: "string" },
    //         ],
    //     });

    //     //trigger download of data.csv file
    //     document
    //         .getElementById("download-csv")
    //         .addEventListener("click", function () {
    //             table.download("csv", "data.csv");
    //         });

    //     //trigger download of data.json file
    //     document
    //         .getElementById("download-json")
    //         .addEventListener("click", function () {
    //             table.download("json", "data.json");
    //         });

    //     //trigger download of data.xlsx file
    //     document
    //         .getElementById("download-xlsx")
    //         .addEventListener("click", function () {
    //             table.download("xlsx", "data.xlsx", { sheetName: "My Data" });
    //         });

    //     //trigger download of data.pdf file
    //     document
    //         .getElementById("download-pdf")
    //         .addEventListener("click", function () {
    //             table.download("pdf", "data.pdf", {
    //                 orientation: "portrait", //set page orientation to portrait
    //                 title: "Example Report", //add title to report
    //             });
    //         });

    //     //trigger download of data.html file
    //     document
    //         .getElementById("download-html")
    //         .addEventListener("click", function () {
    //             table.download("html", "data.html", { style: true });
    //         });

    //     document.querySelector("#switcher-rtl").addEventListener("click", () => {
    //         document.querySelectorAll(".tabulator").forEach((ele) => {
    //             ele.classList.add("tabulator-rtl");
    //         });
    //     });

    //     document.querySelector("#switcher-ltr").addEventListener("click", () => {
    //         document.querySelectorAll(".tabulator").forEach((ele) => {
    //             ele.classList.remove("tabulator-rtl");
    //         });
    //     });

    //     document.querySelector("#reset-all").addEventListener("click", () => {
    //         document.querySelectorAll(".tabulator").forEach((ele) => {
    //             ele.classList.remove("tabulator-rtl");
    //         });
    //     });
})();
