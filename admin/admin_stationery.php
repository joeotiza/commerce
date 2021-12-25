<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('../template/header_admin.php'); ?>

	<br>


			<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:222px; margin-top:140px; z-index:-1000;">Add Product</a>
			<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Add Product...</h3>
				</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data">
						<center>
							<table>
								<tr>
									<td><input type="file" name="image" required></td>
								</tr>
								<?php include("random_id.php");
								echo '<tr>
									<td><input type="hidden" name="productid" value="'.$code.'" required></td>
								<tr/>';
								?>
								<tr>
									<td><input type="text" name="name" placeholder="Product Name" style="width:250px;" required></td>
								<tr/>
								<tr>
									<td><input type="text" name="price" placeholder="Price" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="text" name="brand" placeholder="Brand Name	" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="number" name="quantity" placeholder="No. of Stock" style="width:250px;" required></td>
								</tr>
								<tr>
									<td><input type="hidden" name="category" value="Stationery"></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="add" value="Add">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
						</form>
				</div>
			</div>

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

									$img = $code.$_FILES["image"] ["name"];
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
											move_uploaded_file($temp,"../photo/".$img);

											require_once('../function/addproduct.php');
					header ("location:admin_stationery.php");
				}}
			}

					?>

					<?php require_once('../template/admin_nav.php'); ?>

					<div id="rightcontent" style="position:absolute; top:10%;">
								<div class="alert alert-info"><center><h2>Stationery</h2></center></div>
								<br />
									<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Product here..." id="filter"></label>
								<br />

								<div class="alert alert-info">
								<table class="table table-hover" style="background-color:;">
									<thead>
									<tr style="font-size:20px;">
										<th>Product Image</th>
										<th>Product Name</th>
										<th>Product Price</th>
										<th>No. of Stock</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php

										$query = $conn->query("SELECT * FROM `product` WHERE category='Stationery' AND productstatus='On sale' ORDER BY `name`") or die(mysqli_error());
										while($fetch = $query->fetch_array())
											{
											$id = $fetch['productid'];
									?>
									<tr class="del<?php echo $id?>">
										<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['image']?>" height = "70px" width = "80px"></td>
										<td><?php echo $fetch['name']?></td>
										<td>Ksh.<?php echo number_format($fetch['price'])?></td>

										<?php
										$query1 = $conn->query("SELECT * FROM `stock` WHERE productid='$id'") or die(mysqli_error());
										$fetch1 = $query1->fetch_array();

											$quantity = $fetch1['quantity'];
										?>

										<td><?php echo $fetch1['quantity']?></td>
										<td>
										<?php
										echo "<a href='stockin.php?id=".$id."' class='btn btn-success' rel='facebox'><i class='fas fa-plus-circle'></i> Stock In</a> ";
										echo "<a href='stockout.php?id=".$id."' class='btn btn-danger' rel='facebox'><i class='fas fa-minus-circle'></i> Stock Out</a>";
										echo "<br><br><a href='discontinue.php?id=".$id."' class='btn btn-primary' rel='facebox'><i class='fa fa-trash-o'></i> Discontinue</a>";
										?>
										</td>
									</tr>
									<?php
										}
									?>
									</tbody>
								</table>
								</div>
								</div>

					  <?php
					  /* stock in */
					  if(isset($_POST['stockin'])){

					  $pid = $_POST['pid'];

					 $result = $conn->query("SELECT * FROM `stock` WHERE productid='$pid'") or die(mysqli_error());
					 $row = $result->fetch_array();

					  $old_stck = $row['quantity'];
					  $new_stck = $_POST['new_stck'];
					  $total = $old_stck + $new_stck;

					  $que = $conn->query("UPDATE `stock` SET `quantity` = '$total' WHERE `productid`='$pid'") or die(mysqli_error());

					  echo "<script>window.location = 'admin_stationery.php'</script>";
						//header("Location:admin_feature.php");
					 }

					  /* stock out */
					 if(isset($_POST['stockout'])){

					  $pid = $_POST['pid'];

					 $result = $conn->query("SELECT * FROM `stock` WHERE productid='$pid'") or die(mysqli_error());
					 $row = $result->fetch_array();

					  $old_stck = $row['quantity'];
					  $new_stck = $_POST['new_stck'];
					  $total = $old_stck - $new_stck;

					  $que = $conn->query("UPDATE `stock` SET `quantity` = '$total' WHERE `productid`='$pid'") or die(mysqli_error());

					  echo "<script>window.location = 'admin_stationery.php'</script>";
					  //header("location:admin_feature.php");
					 }
					 /* discontinue */
				 if(isset($_POST['discontinue'])){

					$pid = $_POST['pid'];

					$query1 = $conn->query("UPDATE `stock` SET `quantity` = 0 WHERE `productid`='$pid'") or die(mysqli_error());
					$query2 = $conn->query("UPDATE `product` SET `productstatus` = 'DISCONTINUED' WHERE `productid`='$pid'") or die(mysqli_error());

					echo "<script>window.location = 'admin_stationery.php'</script>";
					//header("location:admin_feature.php");
				 }
					$conn->close();
					  ?>

		</body>
	</html>
