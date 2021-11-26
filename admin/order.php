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
	<script src="https://kit.fontawesome.com/981b9a1d0f.js" crossorigin="anonymous"></script>

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
				<li><a href="../function/admin_logout.php"><i class='fas fa-power-off'></i> Logout</a></li>
				<li><a><i class='fas fa-user-circle'></i> <?php echo $fetch['username']; ?></a></li>
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
												<th>Brand</th>
												<th>Product</th>
												<th>Transaction No.</th>
												<th>AMOUNT</th>
											</thead>
											  <tbody>
												<?php
												$Q1 = $conn->query("SELECT * FROM product LEFT JOIN transactiondetail ON product.productid = transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed'");
												while($r1 = $Q1->fetch_array()){

												$tid = $r1['transactionid'];



												$pid = $r1['productid'];
												$o_qty = $r1['quantity'];

												$p_price = $r1['price'];
												$brand=$r1['brand'];
												$name = $r1['name'];

												echo "<tr>";
												echo "<td>".$brand."</td>";
												echo "<td>".$name."</td>";
												echo "<td>".$tid."</td>";
												echo "<td>".number_format($p_price)."</td>";
												echo "</tr>";
												}

												$Q3 = $conn->query("SELECT sum(amount) FROM transaction WHERE status = 'Confirmed'");
												while($r3 = $Q3->fetch_array()){

												$amnt = $r3['sum(amount)'];
												echo "<tr><td></td><td></td><td>TOTAL : </td> <td><b>Ksh.".number_format($amnt)."</b></td></tr>";
												}
												?>
											  </tbody>
										    </table>
									</div>





						</div>
