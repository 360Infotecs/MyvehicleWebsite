<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MyVehicles.lk - My Vehicle</title>
  <?php
include_once("common/head.php");
?>  
</head>
<body>

<!-- Start Switcher -->
<?php
//include_once("common/switcher.php");
?>
<!-- /Switcher -->  

<!--Header-->
<header>
  <?php
  // Main Header //
  //include_once("common/header.php");
  //Main Header End//
  // Navigation //
  
include_once("common/navigation.php");
// Navigation end //
?>
  
</header>
<!-- /Header --> 

<!--Page Header-->
<!--<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Vehicles</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Vehicles</li>
      </ul>
    </div>
  </div>-->
  <!-- Dark Overlay-->
  <!--<div class="dark-overlay"></div>
</section>-->
<!-- /Page Header--> 

<!--my-vehicles-->
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
        <div class="upload_newlogo">
          <input name="upload" type="file">
        </div>
      </div>
      <div class="dealer_info">
        <h5>Autospot Used Cars Center </h5>
        <p>P.1225 N Broadway Ave <br>
          Oklahoma City, OK  1234-5678-090</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="profile_nav">
          <ul>
            <li><a href="profile-settings.php">Profile Settings</a></li>
            <li class="active"><a href="my-vehicles.php">My Vehicles</a></li>
            <li><a href="post-vehicle.php">Post a Vehicles</a></li>
            <li><a href="#">Sign Out</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Vehicles <span>(20 Cars)</span></h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
              <li>
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-1.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
              <li class="deactive_vehicle">
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-2.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Deactive</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
              <li>
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-3.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Ford Mustang 2.3 Ecoboost Premium </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
              <li>
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-4.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
              <li>
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-5.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
              <li>
                <div class="vehicle_img"> <a href="#"><img src="assets/images/recent-car-3.jpg" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="#">Ford Mustang 2.3 Ecoboost Premium </a></h6>
                </div>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
              </li>
            </ul>
            <div class="pagination">
              <ul>
                <li class="current">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles--> 
<!--Brands-->
<?php

//include_once("common/populerBrands.php");
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