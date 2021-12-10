
<?php
  /*include('db/dbconn.php');
  require "vendor/autoload.php";

  $query = $conn->query("SELECT * FROM `transactionitems`;") or die (mysqli_error());*/

  //include("cart.php");

  $itemsindex=[];
  $KMeans_output=[];
  $count=0;

if (isset($_SESSION['cart'])){
  foreach(array_keys($_SESSION['cart']) as $id)
  {
    array_push($itemsindex, $id);
  }

  $inputs="";
  foreach($itemsindex as $inp)
  {
    $inputs=$inputs." ".$inp;
    $count+=1;
  }

  $out_string=shell_exec("python3 KMeans.py ".$count." ".$inputs);
  $out_string=substr($out_string,1,-1);
  $KMeans_output=(explode(",",$out_string));
}
  //echo $KMeans_output;
  //print_r(array_keys($_SESSION['cart']));
  //print_r($_SESSION['cart']);



/*  ini_set('display_errors', 1);
$output = exec("/Users/user/OneDrive/Documents/Coding/testing.py");
print_r($output);*/

/*$var1="1";
$var2="2";
$var3="3";
exec ( "C:\Users\user\OneDrive\Documents\Coding\KMeans.py $var1 $var2 $var3" );*/


  /*$message = exec("/Users/user/OneDrive/Documents/Coding/KMeans.py 2>&1");
  print_r($message);*/

  /*ob_start();
  passthru('/Users/user/OneDrive/Documents/Coding/KMeans.py');
  $output = ob_get_clean();
  echo $output;*/

  //create N-dimension space where N is the number of transactions made
  /*$N = mysqli_num_rows($query);
  $space = new KMeans\Space($N);

  //make the query results arrays
  $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

  //add points to space
  for($i = 1; $i<=53; $i++){
    $space->addPoint(array_column($rows, $i), $i);
  }

  // cluster these points in 5 clusters
  $clusters = $space->solve(5);

  // display the cluster centers and attached points
  foreach ($clusters as $point) {
    printf('[%d,%d]', $point[0], $point[1]);
}*/
?>
