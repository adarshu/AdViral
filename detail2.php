<!DOCTYPE html>
<html>
<head>
    <title><?= APPNAME ?></title>
    <?php include 'head_inc.php'; ?>
    <script src="_js/main.js"></script>
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
                                { x: new Date(2014, 1, 3), y: 532 },
                                { x: new Date(2014, 1, 5), y: 320 },
                                { x: new Date(2014, 1, 7), y: 520 },
                                { x: new Date(2014, 1, 9), y: 248 },
                                { x: new Date(2014, 1, 11), y: 634 },
                                { x: new Date(2014, 1, 13), y: 323 },
                                { x: new Date(2014, 1, 15), y: 537 },
                                { x: new Date(2014, 1, 17), y: 233 },
                                { x: new Date(2014, 1, 19), y: 539 },
                                { x: new Date(2014, 1, 21), y: 533 },
                                { x: new Date(2014, 1, 23), y: 630 },
                                { x: new Date(2014, 1, 25), y: 360 },
                                { x: new Date(2014, 1, 27), y: 538 },
                                { x: new Date(2014, 2, 1), y: 530 }
                            ]
                        },
                        {
                            type: "spline",
                            showInLegend: true,
                            name: "Google AdWords",
                            color: "#de4b39",
                            lineThickness: 2,
                            dataPoints: [
                                { x: new Date(2014, 1, 3), y: 320 },
                                { x: new Date(2014, 1, 5), y: 530 },
                                { x: new Date(2014, 1, 7), y: 430 },
                                { x: new Date(2014, 1, 9), y: 638 },
                                { x: new Date(2014, 1, 11), y: 534 },
                                { x: new Date(2014, 1, 13), y: 533 },
                                { x: new Date(2014, 1, 15), y: 527 },
                                { x: new Date(2014, 1, 17), y: 343 },
                                { x: new Date(2014, 1, 19), y: 539 },
                                { x: new Date(2014, 1, 21), y: 353 },
                                { x: new Date(2014, 1, 23), y: 530 },
                                { x: new Date(2014, 1, 25), y: 139 },
                                { x: new Date(2014, 1, 27), y: 533 },
                                { x: new Date(2014, 2, 1), y: 330 }
                            ]
                        },
                        {
                            type: "spline",
                            showInLegend: true,
                            name: "Twitter Ads",
                            color: "#66b2e0",
                            lineThickness: 2,

                            dataPoints: [
                                { x: new Date(2014, 1, 3), y: 32 },
                                { x: new Date(2014, 1, 5), y: 23 },
                                { x: new Date(2014, 1, 7), y: 123 },
                                { x: new Date(2014, 1, 9), y: 53 },
                                { x: new Date(2014, 1, 11), y: 53 },
                                { x: new Date(2014, 1, 13), y: 43 },
                                { x: new Date(2014, 1, 15), y: 53 },
                                { x: new Date(2014, 1, 17), y: 53 },
                                { x: new Date(2014, 1, 19), y: 13 },
                                { x: new Date(2014, 1, 21), y: 63 },
                                { x: new Date(2014, 1, 23), y: 53 },
                                { x: new Date(2014, 1, 25), y: 32 },
                                { x: new Date(2014, 1, 27), y: 53 },
                                { x: new Date(2014, 2, 1), y: 52 }
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
                                {  y: 7467,
                                    x: 62203,
                                    z: 0.12,
                                    color: "#49659F",
                                    label: "Facebook Ads 51.72%", legendText: "Facebook Ads" },
                                {  y: 6269,
                                    x: 63320,
                                    z: 0.09,
                                    color: "#de4b39",
                                    label: "Google AdWords 43.43%", legendText: "Google AdWords" },
                                {
                                    y: 699,
                                    x: 4232,
                                    z: 0.16,
                                    color: "#66b2e0",
                                    label: "Twitter Ads 4.84%", legendText: "Twitter Ads" }

                            ]
                        }
                    ]
                });

            chart1.render();
        }
    </script>
    <script type="text/javascript" src="_js/canvasjs.min.js"></script>
</head>

<body id="thebody">
<div class="homepage container">
    <div id="chartContainer" style="height: 300px; width: 800px;">
    </div>

    <div id="chartContainerDonut" class="botgraph" style="height: 300px; width: 800px;">
    </div>
</div>
</body>
</html>