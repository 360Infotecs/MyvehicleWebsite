<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicles.lk - Dealers List</title>
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
          </div>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="about-us.php">About Us</a></li>
              <li><a href="listing-grid.php">Vehicle List</a></li>
              <li class="active"><a href="dealers-list.php">Dealers</a></li>
              <li><a href="compare.php">Compare Vehicles</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Header --> 
    <!--Dealers-list-->
    <section class="inner_pages">
      <div class="container">
        <div class="col-sm-9 col-xs-12">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <p>1 - 6 <span>of 50 Results for your search.</span></p>
            </div>
            <div class="result-sorting-by">
              <p>Sort by:</p>
              <form action="#" method="post">
                <div class="form-group select sorting-select">
                  <select class="form-control ">
                    <option>Best Sellers</option>
                    <option>Newest Sellers</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
          <div class="dealers_list_wrap">
            <div class="dealers_listing">
              <div class="row">
                <div class="col-sm-3 col-xs-4">
                  <div class="dealer_logo">
                    <a href="dealers-profile.php">
                    <img src="assets/images/dealer-logo.jpg" alt="image">
                    </a>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-8">
                  <div class="dealer_info">
                    <h5><a href="dealers-profile.php">Autospot Used Cars Center </a></h5>
                    <p>P.1225 N Broadway Ave<br>Oklahoma City, OK  1234-5678-090</p>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                  <div class="view_profile">
                    <a href="dealers-profile.php" class="btn btn-xs outline">View Profile</a>
                    <p>(25 Cars)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        <div class="col-sm-3"></div>
      </div>
    </section>
    <!--/Dealers-list--> 
    <!--Footer -->
    <footer>
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