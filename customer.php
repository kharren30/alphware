<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AlphaWare</title>
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
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
</head>
<body>
	<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>alphaware</label>
		
			<?php
				$id = (int) $_SESSION['id'];
			
					$query = mysqli_query ($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>
				
			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>
	
	<br>
	
	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php" style="color:#333;">Dashboard</a></li>
			<li><a href="admin_home.php">Products</a>
				<ul>
					<li><a href="admin_feature.php "style="font-size:15px; margin-left:15px;">Features</a></li>
					<li><a href="admin_product.php "style="font-size:15px; margin-left:15px;">Basketball</a></li>
					<li><a href="admin_football.php" style="font-size:15px; margin-left:15px;">Football</a></li>
					<li><a href="admin_running.php"style="font-size:15px; margin-left:15px;">Running</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transactions</a></li>
			<li><a href="customer.php">Customers</a></li>
			<li><a href="message.php">Messages</a></li>
			<li><a href="order.php">Orders</a></li>
		</ul>
	</div>
	
	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Customers</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Customers here..." id="filter"></label>
			<br />
		
		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Name</th>
					<th>Address</th>
					<th>Province</th>
					<th>Zipcode</th>
					<th>Mobile</th>
					<th>Telephone</th>
					<th>Email</th>
				</tr>
				</thead>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `customer`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
						{
				?>
				<tr>
					<td><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo  $fetch['lastname'];?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['country']?></td>
					<td><?php echo $fetch['zipcode']?></td>
					<td><?php echo $fetch['mobile']?></td>
					<td><?php echo $fetch['telephone']?></td>
					<td><?php echo $fetch['email']?></td>
				</tr>		
				<?php
					}
				?>
			</table>
		</div>
			
	</div>
	
	

</body>
</html>