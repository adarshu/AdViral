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
                            { x: new Date(2014, 1, 3), y: 0 },
                            { x: new Date(2014, 1, 5), y: 0 },
                            { x: new Date(2014, 1, 7), y: 0 },
                            { x: new Date(2014, 1, 9), y: 0 },
                            { x: new Date(2014, 1, 11), y: 0 },
                            { x: new Date(2014, 1, 13), y: 0 },
                            { x: new Date(2014, 1, 15), y: 0 },
                            { x: new Date(2014, 1, 17), y: 0 },
                            { x: new Date(2014, 1, 19), y: 0 },
                            { x: new Date(2014, 1, 21), y: 0 },
                            { x: new Date(2014, 1, 23), y: 0 },
                            { x: new Date(2014, 1, 25), y: 0 },
                            { x: new Date(2014, 1, 27), y: 0 },
                            { x: new Date(2014, 2, 1), y: 0 }
                        ]
                    },
                    {
                        type: "spline",
                        showInLegend: true,
                        name: "Google AdWords",
                        color: "#de4b39",
                        lineThickness: 2,
                        dataPoints: [
                            { x: new Date(2014, 1, 3), y: 0 },
                            { x: new Date(2014, 1, 5), y: 0 },
                            { x: new Date(2014, 1, 7), y: 0 },
                            { x: new Date(2014, 1, 9), y: 0 },
                            { x: new Date(2014, 1, 11), y: 0 },
                            { x: new Date(2014, 1, 13), y: 0 },
                            { x: new Date(2014, 1, 15), y: 0 },
                            { x: new Date(2014, 1, 17), y: 0 },
                            { x: new Date(2014, 1, 19), y: 0 },
                            { x: new Date(2014, 1, 21), y: 0 },
                            { x: new Date(2014, 1, 23), y: 0 },
                            { x: new Date(2014, 1, 25), y: 0 },
                            { x: new Date(2014, 1, 27), y: 0 },
                            { x: new Date(2014, 2, 1), y: 0 }
                        ]
                    },
                    {
                        type: "spline",
                        showInLegend: true,
                        name: "Twitter Ads",
                        color: "#66b2e0",
                        lineThickness: 2,

                        dataPoints: [
                            { x: new Date(2014, 1, 3), y: 0 },
                            { x: new Date(2014, 1, 5), y: 0 },
                            { x: new Date(2014, 1, 7), y: 0 },
                            { x: new Date(2014, 1, 9), y: 0 },
                            { x: new Date(2014, 1, 11), y: 0 },
                            { x: new Date(2014, 1, 13), y: 0 },
                            { x: new Date(2014, 1, 15), y: 0 },
                            { x: new Date(2014, 1, 17), y: 0 },
                            { x: new Date(2014, 1, 19), y: 0 },
                            { x: new Date(2014, 1, 21), y: 0 },
                            { x: new Date(2014, 1, 23), y: 0 },
                            { x: new Date(2014, 1, 25), y: 0 },
                            { x: new Date(2014, 1, 27), y: 0 },
                            { x: new Date(2014, 2, 1), y: 0 }
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
                            {  y: 1,
                                x: 0,
                                z: 0,
                                color: "#49659F",
                                label: "Facebook Ads", legendText: "Facebook Ads" },
                            {  y: 1,
                                x: 0,
                                z: 0,
                                color: "#de4b39",
                                label: "Google AdWords", legendText: "Google AdWords" },
                            {
                                y: 1,
                                x: 0,
                                z: 0,
                                color: "#66b2e0",
                                label: "Twitter Ads", legendText: "Twitter Ads" }

                        ]
                    }
                ]
            });

        chart1.render();
    }
</script>