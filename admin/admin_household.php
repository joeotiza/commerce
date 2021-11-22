<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<head>
  <title>EasyBuy</title>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="icon" href="../img/logo.png" />
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
</head>

<body>

	<div id="header" style="position:fixed;">
		<img src="../img/logo.png">
		<label>EasyBuy</label>

		<?php
				$id = (int) $_SESSION['id'];

					$query = $conn->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch_array ();

			?>

			<ul>
				<li><a href="../function/admin_logout.php">Logout</a></li>
				<li><a><?php echo $fetch['username']; ?></a></li>
				<li>Welcome:</li>
			</ul>
	</div>

	<br>


			<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:222px; margin-top:140px; z-index:-1000;">Add Product</a>
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
									<td><input type="file" name="image" required></td>
								</tr>
								<?php include("random_id.php");
								echo '<tr>
									<td><input type="hidden" name="productid" value="'.$code.'" required></td>
								<tr/>';
								?>
								<tr>
									<td><input type="text" name="name" placeholder="Product Name" style="width:250px;" required></td>
								<tr/>
								<tr>
									<td><input type="text" name="price" placeholder="Price" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="number" name="quantity" placeholder="No. of Stock" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="hidden" name="category" value="Household Supplies"></td>
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
						$productid = $_POST['productid'];
						$name = $_POST['name'];
						$price = $_POST['price'];
						$brand = $_POST['brand'];
						$category = $_POST['category'];
						$quantity = $_POST['quantity'];
						$code = rand(0,98987787866533499);

									$name = $code.$_FILES["image"] ["name"];
									$type = $_FILES["image"] ["type"];
									$size = $_FILES["image"] ["size"];
									$temp = $_FILES["image"] ["tmp_name"];
									$error = $_FILES["image"] ["error"];

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


					$q1 = $conn->query("INSERT INTO product ( productid, name, price, image, brand, category)
					VALUES ('$productid','$name','$price','$name', '$brand', '$category')");

					$q2 = $conn->query("INSERT INTO stock ( productid, quantity) VALUES ('$productid','$quantity')");

					header ("location:admin_household.php");
				}}
			}

					?>

					<div id="leftnav">
						<ul>
							<li><a href="admin_home.php">Dashboard</a></li>
							<li><a href="admin_home.php">Products</a>
								<ul>
									<li><a href="admin_electronics.php "style="font-size:15px; margin-left:15px;">Electronics</a></li>
									<li><a href="admin_household.php "style="font-size:15px; margin-left:15px;">Household Supplies</a></li>
									<li><a href="admin_clothing.php" style="font-size:15px; margin-left:15px;">Clothing</a></li>
									<li><a href="admin_stationery.php"style="font-size:15px; margin-left:15px;">Stationery</a></li>
									<li><a href="admin_drinks.php"style="font-size:15px; margin-left:15px;">Drinks</a></li>
									<li><a href="admin_accessories.php"style="font-size:15px; margin-left:15px;">Accessories</a></li>
									<li><a href="admin_snacks.php"style="font-size:15px; margin-left:15px;">Snacks</a></li>
								</ul>
							</li>
							<li><a href="customer.php">Customers</a></li>
							<li><a href="message.php">Messages</a></li>
						</ul>
					</div>

					<div id="rightcontent" style="position:absolute; top:10%;">
								<div class="alert alert-info"><center><h2>Household Supplies</h2></center></div>
								<br />
									<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Product here..." id="filter"></label>
								<br />

								<div class="alert alert-info">
								<table class="table table-hover" style="background-color:;">
									<thead>
									<tr style="font-size:20px;">
										<th>Product Image</th>
										<th>Product Name</th>
										<th>Product Price</th>
										<th>No. of Stock</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php

										$query = $conn->query("SELECT * FROM `product` WHERE category='Household Supplies' ORDER BY `name`") or die(mysqli_error());
										while($fetch = $query->fetch_array())
											{
											$id = $fetch['productid'];
									?>
									<tr class="del<?php echo $id?>">
										<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['image']?>" height = "70px" width = "80px"></td>
										<td><?php echo $fetch['name']?></td>
										<td>Ksh.<?php echo number_format($fetch['price'])?></td>

										<?php
										$query1 = $conn->query("SELECT * FROM `stock` WHERE productid='$id'") or die(mysqli_error());
										$fetch1 = $query1->fetch_array();

											$quantity = $fetch1['quantity'];
										?>

										<td><?php echo $fetch1['quantity']?></td>
										<td>
										<?php
										echo "<a href='stockin.php?id=".$id."' class='btn btn-success' rel='facebox'> Stock In</a> ";
										echo "<a href='stockout.php?id=".$id."' class='btn btn-danger' rel='facebox'> Stock Out</a>";
										?>
										</td>
									</tr>
									<?php
										}
									?>
									</tbody>
								</table>
								</div>
								</div>

					  <?php
					  /* stock in */
					  if(isset($_POST['stockin'])){

					  $pid = $_POST['pid'];

					 $result = $conn->query("SELECT * FROM `stock` WHERE productid='$pid'") or die(mysqli_error());
					 $row = $result->fetch_array();

					  $old_stck = $row['quantity'];
					  $new_stck = $_POST['new_stck'];
					  $total = $old_stck + $new_stck;

					  $que = $conn->query("UPDATE `stock` SET `quantity` = '$total' WHERE `productid`='$pid'") or die(mysqli_error());

					  echo "<script>window.location = 'admin_household.php'</script>";
						//header("Location:admin_feature.php");
					 }

					  /* stock out */
					 if(isset($_POST['stockout'])){

					  $pid = $_POST['pid'];

					 $result = $conn->query("SELECT * FROM `stock` WHERE productid='$pid'") or die(mysqli_error());
					 $row = $result->fetch_array();

					  $old_stck = $row['quantity'];
					  $new_stck = $_POST['new_stck'];
					  $total = $old_stck - $new_stck;

					  $que = $conn->query("UPDATE `stock` SET `quantity` = '$total' WHERE `productid`='$pid'") or die(mysqli_error());

					  echo "<script>window.location = 'admin_household.php'</script>";
					  //header("location:admin_feature.php");
					 }
					  ?>

					</body>
					</html>
					<script type="text/javascript">
						$(document).ready( function() {

							$('.remove').click( function() {

							var id = $(this).attr("id");


							if(confirm("Are you sure you want to delete this product?")){


								$.ajax({
								type: "POST",
								url: "../function/remove.php",
								data: ({id: id}),
								cache: false,
								success: function(html){
								$(".del"+id).fadeOut(2000, function(){ $(this).remove();});
								}
								});
								}else{
								return false;}
							});
						});

					</script>
