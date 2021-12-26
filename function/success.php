<?php
/*$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
$item_price         = $_REQUEST['amt']; // Paypal received amount
$item_currency      = $_REQUEST['cc']; // Paypal received currency type

$price = '10.00';
$currency='USD';

//Rechecking the product price and currency details
if($item_price==$price && $item_currency==$currency)
{
    $content = "<h1>Welcome.</h1>";
    $content .= "<h1>Payment Successful</h1>";
}
else
{
    $content = "<h1>Payment Failed</h1>";
}

$title = "PayPal Payment";
$heading = "Welcome to PayPal Payment example.";*/

include("../db/dbconn.php");

$t_id = $_GET['tid'];

$conn->query("UPDATE transaction SET status = 'Confirmed' WHERE transactionid = '$t_id'") or die(mysqli_error());

$query2 = $conn->query("SELECT * FROM transactiondetail LEFT JOIN product ON product.productid = transactiondetail.productid WHERE transactiondetail.transactionid = '$t_id'") or die (mysqli_error());
while($row = $query2->fetch_array())
{
  $pid = $row['productid'];
  $oqty = $row['quantity'];

  $query3 = $conn->query("SELECT * FROM stock WHERE productid = '$pid'") or die (mysqli_error());
  $row3 = $query3->fetch_array();

  $stck = $row3['quantity'];

  $stck_out = $stck - $oqty;

  $query = $conn->query("UPDATE stock SET quantity = '$stck_out' WHERE productid = '$pid'") or die(mysqli_error());
}
$conn->close();

//header("location: transaction.php");
//include('html.inc');
header("location: ../cart.php?id=".$id."&action=empty");
?>
