<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<head>
  <title>EasyBuy</title>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logo.png" />
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
	<script src="https://kit.fontawesome.com/981b9a1d0f.js" crossorigin="anonymous"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.png">
		<label>EasyBuy</label>
    <?php
      $id = (int) $_SESSION['id'];

        $query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
        $fetch = $query->fetch_array ();
    ?>

    <ul>
      <li><a href="function/logout.php"><i class='fas fa-power-off'></i> Logout</a></li>

      <li><a href="#profile" href  data-toggle="modal"><i class='fas fa-user-circle'></i> <?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			<li>Welcome:</li>
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

			$query = $conn->query ("SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
			$fetch = $query->fetch_array ();
		?>
		<center>
			<form method="post">
				<center>
					<table>
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Town:</td><td class="profile"><?php echo $fetch['town'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
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




<div id="content">
	<div class="nav">

		 <ul>
			<li><a href="home.php"><i class='fas fa-home'></i> Home</a></li>
			<li><a href="product.php"><i class='fas fa-bars'></i> Product</a>
			<li><a href="aboutus.php"><i class='fas fa-info-circle'></i> About Us</a></li>
			<li><a href="contactus.php"><i class='fas fa-envelope'></i> Contact Us</a></li>
			<li><a href="privacy.php"><i class='fas fa-unlock-alt'></i> Privacy Policy</a></li>
			<li><a href="faqs.php"><i class='fas fa-question-circle'></i> FAQs</a></li>
		</ul>
	</div>

	<div class="nav1">
			<ul>
				<li><a href="product.php">Electronics</a></li>
				<li>|</li>
				<li><a href="household.php">Household Supplies</a></li>
				<li>|</li>
				<li><a href="clothing.php">Clothing</a></li>
				<li>|</li>
				<li><a href="stationery.php" class="active" style="color:#111;">Stationery</a></li>
				<li>|</li>
				<li><a href="drinks.php">Drinks</a></li>
				<li>|</li>
				<li><a href="accessories.php">Accessories</a></li>
				<li>|</li>
				<li><a href="snacks.php">Snacks</a></li>
			</ul>
				<?php echo "<a href='cart.php?id=".$id."&action=view'><button class='btn btn-inverse' style='right:1%; position:fixed; top:10%;'><i class='fas fa-shopping-cart'></i> View Cart</button></a>" ?>
		</div>

		<div id="content">
				<br />
				<br />
				<div id="product">
					<form method="post">

					<?php

						$query = $conn->query("SELECT *FROM product WHERE category='Stationery' ORDER BY brand, name") or die (mysqli_error());

							while($fetch = $query->fetch_array())
								{

								$pid = $fetch['productid'];

								$query1 = $conn->query("SELECT * FROM stock WHERE productid = '$pid'") or die (mysqli_error());
								$rows = $query1->fetch_array();

								$qty = $rows['quantity'];

									echo "<div class='float'>";
									echo "<center>";
									echo "<a href='details.php?id=".$fetch['productid']."'><img class='img-polaroid' src='photo/".$fetch['image']."' height = '300px' width = '300px'></a>";
									echo "".$fetch['name']."";
									echo "<br />";
									echo "Ksh.".number_format($fetch['price'])."";
									echo "<br />";
									echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'>".$fetch['brand']."</h3>";
									echo "</center>";
									echo "</div>";
								}
					?>

					</form>
				</div>




			</div>
