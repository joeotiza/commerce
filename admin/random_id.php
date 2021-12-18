<?php

/* Generate productID for new product to add */
function createRandomNumber() {
    $chars = "01234567899876543210";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
   					 }
    return $pass;
						}

/*ProductID Code for adding a new product*/
$code=NULL;
while ($code==NULL)
{
  $trial=createRandomNumber();
  $result=$conn->query("SELECT * FROM product WHERE productid='$trial'") or die (mysqli_error());
  $matches = $result->num_rows;

  if ($matches == 0 )//randomly generated ID is not yet used
  {
    $code = $trial;//set product ID to the random number
  }
}
?>
