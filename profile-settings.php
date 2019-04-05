 <?php
session_start();
require 'common/DBConnect.php';
$msg    = '';
$result = false;
if (isset($_POST['btnsubmit'])) {
    try {
        $result = insert_user();
        display_form();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    display_form();
}


function GenerateRandomId()
{
    global $res;
    $random_id_length = 7;
    $stamp            = date("ymd");
    $rnd_id           = uniqid(rand(), 1);
    $rnd_id           = strip_tags(stripslashes($rnd_id));
    $rnd_id           = str_replace(".", "", $rnd_id);
    $rnd_id           = strrev(str_replace("/", "", $rnd_id));
    $rnd_id           = substr($rnd_id, 0, $random_id_length);
    return "MVC$stamp$rnd_id";
}


function insert_user()
{
    global $pdo, $msg;
    $AgentId           = $_POST['AgentId'];
    $CompanyName       = $_POST['CompanyName'];
    $AddressLine1      = $_POST['AddressLine1'];
    $AddressLine2      = $_POST['AddressLine2'];
    $AddressLine3      = $_POST['AddressLine3'];
    $ContactPerson     = $_POST['ContactPerson'];
    $PhoneNo           = $_POST['PhoneNo'];
    $Mobile            = $_POST['Mobile'];
    $Email             = $_POST['Email'];
    $Latitude          = $_POST['Latitude'];
    $Longitude         = $_POST['Longitude'];
    $Status            = $_POST['Status'];
    $imagename         = $_FILES['image']['name'];
 //   $imagedata         = ($imagename!=NULL || $imagename !="")?file_get_contents($_FILES['image']['tmp_name']):NULL;
    $imagetype         = $_FILES['image']['type'];
    $CompanyId         = GenerateRandomId();
    $statusUpdatedBy   = "Admin"; //from session;
    $statusUpdatedDate = date('Y-m-d H:i:s');
    $createdBy         = "Admin"; //from session
    $createdDate       = date('Y-m-d H:i:s');
    if (substr($imagetype, 0, 5) == "image") {
        // construct SQL insert statement
        $sql_insert = "INSERT INTO `company`(`CompanyId`, `AgentId`, `CompanyName`, 
            `Logo`, `LogoName`, `AddressLine1`, `AddressLine2`, `AddressLine3`, `ContactPerson`, 
            `PhoneNo`, `Mobile`, `Email`, `Latitude`, `Longitude`, `Status`, `StatusUpdatedBy`, 
            `StatusUpdatedDate`, `CreatedBy`, `CreatedDate`) 
             VALUES(" . $pdo->quote($CompanyId) . "," . $pdo->quote($AgentId) . "," . $pdo->quote($CompanyName) . "," . $pdo->quote($imagedata) . "," . $pdo->quote($imagename) . "," . $pdo->quote($AddressLine1) . "," . $pdo->quote($AddressLine2) . "," . $pdo->quote($AddressLine3) . "," . $pdo->quote($ContactPerson) . "," . $pdo->quote($PhoneNo) . "," . $pdo->quote($Mobile) . "," . $pdo->quote($Email) . "," . $pdo->quote($Latitude) . "," . $pdo->quote($Longitude) . "," . $pdo->quote($Status) . "," . $pdo->quote($statusUpdatedBy) . "," . $pdo->quote($statusUpdatedDate) . "," . $pdo->quote($createdBy) . "," . $pdo->quote($createdDate) . ")";
        if ($pdo->exec($sql_insert) === false) {
            $msg = 'Error creating the company.';
            return false;
        } else {
            $msg = "The new company $CompanyName is created";
            return true;
            //display_form();
        }
    } else {
        $msg = "only images are allowed!";
        return false;
    }
}

 function display_msg($msg, $type)
{
    $type === true ? $cssClass = "alert-success" : $cssClass = "alert-error";
    if ($msg != '') {
?>
 <div class="alert <?php echo $cssClass;?>">
 <?php echo $msg;?>
 </div>
 
 <?php
    }
}


function display_form()
{
    global $msg, $result, $pdo;
    $stmt = $pdo->query("SELECT * FROM companystatus");
    $stmt->execute();
    $data  = $stmt->fetchAll();
	
    $stmt1 = $pdo->query("SELECT * FROM systemuser");
    $stmt1->execute();
    $agent = $stmt1->fetchAll();
	
	$stmt2 = $pdo->query("SELECT * FROM `company` order by Id DESC limit 1 ");
    $stmt2->execute();
    $company = $stmt2->fetchAll();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MyVehicles.lk - Profile Settings</title>
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

<!--Profile-setting-->
<section class="user_profile inner_pages">
  <div class="container">
  <form role="form" action = "<?php $_SERVER['PHP_SELF'];?>" method = "POST" enctype="multipart/form-data">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> 
	  <?php foreach ($company as $rowx):?>
	  <embed src='data:".$rowx['LogoName'].";base64,".base64_encode($rowx['Logo'])."'width='100'/>

					  <!--<img src="assets/images/dealer-logo.jpg" alt="image"id="imgs">-->
					<?php endforeach;?>
	  
	  
        <div class="upload_newlogo" id="uploadimage" style="height: 25%;width: 25%; background-position: top;">
		  <input type="file" class="coverimage" id="image" name="image">
        </div>
      </div>
      <div class="dealer_info">
        <h5 id="companyName">Autospot Used Cars Center </h5>
        <p id="companyAddress">P.1225 N Broadway Ave <br>
          Oklahoma City, OK  1234-5678-090</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="profile_nav">
          <ul>
            <li class="active"><a href="profile-settings.php">Profile Settings</a></li>
            <li><a href="my-vehicles.php">My Vehicles</a></li>
            <li><a href="post-vehicle.php">Post a Vehicles</a></li>
            <li><a href="#">Sign Out</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-8">
		<div class="profile_wrap">
		  <h5 class="uppercase underline">Genral Settings</h5>
			<div class="form-group">
			  <label class="control-label">Company Name</label>
			  <input type="text" class="form-control white_bg" id="CompanyName" name="CompanyName" placeholder="Enter Company Name">
			</div>
			<div class="form-group">
			  <label class="control-label">Address Line 1</label>
			  <input type="text" class="form-control white_bg" id="AddressLine1" name="AddressLine1" placeholder="Enter Address">
			</div>
			<div class="form-group">
			  <label class="control-label">Address Line 2</label>
			  <input type="text" class="form-control white_bg" id="AddressLine2" name="AddressLine2" placeholder="Enter Address">
			</div>
			<div class="form-group">
			  <label class="control-label">Address Line 3</label>
			  <input type="text" class="form-control white_bg" id="AddressLine3" name="AddressLine3" placeholder="Enter Address">
			</div>
			<div class="form-group">
			  <label class="control-label">Phone No</label>
			  <input type="text" class="form-control white_bg" id="PhoneNo" name="PhoneNo" placeholder="Enter Phone No">
			</div>
			<div class="form-group">
			  <label class="control-label">Agent Id</label>
				<select class="form-control white_bg" id="AgentId" name="AgentId">
					<option>Select Agent</option>
					<?php foreach ($agent as $row1):?>
					  <option value='<?= $row1["Id"] ?>'><?= $row1["UserName"] ?> ( <?= $row1["UserId"] ?> )</option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="profile_wrap">
			<h5 class="uppercase underline">Location Detail</h5>
			<div class="form-group">
				  <label class="control-label">Latitude</label>
				  <input type="text" class="form-control white_bg" id="Latitude" name="Latitude" placeholder="Enter Latitude">
				</div>
				<div class="form-group">
				  <label class="control-label">Longitude</label>
				  <input type="text" class="form-control white_bg" id="Longitude" name="Longitude" placeholder="Enter Longitude">
				</div>
				<div class="form-group">
					<label class="control-label">Company Status</label>
					<select class="form-control white_bg" id="Status" name="Status">
						<option>Select Company Status</option>
						<?php foreach ($data as $row):?>
						  <option value='<?= $row["Id"] ?>'><?= $row["Name"] ?></option>
						<?php endforeach;?>
					</select>
				</div>
			<div class="gray-bg field-title">
			  <h6>Contact Person</h6>
			</div>
			<div class="form-group">
				  <label class="control-label">Contact Person</label>
				  <input type="text" class="form-control white_bg" id="ContactPerson" name="ContactPerson" placeholder="Enter Contact Person">
				</div>
				<div class="form-group">
				  <label class="control-label">Mobile No</label>
				  <input type="text" class="form-control white_bg" id="Mobile" name="Mobile" placeholder="Enter Mobile No">
				</div>
				<div class="form-group">
				  <label class="control-label">Email</label>
				  <input type="text" class="form-control white_bg" id="Email" name="Email" placeholder="Enter Email">
				</div>
			<div class="form-group">
			  <button type="submit" class="btn" id="btnsubmit" name="btnsubmit">Add Company <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
			</div>
		</div>
      </div>
    </div>
	</form>
  </div>
</section>
<!--/Profile-setting--> 

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
<script src="assets/image-preview-jquery/jquery.min.js"></script>
<script src="assets/image-preview-jquery/img.js"></script>
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
<?php
}
?> 