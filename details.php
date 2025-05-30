<?php
	include("function/session.php");
	include("db/dbconn.php");
	include("function/cash.php");
	include("function/paypal.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AlphaWare</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
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
		<img src="img/logo.jpg">
		<label>alphaware</label>
			
			<?php
				$id = (int) $_SESSION['id'];
			
					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>
	
			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			</ul>
	</div>
	
	<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">My Account</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];
			
								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
								$fetch = mysqli_fetch_array ($query);
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Country:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								<tr>
									<td class="profile">ZIP Code:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								<tr>
									<td class="profile">Telephone Number:</td><td class="profile"><?php echo $fetch['telephone'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Edit Account"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
					</form>
			</div>
	
	
	
	<br>
<div id="container">
	<div class="nav">	
			 <ul>
				<li><a href="home.php">   <i class="icon-home"></i>Home</a></li>
				<li><a href="product1.php"> 			 <i class="icon-th-list"></i>Product</a></li>
				<li><a href="aboutus1.php">   <i class="icon-bookmark"></i>About Us</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contact Us</a></li>
				<li><a href="privacy1.php"><i class="icon-info-sign"></i>Privacy Policy</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i>FAQs</a></li>
			</ul>
	</div>
		<?php 
			if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id' ");
			$row = mysqli_fetch_array($query);
		?>
				<div>
					<center>
						<img class="img-polaroid" style="width:400px; height:350px;" src="photo/<?php echo $row['product_image']; ?>">
						<h2 class="text-uppercase bg-primary"><?php echo $row['product_name']?></h2>
						<h3 class="text-uppercase">Php <?php echo $row['product_price']?></h3>
						<h3 class="text-uppercase">Size: <?php echo $row['product_size']?></h3>
						<?php echo "<a href='cart.php?id=".$id."&action=add'><input type='submit' class='btn btn-inverse' name='add' value='Add to Cart'></a> &nbsp;  <a href='product1.php'><button class='btn btn-inverse'>Back</button></a> " ?>
					</center>
				</div>
		<?php }?>
		
		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Mode Of Payment</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
						<input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
						<input type="hidden" value="<?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['lastname'];?>" name="customer">
						<textarea name="destination" placeholder="Destination" style="height:100px; width:250px;" required></textarea>
						<select name="size" required style="width:150px;">
							<option value="">---------Size----------</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
						<br />
						<h4>Total: P <?php echo $row['product_price']; ?> </h4>
						<br />
						<input type="checkbox" required> I Agree the <a href="#terms" data-toggle="modal"> Terms and Condition</a> of AlphaWare Inc.
					</center>
				</div>
			<div class="modal-footer">
				<center>
					<input type="image" src="images/button.jpg" border="0" name="paypal" alt="Make payments with PayPal - it's fast, free and secure!"  />
					<input type="submit" name="cash" value="Cash" class="btn btn-lg">
				</center>
					<button class="btn btn-danger btn-mini" data-dismiss="modal" aria-hidden="true">Cancel</button>
					</form>
			</div>
		</div>
		
		<div id="terms" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">AlphaWare Inc. Terms and Condition</h3>
			</div>
				<div class="modal-body">
					<ul>
						<li>You are guaranteed that your product will be deliver 2-3 days upon ordering.</li>
						<li>Guaranteed time maybe suspended depending on the weather conditions for the safety of our delivery personnel.</li>
						<li>All prices quoted are in Philippine pesos. Price and availability information is subject to change without notice.</li>
						<li>Mode of payment are as follows:customers with paypal account can pay through paypal otherwise Cash on Delivery(COD).</li>
						<li>Upon receiving your product we will charge for delivering for only 150 pesos, depending on the location.</li>
					</ul>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>





</div>
		<br />	
</div>
	<br />
	<div id="footer">
		<div class="foot">
			
			<p style="font-size:25px;">Alphaware</p>
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
			
			<div id="develop">
				<h4>Developed By:</h4>
					<ul>
						<a href="#"><li>Allen Joshua Nicor</li><a>
						<a href="#"><li>Ryan Carl Biaquis</li><a>
					</ul>
			</div>
	</div>
</body>
</html>