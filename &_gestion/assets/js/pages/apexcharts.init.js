var options = {
    chart: { height: 350, type: "line", zoom: { enabled: !1 }, toolbar: { show: !1 } },
    colors: ["#038edc", "#5fd0f3"],
    dataLabels: { enabled: !1 },
    stroke: { width: [3, 3], curve: "straight" },
    series: [
        { name: "High - 2018", data: [26, 24, 32, 36, 33, 26, 33] },
        { name: "Low - 2018", data: [14, 11, 16, 12, 17, 13, 12] },
    ],
    grid: { row: { colors: ["transparent", "transparent"], opacity: 0.2 }, borderColor: "#f1f1f1" },
    markers: { style: "inverted", size: 4, hover: { size: 6 } },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"], title: { text: "Month", style: { fontWeight: 500 } } },
    yaxis: { title: { text: "Temperature", style: { fontWeight: 500 } }, min: 5, max: 40 },
    legend: { position: "top", horizontalAlign: "right", floating: !0, offsetY: -25, offsetX: -5 },
    responsive: [{ breakpoint: 600, options: { chart: { toolbar: { show: !1 } }, legend: { show: !1 } } }],
},
chart = new ApexCharts(document.querySelector("#line_chart_datalabel"), options);
chart.render();
options = {
chart: { height: 350, type: "area", toolbar: { show: !1 } },
dataLabels: { enabled: !1 },
stroke: { curve: "smooth", width: 3 },
series: [
    { name: "series1", data: [34, 40, 28, 52, 42, 109, 100] },
    { name: "series2", data: [32, 60, 34, 46, 34, 52, 41] },
],
colors: ["#038edc", "#5fd0f3"],
xaxis: { type: "datetime", categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"] },
grid: { borderColor: "#f1f1f1" },
fill: { type: "gradient", gradient: { shadeIntensity: 1, inverseColors: !1, opacityFrom: 0.45, opacityTo: 0.05, stops: [20, 100, 100, 100] } },
tooltip: { x: { format: "dd/MM/yy HH:mm" } },
};
(chart = new ApexCharts(document.querySelector("#spline_area"), options)).render();
options = {
chart: { height: 350, type: "bar", toolbar: { show: !1 } },
plotOptions: { bar: { columnWidth: "34%", dataLabels: { position: "top" } } },
dataLabels: {
    enabled: !0,
    formatter: function (e) {
        return e + "%";
    },
    offsetY: -20,
    style: { fontSize: "12px", colors: ["#304758"] },
},
series: [{ name: "Inflation", data: [2.5, 3.2, 5, 10.1, 4.2, 3.8, 3, 2.4, 4, 1.2, 3.5, 0.8] }],
colors: ["#038edc"],
grid: { borderColor: "#f1f1f1" },
xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    position: "top",
    labels: { offsetY: -18 },
    axisBorder: { show: !1 },
    axisTicks: { show: !1 },
    crosshairs: { fill: { type: "gradient", gradient: { colorFrom: "#D8E3F0", colorTo: "#BED1E6", stops: [0, 100], opacityFrom: 0.4, opacityTo: 0.5 } } },
    tooltip: { enabled: !0, offsetY: -35 },
},
fill: { gradient: { shade: "light", type: "horizontal", shadeIntensity: 0.25, gradientToColors: void 0, inverseColors: !0, opacityFrom: 1, opacityTo: 1, stops: [50, 0, 100, 100] } },
yaxis: {
    axisBorder: { show: !1 },
    axisTicks: { show: !1 },
    labels: {
        show: !1,
        formatter: function (e) {
            return e + "%";
        },
    },
},
title: { text: "Monthly Inflation in Argentina, 2002", floating: !0, offsetY: 320, align: "center", style: { color: "#444", style: { fontWeight: 500 } } },
};
(chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options)).render();
options = {
chart: { height: 350, type: "bar", toolbar: { show: !1 } },
plotOptions: { bar: { horizontal: !0, barHeight: "50%" } },
dataLabels: { enabled: !1 },
series: [{ data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365] }],
colors: ["#5fd0f3"],
grid: { borderColor: "#f1f1f1" },
xaxis: { categories: ["South Korea", "Canada", "United Kingdom", "Netherlands", "Italy", "France", "Japan", "United States", "China", "Germany"] },
};
(chart = new ApexCharts(document.querySelector("#bar_chart"), options)).render();
options = {
chart: { height: 320, type: "pie" },
series: [44, 55, 41, 17, 15],
labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
colors: ["#5fd0f3", "#038edc", "#f06548", "#51d28c", "#f7b84b"],
legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
};
(chart = new ApexCharts(document.querySelector("#pie-chart"), options)).render();
options = {
chart: { height: 320, type: "donut" },
series: [44, 55, 41, 17, 15],
labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
colors: ["#5fd0f3", "#038edc", "#f06548", "#51d28c", "#f7b84b"],
legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
};
(chart = new ApexCharts(document.querySelector("#donut-chart"), options)).render();
