<?php

		include ("../db/dbconn.php");
		include ("session.php");
			if(ISSET($_POST['edit']));
			{
				$id = $_SESSION['id'];

				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$town=$_POST['town'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];
				$password=$_POST['password'];

				$conn->query("UPDATE customer SET firstname='$firstname', lastname='$lastname', town='$town',
							mobile='$mobile', email='$email'
							WHERE customerid='$id';")
							or die (mysqli_error());

				$conn->query("UPDATE customerpassword SET password=SHA('$password') WHERE customerid='$id'; ")
							or die (mysqli_error());

					header("location:../home.php");
			}

	?>
