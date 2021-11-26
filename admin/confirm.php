<?php
include("../db/dbconn.php");

$t_id = $_GET['id'];

$conn->query("UPDATE transaction SET status = 'Confirmed' WHERE transactionid = '$t_id'") or die(mysqli_error());


$query2 = $conn->query("SELECT * FROM transactiondetail LEFT JOIN product ON product.productid = transactiondetail.productid WHERE transactiondetail.transactionid = '$t_id'") or die (mysqli_error());
while($row = $query2->fetch_array()){

$pid = $row['productid'];
$oqty = $row['quantity'];

$query3 = $conn->query("SELECT * FROM stock WHERE productid = '$pid'") or die (mysqli_error());
$row3 = $query3->fetch_array();

$stck = $row3['quantity'];

$stck_out = $stck - $oqty;

$query = $conn->query("UPDATE stock SET quantity = '$stck_out' WHERE productid = '$pid'") or die(mysqli_error());
}
header("location: transaction.php");

?>
