
<?php
require 'header.inc.php';
require 'function.inc.php';

?>
        <div class="body__overlay"></div>
        <?php
        require 'cart_panel.php';
        ?>
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <?php
                $fetch_banner_sql = "SELECT * FROM banner";
                $banner_res = mysqli_query($con,$fetch_banner_sql);
                $total_rows = mysqli_num_rows($banner_res);
                if($total_rows!=0){
                    while($data = mysqli_fetch_assoc($banner_res)){
                ?>
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-6 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2><?php echo $data['text1']?></h2>
                                        <h1><?php echo $data['text2']?></h1>
                                        <div class="cr__btn">
                                            <a href="cart.html"><?php echo $data['text3']?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="../admin/media/<?php echo $data['banner_img']?>" alt="slider images" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                
                ?>
                <!-- End Single Slide -->
            
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
         
                <div class="htc__product__container">
                        <?php
                        $getproduct = get_product($con,'latest',8);
                        
                        ?> 
                       
                    <div class="row">
                    <?php 
                       foreach($getproduct as $list){
                        ?> 
                        <div class="product__list clearfix mt--30">
                      
                        <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?pro_id=<?php echo $list['b_id']?>">
                                            <img src="../admin/media/<?php echo $list['b_image']?>" alt="product images">
                                        </a>
                                    </div>
                                   
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?pro_id=<?php echo $list['b_id']?>"><?php echo $list['b_name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize" style="text-decoration:line-through"><?php echo $list['b_mrp']?></li>
                                            <li><?php echo $list['b_price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                      
                            <!-- End Single Category -->               
                        </div>
                        <?php 
                       }
                        ?>
                    </div>
                 
                </div>
            </div>
        </section>
        <!-- End Category Area -->
       
      <?php
      require 'footer.inc.php';
      
      ?>