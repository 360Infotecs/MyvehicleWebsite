<?php

/*$servername = "localhost";
$username = "myvehicle_user";
$password = "R_IUesXqL@Lm";
$dbname = "myvehiclelk";*/
$per_page_count = 15;
$file_path = "assets/images/vehicleimages/";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myvehicle.lk";
try
{
    $con = mysqli_connect($servername, $username, $password, $dbname);
    $con = new mysqli($servername, $username, $password, $dbname);
    
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	else
	{
	//echo "Connected successfully";	
	}

}
catch (Exception $e)
{
    $error = $e->getMessage();
    echo $error;
}

?>
