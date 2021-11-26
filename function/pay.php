<?php

	include('db/dbconn.php');
	if (isset($_POST['pay_now']))
{
  include ("random_code.php");
	$t_id = $r_id;
	$cid = $_SESSION['id'];
	$total = $_POST['total'];

	$date = date("m d, Y");
	$que = $conn->query("INSERT INTO `transaction` (`transactionid`,`customerid`, `amount`, `date`, `status`) VALUES ('$t_id', '$cid', '$total',  CURDATE(), 'ON HOLD')") or die (mysqli_error());

	$p_id = $_POST['pid'];
	$oqty = $_POST['qty'];

			$i=0;
			foreach($p_id as &$pro_id){
			$conn->query("INSERT INTO `transactiondetail` (`transactionid`, `productid`, `quantity`) VALUES ('$t_id', '".($pro_id)."', '".($oqty[$i])."')") or die(mysqli_error());
			$i++;
			}
	echo "<script>window.location = 'summary.php?tid= +".$t_id."'</script>";
	//header ("Location: summary.php?tid=$t_id");
	}
?>
