<?php

include('db/dbconn.php');

if (isset($_POST['login']))

	{
		$email=$_POST['email'];
		$password=$_POST['password'];


			$result=$conn->query("SELECT * FROM customer LEFT JOIN customerpassword ON customer.customerid = customerpassword.customerid WHERE email='$email' AND password=SHA('$password') ")
				or die ('cannot login' . mysqli_error());
			$row=$result->fetch_array  ();
			$run_num_rows = $result->num_rows;

						if ($run_num_rows > 0 )
						{
							session_start ();
							$_SESSION['id'] = $row['customerid'];
							header ("location:home.php");
						}

						else
						{
							echo "<script>alert('Invalid Email or Password'); window.location.href='home.php';</script>";
						}
	}

?>
