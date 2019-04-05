<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicles.lk - Vehicle Listing</title>
    <?php
      include_once("common/head.php");
    ?>
<!--    <style>
    	
    .img-responsive{
    max-width: 90% !important;
}
.product-listing-m {
    margin: 0 auto 10px !important;
}
.product-listing-content {
    float: left;
    padding: 20px 15px 20px 0px !important;
    width: 70%;
}
.product-listing-img {
    float: left;
    width: 30%;
    position: relative;
    overflow: hidden;
}
    </style>-->
  </head>
  <body>
    <!--Header-->
    <header>
      <?php
        // Main Header //
        include_once("common/header.php");
        include_once("common/DBCon.php");
        include_once("function.php");
        global $con;
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
              <li class="active"><a href="listing-grid.php?_order=1&_phrs=&_bnd=-1&_yer=Any&_prF=0&_prT=999999999999999&_con=-1&search=">Vehicle List</a></li>
              <!--<li><a href="dealers-list.php">Dealers</a></li>-->
              <!--<li><a href="compare.php">Compare Vehicles</a></li>-->
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Header --> 

    <!--Page Header-->
    <!--<section class="page-header listing_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Car Listing</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Car Listing</li>
          </ul>
        </div>
      </div>-->
      <!-- Dark Overlay-->
      <!--<div class="dark-overlay"></div>
    </section>-->
    <!-- /Page Header--> 

    <!--Listing-->
    <section class="listing-page">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-push-3">
          
          <?php
          
		    global $con;
		    if(isset($_GET['search']))
		    {		
				getAllSearchClassic();
			}
		    else
		    {
				getAllPostsClassic();
			}
	        ?>

          </div>
          
          <!--Side-Bar-->
          <aside class="col-md-3 col-md-pull-9">
            <div class="sidebar_widget">
              <div class="widget_heading">
                <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
              </div>
              <div class="sidebar_filter">
                <form action="#" method="get">
                  <div class="form-group select">
                    <select class="form-control">
                      <option value="-1">Select Brand</option>
                      <?php
                        $sql = mysqli_query($con, "SELECT * FROM brand");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value='". $row['Id'] ."'>" .$row['Name'] ."</option>" ;
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group select">
                    <select class="form-control">
                      <option value="-1">Year of Model </option>
                      <?php $currently_selected = date('Y'); 
                        $earliest_year = $currently_selected-30; 
                        $latest_year = date('Y'); 
                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                          echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Price Range ($) </label>
                    <input id="price_range" type="text" class="span2" value="" data-slider-min="10000" data-slider-max="6000000" data-slider-step="100" data-slider-value="[100000,1000000]"/>
                  </div>
                  <div class="form-group select">
                    <select class="form-control">
                      <option value="-1">Select Condition</option>
                      <?php
                        $sql1 = mysqli_query($con, "SELECT * FROM vehiclecondition");
                        $row1 = mysqli_num_rows($sql1);
                        while ($row1 = mysqli_fetch_array($sql1)){
                        echo "<option value='". $row1['Id'] ."'>" .$row1['Name'] ."</option>" ;
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block" style="color: #FDD302; "><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="sidebar_widget sell_car_quote">
              <div class="white-text div_zindex text-center">
                <h3>Sell Your Car</h3>
                <p>Request a quote and sell your car now!</p>
                <a href="#" class="btn">Request a Quote <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
              <div class="dark-overlay"></div>
            </div>
            <div class="sidebar_widget">
              <div class="widget_heading">
                <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed</h5>
              </div>
              <div class="recent_addedcars">
              <ul>
              	<?php
                    getNew();
                    ?>
              </ul>
              </div>
            </div>
          </aside>
          <!--/Side-Bar--> 
        </div>
      </div>
    </section>
    <!-- /Listing--> 

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