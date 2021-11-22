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
	<script src="../js/button.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/transition.js"></script>
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

		<div id="container" style="min-width: 310px; height: 600px; max-width: 1000px; margin: 0 auto; background:none; float:left;"></div>



	</div>

</body>
</html>
