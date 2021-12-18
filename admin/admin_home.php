<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('../template/header_admin.php'); ?>

	<br>

	<?php require_once('../template/admin_nav.php'); ?>

	<div id="rightcontent" style="position:absolute; top:10%;">

		<div id="container" style="min-width: 310px; height: 600px; max-width: 1000px; margin: 0 auto; float:left;">
			<!--Javascript function in the head to put a pie chart in ID="container"-->
		</div>

		<br>

		<div class="alert alert-info" style="background-color:transparent; border:0px; color:#022638; font-weight: bold;">
			<center><h2>Top Selling Products</h2></center>
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Rank</th>
					<th>Brand</th>
					<th>Product Name</th>
					<th>No. of Units sold</th>
				</tr>
				</thead>
				<?php

					$rank=0;
					$query = $conn->query("SELECT transactiondetail.productid, product.brand, product.name, SUM(quantity) AS units FROM transactiondetail LEFT JOIN product ON product.productid=transactiondetail.productid GROUP BY productid ORDER BY units DESC LIMIT 10;") or die(mysqli_error());
					while($fetch = $query->fetch_array())
						{
				?>
				<tr>
					<td><?= ++$rank;?></td>
					<td><?= $fetch['brand']?></td>
					<td><?= $fetch['name']?></td>
					<td><?= $fetch['units']?></td>
				</tr>
				<?php
					}
					$conn->close();
				?>
			</table>
		</div>
	</div>

</body>
</html>
