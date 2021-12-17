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


	<a href=#purchase data-toggle="modal" class='btn btn-inverse btn-lg'>Change Mode of Payment</a>
	<div style="display: flex; align-items: center;">
	<?php
		if (isset($_POST['PayPal']))
		{
			$payBy='PayPal';
			$payimg="<img src='img/paypal.png' style='width:120px;' border='0' alt='Make payments with PayPal - it's fast, free and secure!'>";
		}
		elseif (isset($_POST['card']))
		{
			$payBy='Credit/Debit card';
			$payimg="<img src='img/credit.png' style='width:150px;' border='0' alt='Use a VISA or Mastercard debit/credit card.'>";
		}
		elseif (isset($_POST['mpesa']))
		{
			$payBy='Lipa na M-Pesa';
			$payimg="<img src='img/mpesa.png' style='width:120px;' border='0' alt='Lipa na M-Pesa.'>";
		}
		else
		{
			$payBy='Cash';
			$payimg="<img src='img/cash.png' style='width:120px;' border='0' alt='Pay with cash.'>";
		}
	echo "<h4>Paying via ".$payBy.".</h4>&emsp;".$payimg;
	?>


	<div class='pull-right' style="margin-left:auto;">
<div class="">
    <form action="function/confirm.php" method="post" >
			<button name='submit' style='border: none; background-color: transparent;'><img src='img/confirm.png' style='height:80px;' border='0' alt='Confirm'></button>
		</form>
</div>
</div>


<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Mode Of Payment</h3>
	</div>
		<div class="modal-body">
			<form method="post">
			<center>
				<button name="mpesa" style="border: none; background-color: transparent;"><img src="img/mpesa.png" style="width:120px;" border="0" alt="Lipa na M-Pesa."></button><br>
				<button name="card" style="border: none; background-color: transparent;"><img src="img/credit.png" style="width:120px;" border="0" alt="Use a VISA or Mastercard debit/credit card.">&nbsp;<b>Credit/Debit Card</b></button><br>
				<button name="PayPal" style="border: none; background-color: transparent;"><img src="img/paypal.png" style="width:120px;" border="0" alt="Make payments with PayPal - it's fast, free and secure!"></button><br>
				<button name='cash' style="border: none; background-color: transparent;"><img src="img/cash.png" style="width:120px;" border="0" alt="Pay with cash.">&nbsp;<b>Cash</b></button><br>
			</center>
		</div>
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>
	</div>
</div>



	</div>
</div>

	<?php require_once('template/footer.php');
	$conn->close(); ?>
</body>
</html>
