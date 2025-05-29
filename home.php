<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AlphaWare</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			margin: 0;
			background-color: #f8f9fa;
		}

		#header {
			background-color: #343a40;
			color: white;
			padding: 15px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		#header img {
			height: 50px;
		}

		#header label {
			font-size: 24px;
			font-weight: bold;
			margin-left: 10px;
		}

		#header ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
		}

		#header ul li {
			margin-left: 20px;
		}

		#header ul li a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}

		.nav {
			background-color: #007BFF;
			border-radius: 5px;
			padding: 10px 0;
			margin: 20px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		}

		.nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
		}

		.nav ul li {
			margin: 0 15px;
		}

		.nav ul li a {
			color: white;
			text-decoration: none;
			font-size: 16px;
			font-weight: bold;
			padding: 8px 16px;
			border-radius: 4px;
			transition: background 0.3s;
		}

		.nav ul li a:hover {
			background-color: #0056b3;
		}

		#container {
			width: 90%;
			margin: auto;
			padding: 20px;
		}

		#video {
			margin: 20px auto;
			text-align: center;
		}

		#product .float {
			display: inline-block;
			margin: 10px;
			text-align: center;
		}

		#product h3 {
			color: #555;
		}

		#footer {
			background-color: #343a40;
			color: white;
			padding: 20px;
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
		}

		#footer h4, #footer p, #footer a {
			color: white;
			margin: 0;
		}

		#footer a {
			text-decoration: none;
		}

		#footer ul {
			list-style: none;
			padding: 0;
		}

		#footer ul li {
			margin: 5px 0;
		}
	</style>
</head>
<body>
	<div id="header">
		<div>
			<img src="img/logo.jpg" alt="Logo">
			<label>AlphaWare</label>
		</div>
		<?php
			$id = (int) $_SESSION['id'];
			$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
			$fetch = mysqli_fetch_array ($query);
		?>
		<ul>
			<li><a href="function/logout.php"><i class="icon-off icon-white"></i> Logout</a></li>
			<li>Welcome: <a href="#profile" data-toggle="modal"><i class="icon-user icon-white"></i> <?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname'];?></a></li>
		</ul>
	</div>

	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">My Account</h3>
		</div>
		<div class="modal-body">
			<?php
				$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
				$fetch = mysqli_fetch_array ($query);
			?>
			<center>
				<form method="post">
					<table>
						<tr><td>Name:</td><td><?php echo $fetch['firstname'];?> <?php echo $fetch['mi'];?> <?php echo $fetch['lastname'];?></td></tr>
						<tr><td>Address:</td><td><?php echo $fetch['address'];?></td></tr>
						<tr><td>Country:</td><td><?php echo $fetch['country'];?></td></tr>
						<tr><td>ZIP Code:</td><td><?php echo $fetch['zipcode'];?></td></tr>
						<tr><td>Mobile Number:</td><td><?php echo $fetch['mobile'];?></td></tr>
						<tr><td>Telephone Number:</td><td><?php echo $fetch['telephone'];?></td></tr>
						<tr><td>Email:</td><td><?php echo $fetch['email'];?></td></tr>
					</table>
				</form>
			</center>
		</div>
		<div class="modal-footer">
			<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>

	<div id="container">
		<div class="nav">
			<ul>
				<li><a href="home.php"><i class="icon-home"></i> Home</a></li>
				<li><a href="product1.php"><i class="icon-th-list"></i> Product</a></li>
				<li><a href="aboutus1.php"><i class="icon-bookmark"></i> About Us</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i> Contact Us</a></li>
				<li><a href="privacy1.php"><i class="icon-info-sign"></i> Privacy Policy</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i> FAQs</a></li>
			</ul>
		</div>

		<div id="carousel">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="active item"><img src="img/banner1.jpg" class="carousel"></div>
					<div class="item"><img src="img/banner2.jpg" class="carousel"></div>
					<div class="item"><img src="img/banner3.jpg" class="carousel"></div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>

		<div id="video">
			<video controls autoplay width="445px" height="300px">
				<source src="video/commercial.mp4" type="video/mp4">
			</video>
		</div>

		<div id="product">
			<center><h2><legend>Featured Items</legend></h2></center><br>
			<?php 
				$query = mysqli_query($conn, "SELECT * FROM product WHERE category='feature' ORDER BY product_id DESC") or die (mysqli_error());
				while($fetch = mysqli_fetch_array($query)) {
					$pid = $fetch['product_id'];
					$query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
					$rows = mysqli_fetch_array($query1);
					$qty = $rows['qty'];
					if($qty > 5){
						echo "<div class='float'>";
						echo "<center>";
						echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height='300px' width='300px'></a><br>";
						echo $fetch['product_name']."<br>P ".$fetch['product_price']."<br>";
						echo "<h3 class='text-info'>Size: ".$fetch['product_size']."</h3>";
						echo "</center>";
						echo "</div>";
					}
				}
			?>
		</div>
	</div>

	<div id="footer">
		<div class="foot">
			<p style="font-size:25px;">AlphaWare</p>
		</div>
		<div id="foot">
			<h4>Links</h4>
			<ul>
				<a href="http://www.facebook.com/alphaware"><li>Facebook</li></a>
				<a href="http://www.twitter.com/alphaware"><li>Twitter</li></a>
				<a href="http://www.pinterest.com/alphaware"><li>Pinterest</li></a>
				<a href="http://www.tumblr.com/alphaware"><li>Tumblr</li></a>
			</ul>
		</div>
	</div>
</body>
</html>
