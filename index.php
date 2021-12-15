<?php
	include("function/login.php");
	include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('template/customer_head.php'); ?>

<body>
	<div id="header">
		<img src="img/logo.png">
		<label>EasyBuy</label>
			<ul>
				<li><a href="#signup"   data-toggle="modal">Sign Up</a></li>
				<li><a href="#login"   data-toggle="modal">Login</a></li>
			</ul>
	</div>

	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Login...</h3>
		</div>
		<div class="modal-body">
			<form method="post">
				<center>
					<input type="email" name="email" placeholder="Email" style="width:250px;">
					<input type="password" name="password" placeholder="Password" style="width:250px;">
				</center>
		</div>
		<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>
		</div>
	</div>

	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Sign Up Here...</h3>
		</div>

		<div class="modal-body">
			<form method="post">
				<center>
					<input type="text" name="firstname" placeholder="First Name" required>
					<input type="text" name="lastname" placeholder="Last Name" required>
					<select name="town" required><option value="" disabled selected hidden>Town</option>
						<?php
						$towns=array("Nairobi","Mombasa","Kisumu","Nakuru","Eldoret");
						foreach($towns as $option)
						{
							echo "<option>".$option."</option>";
						}
					 ?>
				 </select>
					<input type="text" name="mobile" placeholder="Mobile Number" maxlength="11">
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
				</center>
		</div>
		<div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>

	<div id="carousel">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner1.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner2.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner3.jpg" class="carousel"></div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
	</div>

		<br>
		<br>
		<br>
		<br>
		<br>


<?php require_once('template/footer.php'); ?>

</body>
</html>
