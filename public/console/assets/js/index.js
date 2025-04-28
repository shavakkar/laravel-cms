"use strict";

/* Chartjs (#donut)  */
var myCanvas = document.getElementById("sales-donut");
var myCanvasContext = myCanvas.getContext("2d");
var myChart;
myChart = new Chart(myCanvas, {
    type: "doughnut",
    data: {
        labels: ["Items", "Revenue"],
        datasets: [
            {
                data: [60, 40],
                backgroundColor: ["rgb(90, 102, 241)", "rgb(96, 165, 250)"],
                borderWidth: 0,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            },
        },
        cutout: 90,
    },
});
/* Chartjs (#donut) closed */

/*  sales overview chart */
function salesOverview() {
    chart.updateOptions({
        colors: ["rgb(" + myVarVal + ")", "rgb(203,213,225)"],
    });
}

function visitorschart() {
    function rgbToHex(r, g, b) {
        return (
            "#" + ((1 << 24) | (r << 16) | (g << 8) | b).toString(16).slice(1)
        );
    }
    chart1.updateOptions({
        colors: [
            rgbToHex(
                myVarVal.split(",")[0],
                myVarVal.split(",")[1],
                myVarVal.split(",")[2]
            ),
        ],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 1,
                colorStops: [
                    {
                        offset: 0,
                        color: "#60a5fa",
                        opacity: 1,
                    },
                    {
                        offset: 100,
                        color: "rgb(" + myVarVal + ")",
                        opacity: 1,
                    },
                ],
            },
        },
    });
}
function salesdonut() {
    myChart.data.datasets[0] = {
        data: [50, 30, 30],
        backgroundColor: ["rgb(" + myVarVal + ")", "rgb(96, 165, 250)"],
        borderWidth: 0,
    };
    myChart.update();
}
