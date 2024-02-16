
<?php
require 'header.inc.php';
require 'function.inc.php';
$pro_id = $_GET['pro_id'];
$get_product = product($con,$pro_id);


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
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">ean shirt</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <?php
              foreach($get_product as $list){
            
            ?>
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="../admin/media/<?php echo $list['b_image']?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                   
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $list['b_name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize" style="text-decoration:line-through;"><?php echo $list['b_mrp']?></li>
                                    <li><?php echo $list['b_price']?></li>
                                </ul>
                                
                               
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $list['cat_name']?></a></li>
                                        </ul>
                                    </div>
                                    <div class="sin__desc align--left">
                                        
                                        <ul class="pro__cat__list">
                                            <li><a href="addcart.php?pro_id=<?php echo $list['b_id']?>" style="background-color:#AD549F; color:white; padding:20px;">ADD CART</a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
            <?php
            }
            ?>
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
    
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Product -->
                        <?php
                        $getproduct = get_product($con,'latest',4);
                        foreach($getproduct as $list){
                        ?>    
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="../admin/media/<?php echo $list['b_image']?>" alt="product images">
                                    </a>
                                </div>
                               
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html"><?php echo $list['b_name']?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize" style="text-decoration:line-through"><?php echo $list['b_mrp']?></li>
                                        <li><?php echo $list['b_price']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <?php 
                       }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
      <?php
      
      require 'footer.inc.php';
      ?>