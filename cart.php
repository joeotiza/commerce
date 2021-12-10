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

	<form method="post" class="well" style="background-color:#fff;">
		<table class="table">
		<label style="font-size:25px;">My Cart</label>
			<tr>
				<th><h3>Image</h3></td>
				<th><h3>Product Name</h3></th>
				<th><h3>Brand</h3></th>
				<th><h3>Quantity</h3></th>
				<th><h3>Price</h3></th>
				<th><h3>Add</h3></th>
				<th><h3>Remove</h3></th>
				<th><h3>Subtotal</h3></th>
			</tr>

	<?php


		if (isset($_GET['id']))
		$id=$_GET['id'];
		else
		$id=1;
		if (isset($_GET['action']))
		$action=$_GET['action'];
		else
		$action="empty";

		switch($action)
		{

			case "view":
				if (isset($_SESSION['cart'][$id]))
				$_SESSION['cart'][$id];
			break;
			case "add":
				if (isset($_SESSION['cart'][$id]))
				$_SESSION['cart'][$id]++;
				else
				$_SESSION['cart'][$id]=1;
			break;
			case "remove":
				if (isset($_SESSION['cart'][$id]))
				{
					$_SESSION['cart'][$id]--;
					if ($_SESSION['cart'][$id]==0)
					unset($_SESSION['cart'][$id]);
				}
			break;
			case "empty":
				unset($_SESSION['cart']);
			break;
		}
	if (isset($_SESSION['cart']))
		{

		$total=0;
		foreach($_SESSION['cart'] as $id => $x)
		{
		$result=$conn->query("Select * from product where productid=$id");
		$myrow=$result->fetch_array();
		$name=$myrow['name'];
		$name=substr($name,0,40);
		$price=$myrow['price'];
		$image=$myrow['image'];
		$product_brand=$myrow['brand'];
		$line_cost=$price*$x;
		$total=$total+$line_cost;


			echo "<tr class='table'>";
			echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
			echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
			echo "<td><h4>".$product_brand."</h4></td>";
			echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
			echo "<td><h4>Ksh.".number_format($price)."</h4></td>";
			echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='fas fa-plus-circle'></i></a></td>";
			echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='fas fa-minus-circle'></i></a></td>";
			echo "<td><strong><h3>Ksh.".number_format($line_cost)."</h3></strong>";
			echo "</tr>";
			}

			echo"<tr>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><h2>TOTAL:</h2></td>";
			echo "<td colspan=2><strong><input type='hidden' value='".$total."' required name='total'><h2 class='text-danger'>Ksh.".number_format($total)."</h2></strong></td>";
			echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i> Empty cart</a></td>";
			echo "</tr>";
		}
	 	else
			echo "<font color='#111' class='alert alert-error' style='float:right'>Cart is empty</font>";

	?>
		</table>


		<div class='pull-right'>
		<a href='home.php' class='btn btn-inverse btn-lg'>Continue Shopping</a>
		<?php echo "<button name='pay_now' type='submit' class='btn btn-inverse btn-lg' >Purchase</button>";
		include ("function/pay.php");
		?>
		</form>
		</div>



 					<?php
					if (isset($_SESSION['cart'])){
						$title='You may also like...';}
						else {$title='';}
					echo "<div id='product' style='position:relative;''>
							 <center><h2><legend>".$title."</legend></h2></center>
							 <br />";
						include("kmean_cluster.php");
						//print_r($KMeans_output);
if (isset($_SESSION['cart'])){


						$rec_ids="";
						foreach($KMeans_output as $ids)
						{
							$rec_ids=$rec_ids.$ids.",";
						}
						$rec_ids=substr($rec_ids,0,-2);

						//echo $rec_ids;

						$in_cart="";
						foreach($itemsindex as $bought)
						{
							$in_cart=$in_cart.$bought.",";
						}
						$in_cart=substr($in_cart,0,-1);
						//echo $in_cart;

 						$query = $conn->query("SELECT * FROM (SELECT * FROM product WHERE productid IN ($rec_ids) AND productid not in ($in_cart)) _t ORDER BY RAND() LIMIT 6;") or die (mysqli_error());

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
 									echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> ".$fetch['brand']."</h3>";
 									echo "</center>";
 									echo "</div>";


 								}
							}
 					?>
 				</div>

			<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mode Of Payment</h3>
				</div>
					<div class="modal-body">
						<form method="post">
						<center>
							<input type="image" src="images/button.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"  />
							<br/>
							<br/>
							<button class="btn btn-lg" >Cash</button>
						</center>
					</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
						</form>
				</div>
			</div>
