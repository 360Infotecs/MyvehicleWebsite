<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicle.lk - Home</title>
    <?php include_once("common/head.php"); ?>
    <style>
      .slider-selection, .slider .slider-handle{
      	background: #FDD302 none repeat scroll 0 0!important;
       			fill: #FDD302!important;
      }
      </style>
  </head>
  <body>
    <!--Header-->
    <header>
      <?php
        include_once("common/header.php");
        include_once("common/DBCon.php");
        ?>
      <nav id="navigation_bar" class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="header_wrap">
            <div class="header_search">
              <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
              <form action="listing-classic.php" method="get" id="header-search-form" enctype="multipart/form-data">
                <input type="text" name="_phrs" placeholder="Search..." class="form-control">
                <input type="hidden" name="_bnd" value="-1">
                <input type="hidden" name="_yer" value="Any">
                <input type="hidden" name="_prF" value="0">
                <input type="hidden" name="_prT" value="999999999999999">
                <input type="hidden" name="_con" value="-1">
                <input type="hidden" name="_order" value="1">
                
                <button type="submit" id="search" name="search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
              </div>
          </div>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <!--<li><a href="about-us.php">About Us</a></li>-->
              <li><a href="listing-grid.php?_order=1&_phrs=&_bnd=-1&_yer=Any&_prF=0&_prT=999999999999999&_con=-1&search=">Vehicle List</a></li>
              <!--<li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventory</a>
                <ul class="dropdown-menu">
                  <li><a href="listing-grid.php">Grid Style</a></li>
                  <li><a href="listing-classic.php">Classic Style</a></li>
                  <li><a href="listing-detail.php">Detail Page Style 1</a></li>
                  <li><a href="listing-detail-2.php">Detail Page Style 2</a></li>
                </ul>
                </li>-->
              <!--<li><a href="dealers-list.php">Dealers</a></li>-->
              <!--<li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dealers</a>
                <ul class="dropdown-menu">
                  <li><a href="dealers-list.php">List View</a></li>
                  <li><a href="dealers-profile.php">Detail Page</a></li>
                </ul>
                </li>-->
              <!--<li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li><a href="services.php">Services</a></li>-->
              <!--<li><a href="compare.php">Compare Vehicles</a></li>-->
              <li><a href="contact-us.php">Contact Us</a></li>
              <!--<li><a href="faq.php">FAQ</a></li>
                <li><a href="404.php">404 Error</a></li>
                <li><a href="coming-soon.php">Coming Soon</a></li>-->
              <!--</ul>
                </li>-->
              <!--<li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                <ul class="dropdown-menu">
                  <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                  <li><a href="blog-right-sidebar.php">Blog Right Sidebar</a></li>
                  <li><a href="blog-detail.php">Blog Detail</a></li>
                </ul>
                </li>-->
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Header --> 
    <!-- Banners -->
    <?php
      include_once("common/banner.php");
      
      // /Banners // 
      
      // Filter-Form //
      
      //include_once("common/filterForm.php");
      
      // /Filter-Form // 
      
      // About //
      
      //include_once("common/about.php");
      
      // /About // 
      
      // Resent Cat//
      
      //include_once("common/recentCats.php");
      ?>
    <section class="section-padding gray-bg">
      <div class="container">
      <div class="section-header text-center">
        <h2>Find the Best <span>Vehicle For You</span></h2>
        <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>-->
      </div>
      <div class="row">
        <!-- Nav tabs -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#resentnewcar" role="tab" data-toggle="tab">Brand New</a></li>
            <li role="presentation" class="active"><a href="#resentrecondition" role="tab" data-toggle="tab">Recondition</a></li>
            <li role="presentation"><a href="#resentusecar" role="tab" data-toggle="tab">Used</a></li>
          </ul>
        </div>
        <!-- Recently Listed Brandnew -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane" id="resentnewcar">
            <?php
              $newcar_query = mysqli_query($con, "SELECT * FROM posts WHERE status='1' and VehicleConditionId='1'");
              while($newcar_row = mysqli_fetch_array($newcar_query)){
                echo"
                  <div class='col-list-3'>
                    <div class='recent-car-list'>
                      <div class='car-info-box'> <a href='vehicle_info.php?id=".$newcar_row['PostId']."' target='_blank'><img src='assets/images/vehicleimages/".$newcar_row['PostId'].".jpg' class='img-responsive' alt=''></a>
                        <ul>
                          <li><i class='fa fa-road' aria-hidden='true'></i>".number_format($newcar_row['KMsDriven'])." km</li>
                          <li><i class='fa fa-calendar' aria-hidden='true'></i>".$newcar_row['ModelYear']." Model</li>
                        </ul>
                      </div>
                      <div class='car-title-m'>
                        <h6><a href='vehicle_info.php?id=".$newcar_row['PostId']."' target='_blank'>".$newcar_row['PostTitle']."</a></h6>
                        <span class='price'>Rs. ".number_format($newcar_row['price'])."</span> 
                      </div>
                      
                    </div>
                  </div>
                ";/*<div class='inventory_info_m'>
                        <p>".$newcar_row['VehicleDescription']."</p>
                      </div>*/
              }
              ?>
            <!-- Recently Listed Used Cars -->
          </div>
          <div role="tabpanel" class="tab-pane active" id="resentrecondition">
            <?php
              $usecar_query = mysqli_query($con, "SELECT * FROM posts WHERE status='1' and VehicleConditionId='2'");
              while($usecar_row = mysqli_fetch_array($usecar_query)){
                echo"
                  <div class='col-list-3'>
                    <div class='recent-car-list'>
                      <div class='car-info-box'> <a href='vehicle_info.php?id=".$usecar_row['PostId']."' target='_blank'><img src='assets/images/vehicleimages/".$usecar_row['PostId'].".jpg' class='img-responsive' alt=''></a>
                        <ul>
                          <li><i class='fa fa-road' aria-hidden='true'></i>".number_format($usecar_row['KMsDriven'])." km</li>
                          <li><i class='fa fa-calendar' aria-hidden='true'></i>".$usecar_row['ModelYear']." Model</li>
                        </ul>
                      </div>
                      <div class='car-title-m'>
                        <h6><a href='vehicle_info.php?id=".$usecar_row['PostId']."' target='_blank'>".$usecar_row['PostTitle']."</a></h6>
                        <span class='price'>Rs. ".number_format($usecar_row['price'])."</span> 
                      </div>
                      
                    </div>
                  </div>
                ";/*<div class='inventory_info_m'>
                        <p>".$usecar_row['VehicleDescription']."</p>
                      </div>*/
              }
              ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="resentusecar">
            <?php
              $usecar_query = mysqli_query($con, "SELECT * FROM posts WHERE status='1' and VehicleConditionId='3'");
              while($usecar_row = mysqli_fetch_array($usecar_query)){
                echo"
                  <div class='col-list-3'>
                    <div class='recent-car-list'>
                      <div class='car-info-box'> <a href='vehicle_info.php?id=".$usecar_row['PostId']."' target='_blank'><img src='assets/images/vehicleimages/".$usecar_row['PostId'].".jpg' class='img-responsive' alt=''></a>
                        <ul>
                          <li><i class='fa fa-road' aria-hidden='true'></i>".number_format($usecar_row['KMsDriven'])." km</li>
                          <li><i class='fa fa-calendar' aria-hidden='true'></i>".$usecar_row['ModelYear']." Model</li>
                        </ul>
                      </div>
                      <div class='car-title-m'>
                        <h6><a href='vehicle_info.php?id=".$usecar_row['PostId']."' target='_blank'>".$usecar_row['PostTitle']."</a></h6>
                        <span class='price'>Rs. ".number_format($usecar_row['price'])."</span> 
                      </div>
                      
                    </div>
                  </div>
                ";/*<div class='inventory_info_m'>
                        <p>".$usecar_row['VehicleDescription']."</p>
                      </div>*/
              }
              ?>
          </div>
        </div>
      </div>
    </section>
    <?php
      // /Resent Cat // 
      
      // Fun Facts//
      
      //include_once("common/funFacts.php");
      
      // /Fun Facts// 
      
      //Featured Car//
      
      //include_once("common/featuredCar.php");
      
      // /Featured Car// 
      
      //Trending Car//
      
      //include_once("common/trendingCar.php");
      
      // /Trending Car// 
      
      //Testimonial //
      
      //include_once("common/testimonial.php");
      
      // /Testimonial// 
      
      //Blog //
      
      //include_once("common/blog.php");
      
      // /Blog// 
      
      //Brands//
      
      //include_once("common/populerBrands.php");
      ?>
    <!-- /Brands--> 
    <!--Footer -->
    <footer style="position: absolute;z-index: 3;width: 100%;">
      <?php
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