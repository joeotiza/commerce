<?php
    $q1 = $conn->query("INSERT INTO product (name, price, image, brand, category)
    VALUES ('$name','$price','$img', '$brand', '$category')");

    $q0 = $conn->query("SELECT * FROM `product` WHERE `name`='$name' AND `image`='$img'");
    $rq0=$q0->fetch_array();
    $productid = $rq0['productid'];

    $q2 = $conn->query("INSERT INTO stock (productid, quantity) VALUES ('$productid','$quantity')");

    $q3 = $conn->query("ALTER TABLE `transactionitems` ADD `$productid` TINYINT(1) NOT NULL DEFAULT '0'");
?>
