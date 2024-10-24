<?php
require 'config.php';

$categories = "SELECT * FROM categories WHERE cat_status = 1";
$res = mysqli_query($con,$categories);
$total_rows = mysqli_num_rows($res);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ebookopolis</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/bg/logo.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
<?php

if(!isset($_SESSION['user_name'])){
    header('Location:http://localhost:82/ebook/ebookopolis/login.php');
}
?>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.html"><img src="images/bg/logo.png" alt="logo images" width="120" height="100"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                       <?php
                                       if($total_rows!=0){
                                     while($data = mysqli_fetch_assoc($res)){
                                     ?>
                                        <li  class="drop"><a href='category.php?id=<?php echo $data['cat_id']?>'><?php echo $data['cat_name'] ?></a></li>
                                        <?php
                                       }
                                    }
                                        
                                        ?>
                                       
                                        <li><a href="contact.php">contact</a></li>
                                        <li><a href="logout.php"><img src="images/logo/logout.png" alt="" height="30px"></a></li>
                                        <li>
                                        <a href="orders.php">Orders</i></a>
                                        </li>
                                        <form action="search.php" method="GET">
                                        <li><input type="text" placeholder="Search.." name="str" style="position:relative; top:25px;"></li>
                                        </form>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
                                        if($total_rows!=0){
                                        while($data = mysqli_fetch_assoc($res)){
                                        ?>
                                            <li  class="drop"><a href='category.php?<?php echo $data['cat_id']?>'><?php echo $data['cat_name'] ?></a></li>
                                            <?php
                                        }
                                        }
                                        
                                        ?>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                          
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                            
                             
                            <div class="header__right">
                                    
                                    <div class="header__account" style="margin-left:70px;">
                                        <a href="login.php">Login/Register</i></a>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="#">
                                            
                                        <span class="htc__qua">
                                        <?php
                                        $email = $_SESSION['user_email'];
                                        $fetch_sql = "SELECT COUNT(*) AS total_count FROM cart WHERE cus_email = '{$email}'";
                                        $res = mysqli_query($con,$fetch_sql);
                                        $total_rows = mysqli_num_rows($res);
                                        if($total_rows!=0){
                                            while($data = mysqli_fetch_assoc($res)){
                                              echo $data['total_count'];
                                            }
                                        }
                                        ?>    
                                        </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->