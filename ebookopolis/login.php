<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ebookopolis</title>
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
       <?php
       require 'login.header.inc.php';
       if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!empty($_POST['email'])){
            $email_validation = "/^[a-zA-Z]{5,}[0-9]{3}[@][a-zA-Z]{5,}[.][a-zA-Z]{3,}$/";
            if(preg_match($email_validation,$email)){
              $n_m  = "";
             
            }
            else{
                $n_m = "Invalid Regex Pattern";
            }
        }
        if(!empty($_POST['password'])){
            $pass_validation = "/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/";
            if(preg_match($pass_validation,$password)){
              $n_m  = "";
             
            }
            else{
                $n_m = "Invalid Regex Pattern";
            }
        }
       
        $fetch_sql = "SELECT * FROM customer WHERE c_email='{$email}' AND c_password='{$password}'";
        $result = mysqli_query($con,$fetch_sql);
        $total_rows = mysqli_num_rows($result);
    
        if($total_rows!=0){
            while($data = mysqli_fetch_assoc($result)){
             $_SESSION['user_location'] = $data['c_address'];
             $_SESSION['user_id'] = $data['c_id'];
             $_SESSION['user_name'] = $data['c_name'];
             $_SESSION['user_email'] = $data['c_email'];
             
            echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/index.php'</script>";
            }
      
            
        }
     
    }
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
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="POST">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" placeholder="Your Email*" style="width:100%">
										</div>
                                        <span class="text-danger"><?php
                                        if(isset($_POST['login'])){
                                        if(!empty($_POST['email'])){
                                            echo $n_m;                                        
                                        }
                                        else if(empty($_POST['email'])){
                                            echo "<span class='text-danger'>Please fill this field</span>";
                                        }
                                       
                                    }
                                        
                                        ?></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="password" placeholder="Your Password*" style="width:100%">
										</div>
                                        <span class="text-danger"><?php
                                        if(isset($_POST['login'])){
                                        if(!empty($_POST['password'])){
                                            echo $n_m;                                        
                                        }
                                        else if(empty($_POST['password'])){
                                            echo "<span class='text-danger'>Please fill this field</span>";
                                        }
                                       
                                    }
                                        
                                        ?></span>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="login" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="POST">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Name*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
                                    <div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="contact" placeholder="Your Contact*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="location" placeholder="Your Location*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" name="register">Register</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
        <?php
   
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $pass = $_POST['password'];
        $location = $_POST['location'];
        $result= "SELECT * FROM customer WHERE c_email='{$email}'";
        $res = mysqli_query($con,$result);
        $check_user = mysqli_num_rows($res);
        if($check_user>0){
            echo "<script>alert('Email is already Exist');</script>";
        }
        else{
        $insert_sql = "INSERT INTO customer(c_name,c_email,c_password,c_address,contact) VALUES('{$name}','{$email}','{$pass}','{$location}','{$contact}')";
        $res = mysqli_query($con,$insert_sql);
        if($res){
            echo "<script>alert('You are Successfully Registered...');</script>";
        }
        }
        
    }
   ?>
<?php
require 'footer.inc.php';

?>