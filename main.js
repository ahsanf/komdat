"></script>

    <script>
    $(document).each(function() {
        loadData();
        loadAverage();
    })

    function loadData() {
        $.get('controller/data.php', function(data) {
            console.log(data);
            
            $('#dom-target').html(data);
        })
        $.get('controller/average.php', function(data) {
            $('#dom-target-avg').html(data);
        })
        $.get('controller/time.php', function(data) {
            $('#dom-target-time').html(data);
        })
        $.get('controller/min.php', function(data) {
            $('#dom-target-max').html(data);
        })
        $.get('controller/max.php', function(data) {
            $('#dom-target-min').html(data);
        })
    }

    function loadAverage() {
        $.get('controller/average.php', function(data) {
            $('#dom-target-avg').html(data);
        })
    }

    window.setInterval(loadData, 1000);
    </script>

    <script>
    window.onload = function() {

        var dps = []; // dataPoints

        var average = [];
        var min = [];
        var max = [];

        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "GRAPH OF YOUR VOLTAGE WATER QUALITY"
            },
            axisY: {
                includeZero: false
            },
            legend: {
                cursor: "pointer",
                itemclick: function(e) {
                    //console.log("legend click: " + e.dataPointIndex);
                    //console.log(e);
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }

                    e.chart.render();
                }
            },
            data: [{
                    type: "line",
                    dataPoints: dps,
                    showInLegend: true,
                    legendText: "Realtime Data",

                }, {
                    type: "line",
                    name: "avg",
                    dataPoints: average,
                    showInLegend: true,
                    legendText: "Average",
                },
                {
                    type: "line",
                    name: "min",
                    dataPoints: average,
                    showInLegend: true,
                    legendText: "Min",
                },
                {
                    type: "line",
                    name: "max",
                    dataPoints: average,
                    showInLegend: true,
                    legendText: "Max",
                }
            ]
        });

        var xVal = 0;
        var yVal = 0;
        var yValAvg = 0;
        var updateInterval = 1000;
        var dataLength = 20; // number of dataPoints visible at any point
        var data = document.getElementById("dom-target");
        var avg = document.getElementById("dom-target-avg");
        var min = document.getElementById("dom-target-min");
        var max = document.getElementById("dom-target-max");

        var updateChart = function(count) {

            count = count || 1;

            for (var j = 0; j < count; j++) {
                yValAvg = parseInt(avg.innerText);
                yVal = parseInt(data.innerText);
                dps.push({
                    x: xVal,
                    y: yVal
                });

                average.push({
                    x: xVal,
                    y: yValAvg
                })
                console.log("Data ->" + yVal);

                console.log("Avg ->" + yValAvg);
                xVal++;
            }

            if (dps.length > dataLength) {
                dps.shift();
                average.shift()
            }

            chart.render();
        };

        updateChart(dataLength);
        setInterval(function() {
            updateChart()
        }, updateInterval);
    }
    </script>