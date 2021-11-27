<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<head>
  <title>EasyBuy</title>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="icon" href="../img/logo.png" />
  <link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://kit.fontawesome.com/981b9a1d0f.js" crossorigin="anonymous"></script>

	<script type="text/javascript" src="../chart/chart.js"></script>
	<script src="../chart/highcharts.js"></script>
	<script src="../chart/exporting.js"></script>

	<script type="text/javascript">
$(function () {

    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 30).get());
        }
        return colors;
    }());

    // Build the chart
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Products share of Brands as of year <?php echo $date = date("Y"); ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Share',
            data: [
				<?php
				$result = $conn->query("SELECT brand FROM product LEFT JOIN transactiondetail ON product.productid=transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed' Group by brand");
				while($row = $result->fetch_array()){

				$brnd = $row['brand'];

				$result1 = $conn->query("SELECT * FROM product LEFT JOIN transactiondetail ON product.productid = transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed' AND brand = '$brnd'");
				$row1 = $result1->num_rows;

				echo "['".$brnd."',   ".$row1."],";

				}
				?>

            ]
        }]
    });
});
		</script>
</head>

<body>

	<div id="header" style="position:fixed;">
		<img src="../img/logo.png">
		<label>EasyBuy</label>

		<?php
				$id = (int) $_SESSION['id'];

					$query = $conn->query ("SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = $query->fetch_array ();

			?>

			<ul>
				<li><a href="../function/admin_logout.php"><i class='fas fa-power-off'></i> Logout</a></li>
				<li><a><i class='fas fa-user-circle'></i> <?php echo $fetch['username']; ?></a></li>
				<li>Welcome:</li>
			</ul>
	</div>

	<br>

	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php">Dashboard</a></li>
			<li><a href="admin_home.php">Products</a>
				<ul>
					<li><a href="admin_electronics.php "style="font-size:15px; margin-left:15px;">Electronics</a></li>
					<li><a href="admin_household.php "style="font-size:15px; margin-left:15px;">Household Supplies</a></li>
					<li><a href="admin_clothing.php" style="font-size:15px; margin-left:15px;">Clothing</a></li>
					<li><a href="admin_stationery.php"style="font-size:15px; margin-left:15px;">Stationery</a></li>
					<li><a href="admin_drinks.php"style="font-size:15px; margin-left:15px;">Drinks</a></li>
					<li><a href="admin_accessories.php"style="font-size:15px; margin-left:15px;">Accessories</a></li>
					<li><a href="admin_snacks.php"style="font-size:15px; margin-left:15px;">Snacks</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transactions</a></li>
			<li><a href="customer.php">Customers</a></li>
			<li><a href="message.php">Messages</a></li>
			<li><a href="order.php">Orders</a></li>
		</ul>
	</div>
	<div id="rightcontent" style="position:absolute; top:10%;">

		<div id="container" style="min-width: 310px; height: 600px; max-width: 1000px; margin: 0 auto; background:none; float:left;"></div>



	</div>

</body>
</html>
