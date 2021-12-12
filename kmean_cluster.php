<?php

  $itemsindex=[];//IDs of items in cart
  $KMeans_output=[];//array of recommended IDs
  $count=0;//number of items in cart, held in sys.argv[1]

  if (isset($_SESSION['cart']))//if there are items in the cart
  {
    foreach(array_keys($_SESSION['cart']) as $id)
    {
      array_push($itemsindex, $id);
    }

    $inputs="";//sys.argv[k] values passed via command prompt
    foreach($itemsindex as $inp)
    {
      $inputs=$inputs." ".$inp;
      $count+=1;
    }

    /*run the python module in command prompt and pass in arguments
    *$out_string stores the output of the python apache_get_modules
    */
    $out_string=shell_exec("python3 KMeans.py ".$count." ".$inputs);

    //remove opening and closing brackets
    $out_string=substr($out_string,1,-1);
    $KMeans_output=(explode(",",$out_string));//hold output in array
  }
  //echo $KMeans_output;
  //print_r(array_keys($_SESSION['cart']));
  //print_r($_SESSION['cart']);

?>
