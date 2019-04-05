<?php include_once("DBCon.php"); ?>
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>CarForYou</span></h2>
      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
    </div>
    <div class="row">      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Car</a></li>
          <li role="presentation"><a href="#resentusecar" role="tab" data-toggle="tab">Use Car</a></li>
        </ul>
      </div>
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">
          <?php
            $newcar_query = mysqli_query($con, "SELECT * FROM posts WHERE status='1' and VehicleConditionId='1'");
            while($newcar_row = mysqli_fetch_array($newcar_query)){
              echo"
                <div class='col-list-3'>
                  <div class='recent-car-list'>
                    <div class='car-info-box'> <a href='#'><img src='assets/images/recent-car-1.jpg' class='img-responsive' alt=''></a>
                      <ul>
                        <li><i class='fa fa-road' aria-hidden='true'></i>".$newcar_row['KMsDriven']." km</li>
                        <li><i class='fa fa-calendar' aria-hidden='true'></i>".$newcar_row['ModelYear']." Model</li>
                        <!--li><i class='fa fa-map-marker' aria-hidden='true'></i>".$newcar_row['ModelYear']."</li-->
                      </ul>
                    </div>
                    <div class='car-title-m'>
                      <h6><a href='#'>".$newcar_row['PostTitle']."</a></h6>
                      <span class='price'>Rs. ".$newcar_row['price']."</span> 
                    </div>
                    <div class='inventory_info_m'>
                      <p>".$newcar_row['VehicleDescription']."</p>
                    </div>
                  </div>
                </div>
              ";
            }
          ?>
        
        <!-- Recently Listed Used Cars -->
        <div role="tabpanel" class="tab-pane" id="resentusecar">
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-4.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare90">
                    <label for="compare9">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">Audi TT RS</a></h6>
                <span class="price">$90,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
              </div>
            </div>
          </div>
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-5.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare10">
                    <label for="compare10">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">Audi A3</a></h6>
                <span class="price">$49,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>But I must explain to you how all this mistaken idea of denouncing.</p>
              </div>
            </div>
          </div>
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-6.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare11">
                    <label for="compare11">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">BMW 535i</a></h6>
                <span class="price">$20,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
              </div>
            </div>
          </div>
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-1.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare12">
                    <label for="compare12">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">Ford Shelby GT350</a></h6>
                <span class="price">$45,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </div>
          </div>
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-2.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare13">
                    <label for="compare13">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">BMW 535i</a></h6>
                <span class="price">$20,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
              </div>
            </div>
          </div>
          <div class="col-list-3">
            <div class="recent-car-list">
              <div class="car-info-box"> <a href="#"><img src="assets/images/recent-car-3.jpg" class="img-responsive" alt=""></a>
                <div class="compare_item">
                  <div class="checkbox">
                    <input type="checkbox" id="compare14">
                    <label for="compare14">Compare</label>
                  </div>
                </div>
                <ul>
                  <li><i class="fa fa-road" aria-hidden="true"></i>20,000 km</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 Model</li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i>Colorado, USA</li>
                </ul>
              </div>
              <div class="car-title-m">
                <h6><a href="#">Volvo v40</a></h6>
                <span class="price">$60,000</span> 
              </div>
              <div class="inventory_info_m">
                 <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>