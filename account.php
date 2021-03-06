<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('template/customer_head.php'); ?>
<body>
	<div id="header">
		<img src="img/logo.png">
		<label>EasyBuy</label>
    <?php
      $id = (int) $_SESSION['id'];//convert from string to int

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
							<table class="accountdetails">
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Address:</td><td class="profile"><?php echo $fetch['address'];?></td>
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

	<?php

									$id = (int) $_SESSION['id'];
									$towns=array("Buru buru","Dagoretti","Eastleigh","Githurai","Jogoo Road","Karen","Kasarani","Langata","Lavington","Madaraka","Mathare","Mombasa Road","Nairobi Central","Nairobi West","Ngara","Ngong","Parklands","South C","Thika Road","Waiyaki Way", "Westlands");

									$query = $conn->query ("SELECT * FROM customer  WHERE customerid = '$id' ") or die (mysql_error());
									$fetch = $query->fetch_array ();
									if (($query -> num_rows) > 0)
									{
										$firstname=$fetch['firstname'];
										$lastname=$fetch['lastname'];
										$address=$fetch['address'];
										$mobile=$fetch['mobile'];
										$email=$fetch['email'];
										$customerid=$fetch['customerid'];
										array_unshift($towns,$address);
										$towns=array_unique($towns);
									}
									$conn->close();
							?>
					<div id="account">
						<form method="POST" action="function/edit_customer.php">
							<center>
							<h3>Edit My Account...</h3>
								<table>
									<tr>
										<td>First Name:</td><td><input type="text" name="firstname" placeholder="Firstname" required value="<?php echo $firstname; ?>"></td>
									</tr>
									<tr>
										<td>Last Name:</td><td><input type="text" name="lastname" placeholder="Lastname" required value="<?php  echo $lastname;?>"></td>
									</tr>
									<tr>
										<td>Address:</td><td><select name="address" required>
											<?php
												foreach($towns as $option)
												{
													echo "<option>".$option."</option>";
												}
											 ?>
											</select></td>
									</tr>

									<tr>
										<td>Mobile Number:</td><td><input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $mobile;?>"></td>
									</tr>
									<tr>
										<td>Email:</td><td><input type="email" name="email" placeholder="Email" required value="<?php echo $email;?>"></td>
									</tr>
									<tr>
										<td>Password</td><td><input type="password" name="password" placeholder="Password" ></td>
									</tr>
									<tr>
										<td></td><td><input type="submit" name="edit" value="Save Changes" class="btn btn-primary">&nbsp;<a href="home.php"><input type="button" name="cancel" value="Cancel" class="btn btn-danger"></a></td>
									</tr>
								</table>
							</center>
						</form>
					</div>



		<br>

	</div>

</body>
</html>
