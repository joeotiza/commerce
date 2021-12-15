<!--Opening content of customer pages, with opening <body> and <div id=container> tags-->

<?php require_once('customer_head.php'); ?>
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
					<table class="accountdetails">
								<tr>
									<td class="profile">Name:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Town:</td><td class="profile"><?php echo $fetch['town'];?></td>
								</tr>
								<tr>
									<td class="profile">Mobile Number:&nbsp;</td><td class="profile"><?php echo $fetch['mobile'];?></td>
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
