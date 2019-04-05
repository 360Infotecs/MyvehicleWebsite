<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MyVehicles.lk - 404 Error</title>
<?php
include_once("common/head.php");
?>
</head>
<body>
<!-- Start Switcher -->
<?php
include_once("common/switcher.php");
?>
<!-- /Switcher -->  

<!--Header-->
<header>
  <?php
  // Main Header //
  include_once("common/header.php");
  //Main Header End//
  // Navigation //
  
include_once("common/navigation.php");
// Navigation end //
?>
</header>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header page_404">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Error 404</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Error 404</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Error-404-->
<section class="error_404 section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-5">
        <div class="error_text_m">
          <h2>4<span>0</span>4</h2>
          <div class="background_icon"><i class="fa fa-road" aria-hidden="true"></i></div>
        </div>
      </div>
      <div class="col-md-6 col-sm-7">
        <div class="not_found_msg">
          <div class="error_icon"> <i class="fa fa-smile-o" aria-hidden="true"></i> </div>
          <div class="error_msg_div">
            <h3>Oops, <span>Page Can't be Found</span></h3>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</p>
            <a href="#" class="btn">Back to Home <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Error-404--> 

<!--Brands-->
<?php
include_once("common/populerBrands.php");
?>
<!-- /Brands--> 

<!--Footer -->
<footer>
<?php
//include_once("common/footerTop.php");
include_once("common/footerBottom.php");
?>
</footer>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php
include_once("common/login.php");

///Login-Form // 

//Register-Form //

include_once("common/register.php");

///Register-Form // 

//Forgot-password-Form //

include_once("common/forgotPassword.php");

///Forgot-password-Form // 
?>
<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>