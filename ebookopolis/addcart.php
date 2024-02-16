<?php

include 'config.php';

$pro_id = $_GET['pro_id'];
$read_sql = "SELECT * FROM books WHERE b_id = '{$pro_id}'";
$res = mysqli_query($con,$read_sql);
$total_rows = mysqli_num_rows($res);
if($total_rows<0){
  "<script>alert('Please Select product to purchase')</script>";
  "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/main.php';</script>";
}
if($total_rows!=0){
  while($data = mysqli_fetch_assoc($res)){
        $cart_id = rand(1001,1020);
        $b_img = $data['b_image'];
        $b_name = $data['b_name'];
        $b_price = $data['b_price'];
        $total = $data['b_price'];
        $b_id = $data['b_id'];
        $email = $_SESSION['user_email'];
        $read_product = "SELECT books_id,books_name,total,cus_email,cart_id FROM cart WHERE cus_email = '{$email}' AND books_id = '{$pro_id}'";
        $product = mysqli_query($con,$read_product); 
        while($data = mysqli_fetch_assoc($product)){
          $product_name = $data['books_name'];
          $quantity = $data['qty'];
          $cart_id = $data['cart_id'];
        }
       
        if($product_name > 0){
         
          $update_cart = "UPDATE cart SET qty = qty + 1, total = cart_price * qty WHERE cart_id = '{$cart_id}'";
          $c_res = mysqli_query($con,$update_cart);
          if($c_res){
           echo "<script>alert('Cart Updated Successfully');</script>";
          }
        }
        else{
          $email = $_SESSION['user_email'];
          $fetch_cus_rec = "SELECT c_email FROM customer WHERE c_email='{$email}'";
          $fetch_cus_query = mysqli_query($con,$fetch_cus_rec);
         while($data = mysqli_fetch_assoc($fetch_cus_query)){
          $cus_email = $data['c_email'];
         } 
          $insert_sql = "INSERT INTO cart(cart_id,books_id,cart_price,cart_image,books_name,total,qty,cus_email) VALUES('{$cart_id}','{$b_id}','{$b_price}','{$b_img}','{$b_name}','{$total}','1','{$cus_email}')";
          $cart_res = mysqli_query($con,$insert_sql);
          if($cart_res){
            echo "<script>alert('Product Added into Cart');</script>";
          }
          }
      
   
     
      }
        echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/cart.php'</script>";
  }





?>