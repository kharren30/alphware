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
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>
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
	
		<!--Le Facebox-->
		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox() 
		})
		</script>
		
		<script language="javascript" type="text/javascript">
        function printFunc(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
		</script>
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
				<li>Welcome:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>
	
	<br>

		
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Add Product...</h3>
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tr>
								<td><input type="file" name="product_image" required></td>
							</tr>
							<?php include("random_id.php"); 
							echo '<tr>
								<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
							<tr/>';
							?>
							<tr>
								<td><input type="text" name="product_name" placeholder="Product Name" style="width:250px;" required></td>
							<tr/>
							<tr>
								<td><input type="text" name="product_price" placeholder="Price" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="product_size" placeholder="Size" style="width:250px;" maxLength="2" required></td>
							</tr>
							<tr>
								<td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="number" name="qty" placeholder="No. of Stock" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="hidden" name="category" value="basketball"></td>
							</tr>
						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Add">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
			</div>
		</div>
		
		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['product_code'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$product_size = $_POST['product_size'];
					$brand = $_POST['brand'];
					$category = $_POST['category'];
					$qty = $_POST['qty'];
					$code = rand(0,98987787866533499);
						
								$name = $code.$_FILES["product_image"] ["name"];
								$type = $_FILES["product_image"] ["type"];
								$size = $_FILES["product_image"] ["size"];
								$temp = $_FILES["product_image"] ["tmp_name"];
								$error = $_FILES["product_image"] ["error"];
										
								if ($error > 0){
									die("Error uploading file! Code $error.");}
								else
								{
									if($size > 30000000000) //conditions for the file
									{
										die("Format is not allowed or file size is too big!");
									}
									else
									{
										move_uploaded_file($temp,"../photo/".$name);
			

				$q1 = mysqli_query($conn, "INSERT INTO product ( product_id,product_name, product_price, product_size, product_image, brand, category)
				VALUES ('$product_code','$product_name','$product_price','$product_size','$name', '$brand', '$category')");
				
				$q2 = mysqli_query($conn, "INSERT INTO stock ( product_id, qty) VALUES ('$product_code','$qty')");
				
				header ("location:admin_product.php");
			}}
		}

				?>
			
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
			<div class="alert alert-info"><center><h2>Orders</h2></center></div>
			<br />
				<div style='width:975px;' class="alert alert-info">
					  <table class="table table-hover">	
						<thead>	
							<th>SHOE</th>
							<th>Transaction No.</th>
							<th>AMOUNT</th>
						</thead>
						  <tbody>
							<?php 
							$Q1 = mysqli_query($conn, "SELECT * FROM transaction WHERE order_stat = 'Confirmed'");
							while($r1 = mysqli_fetch_array($Q1)){
							
							$tid = $r1['transaction_id'];
							
							$Q2 = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$tid' ");
							$r2 = mysqli_fetch_array($Q2);
							
							$pid = $r2['product_id'];
							$o_qty = $r2['order_qty'];
							
							$p_price = $r2['product_price'];
							$brand = $r2['product_name'];
							
							echo "<tr>";
							echo "<td>".$brand."</td>";
							echo "<td>".$tid."</td>";
							echo "<td>".formatMoney($p_price)."</td>";
							echo "</tr>";
							}
							
							$Q3 = mysqli_query($conn, "SELECT sum(amount) FROM transaction WHERE order_stat = 'Confirmed'");
							while($r3 = mysqli_fetch_array($Q3)){
							
							$amnt = $r3['sum(amount)'];
							echo "<tr><td></td><td>TOTAL : </td> <td><b>Php ".formatMoney($amnt)."</b></td></tr>";
							}
							?>
						  </tbody>
					    </table>
				</div>
				
				<?php
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
?>



	
	
	</div>
	</form>
			</div>
			</div>
			
				
			
</body>
</html>