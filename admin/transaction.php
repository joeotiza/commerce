<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
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
          			<div class="alert alert-info"><center><h2>Transactions	</h2></center></div>
          			<br />
          				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Transactions here..." id="filter"></label>
          			<br />

          			<div class="alert alert-info">
          			<table class="table table-hover" style="background-color:;">
          				<thead>
          				<tr style="font-size:16px;">
          					<th>ID</th>
          					<th>DATE</th>
          					<th>Customer Name</th>
          					<th>Total Amount</th>
          					<th>Order Status</th>
          					<th>Action</th>
          				</tr>
          				</thead>
          				<tbody>
          				<?php

          					$query = $conn->query("SELECT * FROM transaction LEFT JOIN customer ON customer.customerid = transaction.customerid ORDER BY transaction.date DESC") or die(mysqli_error());
          					while($fetch = $query->fetch_array())
          						{
          						$id = $fetch['transactionid'];
          						$amnt = $fetch['amount'];
          						$o_stat = $fetch['status'];
          						$o_date = $fetch['date'];

          						$name = $fetch['firstname'].' '.$fetch['lastname'];
          				?>
          				<tr>
          					<td><?php echo $id; ?></td>
          					<td><?php echo $o_date; ?></td>
          					<td><?php echo $name; ?></td>
          					<td><?php echo number_format($amnt); ?></td>
          					<td><?php echo $o_stat; ?></td>
          					<td><a href="receipt.php?tid=<?php echo $id; ?>">View</a>
          					<?php
          					if($o_stat == 'Confirmed'){

          					}elseif($o_stat == 'Cancelled'){

          					}else{
          					echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirm</a> ';
          					echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancel</a></td>';
          					}
          					?>
          				</tr>
          				<?php
          					}
          				?>
          				</tbody>
          			</table>
          			</div>
          			</div>
				</body>
		</html>
