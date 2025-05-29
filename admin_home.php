<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AlphaWare</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../chart/highcharts.js"></script>
	<script src="../chart/exporting.js"></script>

	<!-- Custom Sidebar and Layout Styling -->
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #f4f6f9;
		}

		#header {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 70px;
			background-color: #007bff;
			color: white;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 20px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			z-index: 1000;
		}

		#header img {
			width: 50px;
			height: 50px;
			border-radius: 5px;
			margin-right: 10px;
		}

		#header label {
			font-size: 22px;
			font-weight: bold;
			text-transform: uppercase;
		}

		#header ul {
			list-style: none;
			display: flex;
			align-items: center;
		}

		#header ul li {
			margin-left: 20px;
			color: white;
		}

		#header ul li a {
			color: white;
			text-decoration: none;
		}

		/* Sidebar Styling */
		#leftnav {
			position: fixed;
			top: 70px;
			left: 0;
			width: 220px;
			height: 100%;
			background-color: #1e3a8a;
			padding-top: 20px;
			box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
			overflow-y: auto;
		}

		#leftnav ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		#leftnav ul li {
			margin-bottom: 5px;
		}

		#leftnav ul li a {
			display: block;
			padding: 12px 20px;
			color: white;
			text-decoration: none;
			font-size: 16px;
			transition: background 0.3s ease;
		}

		#leftnav ul li a:hover {
			background-color: #2563eb;
			color: white;
		}

		#leftnav ul li ul {
			padding-left: 10px;
			background-color: #1e40af;
		}

		#leftnav ul li ul li a {
			font-size: 14px;
			padding: 10px 30px;
		}

		#rightcontent {
			margin-left: 240px;
			padding-top: 90px;
			padding-right: 20px;
		}
	</style>

	<!-- Chart Script -->
	<script type="text/javascript">
		$(function () {
			Highcharts.getOptions().plotOptions.pie.colors = (function () {
				var colors = [], base = Highcharts.getOptions().colors[0], i;
				for (i = 0; i < 10; i += 1) {
					colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
				}
				return colors;
			}());

			$('#container').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: 'Products share of Shoe Brands as of year <?php echo date("Y"); ?>'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Share',
					data: [
						<?php 
							$result = mysqli_query($conn, "SELECT brand FROM product GROUP BY brand");
							while($row = mysqli_fetch_array($result)){
								$brnd = $row['brand'];
								$result1 = mysqli_query($conn, "SELECT * FROM product WHERE brand = '$brnd'");
								$row1 = mysqli_num_rows($result1);
								echo "['".$brnd."', ".$row1."],";
							}
						?>
					]
				}]
			});
		});
	</script>
</head>
<body>

	<div id="header">
		<div style="display: flex; align-items: center;">
			<img src="../img/logo.jpg" alt="Logo">
			<label>AlphaWare</label>
		</div>

		<?php
			$id = (int) $_SESSION['id'];
			$query = mysqli_query($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>

		<ul>
			<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i> Logout</a></li>
			<li>Welcome: <a><i class="icon-user icon-white"></i> <?php echo $fetch['username']; ?></a></li>
		</ul>
	</div>

	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php">Dashboard</a></li>
			<li><a href="admin_home.php">Products</a>
				<ul>
					<li><a href="admin_feature.php">Features</a></li>
					<li><a href="admin_product.php">Basketball</a></li>
					<li><a href="admin_football.php">Football</a></li>
					<li><a href="admin_running.php">Running</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transactions</a></li>
			<li><a href="customer.php">Customers</a></li>
			<li><a href="message.php">Messages</a></li>
			<li><a href="order.php">Orders</a></li>
		</ul>
	</div>

	<div id="rightcontent">
		<div id="container" style="min-width: 310px; height: 600px; max-width: 1000px; margin: 0 auto;"></div>
	</div>

</body>
</html>
