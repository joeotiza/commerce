<?php

	include('db/dbconn.php');

	$payBy="";
	if (isset($_POST['purchase']))
	{
		if (isset($_POST['Paypal']))
		{
			$payBy='PayPal';
		}
		elseif (isset($_POST['cash']))
		{
			$payBy='Cash';
		}
	}

	if (isset($_POST['pay_now']))
	{

		//set the transaction ID as a randomly generated number from random_code.php
		$t_id=NULL;
		while ($t_id==NULL)
		{
			include ("random_code.php");
			$result=$conn->query("SELECT * FROM transaction WHERE transactionid='$r_id'") or die (mysqli_error());
			$matches = $result->num_rows;

			if ($matches == 0 )//randomly generated ID is not yet used
			{
				$t_id = $r_id;//set transaction ID to the random number
			}
		}

		$cid = $_SESSION['id'];//customer ID
		$total = $_POST['total'];//total cost

		$que = $conn->query("INSERT INTO `transaction` (`transactionid`,`customerid`, `amount`, `date`, `status`) VALUES ('$t_id', '$cid', '$total',  CURDATE(), 'ON HOLD')") or die (mysqli_error());

		$p_id = $_POST['pid'];
		$oqty = $_POST['qty'];
		$columns="";//IDs of products bought
		$binaries="";//number of 1s to insert into database table

		$i=0;
		foreach($p_id as &$pro_id)
		{
			$conn->query("INSERT INTO `transactiondetail` (`transactionid`, `productid`, `quantity`) VALUES ('$t_id', '".($pro_id)."', '".($oqty[$i])."')") or die(mysqli_error());
			$i++;
			$columns.="`".$pro_id."`, ";
			$binaries.="'1', ";
		}

		$columns=substr($columns, 0, -2);//remove last space character and comma
		$binaries=substr($binaries, 0, -2);

		$conn->query("INSERT INTO `transactionitems` (`transactionid`, ".$columns.") VALUES ('$t_id', ".$binaries.")") or die(mysqli_error());

		echo "<script>window.location = 'summary.php?tid= +".$t_id."'</script>";
	//header ("Location: summary.php?tid=$t_id");
	}

?>
