<?php 
// Error reporting configuration
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/errors.log');

// Ensure logs directory exists
if (!file_exists(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Error: [$errno] $errstr - $errfile:$errline" . PHP_EOL;
    error_log($errorMessage);
    
    // Show user-friendly error message in development
    if (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE']) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Error:</strong> ' . htmlspecialchars($errstr) . ' in ' . htmlspecialchars($errfile) . ' on line ' . $errline;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
}

// Custom exception handler
function customExceptionHandler($exception) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Exception: " . $exception->getMessage() . " - " . $exception->getFile() . ":" . $exception->getLine() . PHP_EOL;
    error_log($errorMessage);
    
    if (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE']) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Exception:</strong> ' . htmlspecialchars($exception->getMessage()) . ' in ' . htmlspecialchars($exception->getFile()) . ' on line ' . $exception->getLine();
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
}

// Set error handlers
set_error_handler("customErrorHandler");
set_exception_handler("customExceptionHandler");

// Function to display user-friendly error messages
function showError($message, $details = '') {
    $errorHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    $errorHtml .= '<strong>Error:</strong> ' . htmlspecialchars($message);
    
    if (!empty($details) && (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE'])) {
        $errorHtml .= '<br><small class="text-muted">' . htmlspecialchars($details) . '</small>';
    }
    
    $errorHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $errorHtml .= '<span aria-hidden="true">&times;</span>';
    $errorHtml .= '</button>';
    $errorHtml .= '</div>';
    
    echo $errorHtml;
}

// Function to display success messages
function showSuccess($message) {
    $successHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    $successHtml .= '<strong>Success:</strong> ' . htmlspecialchars($message);
    $successHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $successHtml .= '<span aria-hidden="true">&times;</span>';
    $successHtml .= '</button>';
    $successHtml .= '</div>';
    
    echo $successHtml;
}

ob_start();
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
  
<?php
    // Database connection
    $connection = mysqli_connect("localhost", "housemadeeasy", "@hmeaffliate", "housema2_housemadeeasy"); 
    
    if (!$connection) {
        $error = mysqli_connect_error();
        error_log("[" . date('Y-m-d H:i:s') . "] Database connection failed: " . $error);
        showError("Failed to connect to database. Please try again later.", $error);
    } else {
        // Query to get house taken data
        $sql = "SELECT * FROM house_taken WHERE id=2";
        $result = mysqli_query($connection, $sql);
        
        if (!$result) {
            $error = mysqli_error($connection);
            error_log("[" . date('Y-m-d H:i:s') . "] Query failed: " . $error);
            showError("Failed to retrieve data. Please try again later.", $error);
        } else {
            $row = mysqli_fetch_object($result);
        }
    }
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
<li data-target="#carousel-example-generic" data-slide-to="4" ></li>
<li data-target="#carousel-example-generic" data-slide-to="5" ></li>
<li data-target="#carousel-example-generic" data-slide-to="6" ></li>
<li data-target="#carousel-example-generic" data-slide-to="7" ></li>
<li data-target="#carousel-example-generic" data-slide-to="8" ></li>
</ol>
<div class="carousel-inner" role="listbox">
       <div class="carousel-item active">
         <div class="hero-item" style="background-image: url(assets/images/slide/SammyWebBannera.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                      
                        </div>
                    </div>
                </div>
            </div> 
    </div>
     <div class="carousel-item">
         <div class="hero-item" style="background-image: url(assets/images/slide/domore2.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                      
                        </div>
                    </div>
                </div>
            </div>
    </div>
     <div class="carousel-item ">
        
          <div class="hero-item" style="background-image: url(assets/images/slide/makemoney2.jpg); " class="img-responsive"> 
               
            </div>
           
    </div>
      <div class="carousel-item ">
         <div class="hero-item" style="background-image: url(assets/images/slide/logistics2.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                      
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
     <div class="carousel-item ">
         <div class="hero-item" style="background-image: url(assets/images/slide/flatmate2.jpg);  
  height: calc(90vh - 90px);" class="img-responsive">
                
            </div>
    </div>
     <div class="carousel-item ">
         <div class="hero-item" style="background-image: url(assets/images/slide/campusyard2.jpg); height: calc(90vh - 70px);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                      
                        </div>
                    </div>
                </div>
            </div>
    </div>
     <div class="carousel-item ">
         <div class="hero-item" style="background-image: url(assets/images/slide/shortrentals2.jpg); height: calc(90vh - 10px);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                      
                        </div>
                    </div>
                </div>
            </div>
    </div>
   <?php  
                    // Get latest slide for hero section
                    $sql = "SELECT * FROM slide order by id desc LIMIT 0,1";
                    $query = $con->query($sql);
                    
                    if (!$query) {
                        $error = $con->error;
                        error_log("[" . date('Y-m-d H:i:s') . "] Slide query failed: " . $error);
                        showError("Failed to load slides. Please try again later.", $error);
                    } else {
                        while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      $distance=$row2['distance'];
                      $bathroom=$row2['bathroom'];
                      $kitchen=$row2['kitchen'];
                      
                      
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
                                <h1 class="title"> <a href="slide-image.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h1>
                                <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> <?php echo $location; ?></span>
  
                                <div class="type-wrap">
                                    <a href="slide-image.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    <span class="price" >#<?php echo $first_year_rent?></span>
                                </div>
                               
                                
                            </div>
                            <!--Hero Content end-->
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } } ?>
  <?php 
                    // Get additional slides for carousel
                    $sql = "SELECT * FROM slide order by id desc LIMIT 1,3";
                    $query = $con->query($sql);
                    
                    if (!$query) {
                        $error = $con->error;
                        error_log("[" . date('Y-m-d H:i:s') . "] Additional slides query failed: " . $error);
                        showError("Failed to load additional slides. Please try again later.", $error);
                    } else {
                        while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      $kitchen=$row2['kitchen'];
                      $bathroom=$row2['bathroom'];
                      
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
                                    <span class="price" >#<?php echo $first_year_rent?><span >Yr</span></span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <img src="assets/images/icons/hero-area.png" alt=""><span> <?php echo $distance?></span>
                                    </li>
                                   
                                    <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen1.png" alt="" style="height: 24px;  background-color: white;"><?php echo $kitchen?> Kitchen</span>
                                </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bath.png" alt=""><span><?php echo $bathroom?> Bathroom</span>
                                    </li>
                                    
                                </ul>
                                
                            </div>
                            <!--Hero Content end-->
 
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } } ?>
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
<!-- Group bar begin -->
<style>
 @keyframes blink1 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink2 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink3 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink4 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink5 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink6 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
@keyframes blink7 {
  0% { opacity: 0.2; }
  50% { opacity: 1; }
  100% { opacity: 0.2; }
}
/* Apply the animations */
.blink1 {
  animation: blink1 1.2s infinite;
}
.blink2 {
  animation: blink2 1.2s infinite;
}
.blink3 {
  animation: blink3 1.2s infinite;
}
.blink4 {
  animation: blink4 1.2s infinite;
}
.blink5 {
  animation: blink5 1.2s infinite;
}
.blink6 {
  animation: blink6 1.2s infinite;
}
.blink7 {
  animation: blink4 1.2s infinite;
}
/* Repeat and customize for blink5, blink6, etc. */
</style>
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
                             <span class="blink1"><a href="search-made-easy.php">Find your perfect home sweet home away from Home.</a></span>
                            
                            
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
                            <span class="blink2"><a href="flatmate-finder/index.php"> Say hello to your new roomie! </a></span>
                            
                            
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
                        <div class="content blink3">
                            <h4 class="title"><a href="marketplace/index.php">Campus Yard</a></h4>
                            <span><a href="marketplace/index.php">Your one-stop spot for all things campus-related. </a></span>
                            <span > <a href="marketplace/index.php"> Click here!! </a></span>
                            
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
                            <span class="blink4"><a href="make-money-with-housemadeeasy.php">Because who says housing can't pay?</a></span>
                            
                            
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
                            <span class="blink5"><a href="housemadeeasy-logistics.php"> Streamline your moving process with ease. </a></span>
                            
                            
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
                            <span class="blink6"><a  href="home-repair/index.php"> Need a fixer-upper? We've got you covered. </a></span>
                             
                            
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
                            <span class="blink7"><a href="short-term-stay.php">Stay flexible with our short-term stay options.</a></span>
                           
                            
                        </div>
                    </div>
                </div> 
                <!--Agencies end-->
                
            </div>
            
            
            
        </div>
    </div>
    <!--Agency Section end-->
<!-- Group bar end -->
     
   
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
                    // Get testimonials
                    $sql = "SELECT * FROM test  order by id ASC";
                    $query = $con->query($sql);
                    
                    if (!$query) {
                        $error = $con->error;
                        error_log("[" . date('Y-m-d H:i:s') . "] Testimonials query failed: " . $error);
                        showError("Failed to load testimonials. Please try again later.", $error);
                    } else {
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
                    
                 <?php } } ?>
                    
                   
                    
                    
                    
                </div>
                <!--Review end-->
                
            </div>
        </div>
    </div>
    <!--Testimonial Section end-->
    
    <!--Brand section start-->
    <div class="brand-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <br><br>
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
                     <div class="brand col"><img src="assets/images/brands/PANSlogo.png" style="width: 150px; height:120px" alt=""></div>
                      <div class="brand col"><img src="assets/images/brands/RoyalJoyLogo.png" style="width: 160px; height:160px" alt=""></div>
                   
                    <div class="brand col"><img src="assets/images/brands/Picture1.png" style="width: 150px; height:150px" alt=""></div>
                    
                    
                </div>
                <!--Brand Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Brand section end-->
   
    
    <?php  include ('inc/footer.inc.php');   ?>
    <!-- Scroll Button Styles -->
<style>
.scroll-button {
    position: fixed;
    right: 20px;
    background-color: darkblue;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 24px;
    z-index: 1000;
    cursor: pointer;
     animation: swipe;
    easingType: linear;
    
}
#scroll-up {
    bottom: 80px;
    
}
#scroll-down {
    bottom: 20px;
}
</style>
<!-- Scroll Button Script -->
<script>
document.getElementById('scroll-up').addEventListener('click', function() {
    window.scrollBy({
        top: -window.innerHeight,
        behavior: 'smooth'
    });
});
document.getElementById('scroll-down').addEventListener('click', function() {
    window.scrollBy({
        top: window.innerHeight,
        behavior: 'smooth'
    });
});
</script>
