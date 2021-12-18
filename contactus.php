<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>

<?php require_once('template/header.php'); ?>


		<img src="img/Feedback.png" style="width:750px; display: block; margin: auto;">
	<br />
	<br />

		<div id="content">
			<form method="post">
				<table style="position:relative; left:25%;">
					<tr>
						<td style="font-size:20px;">Email:</td><td><input type="email" name='email' value="<?= $fetch['email']; ?>" style="width:400px;"></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Message:</td><td><textarea name="message" style="width:400px; height:300px;" required></textarea></td>
					</tr>
					<tr>
						<td></td><td><button class="btn btn-info" name="send" style="width:300px;"><i class='fas fa-check'></i> Submit</button>&nbsp;<a href="index.php"><button class="btn btn-danger" style="width:110px;"><i class='fas fa-times'></i> Cancel</button></a></td>
					</tr>
				</table>
			</form>
		</div>
		<?php

			if(isset($_POST['send']))
			{
				$email = $_POST['email'];
				$message = $_POST["message"];

				$conn->query ("INSERT INTO `feedback` (email, message) VALUES ('$email', '$message')") or die(mysqli_error());
			}
			$conn->close();
		?>

	<br />
</div>

<?php require_once('template/footer.php'); ?>

</body>
</html>
