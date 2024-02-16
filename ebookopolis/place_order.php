<?php
include 'header.inc.php';
$email = $_SESSION['user_email'];

$select_cart_pro = "SELECT * FROM cart WHERE cus_email = '{$email}'";
$cart_res = mysqli_query($con,$select_cart_pro);
$total_rows = mysqli_num_rows($cart_res);
if($total_rows!=0){
    while($data = mysqli_fetch_assoc($cart_res)){
        $cus_email = $data['cus_email'];
        $select_cus_info = "SELECT c_address,contact FROM customer WHERE c_email = '{$email}' ";
        $select_cus_res = mysqli_query($con,$select_cus_info);
        while($data = mysqli_fetch_assoc($select_cus_res)){
           $cus_location = $data['c_address'];
           $cus_contact = $data['contact'];
        }
        $select_cus_info = "SELECT SUM(total) AS order_amount FROM cart WHERE cus_email = '{$email}' ";
        $order_amount = mysqli_query($con,$select_cus_info);
        while($data = mysqli_fetch_assoc($order_amount)){
           $order = $data['order_amount'];
        }
        $select_product_details = "SELECT cart_id,books_name,cart_price,cart_image FROM cart WHERE cus_email = '{$email}'";
        $product_details = mysqli_query($con,$select_product_details);
        while($data = mysqli_fetch_assoc($product_details)){
           $cart_id = $data['cart_id'];
            $b_name = $data['books_name'];
           $b_price = $data['cart_price'];
           $cart_image = $data['cart_image'];
        }
        $fetch_orders = "SELECT SUM(ord_payment) FROM orders WHERE cus_email = '{$email}'";
        $orders_res = mysqli_query($con,$fetch_orders);
        while($data = mysqli_fetch_assoc($orders_res)){
          $total = $data['SUM(ord_payment)'];
        }
        if($total == 0){

        
      $order_id = rand(1020,1105);
       $insert_sql = "INSERT INTO orders(ord_id,ord_payment,cart_id,cus_loc,cus_email,cus_cont,b_img,book_name,book_price) VALUES('{$order_id}','{$order}','{$cart_id}','{$cus_location}','{$cus_email}','{$cus_contact}','{$cart_image}','{$b_name}','{$b_price}')";
       $execute = mysqli_query($con,$insert_sql);
       if($insert_sql){
        $del_cart = "DELETE FROM cart WHERE cus_email = '{$email}'";
        $cus_cart_del = mysqli_query($con,$del_cart);
        if($cus_cart_del){
            echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/order_details.php';</script>";
        }
        
       }
    }
    else if($total!=0){
        echo "<script>alert('Please Clear Your order Payment')</script>";
        echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/index.php';</script>";
    }
    }
}



?>