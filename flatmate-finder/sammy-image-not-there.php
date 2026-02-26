<?php 
session_start();
 include ('inc/header.inc.php');   ?> 
  
<?php
    $connection = mysqli_connect("localhost", "root", "", "housemadeeasy");
    $sql = "SELECT * FROM house_taken WHERE id=2";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_object($result);
?>
    <!--Hero Section start-->
    <div class="hero-section section position-relative">
       
        <!--Hero Slider start-->
        <div class="hero-slider section">
            <!--Hero Item start-->
           
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1" ></li>
<li data-target="#carousel-example-generic" data-slide-to="2" ></li>
<li data-target="#carousel-example-generic" data-slide-to="3" ></li>
</ol>
<div class="carousel-inner" role="listbox">
  <?php  
                    $sql = "SELECT * FROM slide order by id desc LIMIT 0,1";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?>
     <div class="carousel-item active">
         <div class="hero-item" style="background-image: url(assets/images/slide/<?php echo $house_img1; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">
                                <h1 class="title"> <a href="slide-image.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h1>
                                <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> <?php echo $location; ?></span>
  
                                <div class="type-wrap">
                                    <a href="slide-image.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    <span class="price" >#<?php echo $house_price?><span >Yr</span></span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <img src="assets/images/icons/hero-area.png" alt=""><span>550 SqFt</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bed.png" alt=""><span>6 Bed</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bath.png" alt=""><span>4 Bath</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-parking.png" alt=""><span>3 Garage</span>
                                    </li>
                                </ul>
                                
                            </div>
                            <!--Hero Content end-->
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>
  <?php 
                    $sql = "SELECT * FROM slide order by id desc LIMIT 1,3";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?>
    <div class="carousel-item">
       
        <div class="hero-item" style="background-image: url(assets/images/slide/<?php echo $house_img1; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">
                                <h1 class="title"><a href="slide-image.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h1>
                                <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> <?php echo $location; ?></span>
                                <div class="type-wrap">
                                    <a href="slide-image.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    <span class="price" >#<?php echo $house_price?><span >Yr</span></span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <img src="assets/images/icons/hero-area.png" alt=""><span>550 SqFt</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bed.png" alt=""><span>6 Bed</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bath.png" alt=""><span>4 Bath</span>
                                    </li>
                                    <li>
                                        <img src="assets/images/icons/hero-parking.png" alt=""><span>3 Garage</span>
                                    </li>
                                </ul>
                                
                            </div>
                            <!--Hero Content end-->
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>
        </div>
        <a href="#carousel-example-generic" class="carousel-control-prev" data-slide="prev" role="button">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a href="#carousel-example-generic" class="carousel-control-next" data-slide="next" role="button">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
        </div>
            <!--Hero Item end-->
        
    
        </div>
        <!--Hero Slider end-->
        
    </div>
    <!--Hero Section end-->
       <!--Search Section section start-->
    <div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Find Your Desired Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <div class="col">
                    
                    <!--Property Search start-->
                    <div class="property-search">
                        <center>
                        <form action="search.php" method="POST" >
                            
                            <div class="form-group">
                   
                    
                   <select class="form-control" name="location" required>
                                    <option value="" required>Location</option>
                                     <option value="Ago-Iwoye">Ago-Iwoye</option>
                                    <option value="Sagamu">Sagamu</option>
                                    <option value="Ayetoro">Ayetoro</option>
                                    <option value="Ibogun">Ibogun</option>
                                   
                                </select>
                    
                </div>
                           <!-- <div>
                                <select class="nice-select">
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                </select>
                            </div>-->
                            <div class="form-group">
                                <select class="form-control" name="type" required>
                                    <option value="" required>Type</option>
                                    <option>2 Bedroom Flat</option>
                                    <option>3 Bedroom Flat</option>
                                    <option>4 Bedroom Flat</option>
                                    <option>Room and palour self contain</option>
                                    <option>self contain</option>
                                    <option>single room</option>
                                   
                                </select>
                            </div>
                         
                  
                            <div class="form-group">
                                <select class="form-control" name="price" required>
                                    <option value="" required>Price</option>
                                    
                                       <?php 
                              
                              $get_cat = "select * from properties";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $house_price = $row_cat['house_price'];
                                  
                                  echo "
                                  
                                  <option> $house_price </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                                    
                                </select>
                            </div>
                          
                           <!---- <div>
                                <div id="search-price-range"></div>
                            </div>--->
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                    </center>
                    </div>
                    <!--Property Search end-->
                    
                </div>
            </div>
            
        </div>
    </div>
    <!--Search Section section end-->
    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Latest House in Town</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                  <?php 
                    $sql = "SELECT * FROM properties where house_label='hot' order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                     $status=$row2['status'];
                      $house_name=$row2['house_name'];
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?> 
               
                <!--Property start-->
                  
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                    
                        <div class="image">
                            <?php 
                                if ($status=='yes') {
                                echo '<span class="label2">Not Vacant</span>';
                                }
                            if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                            <a href="details.php?id=<?php echo $id; ?>" disabled><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                              <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li><!--- fence --->
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $house_price?><span style="font-size: 12px;">Yr</span></span>
                                   <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                   
                                </div>
                            </div>
                        </div>
                 
                    </div>
                 
                </div>
                          <?php 
                }
                    ?>
                <!--Property end-->
               
                
                
            </div>
            
        </div>
    </div>
    <!--New property section end-->
     <!--Download apps section start-->
    <div class="download-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50" style="background-image: url(assets/images/bg/download-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!--Download Content start-->
                    <div class="download-content">
                        <h1 style="font-size: 20px;">Coming Soon.... <br> <span>HouseMadeeasy</span> App </h1>
                        <div class="buttons">
                            <a href="#">
                                <i class="fa fa-apple"></i>
                                <span class="text">
                                    <span>Available on the</span>
                                    Apple Store
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-android"></i>
                                <span class="text">
                                    <span>Get it on</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-windows"></i>
                                <span class="text">
                                    <span>Download form</span>
                                    Windows Store
                                </span>
                            </a>
                        </div>
                        <div class="image"><img src="assets/images/others/app.png" alt=""></div>
                    </div>
                    <!--Download Content end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->
    <!--recommende property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center"><br><br><br><br>
                        <h1 style="font-size: 20px;">Find Your Desire Bedroom  Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                  
                <div class="property-carousel section">
                     <?php
                   $sql = "SELECT * FROM properties where type='2 Bedroom Flat' || type='3 Bedroom Flat' || type='4 Bedroom Flat'   order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $status2=$row2['status'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                            <?php
                             if ($status2=='yes') {
                                echo '<span class="label2">Not Vacant</span>';
                                }
                             if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1?>' alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title" ><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $house_price?><span style="font-size: 12px;">Yr</span></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Property end-->
                       <?php
            }
                ?>
                </div>
             
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--recommende property section end-->
    <!--Funfact Section start-->
    <div class="funfact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                
                <!--Funfact start-->
                <div class="single-fact col-lg-3 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-home"></i>
                            <h3 class="counter">854</h3>
                        </div>
                        <p>Total House</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                  <!--Funfact start-->
                <div class="single-fact col-lg-3 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-users"></i>
                            <h3 class="counter">854</h3>
                        </div>
                        <p>Happy Agent</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                <!--Funfact start-->
                <div class="single-fact col-lg-3 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-users"></i>
                            <h3 class="counter">854</h3>
                        </div>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                <!--Funfact start-->
                <div class="single-fact col-lg-3 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-medal"></i>
                            <h3 class="counter">854</h3>
                        </div>
                        <p>Awards Win</p>
                    </div>
                </div>
                <!--Funfact end-->
                
            </div>
        </div>
    </div>
    <!--Funfact Section end-->
    <!--Services section start-->
    <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
        
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 >Our Services</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row row-30 align-items-center">
                <div class="col-lg-5 col-12 mb-30">
                    <div class="property-slider-2">
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="single-properties.html" class="image"><img src="assets/images/property/property-13.jpg" alt=""></a>
                                <div class="content">
                                    <h4 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h4>
                                    <span class="location">568 E 1st Ave, Miami</span>
                                    <h4 class="type">Rent <span>$550 <span>Month</span></span></h4>
                                    <ul>
                                        <li>6 Bed</li>
                                        <li>4 Bath</li>
                                        <li>3 Garage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="single-properties.html" class="image"><img src="assets/images/property/property-14.jpg" alt=""></a>
                                <div class="content">
                                    <h4 class="title"><a href="single-properties.html">Marvel de Villa</a></h4>
                                    <span class="location">450 E 1st Ave, New Jersey</span>
                                    <h4 class="type">Rent <span>$550 <span>Month</span></span></h4>
                                    <ul>
                                        <li>6 Bed</li>
                                        <li>4 Bath</li>
                                        <li>3 Garage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row row-20">
                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="assets/images/service/service-1.png" alt=""></div>
                                        <h4>Connect Student to Houses</h4>
                                    </div>
                                    <div class="content">
                                        <p> We offer  quality services by connecting students to vast maojrity of houses around olabisi onabanjo University through trustworthy agent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->
                          <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="assets/images/service/house8.jpg" alt="" style="width: 1000px; height: 30px"></div>
                                        <h4>Finding Made easy</h4>
                                    </div>
                                    <div class="content">
                                        <p> We help student  to find their desire house by bringing their desire house right at there door step.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->
                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="assets/images/service/house15.jpg" alt=""  style="width: 5000px; height: 80px"></div>
                                        <h4>Stress Reducer on House Agent/ House owner</h4>
                                    </div>
                                    <div class="content">
                                        <p> We reduce the stress on House agent/ House owner looking for student to rent their apartment, by connecting the student's to the House agent/House Owner directly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->
                      
                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head" style="font-weight: bolder;">
                                        <div class="icon"><img src="assets/images/service/house10.jpg" style="width: 1000px; height: 50px" alt=""></div>
                                        <h4>Online Catalog</h4>
                                    </div>
                                    <div class="content">
                                        <p> We serve as online catalog for vast majorities of houses. House owners and House agent with new houses can be helped to display their houses on Housemadeeasy platform</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Services section end-->
    <!--Feature property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Find Your Desire Self Contain Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section">
                     <?php
                   $sql = "SELECT * FROM properties where type='self contain'   order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $status3=$row2['status'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                    <!--Property start-->
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <?php
                                if ($status3=='yes') {
                                echo '<span class="label2">Not Vacant</span>';
                                }
                                 if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                               <a href="details.php?id=<?php echo $id; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $house_price?><span style="font-size: 12px;">Yr</span></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php
              }
                  ?>
                </div>
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Feature property section end-->
    <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!--CTA start-->
                    <div class="cta-content text-center" >
                        <h1 style="font-size:30px">Want to <span>View</span> New apartment <br> Do it in Seconds With <span>houseMadeEasy</span></h1>
                        <div class="buttons" style="font-size:10px">
                            <!--<a href="add-properties.html">Add Property</a>-->
                            <a href="view-all-properties.php" >Browse through all houses</a>
                            
                        </div>
                    </div>
                    <!--CTA end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->
    <!--Agent Section start-->
    <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Agents</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <div class="agent-carousel section">
                        <?php
                   $sql = "SELECT * FROM agent   order by id ASC";
                    $result = mysqli_query($con,$sql);
                    if (mysqli_num_rows($result) > 0){
      while($row2 = mysqli_fetch_array($result)) {
                         $img=$row2['img'];
                      $fname=$row2['fname'];
                     $lname=$row2['lname'];
                      
                      $id=$row2['id'];
                      $finalname=ucwords($row2['lname']." ".$row2['fname']) ;
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="admin_area/agent/<?php echo $img; ?>" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html"><?php echo $finalname;?></a></h4>
                               <!--- <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">5 Properties</span>-->
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->
                <?php } }else{
                    echo "No agent yet";
                }?>
                </div>
            </div>
        </div>
    </div>
    <!--Agent Section end-->
  <!--single property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Find Your Desire Single Room Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section">
                      <?php
                   $sql = "SELECT * FROM properties where type='single room'   order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $status4=$row2['status'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                    <!--Property start-->
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                 <?php
                                 if ($status4=='yes') {
                                echo '<span class="label2">Not Vacant</span>';
                                }
                                  if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                <a href="details.php?id=<?php echo $id; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                </div>
                                 <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $house_price?><span style="font-size: 12px;">Yr</span></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Property end-->
                    <?php 
                }
                    ?>
                </div>
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--single property section end-->
        <!--Testimonial Section start-->
    <div class="testimonial-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>What Client's Say</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Review start-->
                <div class="review-slider section"> 
                      <?php
                   $sql = "SELECT * FROM test  order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){
                         $name=$row2['name'];
                      $img=$row2['img'];
                     $main_desc=$row2['main_desc'];
                     
                      $id=$row2['id'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                    <div class="review col">
                        <div class="review-inner">
                            <div class="image"><img src="assets/images/cust_img/<?php echo $img;?>" alt=""></div>
                            <div class="content">
                                <p><?php echo $main_desc; ?>.</p>
                                <h6><?php echo $name; ?> </h6>
                            </div>
                        </div>
                    </div>
                    
                 <?php } ?>
                    
                   
                    
                    
                    
                </div>
                <!--Review end-->
                
            </div>
        </div>
    </div>
    <!--Testimonial Section end-->
    
    <!--Brand section start-->
    <div class="brand-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Proudly Supported by</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                
                <!--Brand Slider start-->
                <div class="brand-carousel section">
                    <div class="brand col"><img src="assets/images/brands/ooumsa1.jpg" style="width: 150px; height:120px" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/RoyalJoyLogo.png" style="width: 150px; height:120px" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/nunsa1.jpg" style="width: 150px; height:120px" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/brand-3.png" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/brand-4.png" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/brand-5.png" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/brand-6.png" alt=""></div>
                    
                </div>
                <!--Brand Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Brand section end-->
   
    
    <?php  include ('inc/footer.inc.php');   ?>
