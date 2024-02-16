<?php
require 'header.inc.php';
$email = $_SESSION['user_email'];
$fetch_sql = "SELECT COUNT(*) AS total_count FROM cart WHERE cus_email = '{$email}'";
$res = mysqli_query($con,$fetch_sql);
$total_rows = mysqli_num_rows($res);
if($total_rows!=0){
while($data = mysqli_fetch_assoc($res)){
   $count = $data['total_count'];
   if($count==0){
    echo "<script>window.location.href= 'http://localhost:82/ebook/ebookopolis/index.php';</script>";
   }
}
}  

if(isset($_POST['submit'])){
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $paymenttype = $_POST['paymentmethod'];
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['user_email'];
    $total_price_sql = "SELECT SUM(total) AS total_price FROM cart WHERE cus_email = '{$email}'";
    $result_total = mysqli_query($con,$total_price_sql);
    $total_rows = mysqli_num_rows($result_total);
    if($total_rows!=0){
        while($data = mysqli_fetch_assoc($result_total)){
            $total = $data['total_price'];
        }
    }

    $totalprice = $total;
    if($paymenttype=='COD'){
    $paymentstatus = 'success';
    }
    $order_status = '2';
    $insert_sql = "INSERT INTO orders(user_id,address,city,pincode,payment_type,payment_status,order_Status,total) VALUES('{$user_id}','{$address}','{$city}','{$pincode}','{$paymenttype}','{$paymentstatus}','{$order_status}','{$total}')";
    $insert_res = mysqli_query($con,$insert_sql);
    $select_cart = "SELECT * FROM cart WHERE cus_email = '{$email}'";
    $select_res = mysqli_query($con,$select_cart);
    $total_rows = mysqli_num_rows($select_res);
    $select_order= "SELECT order_id FROM orders WHERE user_id = '{$user_id}'";
    $res_order_id = mysqli_query($con,$select_order);
    while($data = mysqli_fetch_assoc($res_order_id)){
        $order_id = $data['order_id'];
    }
    
    if($insert_res){
       
    
    if($total_rows!=0){
        while($data = mysqli_fetch_assoc($select_res)){
           $book_id = $data['books_id'];
           $price = $data['cart_price'];
           $qty = $data['qty'];
           $id = $order_id;    
           $insert_order_details = "INSERT INTO order_details(order_id,book_id,qty,price) VALUES('{$id}','{$book_id}','{$qty}','{$price}')";
           $execute = mysqli_query($con,$insert_order_details);
           $del_cart = "DELETE FROM cart WHERE books_id = '{$book_id}' AND cus_email = '{$email}'";
           $del_cart_ex = mysqli_query($con,$del_cart);

        }
      
    
        echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/thankyou.php';</script>";
        
    }
}
   
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Asbab - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
      
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
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                  
                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action="#" method="POST">
                                                <div class="row">
                                                
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address" placeholder="Street Address" required>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                        Payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <a href="#"><i class="zmdi zmdi-long-arrow-right"></i><input type="radio" name="paymentmethod" value="COD" required>Cash on Delivery</a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-background-alternate">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                           <?php
                           $email = $_SESSION['user_email'];
                           $fetch_sql = "SELECT * FROM cart WHERE cus_email = '{$email}'";
                           $res = mysqli_query($con,$fetch_sql);
                           $total_rows = mysqli_num_rows($res);
                           if($total_rows!=0){
                           while($data = mysqli_fetch_assoc($res)){
                           ?>
                            <div class="order-details__item">
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="../admin/media/<?php echo $data['cart_image']?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $data['books_name']?></a>
                                        <span class="price"><?php echo $data['cart_price']?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="delcheckout.php?checkdel=<?php echo $data['cart_id']?>"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                               
                            </div>
                           <?php
                           }
                        }
                           
                           ?>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php
                                $read_sql = "SELECT SUM(total) AS total FROM cart WHERE cus_email = '{$email}'";
                                $res1 = mysqli_query($con,$read_sql);
                                while($data1 = mysqli_fetch_assoc($res1)){
                                  echo $data1['total'];
                                }
                                ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">ABOUT US</h2>
                                <div class="ft__details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">information</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy & Policy</a></li>
                                        <li><a href="#">Terms  & Condition</a></li>
                                        <li><a href="#">Manufactures</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">my account</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="cart.html">My Cart</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Our service</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="cart.html">My Cart</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">NEWSLETTER </h2>
                                <div class="ft__inner">
                                    <div class="news__input">
                                        <input type="text" placeholder="Your Mail*">
                                        <div class="send__btn">
                                            <a class="fr__btn" href="#">Send Mail</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="https://freethemescloud.com/">Free themes Cloud</a> 2018. All right reserved.</p>
                                <a href="#"><img src="images/others/shape/paypol.png" alt="payment images"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>