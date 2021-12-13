<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('template/header.php'); ?>

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
    <form action="function/confirm.php" method="post" >
			<?php
    echo "<input type='image' src='img/confirm.jpg' height='100px' border='0' name='submit' alt='Confirm'>";
		 ?>
		</form>
</div>
	</div>
</div>

	<?php require_once('template/footer.php'); ?>
</body>
</html>
