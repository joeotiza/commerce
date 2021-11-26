<?php
include("../db/dbconn.php");

$t_id = $_GET['id'];

$conn->query("UPDATE transaction SET status = 'Cancelled' WHERE transactionid = '$t_id'") or die(mysqli_error());

header("location: transaction.php");

?>
