<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Check Your Water</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/checkyourwater/dashboard/">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/checkyourwater/dashboard/table.php">
                                <span data-feather="book"></span>
                                Tabel <span class="sr-only"></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>



                <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                <div id="dom-target" style="display: block">0</div>
                <div id="dom-target-avg" style="display:none ">0</div>
                <div id="dom-target-avg" style="display:none ">0</div>
                <div id="dom-target-avg" style="display:none ">0</div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        </div>
        </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <!--    <script src="../../../../assets/js/vendor/popper.min.js"></script>-->
    <!--    <script src="../../../../dist/js/bootstrap.min.js"></script>-->

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
    feather.replace()
    </script>


</body>

</html>