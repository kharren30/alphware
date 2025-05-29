<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AlphaWare</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
	<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
	<script src="../facefiles/facebox.js" type="text/javascript"></script>

	<!-- Custom Styles -->
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
			margin: 0;
		}

		#header ul li {
			margin-left: 20px;
		}

		#header ul li a {
			color: white;
			text-decoration: none;
		}

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

		form.well {
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			border-radius: 10px;
			padding: 20px;
			background-color: white;
		}

		#rightcontent table {
			width: 80%;
			margin: auto;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
			border-radius: 8px;
			overflow: hidden;
		}

		#rightcontent table th, #rightcontent table td {
			padding: 12px 15px;
			text-align: center;
			border-bottom: 1px solid #e0e0e0;
			font-size: 16px;
		}

		#rightcontent table th {
			background-color: #007bff;
			color: white;
			text-transform: uppercase;
		}

		#rightcontent table tr:hover {
			background-color: #f1f1f1;
		}

		#rightcontent h4 {
			text-align: center;
			color: #2c3e50;
			font-weight: bold;
		}

		.add a.btn-info {
			background-color: #007bff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			transition: background 0.3s ease;
			color: white;
		}

		.add a.btn-info:hover {
			background-color: #0056b3;
		}
	</style>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox();
		});
		function printDiv(divID) {
			var divElements = document.getElementById(divID).innerHTML;
			var oldPage = document.body.innerHTML;
			document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
			window.print();
			document.body.innerHTML = oldPage;
		}
	</script>
</head>
<body>
	<div id="header">
		<img src="../img/logo.jpg">
		<label>AlphaWare</label>
		<?php
			$id = (int) $_SESSION['id'];
			$query = mysqli_query($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>
		<ul>
			<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i> Logout</a></li>
			<li>Welcome, <i class="icon-user icon-white"></i> <?php echo $fetch['username']; ?></li>
		</ul>
	</div>

	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php">Dashboard</a></li>
			<li><a href="#">Products</a>
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
		<div class="alert alert-info"><center><h2>Transactions</h2></center></div>
		<br />

		<div class="alert alert-info">
			<form method="post" class="well">
				<div id="printablediv">
					<center>
						<table class="table">
							<label style="font-size:25px;">AlphaWare</label>
							<label style="font-size:20px;">Official Receipt</label>
							<tr>
								<th>Quantity</th>
								<th>Product Name</th>
								<th>Size</th>
								<th>Price</th>
							</tr>
							<?php
							$t_id = $_GET['tid'];
							$query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die (mysqli_error());
							$fetch = mysqli_fetch_array($query);
							$amnt = $fetch['amount'];
							echo "<p>Date: " . $fetch['order_date'] . "</p>";

							$query2 = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
							while($row = mysqli_fetch_array($query2)){
								echo "<tr>
										<td>{$row['order_qty']}</td>
										<td>{$row['product_name']}</td>
										<td>{$row['product_size']}</td>
										<td>₱{$row['product_price']}</td>
									</tr>";
							}
							?>
						</table>
						<h4>TOTAL: ₱<?php echo $amnt; ?></h4>
					</center>
				</div>

				<div class='pull-right'>
					<div class="add">
						<a onclick="printDiv('printablediv')" class="btn btn-info"><i class="icon-white icon-print"></i> Print Receipt</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
