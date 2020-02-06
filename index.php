<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon.ico">
	<title>Data ADC</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<?php
    $host = "localhost";
    $user = "root";
    $password = "password";
    $database = "vb_komdat";
    $koneksi = mysqli_connect($host,$user,$password,$database);
	?>
    <script>

	$(document).ready( function () {
    $('tabel_data').DataTable();
	} );
	var graphData;
		var dps = []; // dataPoints
		var labelsData = []; // dataPoints
		var xVal = 0;
        var yVal = 0;
        var updateInterval = 1000;
        var dataLength = 10;
		
		// $(document).each(function() {
		// 	loadData();
		// })

		$(document).ready(function(){
			// startCharts();
		})

		function loadData() {
			$.get('controller/list.php', function(data) {
				data = JSON.parse(data);

				console.log(data);
				
				$('#data-display').html(" ");
				i = 0;
				data.forEach(item => {
					$('#data-display').append(`
						<tr>
							
							<td>${item.id}</td>
							<td>${item.data} v</td>
							<td>${item.timestamp}</td>
						</tr>
					`)
				});

				

			})

		}
		
		window.setInterval(loadData, updateInterval);
    </script>


</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<!-- <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="index.html">Data ADC</a></h1>								
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>					
				</ul>
			</nav> -->
			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header justify-left">
					<div class="col-md-6 col-lg-8" >
						<h1 class="text-left text-md-left">Data ADC Arduino</h1>
						<br>
						<h1 class="text-left text-md-left">Ahsan Firdaus</h1>
					</div>
	
					<div class="clear"></div>
				</header>
				<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-md-12 col-lg-8">
		
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Overview</h3>
										<div class="dropdown card-title-btn-container">

										</div>
										<h6 class="card-subtitle mb-2 text-muted">Statistik Data</h6>
										<div class="canvas-wrapper">
											<canvas class="chart" id="line-chart" height="200" width="600"></canvas>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-md-12 col-lg-4">
								<div class="card mb-4">
									<div class="card-block card-dashboard">
										<h2>Max / Min</h2>
										<h1 class="indicator-var text-center"><b id="max" >-</b> v / <b id="min" >-</b> v</h1>
									</div>
								</div>
								<div class="card mb-4">
									<div class="card-block card-dashboard">
										<h2>Rata - Rata</h2>
										<h1 class="indicator-var text-center"><b id="average">-</b> v</h1>
									</div>
								</div>
								
							</div>
						</section>	
						<section><div class="card-block">
										<h3 class="card-title">Histori Data</h3>
										
										<div class="table-responsive">
											<table id="tabel_data" class="table table-striped">
												<thead>
													<tr>
													
														<th>ID</th>
														<th>Data Tegangan</th>
														<th>Waktu</th>
													</tr>
												</thead>
												<tbody id="data-display">
													
												</tbody>
											</table>
										</div>
									</div></section>
					</div>
				</section>
			</main>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="js/chart.min.js"></script>
    <!-- <script src="js/chart-data.js"></script> -->
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
		var graphData;
		var dps = []; // dataPoints
		var labelsData = []; // dataPoints
		var xVal = 0;
        var yVal = 0;
        var updateInterval = 1000;
        var dataLength = 10;
		
		// $(document).each(function() {
		// 	loadData();
		// })

		$(document).ready(function(){
			startCharts();
		})

		function loadData() {
			$.get('controller/data.php', function(data) {
				console.log("data : "+data);
				graphData = data;
			})
			$.get('controller/min.php', function(data) {
				console.log("min : "+data);
				$('#min').text(data);
				
			})
			$.get('controller/max.php', function(data) {
				console.log("max : "+data);
				$('#max').text(data);
			})
			$.get('controller/average.php', function(data) {
				console.log("avg : "+data);
				$('#average').text(data);
			})

		}
		
		window.setInterval(loadData, updateInterval);

		var lineChartData = {
			labels : labelsData,
			datasets : [
				{
					label: "Realtime Data",
					fillColor : "rgba(128,130,228, 0.6)",
					strokeColor : "rgba(128,130,228, 1)",
					highlightFill : "rgba(128,130,228, 0.75)",
					highlightStroke : "rgba(128,130,228, 1)",
					data : dps,
				},
			],
			options : {
				animation: false
			}

		}

		var chart1 = document.getElementById("line-chart").getContext("2d");
	    var startCharts = function () {
	                displayChart = new Chart(chart1).Line(lineChartData, {
						responsive: true,
						scaleLineColor: "rgba(0,0,0,.2)",
						scaleGridLineColor: "rgba(0,0,0,.05)",
						scaleFontColor: "#c5c7cc",
						animation: false
	                });
				}; 
				
	    // window.setTimeout(startCharts(), 1000);

		var updateChart = function(count) {
			count = count || 1;

			for (var j = 0; j < count; j++) {
				yVal = graphData;
				
				if(yVal == undefined){
					yVal = 0;
				}
				
				dps.push(yVal);
				labelsData.push(xVal);
				
				console.log("dps : "+dps);
				console.log("labelsData : "+labelsData);
				xVal++;
			}

			if (dps.length > dataLength) {
				dps.shift();
				labelsData.shift();
			}

			startCharts();

		};

		updateChart(dataLength);

		setInterval(function() {
			updateChart()
		}, updateInterval);

		
	</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
	</body>
</html>
