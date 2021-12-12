<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('template/header.php'); ?>

	<div class="nav1">
			<ul>
				<li><a href="product.php">Electronics</a></li>
				<li>|</li>
				<li><a href="household.php" class="active" style="color:#111;">Household Supplies</a></li>
				<li>|</li>
				<li><a href="clothing.php">Clothing</a></li>
				<li>|</li>
				<li><a href="stationery.php">Stationery</a></li>
				<li>|</li>
				<li><a href="drinks.php">Drinks</a></li>
				<li>|</li>
				<li><a href="accessories.php">Accessories</a></li>
				<li>|</li>
				<li><a href="snacks.php">Snacks</a></li>
			</ul>
				<?= "<a href='cart.php?id=".$id."&action=view'><button class='btn btn-inverse' style='right:1%; position:fixed; top:10%;'><i class='fas fa-shopping-cart'></i> View Cart</button></a>" ?>
		</div>

		<div id="content">
				<br />
				<br />
				<div id="product">
					<form method="post">

					<?php

						$query = $conn->query("SELECT *FROM product WHERE category='Household Supplies' ORDER BY brand, name") or die (mysqli_error());

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
	</div>
</div>

			<?php require_once('template/footer.php'); ?>
		</body>
		</html>
