<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>

<?php require_once('template/header.php'); ?>

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
			$result=$conn->query("Select * from product LEFT JOIN stock ON product.productid=stock.productid where product.productid=$id");
			$myrow=$result->fetch_array();
			$name=$myrow['name'];
			$name=substr($name,0,40);
			$price=$myrow['price'];
			$image=$myrow['image'];
			$product_brand=$myrow['brand'];
			$in_stock=(int)$myrow['quantity'];
			$line_cost=$price*$x;
			$total=$total+$line_cost;

			if ($x > $in_stock)
			{
				$x=$in_stock;
				$_SESSION['cart'][$id]--;
				$line_cost=$price*$x;
				echo "<script>alert('Sorry, only ".$in_stock." ".$name."\'s in stock.');</script>";
			}


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

 						$query = $conn->query("SELECT * FROM (SELECT product.productid, product.brand,product.category,product.image,product.name,product.price,stock.quantity FROM product LEFT JOIN stock ON product.productid=stock.productid WHERE stock.quantity>0 AND product.productid IN ($rec_ids) AND product.productid not in ($in_cart)) _t ORDER BY RAND() LIMIT 6;") or die (mysqli_error());

 							while($fetch = $query->fetch_array())
 								{

 								$pid = $fetch['productid'];
 								$qty = $fetch['quantity'];

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
		</div>

			<?php require_once('template/footer.php'); ?>

		</body>
		</html>
