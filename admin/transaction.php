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
          			<div class="alert alert-info"><center><h2>Transactions	</h2></center></div>
          			<br />
          				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Transactions here..." id="filter"></label>
          			<br />

          			<div class="alert alert-info">
          			<table class="table table-hover" style="background-color:;">
          				<thead>
          				<tr style="font-size:16px;">
          					<th>ID</th>
          					<th>DATE</th>
          					<th>Customer Name</th>
          					<th>Total Amount</th>
          					<th>Order Status</th>
          					<th>Action</th>
          				</tr>
          				</thead>
          				<tbody>
          				<?php

          					$query = $conn->query("SELECT * FROM transaction LEFT JOIN customer ON customer.customerid = transaction.customerid ORDER BY transaction.date DESC") or die(mysqli_error());
          					while($fetch = $query->fetch_array())
          						{
          						$id = $fetch['transactionid'];
          						$amnt = $fetch['amount'];
          						$o_stat = $fetch['status'];
          						$o_date = date("jS M Y", strtotime($fetch['date']));

          						$name = $fetch['firstname'].' '.$fetch['lastname'];
          				?>
          				<tr>
          					<td><?php echo $id; ?></td>
          					<td><?php echo $o_date; ?></td>
          					<td><?php echo $name; ?></td>
          					<td><?php echo number_format($amnt); ?></td>
          					<td><?php echo $o_stat; ?></td>
          					<td><a href="receipt.php?tid=<?php echo $id; ?>">View</a>
          					<?php
          					if($o_stat == 'Confirmed'){

          					}elseif($o_stat == 'Cancelled'){

          					}else{
          					echo '| <a class="btn btn-mini btn-info" href="confirm.php?id='.$id.'">Confirm</a> ';
          					echo '| <a class="btn btn-mini btn-danger" href="cancel.php?id='.$id.'">Cancel</a></td>';
          					}
          					?>
          				</tr>
          				<?php
          					}
										$conn->close();
          				?>
          				</tbody>
          			</table>
          			</div>
          			</div>
				</body>
		</html>
