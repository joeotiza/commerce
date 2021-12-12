<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('../template/header_admin.php'); ?>

	<br>

					<?php require_once('../template/admin_nav.php'); ?>

					<div id="rightcontent" style="position:absolute; top:10%;">
								<div class="alert alert-info"><center><h2>Orders</h2></center></div>
								<br />
									<div style='width:975px;' class="alert alert-info">
										  <table class="table table-hover">
											<thead>
												<th>Brand</th>
												<th>Product</th>
												<th>Transaction No.</th>
												<th>AMOUNT</th>
											</thead>
											  <tbody>
												<?php
												$Q1 = $conn->query("SELECT * FROM product LEFT JOIN transactiondetail ON product.productid = transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed'");
												while($r1 = $Q1->fetch_array()){

												$tid = $r1['transactionid'];



												$pid = $r1['productid'];
												$o_qty = $r1['quantity'];

												$p_price = $r1['price'];
												$brand=$r1['brand'];
												$name = $r1['name'];

												echo "<tr>";
												echo "<td>".$brand."</td>";
												echo "<td>".$name."</td>";
												echo "<td>".$tid."</td>";
												echo "<td>".number_format($p_price)."</td>";
												echo "</tr>";
												}

												$Q3 = $conn->query("SELECT sum(amount) FROM transaction WHERE status = 'Confirmed'");
												while($r3 = $Q3->fetch_array()){

												$amnt = $r3['sum(amount)'];
												echo "<tr><td></td><td></td><td>TOTAL : </td> <td><b>Ksh.".number_format($amnt)."</b></td></tr>";
												}
												?>
											  </tbody>
										    </table>
									</div>

								</div>
							</body>
							</html>
