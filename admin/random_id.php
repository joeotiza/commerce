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
$code = createRandomNumber();
?>
