<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('../template/header_admin.php'); ?>

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

					<?php require_once('../template/admin_nav.php'); ?>

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
				echo "Date : ". date("jS M Y", strtotime($fetch['date']))."";

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
				$conn->close();
				?>

			</table>
			<legend></legend>
			<h4>TOTAL: Ksh.<?= number_format($amnt); ?></h4>
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
