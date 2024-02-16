<?php
include 'header.inc.php';

?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
          <?php 
          require 'cart_panel.php';
          ?>
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/banner_img.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $read_sql = "SELECT * FROM cart WHERE cus_email = '{$email}'";
                                        $res = mysqli_query($con,$read_sql);
                                        $total_rows = mysqli_num_rows($res);
                                        if($total_rows!=0){

                                        while($data = mysqli_fetch_assoc($res)){

                                            
                                        
                                        ?>
                                        <tr>
                                            <td class="product_name" hidden></td>
                                            <td class="product-thumbnail"><a href="#"><img src="../admin/media/<?php echo $data['cart_image']?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $data['books_name'];?></a>
                                               
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $data['cart_price'];?></span></td>
                                            <td class="product-quantity">
                                             <form method = "POST">   
                                            <button type="button" style="background-color:#AD549F; padding:5px;" name="delqty"><a href="qtydec.php?cart_id=<?php echo $data['cart_id']?>">-</a></button>
                                             
                                            <input type="text" style="text-align:center;" name="qty" value="<?php echo $data['qty']?>"/>
                                            <button type="button" style="background-color:#AD549F;  padding:5px;"  name="addqty"><a href="qtyinc.php?cart_id=<?php echo $data['cart_id']?>">+</button>   
                                        
                                        </form>
                                           </td>
                                            <td class="product-subtotal"><?php echo $data['total']?></td>
                                            <td class="product-remove"><a href="delcart.php?cart-id=<?php echo $data['cart_id']?>"><i class="icon-trash icons"></i></a></td>
                                      <?php
                                      
                                        }
                                    }
                                      
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                           
                                            <a href="checkout.php">Checkout</a>
                                        </div>
                                        <?php
                                        
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
      <?php
      require 'footer.inc.php';
      
      ?>