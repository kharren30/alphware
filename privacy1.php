<?php
	include("function/session.php");
	include("db/dbconn.php");
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
	
	<br />
	<br />
	
		<div id="content">
			<legend><h3>Privacy Policy</h3></legend>
				<p>The Alphaware Incorporated respect the privacy of the visitors
					to the alphaware.com website and the local websites connected with it, and take great care to protect your 
					information.. This privacy policy tells you what information we collect from you, how we may use it and 
					the steps we take to ensure that it is protected.
				</p>
			<hr>
				<h4>Protection of visitors information</h4>
					<p>In order to protect the information you provide to us by visiting our website we have implemented various
						security measures. Your personal information is contained behind secured networks and is only accessible 
						by a limited number of people, who have special access rights and are required to keep the information 
						confidential.Please keep in mind though that whenever you give out personal information online there is a 
						risk that third parties may intercept and use that information. While Alphaware strives to protect its user's 
						personal information and privacy, we cannot guarantee the security of any information you disclose online 
						and you do so at your own risk.</p>
			<hr>
				<h4>Use of cookies</h4>
					<p>A cookie is a small string of information that the website that you visit transfers to your computer for 
						identification purposes. Cookies can be used to follow your activity on the website and that information 
						helps us to understand your preferences and improve your website experience. Cookies are also used to 
						remember for instance your user name and password.</p>
					<p>You can turn off all cookies, in case you prefer not to receive them. You can also have your computer warn
						you whenever cookies are being used. For both options you have to adjust your browser settings 
						(like internet explorer). There are also software products available that can manage cookies for you. 
						Please be aware though that when you have set your computer to reject cookies, it can limit the 
						functionality of the website you visit and it’s possible then that you do not have access to some of the 
						features on the website.</p>
			<hr>
				<h4>Online policy</h4>
					<p>The Privacy Policy does not extend to anything that is inherent in the operation of the internet, and 
						therefore beyond adidas' control, and is not to be applied in any manner contrary to applicable law or 
						governmental regulation. This online privacy policy only applies to information collected through our 
						website and not to information collected offline.</p>
			
				
		</div>
</div>
	<br />
<div>
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
	</div>
</body>
</html>