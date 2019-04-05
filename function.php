<?php
include_once ("common/DBCon.php"); // Database Connection
// ################################################## Getting User IP Address #########################################
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}


//################################################ Newest 4 Items for Listing-Grid ##########################################################
function getNew() {
    global $con;
    global $per_page_count;
    $results = $con->query("select * from posts ORDER BY id DESC LIMIT 4");
    if ($results) {
        $products_item = "";
        //fetch results set as object and output HTML
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
   
    <li class="gray-bg">
    <div class="recent_post_img"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" alt="image"></a> </div>
                    <div class="recent_post_title"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle} </a>
                      <p class="widget_price">Rs.

EOT;
            $products_item.= number_format($obj->price);
            $products_item.= <<<EOT
</p>
                    </div>
                  </li>
EOT;
            
        }
        //$products_item .= "</div>";
        echo $products_item;
    }
}


//################################################ Newest 4 Items for Similer Items ##########################################################
function getSimiler($PostTitle, $ClassOfVehicle, $Brand, $PostId) {
    global $con;
    global $per_page_count;
    $results = $con->query("SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, 
co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.price,po.KMsDriven,po.MileageCity,po.Status
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId
        WHERE cl.Name LIKE '%$ClassOfVehicle%' 
        OR br.Name LIKE '%$Brand%'
        AND po.PostId NOT LIKE '%$PostId%'
        AND po.Status = 1
        ORDER BY id DESC");
    if ($results) {
        $products_item = '';
        //fetch results set as object and output HTML
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
   
                    <div class="col-md-3 grid_listing">
                     <div class="product-listing-m gray-bg">
                        <div class="product-listing-img">
                           <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" class="img-responsive" alt="image" /> </a>
                           <div class="label_icon">{$obj->VehicleCondition}</div>
                           <div class="compare_item">
                              <div class="checkbox">
                                 <input type="checkbox" value="" id="compare13">
                                 <label for="compare13">Compare</label>
                              </div>
                           </div>
                        </div>
                        <div class="product-listing-content">
                           <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
                           <p class="list-price">Rs.
EOT;
            $products_item.= number_format($obj->price);
            $products_item.= <<<EOT
                       </p>
                           <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {$obj->CompanyName}</span></div>
                           <ul class="features_list">
                              <li><i class="fa fa-road" aria-hidden="true"></i>
EOT;
            $products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
                              km</li>
                              <li><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity}km City</li>
                              <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                              <li><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                           </ul>
                        </div>
                     </div>
                  </div>
EOT;
            
        }
        //$products_item .= '</div>';
        echo $products_item;
    }
}


//########################################################## Get all Posts Grid View #############################################################
function getAllPostsGrid() {
    global $con;
    global $per_page_count;
    /*if(isset($_GET['cat'])){
     $cat_id = $_GET['cat'];*/
    $per_page = $per_page_count;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page - 1) * $per_page;
    //Pagination Area Start
    //Now select all from table
    $query = "select * from posts";
    $result = mysqli_query($con, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Pagination Area End
    $sql = '';
    if (isset($_GET["order"])) {
        if ($_GET["order"] === '1') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.CreatedDate DESC 
        limit $start_from,$per_page";
        } else if ($_GET["order"] === '2') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.price 
        limit $start_from,$per_page";
        } else if ($_GET["order"] === '3') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.price DESC    
        limit $start_from, $per_page";
        }
    } else {
        $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.CreatedDate DESC 
        limit $start_from, $per_page";
    }
    $results = $con->query($sql);
    $total_record_count = mysqli_num_rows($results);
    $count_start_from = '';
    if ($page == 1) {
        $count_start_from = 1;
    } else {
        $count_start_from = ($page * $per_page) + 1;
    }
    $count_end_with = $start_from + $total_record_count;
    /*$fron_count         = $start_from + 1;
     $to_count           = $total_pages * $total_record_count;*/
    if ($results) {
        $products_item = '<div class="result-sorting-wrapper">
                      <div class="sorting-count">
                        <p>' . $count_start_from . ' - ' . $count_end_with . ' <span>of ' . $total_records . ' Results for your search.</span></p>
                      </div>
                      <div class="result-sorting-by">
                        <!--<p>Sort by:</p>-->
                        <form action="#" method="post">
                          
                            <div class="btn-group">
                            	<a href="listing-grid.php?order=1" class="btn btn-xs">Newest</a>
                            	<a href="listing-grid.php?order=2" class="btn btn-xs">Price <i class="fa fa-sort-amount-asc"></i></a>
                            	<a href="listing-grid.php?order=3" class="btn btn-xs">Price <i class="fa fa-sort-amount-desc"></i></a>
	                        </div>
	                        <a href="listing-classic.php" class="btn btn-xs"><i class="fa fa-list" aria-hidden="true"></i></a>
                        </form>
                      <p></p>
                      </div>
                  </div>
                  <div class="row">';
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
            <div class="col-md-4 grid_listing">
            	<form method="post" action="compare_update.php">
                <div class="product-listing-m gray-bg">
                  <div class="product-listing-img"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" class="img-responsive" alt="image" /> </a>
                    <div class="label_icon">{$obj->VehicleCondition}</div>
                    <div class="compare_item">
                      <div class="checkbox">
                        <input type="checkbox" value="" id="compare11">
                        <label for="compare11">Compare</label>
                      </div>
                    </div>
                  </div>
                  <div class="product-listing-content">
                    <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
                    <p class="list-price">Rs.
EOT;
            $products_item.= number_format($obj->price);
            $products_item.= <<<EOT
                   </p>
                    <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {$obj->CompanyName}</span></div>
                    <ul class="features_list">
                      <li><i class="fa fa-road" aria-hidden="true"></i>
EOT;
            $products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
                     km</li>
                      <li><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity} km City</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i>{$obj->ModelYear} model</li>
                      <li><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                    </ul>
                  </div>
                </div>
                </form>
              </div>
EOT;
            
        }
        $products_item.= '</div>';
        echo $products_item;
    }
    echo " <div class='pagination'><ul>
                    <li>
                        <a href='listing-grid.php?page=1'><<</a>
                    </li>";
    for ($i = 1;$i <= $total_pages;$i++) {
        echo "<li>
                        <a href='listing-grid.php?page=".$i."'>$i</a>
                    </li>";
    };
    echo "<li>
                        <a href='listing-grid.php?page=$total_pages'>>></a>
                    </li>
                </ul>
            </div>";
}

//########################################################## Get all Search Grid View #############################################################
function getAllSearchGrid(){
	global $per_page_count;
	global $con;
	$phrase = $_GET['_phrs'];
		$brand = $_GET['_bnd'];
		$year = $_GET['_yer'];
		$priceFrom = $_GET['_prF'];
		$priceTo = $_GET['_prT'];
		$condition = $_GET['_con'];
		$order = $_GET['_order'];
		
		$qry="WHERE (po.PostTitle Like '%$phrase%' or po.PostId like '%$phrase%') ";
		if($brand != -1)
		{
			$qry += "and po.BrandId='$brand' ";
		}
		if($year!="Any")
		{
			$qry += "and po.ModelYear='$year' ";
		}
		if($priceFrom!= "0" && $priceTo!= "999999999999999")
		{
			$qry += "and po.price BETWEEN '$priceFrom' and '$priceTo' ";
		}
		if($condition != -1)
		{
			$qry += "and po.VehicleConditionId='$condition' ";
		}
		
    $per_page = $per_page_count;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page - 1) * $per_page;
    //Pagination Area Start
    //Now select all from table
    $query = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry";
        
    $result = mysqli_query($con, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Pagination Area End
    $sql = '';
    if (isset($order)) {
        if ($order === '1') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from,$per_page";
        } else if ($order === '2') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price 
        limit $start_from,$per_page";
        } else if ($order === '3') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price DESC    
        limit $start_from, $per_page";
        }
    } else {
        $sql = "SELECT po.Id, po.PostId,po.PostTitle,po.BrandId,br.Name AS Brand,cl.Name AS ClassOfVehicle,po.VehicleConditionId,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
		$qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from, $per_page";
    }

    $results = $con->query($sql);
    $total_record_count = mysqli_num_rows($results);
    $count_start_from = '';
    if ($page == 1) {
        $count_start_from = 1;
    } else {
        $count_start_from = (($page-1) * $per_page) + 1;
    }
    $count_end_with = $start_from + $total_record_count;
    
    if ($results) {
        $products_item = '<div class="result-sorting-wrapper">
              <div class="sorting-count">
                <p>' . $count_start_from . ' - ' . $count_end_with . ' <span>of ' . $total_records . ' Listings</span></p>
              </div>
              <div class="result-sorting-by">
                <form action="#" method="post">
                  <div class="btn-group">';
                  if($order ==='1')
                  {
				  	$products_item .= '<a href="listing-grid.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Newest</a>';
				  }
				  else
				  {
                	$products_item .= '<a href="listing-grid.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Newest</a>';
                  }
                  if($order ==='2')
                  {
					$products_item .= '<a href="listing-grid.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-grid.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  if($order ==='3')
				  {
				  	$products_item .= '<a href="listing-grid.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price <i class="fa fa-sort-amount-desc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-grid.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-desc"></i></a>';
				  }
				
	          $products_item .= '</div>
	                <a href="listing-classic.php?_order='.$order.'&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs"><i class="fa fa-list" aria-hidden="true"></i></a>
                </form>
              <p></p>
                      </div>
                  </div>
                  <div class="row">';
        
            
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
            <div class="col-md-4 grid_listing">
            <form method="post" action="compare_update.php">
                <div class="product-listing-m gray-bg">
                  <div class="product-listing-img"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" class="img-responsive" alt="image" /> </a>
                    <div class="label_icon">{$obj->VehicleCondition}</div>
                    <div class="compare_item">
                      <div class="checkbox">
                        <input type="checkbox" value="{$obj->PostId}" id="item">
                        <label for="compare11">Compare</label>
                      </div>
                    </div>
                  </div>
                  <div class="product-listing-content">
                    <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
                    <p class="list-price">Rs.
EOT;
           $products_item.= number_format($obj->price);
           $products_item.= <<<EOT
                </p>
                    <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {$obj->CompanyName}</span></div>
                    <ul class="features_list">
                      <li><i class="fa fa-road" aria-hidden="true"></i>
EOT;
            $products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
             	  km</li>
                      <li><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity} km City</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i>{$obj->ModelYear} model</li>
                      <li><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                    </ul>
                  </div>
                </div>
                </form>
              </div>
EOT;
         
        }
        $products_item.= '</div>';
        echo $products_item;
    }
    echo " <div class='pagination'><ul>
                    <li>
                        <a href='listing-grid.php?page=1&_order=".htmlentities($order,  ENT_QUOTES,  "utf-8")."&_phrs=".htmlentities($phrase, ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,  ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,  ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,  "utf-8")."&_con=".htmlentities($condition,  ENT_QUOTES,"utf-8")."&search='><<</a>
                    </li>";
    for ($i = 1;$i <= $total_pages;$i++) {
        if($page == $i)
        {
			echo "<li class='current'>
                        <a href='listing-grid.php?page=" . htmlentities($i,ENT_QUOTES,  "utf-8")."&_order=".htmlentities($order,ENT_QUOTES,  "utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,  "utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,  "utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,  "utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,  "utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,  "utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,  "utf-8")."&search='>$i</a>
                    </li>";
		}
        else
        {
			echo "<li>
                        <a href='listing-grid.php?page=" . htmlentities($i,ENT_QUOTES,  "utf-8")."&_order=".htmlentities($order,ENT_QUOTES,  "utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,  "utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,  "utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,  "utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,  "utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,  "utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,  "utf-8")."&search='>$i</a>
                    </li>";
		}
        
    };
    echo "<li>
                        <a href='listing-grid.php?page=".htmlentities($total_pages,ENT_QUOTES,  "utf-8")."&_order=".htmlentities($order,ENT_QUOTES,  "utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,  "utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,  "utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,  "utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,  "utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,  "utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,  "utf-8")."&search='>>></a>
                    </li>
                </ul>
            </div>";
}

//########################################################## Get all Posts Cassic View #############################################################
function getAllPostsClassic() {
    global $con;
    global $per_page_count;
    
    if(isset($_GET['search'])){
                
        $phrase = $_GET['_phrs'];
        $brand = $_GET['_bnd'];
        $year = $_GET['_yer'];
        $priceFrom = $_GET['_prF'];
        $priceTo = $_GET['_prT'];
        $condition = $_GET['_con'];
        
        $qry="WHERE (po.PostTitle Like '%$phrase%' or po.PostId like '%$phrase%') ";
        if($brand != -1)
        {
            $qry += "and po.BrandId='$brand' ";
        }
        if($year!="Any")
        {
            $qry += "and po.ModelYear='$year' ";
        }
        if($priceFrom!= "0" && $priceTo!= "999999999999999")
        {
            $qry += "and po.price BETWEEN '$priceFrom' and '$priceTo' ";
        }
        if($condition != -1)
        {
            $qry += "and po.VehicleConditionId='$condition' ";
        }
        
        
    $per_page = $per_page_count;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page - 1) * $per_page;
    //Pagination Area Start
    //Now select all from table
    $query = "select * from posts";
    $result = mysqli_query($con, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Pagination Area End
    $sql = '';
    if (isset($_GET["order"])) 
    {
        if ($_GET["order"] === '1') 
        {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
        ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
        co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.CreatedDate DESC 
        limit $start_from,$per_page";
        } 
        else if ($_GET["order"] === '2') 
        {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
        ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
        co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.price 
        limit $start_from,$per_page";
        } 
        else if ($_GET["order"] === '3') 
        {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
        ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
        co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.price DESC    
        limit $start_from, $per_page";
        }
    } 
    else 
    {
        $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
        ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
        co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        ORDER BY po.CreatedDate DESC 
        limit $start_from, $per_page";
    }
    
    $results = $con->query($sql);
    $total_record_count = mysqli_num_rows($results);
    $count_start_from = '';
    if ($page == 1) {
        $count_start_from = 1;
    } else {
        $count_start_from = ($page * $per_page) + 1;
    }
    $count_end_with = $start_from + $total_record_count;
    /*$fron_count         = $start_from + 1;
     $to_count           = $total_pages * $total_record_count;*/
    if ($results) {
        $products_item = '<div class="result-sorting-wrapper">
              <div class="sorting-count">
                <p>' . $count_start_from . ' - ' . $count_end_with . ' <span>of ' . $total_records . ' Listings</span></p>
              </div>
              <div class="result-sorting-by">
                <form action="#" method="post">
                  <div class="btn-group">
                        <a href="listing-classic.php?order=1" class="btn btn-xs">Newest</a>
                        <a href="listing-classic.php?order=2" class="btn btn-xs">Price <i class="fa fa-sort-amount-asc"></i></a>
                        <a href="listing-classic.php?order=3" class="btn btn-xs">Price <i class="fa fa-sort-amount-desc"></i></a>
                    </div>
                    <a href="listing-grid.php" class="btn btn-xs"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                </form>
              </div>
            </div>';
        
            
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
            <div class="product-listing-m gray-bg">
            <form method="post" action="compare_update.php">
              <div class="product-listing-img"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" class="img-responsive" alt="Image" /> </a>
                <div class="label_icon">{$obj->VehicleCondition}</div>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" value="" id="compare23">
                    <label for="compare23">Compare</label>
                  </div>
                </div>
              </div>
              <div class="product-listing-content">
                <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
                <p class="list-price">Rs.
EOT;
           $products_item.= number_format($obj->price);
           $products_item.= <<<EOT
                </p>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>
EOT;
            $products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
                   km City</li>
                  <li><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity} km City</li>
                  <li><i class="fa fa-user" aria-hidden="true"></i>{$obj->SeatingCapacity} seats</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>{$obj->ModelYear} model</li>
                  <li><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                  <!--<li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>-->
                </ul>
                <a href="vehicle_info.php?id={$obj->PostId}" target="_blank" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {$obj->CompanyName}</span></div>
              </div>
              </form>
            </div>
EOT;
            
        }
        echo $products_item;
    }
    echo " <div class='pagination'>
    		<ul>
    				<li>
                        <a href='listing-classic.php?page=1&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,"utf-8")."&_bnd=".htmlentities($brand,"utf-8")."&_yer=".htmlentities($year,"utf-8")."&_prF=".htmlentities($priceFrom,"utf-8")."&_prT=".htmlentities($priceTo,"utf-8")."&_con=".htmlentities($condition,"utf-8")."&search='>>></a>
                    </li>";
    for ($i = 1;$i <= $total_pages;$i++) {
        if($page == $i)
        {
			echo "<li class='current'>
                        <a href='listing-classic.php?page=" . htmlentities($i,ENT_QUOTES,"utf-8") ."&_order=".htmlentities($order,ENT_QUOTES,"utf-8"). "&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
        else
        {
			echo "<li>
                        <a href='listing-classic.php?page=" . htmlentities($i,ENT_QUOTES,"utf-8") ."&_order=".htmlentities($order,ENT_QUOTES,"utf-8"). "&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
    };
    echo "<li>
                        <a href='listing-classic.php?page=".htmlentities($total_pages,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>>></a>
                    </li>
                </ul>
            </div>";
            }
}

function getAllSearchClassic(){
	global $con;
	global $per_page_count;
	$phrase = $_GET['_phrs'];
		$brand = $_GET['_bnd'];
		$year = $_GET['_yer'];
		$priceFrom = $_GET['_prF'];
		$priceTo = $_GET['_prT'];
		$condition = $_GET['_con'];
		$order = $_GET['_order'];
		
		$qry="WHERE (po.PostTitle Like '%$phrase%' or po.PostId like '%$phrase%') ";
		if($brand != -1)
		{
			$qry += "and po.BrandId='$brand' ";
		}
		if($year!="Any")
		{
			$qry += "and po.ModelYear='$year' ";
		}
		if($priceFrom!= "0" && $priceTo!= "999999999999999")
		{
			$qry += "and po.price BETWEEN '$priceFrom' and '$priceTo' ";
		}
		if($condition != -1)
		{
			$qry += "and po.VehicleConditionId='$condition' ";
		}
		
    $per_page = $per_page_count;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page - 1) * $per_page;
    //Pagination Area Start
    //Now select all from table
    $query = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry";
        
    $result = mysqli_query($con, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Pagination Area End
    $sql = '';
    if (isset($order)) {
        if ($order === '1') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from,$per_page";
        } else if ($order === '2') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price 
        limit $start_from,$per_page";
        } else if ($order === '3') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price DESC    
        limit $start_from, $per_page";
        }
    } else {
        $sql = "SELECT po.Id, po.PostId,po.PostTitle,po.BrandId,br.Name AS Brand,cl.Name AS ClassOfVehicle,po.VehicleConditionId,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
		$qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from, $per_page";
    }

    $results = $con->query($sql);
    $total_record_count = mysqli_num_rows($results);
    $count_start_from = '';
    if ($page == 1) {
        $count_start_from = 1;
    } else {
        $count_start_from = (($page-1) * $per_page) + 1;
    }
    $count_end_with = $start_from + $total_record_count;
    
    if ($results) {
        $products_item = '<div class="result-sorting-wrapper">
              <div class="sorting-count">
                <p>' . $count_start_from . ' - ' . $count_end_with . ' <span>of ' . $total_records . ' Listings</span></p>
              </div>
              <div class="result-sorting-by">
                <form action="#" method="post">
                  <div class="btn-group">';
                  if($order ==='1')
                  {
				  	$products_item .= '<a href="listing-classic.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Newest</a>';
				  }
				  else
				  {
                	$products_item .= '<a href="listing-classic.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Newest</a>';
                  }
                  if($order ==='2')
                  {
					$products_item .= '<a href="listing-classic.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  if($order ==='3')
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price (<i class="fa fa-sort-amount-desc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-desc"></i></a>';
				  }
				
	          $products_item .= '</div>
	                <a href="listing-grid.php?_order='.$order.'&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                </form>
              </div>
            </div>';
        
            
        while ($obj = $results->fetch_object()) {
            $products_item.= <<<EOT
            <div class="product-listing-m gray-bg">
            <form method="post" action="compare_update.php">
              <div class="product-listing-img"> <a href="vehicle_info.php?id={$obj->PostId}" target="_blank"><img src="assets/images/vehicleimages/{$obj->PostId}.jpg" class="img-responsive" alt="Image" /> </a>
                <div class="label_icon">{$obj->VehicleCondition}</div>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" value="" id="compare23">
                    <label for="compare23">Compare</label>
                  </div>
                </div>
              </div>
              <div class="product-listing-content">
                <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
                <p class="list-price">Rs.
EOT;
           $products_item.= number_format($obj->price);
           $products_item.= <<<EOT
                </p>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>
EOT;
            $products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
             	  km City</li>
                  <li><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity} km City</li>
                  <li><i class="fa fa-user" aria-hidden="true"></i>{$obj->SeatingCapacity} seats</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>{$obj->ModelYear} model</li>
                  <li><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                  <!--<li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>-->
                </ul>
                <a href="vehicle_info.php?id={$obj->PostId}" target="_blank" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {$obj->CompanyName}</span></div>
              </div>
              </form>
            </div>
EOT;
            
        }
        echo $products_item;
    }
    echo " <div class='pagination'><ul>
                    <li>
                        <a href='listing-classic.php?page=1&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='><<</a>
                    </li>";
    for ($i = 1;$i <= $total_pages;$i++) {
        if($page == $i)
        {
			echo "<li class='current'>
                        <a href='listing-classic.php?page=" . htmlentities($i,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
        else
        {
			echo "<li>
                        <a href='listing-classic.php?page=" . htmlentities($i,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
        
    };
    echo "<li>
                        <a href='listing-classic.php?page=".htmlentities($total_pages,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>>></a>
                    </li>
                </ul>
            </div>";
}

function getAllSearchListView(){
	global $con;
	global $per_page_count;
	$phrase = $_GET['_phrs'];
		$brand = $_GET['_bnd'];
		$year = $_GET['_yer'];
		$priceFrom = $_GET['_prF'];
		$priceTo = $_GET['_prT'];
		$condition = $_GET['_con'];
		$order = $_GET['_order'];
		
		$qry="WHERE (po.PostTitle Like '%$phrase%' or po.PostId like '%$phrase%') ";
		if($brand != -1)
		{
			$qry += "and po.BrandId='$brand' ";
		}
		if($year!="Any")
		{
			$qry += "and po.ModelYear='$year' ";
		}
		if($priceFrom!= "0" && $priceTo!= "999999999999999")
		{
			$qry += "and po.price BETWEEN '$priceFrom' and '$priceTo' ";
		}
		if($condition != -1)
		{
			$qry += "and po.VehicleConditionId='$condition' ";
		}
		
    $per_page = $per_page_count;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page - 1) * $per_page;
    //Pagination Area Start
    //Now select all from table
    $query = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry";
        
    $result = mysqli_query($con, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Pagination Area End
    $sql = '';
    if (isset($order)) {
        if ($order === '1') {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from,$per_page";
        } else if ($order === '2') 
{
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price 
        limit $start_from,$per_page";
        } else if ($order === '3') 
        {
            $sql = "SELECT po.Id, po.PostId,po.PostTitle,br.Name AS Brand,cl.Name AS ClassOfVehicle,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
        $qry
        ORDER BY po.price DESC    
        limit $start_from, $per_page";
        }
    } else 
{
        $sql = "SELECT po.Id, po.PostId,po.PostTitle,po.BrandId,br.Name AS Brand,cl.Name AS ClassOfVehicle,po.VehicleConditionId,
		ve.Name AS VehicleCondition, po.Colour, fu.Name AS FualType, tr.Name AS TransmissionType,po.ModelYear,po.SeatingCapacity, 
		co.CompanyId, co.CompanyName, su.UserId as AgentNo, po.SubAgentName,po.KMsDriven,po.MileageCity,po.price,po.CreatedDate
        FROM posts po 
        LEFT JOIN company co ON co.Id = po.companyId
        LEFT JOIN systemuser su ON su.Id = po.AgentId
        LEFT JOIN classofvehicle cl ON cl.Id = po.ClassOfVehicleId
        LEFT JOIN brand br ON br.Id = po.BrandId
        LEFT JOIN vehiclecondition ve ON ve.Id=po.VehicleConditionId
        LEFT JOIN fualtype fu ON fu.Id=po.FuelTypeId
        LEFT JOIN transmissiontype tr ON tr.Id = po.TransmissionTypeId 
		$qry
        ORDER BY po.CreatedDate DESC 
        limit $start_from, $per_page";
    }

    $results = $con->query($sql);
    $total_record_count = mysqli_num_rows($results);
    $count_start_from = '';
    if ($page == 1) {
        $count_start_from = 1;
    } else {
        $count_start_from = (($page-1) * $per_page) + 1;
    }
    $count_end_with = $start_from + $total_record_count;
    
    if ($results) {
        $products_item = '<div class="result-sorting-wrapper">
              <div class="sorting-count">
                <p>' . $count_start_from . ' - ' . $count_end_with . ' <span>of ' . $total_records . ' Listings</span></p>
              </div>
              <div class="result-sorting-by">
                <form action="#" method="post">
                  <div class="btn-group">';
                  if($order ==='1')
                  {
				  	$products_item .= '<a href="listing-classic.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Newest</a>';
				  }
				  else
				  {
                	$products_item .= '<a href="listing-classic.php?_order=1&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Newest</a>';
                  }
                  if($order ==='2')
                  {
					$products_item .= '<a href="listing-classic.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=2&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-asc"></i></a>';
				  }
				  if($order ==='3')
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs disabled" style="fill: #FDD302;background:#FDD302;color: #000;">Price (<i class="fa fa-sort-amount-desc"></i></a>';
				  }
				  else
				  {
				  	$products_item .= '<a href="listing-classic.php?_order=3&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs">Price <i class="fa fa-sort-amount-desc"></i></a>';
				  }
				
	          $products_item .= '</div>
	                <a href="listing-grid.php?_order='.$order.'&_phrs='.$phrase.'&_bnd='.$brand.'&_yer='.$year.'&_prF='.$priceFrom.'&_prT='.$priceTo.'&_con='.$condition.'&search=" class="btn btn-xs"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                </form>
              </div>
            </div>';

        
            
        while ($obj = $results->fetch_object()) {
            $products_item .= <<<EOT
            <div class="dealers_listing">
            	<div class="row">
            	  <div class="col-sm-3 col-xs-4">
            	  <form method="post" action="compare_update.php">
		            <div class="dealer_logo"> 
		            	<a href="vehicle_info.php?id={$obj->PostId}" target="_blank">
		            		<img src="assets/images/vehicleimages/{$obj->PostId}.jpg" alt="image">
		            	</a> 
		            	<div class="label_icon_left">{$obj->VehicleCondition}</div>
		            </div>
		          </div>
            	  <div class="col-sm-6 col-xs-8">
		            <div class="dealer_info">
		            
	                <div class="compare_item_right">
	                  <div class="checkbox">
	                    <input type="checkbox" value="" id="compare23">
	                    <label for="compare23">Compare</label>
	                  </div>
	                </div>
		            
		              <h5><a href="vehicle_info.php?id={$obj->PostId}" target="_blank">{$obj->PostTitle}</a></h5>
		              <p><ul id="list-collection">
                  <li id="list-detail"></i>
EOT;
			$products_item.= number_format($obj->KMsDriven);
            $products_item.= <<<EOT
             	  km City</li>
                  <li id="list-detail"><i class="fa fa-tachometer" aria-hidden="true"></i>{$obj->MileageCity} km City</li>
                  <li id="list-detail"></i>{$obj->SeatingCapacity} seats</li>
                  <li id="list-detail"><i class="fa fa-calendar" aria-hidden="true"></i>{$obj->ModelYear} model</li>
                  <li id="list-detail"><i class="fa fa-flash" aria-hidden="true"></i>{$obj->FualType}</li>
                  <!--<li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>-->
                </ul>
</p>
		            </div>
		          </div>
            	  <div class="col-sm-3 col-xs-12">
		            <div class="view_profile"> <a href="#" class="btn btn-xs">View Profile</a>
		              <p>Rs.
EOT;
$products_item.= number_format($obj->price); 

$products_item .= <<<EOT

		              </p>
		            </div>
		          </div>
            	</div>
            	</form>
            </div>
EOT;
        	
        	
        	
        	
        }

        echo $products_item;
    }
    echo " <div class='pagination'><ul>
                    <li>
                        <a href='listing-classic.php?page=1&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='><<</a>
                    </li>";
    for ($i = 1;$i <= $total_pages;$i++) {
        if($page == $i)
        {
			echo "<li class='current'>
                        <a href='listing-classic.php?page=".htmlentities($i,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
        else
        {
			echo "<li>
                        <a href='listing-classic.php?page=".htmlentities($i,ENT_QUOTES,"utf-8")."&_order=".htmlentities($order,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>".htmlentities($i,ENT_QUOTES,"utf-8")."</a>
                    </li>";
		}
        
    };
    echo "<li>
                        <a href='listing-classic.php?page=".htmlentities($total_pages,ENT_QUOTES,"utf-8")."&_phrs=".htmlentities($phrase,ENT_QUOTES,"utf-8")."&_bnd=".htmlentities($brand,ENT_QUOTES,"utf-8")."&_yer=".htmlentities($year,ENT_QUOTES,"utf-8")."&_prF=".htmlentities($priceFrom,ENT_QUOTES,"utf-8")."&_prT=".htmlentities($priceTo,ENT_QUOTES,"utf-8")."&_con=".htmlentities($condition,ENT_QUOTES,"utf-8")."&search='>>></a>
                    </li>
                </ul>
            </div>";
}
?>