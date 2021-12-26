<?php
echo "<h1>Payment Canceled</h1>";
include("../db/dbconn.php");

$t_id = $_GET['tid'];

$conn->query("UPDATE transaction SET status = 'Cancelled' WHERE transactionid = '$t_id'") or die(mysqli_error());
$conn->close();

header("location: ../cart.php?id=".$id."&action=view");
?>
