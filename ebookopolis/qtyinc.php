<?php

require 'config.php';

$cart_id  = $_GET['cart_id'];

$qtyupdate = "UPDATE cart SET qty = qty + 1, total = cart_price * qty WHERE cart_id = '{$cart_id}'";
$res = mysqli_query($con,$qtyupdate);

if($qtyupdate){
    echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/cart.php';</script>";
}



?>