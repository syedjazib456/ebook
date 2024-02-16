<?php
require 'config.php';
$cart_id = $_GET['checkdel'];

$del_query = "DELETE FROM cart WHERE cart_id = '{$cart_id}'";
$res = mysqli_query($con,$del_query);
if($del_query){
    echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/checkout.php';</script>";
}

?>