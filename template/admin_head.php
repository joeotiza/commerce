<!--elements included in the head of admin files-->
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
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="https://kit.fontawesome.com/981b9a1d0f.js" crossorigin="anonymous"></script>

		<!--Le Facebox-->
		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox()
		})
		</script>

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
              backgroundColor: null,
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
          $mydata=array();
  				$result = $conn->query("SELECT brand FROM product LEFT JOIN transactiondetail ON product.productid=transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed' Group by brand");
  				while($row = $result->fetch_array()){

  				$brnd = $row['brand'];

  				$result1 = $conn->query("SELECT * FROM product LEFT JOIN transactiondetail ON product.productid = transactiondetail.productid LEFT JOIN transaction ON transactiondetail.transactionid=transaction.transactionid WHERE transaction.status='Confirmed' AND brand = '$brnd'");
  				//$row1 = $result1->num_rows;
          $row1=0;//count the number of items of each brand sold
          while($count = $result1->fetch_array()){
            $row1+=(int)$count['quantity'];
          }
          $mydata[$brnd]=$row1;
          arsort($mydata);//sort the quantity of each brand in descending order
  				}

          foreach($mydata as $x => $x_value) {
            echo "['" . $x . "', " . $x_value."],";
          }
  				?>

              ]
          }]
      });
  });
  		</script>

      <script language="javascript" type="text/javascript">
          function printDiv(divID) {
              //Get the HTML of div
              var divElements = document.getElementById(divID).innerHTML;
              //Get the HTML of whole page
              var oldPage = document.body.innerHTML;

              //Reset the page's HTML with div's HTML only
              document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";

              //Print Page
              window.print();

              //Restore orignal HTML
              document.body.innerHTML = oldPage;


          }
  		</script>
</head>
