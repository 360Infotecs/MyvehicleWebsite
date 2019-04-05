<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <title>MyVehicles.lk - Listing Detail</title>
      <?php
         include_once("common/head.php");
         global $con;
         ?>
   </head>
   <body>
      <!--Header-->
      <header>
         <?php
            // Main Header //
            include_once("common/header.php");
            include_once("common/DBCon.php");
            include_once("function.php");
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
                     <!--<li><a href="about-us.php">About Us</a></li>-->
                     <li class="active"><a href="listing-grid.php">Vehicle List</a></li>
                     <!--<li><a href="dealers-list.php">Dealers</a></li>
                     <li><a href="compare.php">Compare Vehicles</a></li>-->
                     <li><a href="contact-us.php">Contact Us</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <!-- /Header --> 
      <?php
         global $con;
         
          if(isset($_GET['id'])){
         
         $vehicle_Id = mysqli_real_escape_string($con,$_GET['id']);
         
         $get_menu = "SELECT po.Id, po.PostId,po.VehicleDescription,po.NoOfOwners,po.KMsDriven,po.EngineType,
         po.EngineDescription,po.NoofCylinders,po.MileageCity,po.MileageHighway,fu.Name as FuelType,
         po.FuelTankCapacity,po.BrakeAssist,po.DriverAirbag,po.PassengerAirbag,po.CrashSensor,
         po.EngineCheckWarning,po.AutomaticHeadlamps,po.Status,po.phone,po.IsNegotiable,po.StatusUpdatedDate,
         po.StatusUpdatedBy,po.CreatedBy,po.CreatedDate,po.SeatingCapacity,po.AirConditioner,po.AntiLockBrakingSystem,
         po.PowerSteering,po.PowerWindows,po.CDPlayer,po.LeatherSeats,po.CentralLocking,po.PowerDoorLocks,
         po.AgentId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,ve.Name AS VehicleCondition, 
         po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, co.CompanyId, co.CompanyName, 
         su.UserId as AgentNo, po.SubAgentName,po.price,tr.Name as TransmissionType
		FROM posts po 
		LEFT JOIN company co ON co.Id = po.companyId
		LEFT JOIN systemuser su ON su.Id = po.AgentId
		LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
		LEFT JOIN brand br ON br.Id = po.BrandId
		LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
		LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
		LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId where PostId='".mysqli_real_escape_string($con,$vehicle_Id)."'";
                  
         $run_query = mysqli_query($con,$get_menu,MYSQLI_USE_RESULT);
         
         	while($row_menu=mysqli_fetch_array($run_query)){
         		
         		$Id = $row_menu['Id'];
         		$PostId = $row_menu['PostId'];
         		$CompanyId = $row_menu['CompanyId'];
         		$CompanyName = $row_menu['CompanyName'];
         		$AgentId = $row_menu['AgentId'];
         		$SubAgentName = $row_menu['SubAgentName'];
         		$PostTitle = $row_menu['PostTitle'];
         		$VehicleDescription = $row_menu['VehicleDescription'];
         		$ClassOfVehicle = $row_menu['ClassOfVehicle'];
         		$Brand = $row_menu['Brand'];
         		$Colour = $row_menu['Colour'];
         		$VehicleCondition = $row_menu['VehicleCondition'];
         		$NoOfOwners = $row_menu['NoOfOwners'];
         		$ModelYear = $row_menu['ModelYear'];
         		$KMsDriven = $row_menu['KMsDriven'];
         		$FuelType = $row_menu['FuelType'];
         		$TransmissionType = $row_menu['TransmissionType'];
         		$EngineType = $row_menu['EngineType'];
         		$EngineDescription = $row_menu['EngineDescription'];
         		$NoofCylinders = $row_menu['NoofCylinders'];
         		$MileageCity = $row_menu['MileageCity'];
         		$MileageHighway = $row_menu['MileageHighway'];
         		$FuelTankCapacity = $row_menu['FuelTankCapacity'];
         		$SeatingCapacity = $row_menu['SeatingCapacity'];
         		$AirConditioner = $row_menu['AirConditioner'];
         		$AntiLockBrakingSystem = $row_menu['AntiLockBrakingSystem'];
         		$PowerSteering = $row_menu['PowerSteering'];
         		$PowerWindows = $row_menu['PowerWindows'];
         		$CDPlayer = $row_menu['CDPlayer'];
         		$LeatherSeats = $row_menu['LeatherSeats'];
         		$CentralLocking = $row_menu['CentralLocking'];
         		$PowerDoorLocks = $row_menu['PowerDoorLocks'];
         		$BrakeAssist = $row_menu['BrakeAssist'];
         		$DriverAirbag = $row_menu['DriverAirbag'];
         		$PassengerAirbag = $row_menu['PassengerAirbag'];
         		$CrashSensor = $row_menu['CrashSensor'];
         		$EngineCheckWarning = $row_menu['EngineCheckWarning'];
         		$AutomaticHeadlamps = $row_menu['AutomaticHeadlamps'];
         		$price = $row_menu['price'];
         		$Status = $row_menu['Status'];
         		$phone = $row_menu['phone'];
         		$IsNegotiable = $row_menu['IsNegotiable'];
         		$StatusUpdatedBy = $row_menu['StatusUpdatedBy'];
         		$StatusUpdatedDate = $row_menu['StatusUpdatedDate'];
         		$CreatedBy = $row_menu['CreatedBy'];
         		$CreatedDate = $row_menu['CreatedDate'];
         		
         ?>
      <!-- Listing-detail-header -->
      <section class="listing_detail_header">
         <div class="container">
            <div class="listing_detail_head white-text div_zindex row">
               <div class="col-md-9">
                  <h2><?php echo$PostTitle?>, <?php echo$Colour?> </h2>
                  <!--<div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i>
                     12250 F Garvey Ave South West Covina, CA 91791</span></div>-->
                  <div class="add_compare">
                     <div class="checkbox">
                        <input value="" id="compare14" type="checkbox">
                        <label for="compare14">Add to Compare</label>
                     </div>
                     <div class="share_vehicle">
                        <!--<p>Share: <a href="https://www.facebook.com/myvehicle.lk/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>-->
                        <!--<a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
                           <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> 
                           <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>--> </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="price_info">
                     <p>Rs.<?php echo number_format($price)?></p>
                     <!--<p class="old_price">$95,000</p>-->
                  </div>
               </div>
            </div>
         </div>
         <div class="dark-overlay"></div>
      </section>
      <!--Listing-detail-->
      <section class="listing-detail">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="listing_images">
                     <div class="listing_images_slider">
                        <?php
                        	$img_file = htmlentities($PostId,ENT_QUOTES,"utf-8");
                        	//$files = glob(basename("assets/images/vehicleimages/".$img_file."*.*").PHP_EOL);
                        	$path_parts = pathinfo("assets/images/vehicleimages/".$img_file."*.*");
                           $files = glob($file_path.$img_file."*.*");
                           foreach ($files as $item) {
                           echo "<div><img src='$item' alt='image'></div>";
                           }  ?>
                     </div>
                     <div class="listing_images_slider_nav">
                        <?php
                           $files = glob($file_path.$img_file."*.*");
                           
                           foreach ($files as $item) {
                           echo "<div><img src='$item' alt='image'></div>";
                           }  ?>
                     </div>
                  </div>
                  <div class="main_features">
                     <ul>
                        <li>
                           <i class="fa fa-tachometer" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo number_format($KMsDriven)?></h5>
                           <p style="color: black; !important">Total Kilometres</p>
                        </li>
                        <li>
                           <i class="fa fa-calendar" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo $ModelYear ?></h5>
                           <p style="color: black; !important">Reg.Year</p>
                        </li>
                        <li>
                           <i class="fa fa-cogs" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo $FuelType ?></h5>
                           <p style="color: black; !important">Fuel Type</p>
                        </li>
                        <li>
                           <i class="fa fa-power-off" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo $TransmissionType ?></h5>
                           <p style="color: black; !important">Transmission</p>
                        </li>
                        <li>
                           <i class="fa fa-superpowers" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo$EngineDescription ?></h5>
                           <p style="color: black; !important">Engine</p>
                        </li>
                        <li>
                           <i class="fa fa-user-plus" aria-hidden="true"></i>
                           <h5  style="color: #ff0000; !important"><?php echo $SeatingCapacity ?></h5>
                           <p style="color: black; !important">Seats</p>
                        </li>
                     </ul>
                  </div>
                  <div class="listing_more_info">
                     <div class="listing_detail_wrap">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs gray-bg" role="tablist">
                           <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
                           <li role="presentation"><a href="#specification" aria-controls="specification" role="tab" data-toggle="tab">Technical Specification</a></li>
                           <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <!-- vehicle-overview -->
                           <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                           	  <h5><?php echo$PostTitle ?></h1>
                              <p><?php echo$VehicleDescription ?></p>
                           </div>
                           <!-- Technical-Specification -->
                           <div role="tabpanel" class="tab-pane" id="specification">
                              <div class="table-responsive">
                                 <!--Basic-Info-Table-->
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="2">BASIC INFORMATION</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>Model Year</td>
                                          <td><?php echo $ModelYear ?></td>
                                       </tr>
                                       <tr>
                                          <td>No. of Owners</td>
                                          <td><?php echo $NoOfOwners ?></td>
                                       </tr>
                                       <tr>
                                          <td>KMs Driven</td>
                                          <td><?php echo number_format($KMsDriven) ?></td>
                                       </tr>
                                       <tr>
                                          <td>Fuel Type</td>
                                          <td><?php echo $FuelType ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <!--Technical-Specification-Table-->
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="2">Technical Specification</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>Engine Type</td>
                                          <td><?php echo $EngineType ?></td>
                                       </tr>
                                       <tr>
                                          <td>Engine Description</td>
                                          <td><?php echo $EngineDescription ?></td>
                                       </tr>
                                       <tr>
                                          <td>No. of Cylinders</td>
                                          <td><?php echo $NoofCylinders ?></td>
                                       </tr>
                                       <tr>
                                          <td>Mileage-City</td>
                                          <td><?php echo $MileageCity ?>kmpl</td>
                                       </tr>
                                       <tr>
                                          <td>Mileage-Highway</td>
                                          <td><?php echo $MileageHighway ?>kmpl</td>
                                       </tr>
                                       <tr>
                                          <td>Fuel Tank Capacity</td>
                                          <td><?php echo $FuelTankCapacity ?> (Liters)</td>
                                       </tr>
                                       <tr>
                                          <td>Seating Capacity</td>
                                          <td><?php echo $SeatingCapacity ?></td>
                                       </tr>
                                       <tr>
                                          <td>Transmission Type</td>
                                          <td><?php echo $TransmissionType ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- Accessories -->
                           <div role="tabpanel" class="tab-pane" id="accessories">
                              <!--Accessories-->
                              <table>
                                 <thead>
                                    <tr>
                                       <th colspan="2">Accessories</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Air Conditioner</td>
                                       <?php
                                       if($AirConditioner==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>AntiLock Braking System</td>
                                       <?php
                                       if($AntiLockBrakingSystem==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Power Steering</td>
                                       <?php
                                       if($PowerSteering==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Power Windows</td>
                                       <?php
                                       if($PowerWindows==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>CD Player</td>
                                       <?php
                                       if($CDPlayer==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Leather Seats</td>
                                       <?php
                                       if($LeatherSeats==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Central Locking</td>
                                       <?php
                                       if($CentralLocking==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Power Door Locks</td>
                                       <?php
                                       if($PowerDoorLocks==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Brake Assist</td>
                                       <?php
                                       if($BrakeAssist==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Driver Airbag</td>
                                       <?php
                                       if($DriverAirbag==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Passenger Airbag</td>
                                       <?php
                                       if($PassengerAirbag==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Crash Sensor</td>
                                       <?php
                                       if($CrashSensor==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Engine Check Warning</td>
                                       <?php
                                       if($EngineCheckWarning==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                    <tr>
                                       <td>Automatic Headlamps</td>
                                       <?php
                                       if($AutomaticHeadlamps==1)
                                       {echo"<td><i class='fa fa-check' aria-hidden='true'></i></td>";}
                                       else{echo"<td><i class='fa fa-close' aria-hidden='true'></i></td>";} 
                                       ?>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!--Vehicle-Video-->
                     <!--<div class="video_wrap">
                        <h6>Watch Video </h6>
                        <div class="video-box">
                           <iframe class="mfp-iframe" src="https://www.youtube.com/embed/rqSoXtKMU3Q" allowfullscreen></iframe>
                        </div>
                     </div>-->
                     <!--Comment-Form-->
                     <!--<div class="comment_form">
                        <h6>Leave a Comment</h6>
                        <form action="#">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Full Name">
                           </div>
                           <div class="form-group">
                              <input type="email" class="form-control" placeholder="Email Address">
                           </div>
                           <div class="form-group">
                              <textarea rows="5" class="form-control" placeholder="Comments"></textarea>
                           </div>
                           <div class="form-group">
                              <input type="submit" class="btn" value="Submit Comment">
                           </div>
                        </form>
                     </div>-->
                     <!--/Comment-Form--> 
                  </div>
               </div>
               <!--Side-Bar-->
               <aside class="col-md-3">
                  <!--<div class="sidebar_widget">
                     <div class="widget_heading">
                       <h5><i class="fa fa-calculator" aria-hidden="true"></i> Financing Calculator </h5>
                     </div>
                     <div class="financing_calculatoe">
                       <form action="#" method="get">
                         <div class="form-group">
                           <label class="form-label">Vehicle Price ($)</label>
                           <input class="form-control" type="text">
                         </div>
                         <div class="form-group">
                           <label class="form-label">Down Price ($)</label>
                           <input class="form-control" type="text">
                         </div>
                         <div class="form-group">
                           <label class="form-label">Interest Rate</label>
                           <div class="select">
                             <select class="form-control select">
                               <option>12%</option>
                               <option>13%</option>
                               <option>14%</option>
                               <option>15%</option>
                               <option>16%</option>
                               <option>17%</option>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="form-label">Period in Years</label>
                           <div class="select">
                             <select class="form-control">
                               <option>3 Year</option>
                               <option>4 Year</option>
                               <option>5 Year</option>
                               <option>6 Year</option>
                               <option>7 Year</option>
                               <option>8 Year</option>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                           <button type="submit" class="btn btn-block">Calcuate</button>
                         </div>
                       </form>
                     </div>
                     </div>-->
                  <div class="sidebar_widget">
                     <div class="widget_heading">
                        <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Dealer Contact </h5>
                     </div>
                     <div class="dealer_detail">
                     <?php
                           $files = glob("assets/images/companyimages/$CompanyId.*");
                           foreach ($files as $item) {
                           echo "<img src='$item' alt='image'>";
                           }  ?>
                        <!--<img src="assets/images/dealer_img.jpg" alt="image">-->
                        <p><span>Company :</span> <?php echo $CompanyName ?></p>
                        <p><span>Contact Person :</span> <?php echo $SubAgentName ?></p>
                        <!--<p><span>Email:</span> contact@example.com</p>-->
                        <p><span>Phone :</span> <?php echo $phone ?></p>
                        <p><span>Negotiability :</span> <?php if($IsNegotiable==1){echo"Yes";}else{echo"No";} ?></p>
                        <!--<a href="#" class="btn btn-xs">View Profile</a>--> 
                     </div>
                  </div>
                  <!--<div class="sidebar_widget">
                     <div class="widget_heading">
                        <h5><i class="fa fa-envelope" aria-hidden="true"></i> Message to Dealer</h5>
                     </div>
                     <form action="#">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                           <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                           <textarea rows="4" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                           <input type="submit" value="Send Message" class="btn btn-block">
                        </div>
                     </form>
                  </div>-->
               </aside>
               <!--/Side-Bar--> 
            </div>
            <div class="space-20"></div>
            <div class="divider"></div>
            <!--Similar-Cars-->
            <div class="similar_cars">
               <h3>Similar Cars</h3>
               <div class="row">
               <?php 
               getSimiler($PostTitle,$ClassOfVehicle,$Brand,$PostId); 
               ?>

               </div>
            </div>
            <!--/Similar-Cars--> 
         </div>
      </section>
      <!--/Listing-detail--> 
      <?php
         }
         }
         ?>
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