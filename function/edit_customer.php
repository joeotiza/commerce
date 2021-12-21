<?php

		include ("../db/dbconn.php");
		include ("session.php");

		if(ISSET($_POST['edit']));//name=edit form activated
		{
				$id = $_SESSION['id'];//session ID global variable

				$firstname=addslashes($_POST['firstname']);//addslashes to deal with apostrophes
				$lastname=addslashes($_POST['lastname']);
				$address=$_POST['address'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];
				$password=$_POST['password'];

				$conn->query("UPDATE customer SET firstname='$firstname', lastname='$lastname', address='$address',
							mobile='$mobile', email='$email'
							WHERE customerid='$id';")
							or die (mysqli_error());

				$conn->query("UPDATE customerpassword SET password=SHA('$password') WHERE customerid='$id'; ")
							or die (mysqli_error());

					header("location:../home.php");
		}
		$conn->close();
	?>
