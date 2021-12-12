<?php

	include('db/dbconn.php');

	if (isset($_POST['signup']))//name=signup form is activated
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$town=$_POST['town'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$query = $conn->query("SELECT * FROM `customer` WHERE `email` = '$email'");
		$check = $query->num_rows;

		if($check == 1)
		{
			echo "<script>alert('EMAIL ALREADY EXIST')</script>";
		}

		else
		{
			$conn->query ("INSERT INTO customer (firstname, lastname, town, mobile, email)
					VALUES ('$firstname', '$lastname', '$town', '$mobile', '$email')")
					or die(mysqli_error());

			$conn->query ("INSERT INTO customerpassword (customerid, password)
					VALUES ((SELECT  customerid FROM `customer` WHERE `email`='$email'), SHA('$password'))")
					or die(mysqli_error());//insert hashed password
		}

	}
?>
