<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<?php require_once('template/header.php'); ?>

</div>
</div>

<div id="carousel">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner1.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner2.jpg" class="carousel"></div>
					<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner3.jpg" class="carousel"></div>
				</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>

					<?php
					if (isset($_SESSION['cart'])){
						$title='You may also like...';}
						else {$title='Featured Items';}
					echo "<div id='product' style='position:relative;''>
							 <center><h2><legend>".$title."</legend></h2></center>
							 <br />";
						include("kmean_cluster.php");
						//print_r($KMeans_output);
if (isset($_SESSION['cart'])){


						$rec_ids="";
						foreach($KMeans_output as $ids)
						{
							$rec_ids=$rec_ids.$ids.",";
						}
						$rec_ids=substr($rec_ids,0,-2);

						$in_cart="";
						foreach($itemsindex as $bought)
						{
							$in_cart=$in_cart.$bought.",";
						}
						$in_cart=substr($in_cart,0,-1);

						//echo $rec_ids;

 						$query = $conn->query("SELECT * FROM (SELECT * FROM product WHERE productid IN ($rec_ids) AND productid not in ($in_cart)) _t ORDER BY RAND() LIMIT 6;") or die (mysqli_error());

 							while($fetch = $query->fetch_array())
 							{

 								$pid = $fetch['productid'];

 								$query1 = $conn->query("SELECT * FROM stock WHERE productid = '$pid'") or die (mysqli_error());
 								$rows = $query1->fetch_array();

 								$qty = (int)$rows['quantity'];

								if ($qty > 0)
								{
									echo "<div class='float'>";
 									echo "<center>";
 									echo "<a href='details.php?id=".$fetch['productid']."'><img class='img-polaroid' src='photo/".$fetch['image']."' height = '300px' width = '300px'></a>";
 									echo "".$fetch['name']."";
 									echo "<br />";
 									echo "Ksh.".number_format($fetch['price'])."";
 									echo "<br />";
 									echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> ".$fetch['brand']."</h3>";
 									echo "</center>";
 									echo "</div>";
								}

 							}
					}

							else{

						$query = $conn->query("SELECT * FROM (SELECT * FROM product) _t ORDER BY RAND() LIMIT 9;") or die (mysqli_error());

							while($fetch = $query->fetch_array())
								{

								$pid = $fetch['productid'];

								$query1 = $conn->query("SELECT * FROM stock WHERE productid = '$pid'") or die (mysqli_error());
								$rows = $query1->fetch_array();

								$qty = $rows['quantity'];

									echo "<div class='float'>";
									echo "<center>";
									echo "<a href='details.php?id=".$fetch['productid']."'><img class='img-polaroid' src='photo/".$fetch['image']."' height = '300px' width = '300px'></a>";
									echo "".$fetch['name']."";
									echo "<br />";
									echo "Ksh.".number_format($fetch['price'])."";
									echo "<br />";
									echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;'> ".$fetch['brand']."</h3>";
									echo "</center>";
									echo "</div>";


								}
							}
					?>
				</div>

		<?php require_once('template/footer.php'); ?>

	</body>
	</html>
