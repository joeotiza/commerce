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
					<th>Address</th>
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
					<td><?= $fetch['firstname'];?>&nbsp;<?php echo  $fetch['lastname'];?></td>
					<td><?= $fetch['address']?></td>
					<td><?= "<a href='tel:".$fetch['mobile']."'>". $fetch['mobile']."</a>"?></td>
					<td><?= "<a href='mailto:".$fetch['email']."'>". $fetch['email']."</a>"?></td>
				</tr>
				<?php
					}
					$conn->close();
				?>
			</table>
		</div>

	</div>



</body>
</html>
