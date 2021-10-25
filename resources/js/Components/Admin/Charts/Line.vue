<template>
    <apexchart
        height="350"
        :options="chartOptions"
        :series="series"
    ></apexchart>
</template>

<script>
import VueApexCharts from "vue-apexcharts";
export default {
    components: {
        apexchart: VueApexCharts
    },
    data() {
        return {
            series: [
                {
                    name: "Der Umsatz",
                    data: [12, 2, 3, 4, 5, 67, 1]
                }
            ],
            chartOptions: {
                chart: {
                    height: 350,
                    type: "line",
                    stacked: false
                },
                dataLabels: {
                    enabled: true
                },
                title: {
                    text: "Umsatz pro Monat",
                    align: "left"
                },
                grid: {
                    row: {
                        colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                        opacity: 0.5
                    }
                },
                plotOptions: {
                    bar: {
                        distributed: true
                    }
                },
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "März",
                        "Apr",
                        "Kann",
                        "Juni",
                        "Juli",
                        "Aug",
                        "Sep",
                        "Okt",
                        "Nov",
                        "Dez"
                    ]
                },
                yaxis: {
                    min: 0,
                    forceNiceScale: true,
                    labels: {
                        show: true
                    },
                    title: {
                        text: "Verkaufszahlen"
                    }
                }
            }
        };
    }
};
</script>
