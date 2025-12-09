<?php 
 if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname']; 
} else {
    session_start();
} 
// if(!isset($_SESSION['email'])){
//      echo  "<script>
//     alert('Login/Register first ...');
//     window.location.href='index.php';
//     </script>";
//   }
 include ('inc/header.inc.php');   ?>  
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section"> 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">About us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">About us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection--> 
    <div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row row-25 align-items-center">
               
                <!--Feature Image start-->
                <div class="col-lg-1 col-12 order-1 order-lg-2 mb-40">
                    
                </div>
                <!--Feature Image end-->
                
                <div class="col-lg-11 col-12 order-2 order-lg-1 mb-40">
                    
                    <div class="row">
                        <div class="col">
                            <div class="about-content">
                                <h3>Welcome to <span>housemadeeasy</span></h3>
                                <h1>We prioritize Our Customers</h1>
                                <p>We're not just any platform; we're your go-to solution for all things housing-related in Sagamu.</p>
                                
                                <ul class="feature-list">
                                    <li>
                                        <i class="pe-7s-piggy"></i>
                                        <h4>Good Customer Care Services</h4>
                                    </li>
                                    <li>
                                        <i class="pe-7s-shield"></i>
                                        <h4>Reliable</h4>
                                    </li>
                                      

                                    <li>
                                        <i class="pe-7s-cart"></i>
                                        <h4>Online Catalog</h4>
                                    </li>
                                   
                                   <li>
                                        <i class="fa fa-connectdevelop"></i>
                                        <h4 >Connect student to house </h4>
                                    </li>
                                  
                                    <li>
                                        <i class="pe-7s-map"></i>
                                        <h4>House finding Made easy</h4>
                                    </li>
                                    


                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection end-->

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
                        <div class="image"><img src="assets/images/others/app4.png" alt=""></div>
                    </div>
                    <!--Download Content end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->

 <!--Agency Section start-->
    <div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">

        <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Our Services</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

        <div class="container">
            
            <div class="row"> 

                <!--Agencies satrt--> 
                <div class="col-lg-3  col-md-4 col-sm-12 col-xs-12">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="search-made-easy.php"><img  src="assets/images/flatmate/house8.jpg" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="search-made-easy.php">Apartment Provision</a></h4>
                             <span><a href="search-made-easy.php">Find your perfect home sweet home away from Home.</a></span>
                            
                            
                        </div>
                    </div>
                </div> 
                <!--Agencies end-->


                 <!--Agencies satrt-->
               <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="flatmate-finder/index.php"><img style="height: 150px;"  src="assets/images/flatmate/eye_lens.png" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="flatmate-finder/index.php">Flatmate Finder</a></h4>
                            <span><a href="flatmate-finder/index.php"> Say hello to your new roomie! </a></span>
                            
                            
                        </div>
                    </div>
                </div>
                <!--Agencies end--> 


                 <!--Agencies satrt-->
                 <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency" >
                        <div class="image">
                            <a class="img" href="marketplace/index.php"><img style="height:150px" src="marketplace/assets/images/market/marketplace.jpg" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="marketplace/index.php">Campus Yard</a></h4>
                            <span><a href="marketplace/index.php">Your one-stop spot for all things campus-related. </a></span>
                            <span> <a href="marketplace/index.php"> Click here!! </a></span>
                            
                        </div>
                    </div>
                </div> 
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency">
                        <div class="image" >
                            <a class="img"   href="make-money-with-housemadeeasy.php"><img style="height:150px" src="assets/images/make_money_with_housemadeeasy/money.png"  alt="" ></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="make-money-with-housemadeeasy.php">Make money with housemadeeasy</a></h4>
                            <span><a href="make-money-with-housemadeeasy.php">Because who says housing can't pay?</a></span>
                            

                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->


                 <!--Agencies satrt-->
                <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency">
                        <div class="image" >
                            <a class="img"   href="housemadeeasy-logistics.php"><img style="height:150px" src="assets/images/housemadeeasy-logistics/logistics4.jpeg"  alt="" ></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="housemadeeasy-logistics.php">Housemadeeasy Logistics</a></h4>
                            <span><a href="housemadeeasy-logistics.php"> Streamline your moving process with ease. </a></span>
                            

                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

               

               

                <!--Agencies satrt-->
                 <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency" style="margin-top:15px">
                        <div class="image" >
                            <a class="img" href="home-repair/index.php"><img style="height:150px" src="home-repair/assets/images/home-repair/house_repair.jpg"alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a class="img" href="home-repair/index.php">Home Repair</a></h4>
                            <span><a  href="home-repair/index.php"> Need a fixer-upper? We've got you covered. </a></span>
                             

                            
                        </div>
                    </div>
                </div> 
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency" style="margin-top:15px">
                        <div class="image">
                            <a class="img" href="short-term-stay.php"><img src="assets/images/short-term-stay/short.png" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="short-term-stay.php">Short term Rentals</a></h4>
                            <span><a href="short-term-stay.php">Stay flexible with our short-term stay options.</a></span>
                           
                            
                        </div>
                    </div>
                </div> 
                <!--Agencies end-->
                
            </div>
            
            
            
        </div>
    </div>
    <!--Agency Section end-->

   
    <!--Funfact Section start-->
    <div class="funfact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                
                <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <?php
                              $get_products = "select * from properties";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_properties = mysqli_num_rows($run_products);
                            ?>
                            <i class="pe-7s-home"></i>
                            <h3 class="counter"><?php echo $count_properties;?></h3>
                        </div>
                        <p>Total House</p>
                    </div>
                </div>
                <!--Funfact end-->


                 <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <?php
                              $get_products = "select * from properties where status='no'";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_available_properties = mysqli_num_rows($run_products);
                            ?>
                            <i class="pe-7s-home"></i>
                            <h3 class="counter"><?php echo $count_available_properties;?></h3>
                        </div>
                        <p>Total Available House</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                 <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <?php
                              $get_products = "select * from properties where status='yes'";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_unavailable_properties = mysqli_num_rows($run_products);
                            ?>
                            <i class="pe-7s-home"></i>
                            <h3 class="counter"><?php echo $count_unavailable_properties;?></h3>
                        </div>
                        <p>Total Unavailable House</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-users"></i>
                            <h3 class="counter">75</h3>
                        </div>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!--Funfact end-->
                
            </div>
        </div>
    </div>
    <!--Funfact Section end-->

    <!--Agent Section start-->
    <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
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
                <div class="col-lg-3 col-sm-6 col-12 mb-30">
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
    <!--Agent Section end-->

    <!--Testimonial Section start-->
    <div class="testimonial-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>What our Clients Say about Us:</h1>
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
    <div class="brand-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
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
                   
                    
                    <div class="brand col"><img src="assets/images/brands/nunsa1.jpg" style="width: 150px; height:120px" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/RoyalJoyLogo.png" style="width: 150px; height:120px" alt=""></div>

                     <div class="brand col"><img src="assets/images/brands/PANSlogo.png" style="width: 160px; height:160px" alt=""></div>
                    <div class="brand col"><img src="assets/images/brands/Picture1.png" style="width: 150px; height:150px" alt=""></div>
                   
                </div>
                <!--Brand Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Brand section end-->
    
   <?php  include ('inc/footer.inc.php');   ?>