var attendanceOption = {
    chart: {
        type: "area",
        toolbar: {
            show: false,
        },
        height: "480px",
        fontFamily: "Montserrat Medium, sans-serif",
        foreColor: "#707793",
        zoom: {
            enabled: false,
        },
    },
    fill: {
        type: "gradient",
        colors: ["#05C270", "#FFB300", "#F1416C"],
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100],
        },
    },
    colors: ["#05C270", "#FFB300", "#F1416C"],
    stroke: {
        curve: "smooth",
        colors: ["#05C270", "#FFB300", "#F1416C"],
    },
    markers: {
        colors: ["#05C270", "#FFB300", "#F1416C"],
    },
    grid: {
        show: false,
    },
    dataLabels: {
        enabled: false,
    },
    series: [
        {
            name: "Masuk",
            data: [],
        },
        {
            name: "Izin",
            data: [],
        },
        {
            name: "Alfa",
            data: [],
        },
    ],
    legend: {
        show: true,
        fontSize: "14px",
        fontWeight: 700,
        markers: {
            offsetX: "-2px",
            offsetY: 0,
        },
        itemMargin: {
            horizontal: 10,
            vertical: 10,
        },
    },
    yaxis: {
        labels: {
            style: {
                fontSize: "14px",
            },
            formatter: function (val) {
                return val.toFixed(0);
            },
        },
        min: 0,
    },
    xaxis: {
        categories: [],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: true,
            style: {
                fontSize: "14px",
            },
        },
        tooltip: {
            enabled: false,
        },
        crosshairs: {
            show: true,
        },
    },
    tooltip: {
        enabled: true,
        custom: ({ series, seriesIndex, dataPointIndex, w }) => {
            const hoverXaxis = w.globals.seriesX[seriesIndex][dataPointIndex];
            const hoverIndexes = w.globals.seriesX.map((seriesX) => {
                return seriesX.findIndex((xData) => xData === hoverXaxis);
            });

            let hoverList = "";
            hoverIndexes.forEach((hoverIndex, seriesEachIndex) => {
                if (hoverIndex >= 0) {
                    hoverList += `
                    <div class="kpaw_item">
                        <span class="kpaw_dot"></span>
                        <span>
                            ${w.globals.seriesNames[seriesEachIndex]}:
                            <span class="kpaw_weight--bold">${series[seriesEachIndex][hoverIndex]}</span>
                        </span>
                    </div>
                `;
                }
            });

            return `<div class="kpaw_apex--tooltip">
                <div class="kpaw_header">Tanggal ${w.globals.categoryLabels[dataPointIndex]}</div>
                <div class="kpaw_body">
                    ${hoverList}
                </div>
            </div>`;
        },
    },
};

var attendanceChart = new ApexCharts(
    document.querySelector("#attendanceChart"),
    attendanceOption
);
attendanceChart.render();
