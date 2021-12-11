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

	<br />
	<br />

		<div id="content">
			<legend><h3>Privacy Policy</h3></legend>
				<p>EasyBuy Inc. respects the privacy of the visitors
					to the EasyBuy.com website and the local websites connected with it, and take great care to protect your
					information. This privacy policy tells you what information we collect from you, how we may use it and
					the steps we take to ensure that it is protected.
				</p>
			<hr>
				<h4>Protection of visitors information</h4>
					<p>In order to protect the information you provide to us by visiting our website we have implemented various
						security measures. Your personal information is contained behind secured networks and is only accessible
						by a limited number of people, who have special access rights and are required to keep the information
						confidential. Please keep in mind though that whenever you give out personal information online there is a
						risk that third parties may intercept and use that information. While EasyBuy strives to protect its user's
						personal information and privacy, we cannot guarantee the security of any information you disclose online
						and you do so at your own risk.</p>
			<hr>
				<h4>Use of cookies</h4>
					<p>A cookie is a small string of information that the website that you visit transfers to your computer for
						identification purposes. Cookies can be used to follow your activity on the website and that information
						helps us to understand your preferences and improve your website experience. Cookies are also used to
						remember for instance your user name and password.</p>
					<p>You can turn off all cookies, in case you prefer not to receive them. You can also have your computer warn
						you whenever cookies are being used. For both options you have to adjust your browser settings
						(like internet explorer). There are also software products available that can manage cookies for you.
						Please be aware though that when you have set your computer to reject cookies, it can limit the
						functionality of the website you visit and it’s possible then that you do not have access to some of the
						features on the website.</p>
			<hr>
				<h4>Online policy</h4>
					<p>The Privacy Policy does not extend to anything that is inherent in the operation of the internet, and
						therefore beyond EasyBuy's control, and is not to be applied in any manner contrary to applicable law or
						governmental regulation. This online privacy policy only applies to information collected through our
						website and not to information collected offline.</p>


		</div>
</div>

<br>

<?php require_once('footer.php'); ?>
