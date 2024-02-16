  <!-- Start Cart Panel -->
  <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                    <?php
                    $email = $_SESSION['user_email'];
                    $read_sql = "SELECT * FROM cart WHERE cus_email = '{$email}'";
                    $res = mysqli_query($con,$read_sql);
                    $total_rows = mysqli_num_rows($res);
                    if($total_rows!=0){

                    while($data = mysqli_fetch_assoc($res)){
                    ?>    
                    <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                <img src="../admin/media/<?php echo $data['cart_image']?>"/>
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html"><?php echo $data['books_name'];?></a></h2>
                                <span class="quantity"><?php echo $data['qty']?></span>
                                <span class="shp__price"><?php echo $data['cart_price'];?></span>
                            </div>
                            <div class="remove__btn">
                                <a href="delcart.php?cart-id=<?php echo $data['cart_id']?>" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <?php
                                      
                                    }
                                }
                                  
                                  ?>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">
                            <?php
                            
                            $sub_total = "SELECT SUM(total) FROM cart WHERE cus_email = '{$email}'";
                            $sub_total_res = mysqli_query($con,$sub_total);
                            while($data = mysqli_fetch_assoc($sub_total_res)){
                                $total =  $data['SUM(total)'];
                                echo $total;
                            }
                            
                            ?>
                        </li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.php">Checkout</a></li>
                        <li class="shp__checkout"><a href="order_details.php">Order Details</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->