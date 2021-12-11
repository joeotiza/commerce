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
		<img src="img/about-us.png" style="width:1150px; height:250px; ">
	<br />
	<br />


	<legend>History</legend>
		<div id="content">

					<p>EasyBuy is an e-commerce platform built by Joshua and Joseph in their garage.</p>
					<p>Inspired by how difficult it was for vendors to connect customers, the two founders built a machine learning recommender system using k-means clustering</p>
					<p>EasyBuy has enjoyed increased customer traffic ever since and is one of the top e-commerce platforms in Kenya.</p>

		</div>
	<br />
</div>

<br>

<?php require_once('footer.php'); ?>
