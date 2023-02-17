<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="http://localhost/ecommerce/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/ecommerce/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://localhost/ecommerce/css/prettyPhoto.css" rel="stylesheet">
    <link href="http://localhost/ecommerce/css/price-range.css" rel="stylesheet">
    <link href="http://localhost/ecommerce/css/animate.css" rel="stylesheet">
	<link href="http://localhost/ecommerce/css/main.css" rel="stylesheet">
	<link href="http://localhost/ecommerce/css/responsive.css" rel="stylesheet">
      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="http://localhost/ecommerce/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								
                                <?php 
									$logedIn = false;
									$url = "";
									if(!isset($_SESSION['id'])){
        						?>
								<li><a href="http://localhost/ecommerce/client/login/fromLogin"><i class="fa fa-lock"></i> Login</a></li>
                                <?php } else{ 
               						$logedIn = true;
        						?>
                                <li><a href="#"><i class="fa fa-user"></i><?php echo " ".'Hello '.$_SESSION['nom_clt'];?></a></li> 
                                <li><a href="<?= "http://localhost/ecommerce/client/logout" ?>"><i class="fa fa-lock"></i> Logout</a></li>  
								<?php } 
									if($logedIn)
										$url = "http://localhost/ecommerce/panier";
									else
										$url = "http://localhost/ecommerce/client/login/fromCart"
								?>
								<li><a href="<?= $url ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="http://localhost/ecommerce/router/index" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="http://localhost/ecommerce/categorie/index">Categories</a></li>
                                        <li><a href="http://localhost/ecommerce/router/index">Products</a></li>
										<li><a href="http://localhost/ecommerce/panier/index">Cart</a></li> 
                                        <?php if(!isset($_SESSION['id'])){ ?>
										<li><a href="http://localhost/ecommerce/client/login">Login</a></li> 
                                        <?php } else{ ?>
                                        <li><a href="http://localhost/ecommerce/client/logout">Logout</a></li> 
                                        <?php } ?>  
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    <?php
        echo $contenu;
    ?>
    
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
                    <div class="col-sm-3">
						<div class="address">
							<img src="http://localhost/ecommerce/images/home/map.png" alt="" />
							<p>Avenue Ibn Habbous,(Marrakech,MA)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 ISGA All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<?php 
        $idPan = 0;
        if(isset($_SESSION['idPan']))
            $idPan = $_SESSION['idPan'];
    ?>
	<input id="panier" type="hidden" value="<?= $idPan ?>"/>
    <script src="http://localhost/ecommerce/js/jquery.js"></script>
	<script src="http://localhost/ecommerce/js/price-range.js"></script>
    <script src="http://localhost/ecommerce/js/jquery.scrollUp.min.js"></script>
	<script src="http://localhost/ecommerce/js/bootstrap.min.js"></script>
    <script src="http://localhost/ecommerce/js/jquery.prettyPhoto.js"></script>
    <script src="http://localhost/ecommerce/js/main.js"></script>  
	<script src="http://localhost/ecommerce/js/jquery.min.js"></script>
    <script src="http://localhost/ecommerce/js/panier.js"></script>

</body>
</html>


