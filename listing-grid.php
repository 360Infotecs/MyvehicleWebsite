<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyVehicle.lk - Listing Grid</title>
    <?php
include_once("common/head.php");
?>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<link href = "assets/css/jquery-ui.css" rel = "stylesheet">
 </head>
  <body>
    <!--Header-->
    <header>
      <?php
// Main Header //
include_once("common/header.php");
include_once("common/DBCon.php");
include_once("function.php");
global $con, $priceFrom, $priceTo;
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
              <form action="listing-grid.php" method="get" id="header-search-form" enctype="multipart/form-data">
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
            <h1>Car Listing Grid</h1>
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
    <!--Listing-grid-view-->
    <section class="listing-page">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            
              <?php
//				global $con;
//				if (isset($_GET['search'])) {
//				    getAllSearchGrid();
//				} else {
//				    getAllPostsGrid();
//				}
				?>
				
				<div class="row filter_data">

                </div>

          </div>
          <!--Side-Bar-->
          <aside class="col-md-3 col-md-pull-9">
            <div class="sidebar_widget">
            
                <div class="widget_heading">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
                  </div>
                               
                <div class="list-group">
                    <h6>Price</h6>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>                
                <div class="list-group">
                    <h6>Brand</h6>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                    <?php
						$sql_brand = mysqli_query($con, "SELECT DISTINCT posts.BrandId AS id,brand.Name AS name FROM posts INNER JOIN brand ON posts.BrandId=brand.Id WHERE posts.Status=1 ORDER BY brand.Name");
						$row_brand = mysqli_num_rows($sql_brand);
						while ($row_brand = mysqli_fetch_array($sql_brand)) {
						?>
                    <div class="list-group-item checkbox">
                        <label>
                        	<input type="checkbox" class="common_selector brand" value="<?php echo $row_brand['id'];?>"  > 
                        	<?php echo $row_brand['name'];?>
                        </label>
                    </div>
                    <?php
					}
					?>
                   </div>
                </div>

                <div class="list-group">
                    <h6>Vehicle Condition</h6>
                    <?php
						$sql_condition = mysqli_query($con, "SELECT DISTINCT posts.VehicleConditionId AS id,vehiclecondition.Name AS name FROM posts INNER JOIN vehiclecondition ON posts.VehicleConditionId=vehiclecondition.Id WHERE posts.Status=1 ORDER BY vehiclecondition.Name");
						$row_condition = mysqli_num_rows($sql_condition);
						while ($row_condition = mysqli_fetch_array($sql_condition)) {
						?>
                    <div class="list-group-item checkbox">
                        <label>
	                        <input type="checkbox" class="common_selector brand" value="<?php echo $row_condition['id'];?>"  > 
	                        <?php echo $row_condition['name'];?>
						</label>
                    </div>
                    <?php
					}
					?>
               </div>
                
                <div class="list-group">
                    <h6>Internal Storage</h6>
                    <?php
						$sql_brand = mysqli_query($con, "SELECT DISTINCT posts.BrandId AS id,brand.Name AS name FROM posts INNER JOIN brand ON posts.BrandId=brand.Id WHERE posts.Status=1 ORDER BY brand.Name");
						$row_brand = mysqli_num_rows($sql_brand);
						while ($row_brand = mysqli_fetch_array($sql_brand)) {
						?>
                    <div class="list-group-item checkbox">
                        <label>
	                        <input type="checkbox" class="common_selector brand" value="<?php echo $row_brand['id'];?>"  > 
							<?php echo $row_brand['name'];?>
						</label>
                    </div>
                    <?php
					}
					?>
               </div>
            </div>
            <div class="sidebar_widget sell_car_quote">
              <div class="white-text div_zindex text-center">
                <h3>Sell Your Car</h3>
                <p>Request a quote and sell your car now!</p>
                <a href="#" class="btn">Request a Quote <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> 
              </div>
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

    <style>
	#loading
	{
		text-align:center; 
		background: url('loader.gif') no-repeat center; 
		height: 150px;
	}
	</style>
    
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
    </section>
    <!--/Listing-grid-view--> 
    <!--Brands-->
    <?php
include_once("common/populerBrands.php");
?>
   <!-- /Brands--> 
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