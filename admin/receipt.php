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
        function printDiv(divID) {
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

					header ("location:admin_product.php");
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
							<li><a href="transaction.php">Transactions</a></li>
							<li><a href="customer.php">Customers</a></li>
							<li><a href="message.php">Messages</a></li>
							<li><a href="order.php">Orders</a></li>
						</ul>
					</div>

					<div id="rightcontent" style="position:absolute; top:10%;">
					<div class="alert alert-info"><center><h2>Transactions	</h2></center></div>
					<br />


					<div class="alert alert-info">
					<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
			<div id="printablediv">
			<center>
			<table class="table" style="width:50%;">
			<label style="font-size:25px;">EasyBuy</label>
			<label style="font-size:20px;">Official Receipt</label>
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
				echo "Date : ". $fetch['date']."";

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
			</center>
			</div>

			<div class='pull-right'>
			<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="fas fa-print"></i> Print Receipt</a></div>
			</div>
			</form>
					</div>
					</div>



		</body>
		</html>
