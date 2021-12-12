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
			<div class="alert alert-info"><center><h2>Customers</h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Search Customers here..." id="filter"></label>
			<br />

		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Name</th>
					<th>Town</th>
					<th>Mobile</th>
					<th>Email</th>
				</tr>
				</thead>
				<?php
					$query = $conn->query("SELECT * FROM `customer` ORDER BY firstname") or die(mysqli_error());
					while($fetch = $query->fetch_array())
						{
				?>
				<tr>
					<td><?php echo $fetch['firstname'];?>&nbsp;<?php echo  $fetch['lastname'];?></td>
					<td><?php echo $fetch['town']?></td>
					<td><?php echo $fetch['mobile']?></td>
					<td><?php echo $fetch['email']?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>

	</div>



</body>
</html>
