<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
            {

                title: {
                    text: "AdViral Traffic",
                    fontSize: 20
                },
                axisX: {

                    gridColor: "#EBEBEB",
                    tickColor: "#EBEBEB",
                    valueFormatString: "DD/MMM"

                },
                toolTip: {
                    shared: true
                },
                theme: "theme2",
                axisY: {
                    gridColor: "#EBEBEB",
                    tickColor: "#EBEBEB"
                },
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "spline",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "Facebook Ads",
                        markerType: "square",
                        color: "#49659F",
                        dataPoints: [
                            { x: new Date(2014, 1, 3), y: 650 },
                            { x: new Date(2014, 1, 5), y: 700 },
                            { x: new Date(2014, 1, 7), y: 710 },
                            { x: new Date(2014, 1, 9), y: 658 },
                            { x: new Date(2014, 1, 11), y: 734 },
                            { x: new Date(2014, 1, 13), y: 963 },
                            { x: new Date(2014, 1, 15), y: 847 },
                            { x: new Date(2014, 1, 17), y: 853 },
                            { x: new Date(2014, 1, 19), y: 869 },
                            { x: new Date(2014, 1, 21), y: 943 },
                            { x: new Date(2014, 1, 23), y: 970 },
                            { x: new Date(2014, 1, 25), y: 710 },
                            { x: new Date(2014, 1, 27), y: 828 },
                            { x: new Date(2014, 2, 1), y: 900 }
                        ]
                    },
                    {
                        type: "spline",
                        showInLegend: true,
                        name: "Google AdWords",
                        color: "#de4b39",
                        lineThickness: 2,

                        dataPoints: [
                            { x: new Date(2014, 1, 3), y: 510 },
                            { x: new Date(2014, 1, 5), y: 560 },
                            { x: new Date(2014, 1, 7), y: 540 },
                            { x: new Date(2014, 1, 9), y: 558 },
                            { x: new Date(2014, 1, 11), y: 544 },
                            { x: new Date(2014, 1, 13), y: 693 },
                            { x: new Date(2014, 1, 15), y: 657 },
                            { x: new Date(2014, 1, 17), y: 663 },
                            { x: new Date(2014, 1, 19), y: 639 },
                            { x: new Date(2014, 1, 21), y: 673 },
                            { x: new Date(2014, 1, 23), y: 660 },
                            { x: new Date(2014, 1, 25), y: 589 },
                            { x: new Date(2014, 1, 27), y: 543 },
                            { x: new Date(2014, 2, 1), y: 600 }
                        ]
                    },
                    {
                        type: "spline",
                        showInLegend: true,
                        name: "Twitter Ads",
                        color: "#66b2e0",
                        lineThickness: 2,

                        dataPoints: [
                            { x: new Date(2014, 1, 3), y: 83 },
                            { x: new Date(2014, 1, 5), y: 103 },
                            { x: new Date(2014, 1, 7), y: 100 },
                            { x: new Date(2014, 1, 9), y: 84 },
                            { x: new Date(2014, 1, 11), y: 102 },
                            { x: new Date(2014, 1, 13), y: 343 },
                            { x: new Date(2014, 1, 15), y: 100 },
                            { x: new Date(2014, 1, 17), y: 200 },
                            { x: new Date(2014, 1, 19), y: 83 },
                            { x: new Date(2014, 1, 21), y: 93 },
                            { x: new Date(2014, 1, 23), y: 101 },
                            { x: new Date(2014, 1, 25), y: 91 },
                            { x: new Date(2014, 1, 27), y: 82 },
                            { x: new Date(2014, 2, 1), y: 50 }
                        ]
                    }


                ],
                legend: {
                    cursor: "pointer",
                    itemclick: function (e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        }
                        else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }
                }
            });

        chart.render();

        var chart1 = new CanvasJS.Chart("chartContainerDonut",
            {
                title: {
                    text: "AdViral Results by Percentage"
                },
                data: [
                    {
                        type: "doughnut",
                        startAngle: 60,
                        toolTipContent: "{y} clicks/{x} views ({z}%CTR)",
                        showInLegend: true,
                        dataPoints: [
                            {  y: 11335,
                                x: 103023,
                                z: 0.11,
                                color: "#49659F",
                                label: "Facebook Ads 52.81%", legendText: "Facebook Ads" },
                            {  y: 8429,
                                x: 63320,
                                z: 0.13,
                                color: "#de4b39",
                                label: "Google AdWords 39.27%", legendText: "Google AdWords" },
                            {
                                y: 1698,
                                x: 8320,
                                z: 0.20, color: "#66b2e0",
                                label: "Twitter Ads 7.91%", legendText: "Twitter Ads" }

                        ]
                    }
                ]
            });

        chart1.render();
    }
</script>