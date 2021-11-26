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

	<?php
			if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = $conn->query("SELECT * FROM product WHERE productid = '$id' ");
			$row = $query->fetch_array();
		?>
				<div>
					<center>
						<img class="img-polaroid" style="height:350px;" src="photo/<?php echo $row['image']; ?>">
						<h2 class="text-uppercase bg-primary"><?php echo $row['name']?></h2>
						<h3 class="text-uppercase">Ksh.<?php echo number_format($row['price'])?></h3>
						<h3 class="text-uppercase">Brand: <?php echo $row['brand']?></h3>
						<?php echo "<a href='cart.php?id=".$id."&action=add'><input type='submit' class='btn btn-inverse' name='add' value='Add to Cart'></a> &nbsp;  <a href='home.php'><button class='btn btn-inverse'>Back</button></a> " ?>
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
						<input type="hidden" name="product_price" value="<?php echo number_format($row['price'])?>">
						<input type="hidden" name="product_name" value="<?php echo $row['name']?>">
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
						<h4>Total: Ksh.<?php echo number_format($row['price']); ?> </h4>
						<br />
						<input type="checkbox" required> I Agree the <a href="#terms" data-toggle="modal"> Terms and Condition</a> of Online Shoe Store Inc.
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
				<h3 id="myModalLabel">Online Shoe Store Inc. Terms and Condition</h3>
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
</div>
