<?php

	include('../db/dbconn.php');

if (isset($_POST['enter']))

	{
		$username=$_POST['username'];
		$password=$_POST['password'];


			$result=$conn->query("SELECT * FROM admin WHERE username='$username' AND password=SHA('$password') ")
				or die ('cannot login' . mysqli_error());
			$row=$result->fetch_array  ();
			$run_num_rows = $result->num_rows;

						if ($run_num_rows > 0 )
						{
							session_start ();//start the session
							$_SESSION['id'] = $row['adminid'];//set session variable for ID
							header ("location:admin_home.php");//redirect to admin_home
						}

						else
						{
							echo "<script>alert('Invalid Email or Password'); window.location.href='admin_home.php';</script>";
						}


	}

?>
