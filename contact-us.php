<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicles.lk - Contact Us</title>
    <?php
      include_once("common/head.php");
      ?>
  </head>
  <body>
    <!--Header-->
    <header>
      <?php
        // Main Header //
        include_once("common/header.php");
        //Main Header End//
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
              <li><a href="index.php">Home</a></li>
              <!--<li><a href="about-us.php">About Us</a></li>-->
              <li><a href="listing-grid.php?_order=1&_phrs=&_bnd=-1&_yer=Any&_prF=0&_prT=999999999999999&_con=-1&search=">Vehicle List</a></li>
              <!--<li><a href="dealers-list.php">Dealers</a></li>-->
              <!--<li><a href="compare.php">Compare Vehicles</a></li>-->
              <li class="active"><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Header --> 
    <!--Page Header-->
    <!--<section class="page-header contactus_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Contact Us</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Contact Us</li>
          </ul>
        </div>
      </div>-->
    <!-- Dark Overlay-->
    <!--<div class="dark-overlay"></div>
      </section>-->
    <!-- /Page Header--> 
    <!--Contact-us-->
    <section class="contact_us section-padding">
      <div class="container">
        <div  class="row">
          <div class="col-md-6">
            <h3>Get in touch using the form below</h3>
            <div class="contact_form gray-bg">
              <form action="#" method="get">
                <div class="form-group">
                  <label class="control-label">Full Name <span>*</span></label>
                  <input type="text" class="form-control white_bg" id="fullname">
                </div>
                <div class="form-group">
                  <label class="control-label">Email Address <span>*</span></label>
                  <input type="email" class="form-control white_bg" id="emailaddress">
                </div>
                <div class="form-group">
                  <label class="control-label">Phone Number <span>*</span></label>
                  <input type="text" class="form-control white_bg" id="phonenumber">
                </div>
                <div class="form-group">
                  <label class="control-label">Message <span>*</span></label>
                  <textarea class="form-control white_bg" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn" type="submit" style="color: #fff;">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <h3>Contact Info</h3>
            <div class="contact_detail">
              <ul>
                <li>
                  <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                  <div class="contact_info_m">
                    PO Box 16/1, Sri Premananda Road, 
                    <br/>
                    Kerangapokuna, <br>Ragama, <br/>Sri Lanka.
                  </div>
                </li>
                <li>
                  <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                  <div class="contact_info_m"><a href="tel:94-7548-020-86">+94-7548-020-86</a></div>
                </li>
                <li>
                  <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                  <div class="contact_info_m"><a href="mailto:info@myvehicle.lk">info@myvehicle.lk</a></div>
                </li>
              </ul>
              <div class="map_wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.9888389243051!2d79.89771026080138!3d7.011907980943283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f7f5b72c07e7%3A0xeccc52f09af918c1!2smyvehicle.lk!5e0!3m2!1sen!2slk!4v1547544015816" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Contact-us--> 
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