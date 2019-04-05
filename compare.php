<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicles.lk - Compare</title>
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
		  <li><a href="dealers-list.php">Dealers</a></li>
              <li class="active"><a href="compare.php">Compare Vehicles</a></li>
			  <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
    </header>
    <!-- /Header --> 

    <!--Page Header-->
    <!--<section class="page-header compare_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Compare Inventorys</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Compare Inventorys</li>
          </ul>
        </div>
      </div>-->
      <!-- Dark Overlay-->
      <!--<div class="dark-overlay"></div>
    </section>-->
    <!-- /Page Header--> 

    <!-- Filter-Form -->
    <section id="filter_form" class="inner-filter gray-bg">
      <div class="container">
        <h3>Find Your Dream Car <span>(Easy search from here)</span></h3>
        <div class="row">
          <form action="#" method="get">
            <div class="form-group col-md-3 col-sm-6 black_input">
              <div class="select">
                <select class="form-control">
                  <option value="">Select Location </option>
                  <option value="">Location 1 </option>
                  <option value="">Location 1 </option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3 col-sm-6 black_input">
              <div class="select">
                <select class="form-control">
                  <option>Select Brand</option>
                  <option>Audi</option>
                  <option>BMW</option>
                  <option>Nissan</option>
                  <option>Toyota</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3 col-sm-6 black_input">
              <div class="select">
                <select class="form-control">
                  <option>Select Model</option>
                  <option>Series 1</option>
                  <option>Series 2</option>
                  <option>Series 3</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3 col-sm-6 black_input">
              <div class="select">
                <select class="form-control">
                  <option>Year of Model </option>
                  <option>2016</option>
                  <option>2015</option>
                  <option>2014</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-6 col-sm-6 black_input">
              <label class="form-label">Price Range ($)</label>
              <input id="price_range" type="text" class="span2" value="" data-slider-min="50" data-slider-max="6000" data-slider-step="5" data-slider-value="[1000,5000]"/>
            </div>
            <div class="form-group col-md-3 col-sm-6 black_input">
              <div class="select">
                <select class="form-control">
                  <option>Type of Car </option>
                  <option>New Car</option>
                  <option>Used Car</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3 col-sm-6">
              <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car </button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /Filter-Form --> 

    <!--Compare-->
    <section class="compare-page inner_pages">
      <div class="container">
        <div class="compare_info">
          <h4>Compare Hyundai Elantra 1.6 SX and Ford Figo 1.5D Base MT and Hyundai Elantra 2.0 SX</h4>
          <div class="compare_product_img">
            <div class="inventory_info_list">
              <ul>
                <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
                <li><a href="#"><img src="assets/images/recent-car-2.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/images/recent-car-3.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/images/recent-car-4.jpg" alt="image"></a></li>
              </ul>
            </div>
            <table>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="compare_product_title gray-bg">
            <div class="inventory_info_list">
              <ul>
                <li class="listing_heading">Compare <br>
                  Inventorys <span class="td_divider"></span></li>
                <li><a href="#">Hyundai Elantra 1.6 SX</a>
                  <p class="price">$90,000</p>
                  <span class="vs">V/s</span></li>
                <li><a href="#">Ford Figo 1.5D Base MT</a>
                  <p class="price">$85,000</p>
                  <span class="vs">V/s</span></li>
                <li><a href="#">Hyundai Elantra 2.0 SX</a>
                  <p class="price">$75,000</p>
                </li>
              </ul>
            </div>
          </div>
          <div class="compare_product_info"> 
            <!--Basic-Info-Table-->
            <div class="inventory_info_list">
              <div class="listing_heading">
                <div>BASIC INFO</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
              </div>
              <ul>
                <li class="info_heading">
                  <div>Model Year</div>
                  <div>No. of Owners</div>
                  <div>KMs Driven</div>
                  <div>Fuel Type</div>
                </li>
                <li>
                  <div>2010</div>
                  <div>4</div>
                  <div>30,000</div>
                  <div>Diesel</div>
                </li>
                <li>
                  <div>2005</div>
                  <div>2</div>
                  <div>55,000</div>
                  <div>Diesel</div>
                </li>
                <li>
                  <div>2010</div>
                  <div>1</div>
                  <div>95,000</div>
                  <div>Diesel</div>
                </li>
              </ul>
            </div>
            
            <!--Technical-Specification-Table-->
            <div class="inventory_info_list">
              <div class="listing_heading">
                <div>Technical Specification</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
              </div>
              <ul>
                <li class="info_heading">
                  <div>Engine Type</div>
                  <div>Engine Description</div>
                  <div>No. of Cylinders</div>
                  <div>Mileage-City</div>
                  <div>Mileage-Highway</div>
                  <div>Fuel Tank Capacity</div>
                  <div>Seating Capacity</div>
                  <div>Transmission Type</div>
                </li>
                <li>
                  <div>TDCI Diesel Engine</div>
                  <div>1.5KW</div>
                  <div>4</div>
                  <div>22.4kmpl</div>
                  <div>25.83kmpl</div>
                  <div>40 (Liters)</div>
                  <div>5</div>
                  <div>Manual</div>
                </li>
                <li>
                  <div>TDCI Diesel Engine</div>
                  <div>1.9KW</div>
                  <div>5</div>
                  <div>32.4kmpl</div>
                  <div>48.83kmpl</div>
                  <div>60 (Liters)</div>
                  <div>5</div>
                  <div>Automatic</div>
                </li>
                <li>
                  <div>TDCI Diesel Engine</div>
                  <div>1.6KW</div>
                  <div>6</div>
                  <div>21.4kmpl</div>
                  <div>28.83kmpl</div>
                  <div>42 (Liters)</div>
                  <div>6</div>
                  <div>Manual</div>
                </li>
              </ul>
            </div>
            
            <!--Accessories-->
            <div class="inventory_info_list">
              <div class="listing_heading">
                <div>Accessories</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
              </div>
              <ul>
                <li class="info_heading">
                  <div>Air Conditioner</div>
                  <div>AntiLock Braking System</div>
                  <div>Power Steering</div>
                  <div>Power Windows</div>
                  <div>CD Player</div>
                  <div>Leather Seats</div>
                  <div>Central Locking</div>
                  <div>Power Door Locks</div>
                  <div>Brake Assist</div>
                  <div>Driver Airbag</div>
                  <div>Passenger Airbag</div>
                  <div>Crash Sensor</div>
                  <div>Engine Check Warning</div>
                  <div>Automatic Headlamps</div>
                </li>
                <li>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                </li>
                <li>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-close" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                </li>
                <li>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-close" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-close" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-close" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                  <div><i class="fa fa-check" aria-hidden="true"></i></div>
                </li>
              </ul>
            </div>
            <div class="inventory_info_list text-center">
              <ul>
                <li>&nbsp;</li>
                <li><a href="#" class="btn">View Detail</a></li>
                <li><a href="#" class="btn">View Detail</a></li>
                <li><a href="#" class="btn">View Detail</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/Compare-->

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