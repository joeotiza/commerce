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

	<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<table class="table" style="width:50%;">
	<label style="font-size:25px;">Summary of Order</label>
		<tr>
			<th><h5>Quantity</h5></td>
			<th><h5>Product Name</h5></td>
			<th><h5>Brand</h5></td>
			<th><h5>Price</h5></td>
		</tr>

		<?php
		$t_id = $_GET['tid'];
		$query = $conn->query("SELECT * FROM transaction WHERE transactionid = '$t_id'") or die (mysqli_error());
		$fetch = $query->fetch_array();

		$amnt = $fetch['amount'];
		$t_id = $fetch['transactionid'];

		$query2 = $conn->query("SELECT * FROM transactiondetail LEFT JOIN product ON product.productid = transactiondetail.productid WHERE transactiondetail.transactionid = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch_array()){

		$pname = $row['name'];
		$pbrand = $row['brand'];
		$pprice = $row['price'];
		$oqty = $row['quantity'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";
		echo "<td>".$pbrand."</td>";
		echo "<td>".number_format($pprice)."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>
	<h4>TOTAL: Ksh.<?php echo number_format($amnt); ?></h4>
	</form>

	<div class='pull-right'>
<div class="">
    <form action="home.php" method="post" >
    <input type="image" src="img/confirm.jpg" height='100px' border="0" name="submit" alt="Submit">
    </form>
</div>
	</div>

	<?php require_once('footer.php'); ?>
