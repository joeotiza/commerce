<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>

<?php require_once('template/header.php'); ?>

		<img src="img/about-us.png" style="width:1150px; height:250px; ">
	<br />
	<br />


	<legend>History</legend>
		<div id="content">

					<p>EasyBuy is an e-commerce platform built by Joshua and Joseph in their garage.</p>
					<p>Inspired by how difficult it was for vendors to connect customers, the two founders built a machine learning recommender system using k-means clustering.</p>
					<p>EasyBuy has enjoyed increased customer traffic ever since and is one of the top e-commerce platforms in Kenya.</p>

		</div>
	<br />
</div>

<br>

<?php
	require_once('template/footer.php');
	$conn->close();
?>

</body>
</html>
