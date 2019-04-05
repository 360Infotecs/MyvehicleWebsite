<section id="filter_form" class="gray-bg">
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
              <option value="-1">Any Brand</option>
                  <?php
                    $sql = mysqli_query($con, "SELECT * FROM brand");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){
                    echo "<option value='". $row['Id'] ."'>" .$row['Name'] ."</option>" ;
                    }
                    ?>
            </select>
          </div>
        </div>

        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="text">
            <input type="number" maxlength="4" min="1900" max="<?php echo date("Y"); ?>" id="modelear" name="modelear" class="form-control" placeholder="Year of Model"/>
          </div>
        </div>
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control" id="vehicleCondition" name="vehicleCondition">
              <option value="-1">Any Condition</option>
               <?php
	                $sql1 = mysqli_query($con, "SELECT * FROM vehiclecondition");
	                $row1 = mysqli_num_rows($sql1);
	                while ($row1 = mysqli_fetch_array($sql1)){
	                echo "<option value='". $row1['Id'] ."'>" .$row1['Name'] ."</option>" ;
	                }
	                ?>
            </select>
          </div>
        </div>
        <div class="form-group col-md-6 col-sm-6 black_input">
          <label class="form-label">Price Range ($)</label>
          <input id="price_range" type="text" class="span2" value="" data-slider-min="50" data-slider-max="6000" data-slider-step="5" data-slider-value="[1000,5000]"/>
        </div>
        
        <div class="form-group col-md-3 col-sm-6">
          <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car </button>
        </div>
      </form>
    </div>
  </div>
</section>