<?php 
// ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
include ("../inc/connect.inc.php");
include ("../inc/session.php"); 
?> 
 
 <!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMEAffilate || Helping you to find your desire house easily</title>
    <meta name="description" content="housemadeeasy is an e-platform housing website that help student of olabisi onabanjo University(Sagamu Campus) to get their  desire house of choice easily with no stress attached. We achieved this by working with trust worthy agent located in all vicinties of Sagamu Campus in Olabisi Onabanjo University.....">
    
    <meta content="housemadeeasy is an e-platform housing website that help student of olabisi onabanjo University(Sagamu Campus) to get their  desire house of choice easily with no stress attached. We achieved this by working with trust worthy agent located in all vicinties of Sagamu Campus in Olabisi Onabanjo University....." name="keywords">
    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">   
 
      
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Google API -->
    <script src="https://apis.google.com/js/api.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- You already have this, verify the file exists -->
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div id="main-wrapper">
   
    <!--Header section start-->
    <header class="header header-sticky"> 
        <div class="header-bottom menu-center">
            <div class="container">
                <div class="row justify-content-between">
                    
                    <!--Logo start-->
                    <div class="col mt-10 mb-10">
                        <div class="logo">
                            <a href="my-account.php"><img src="assets/images/HouseMadeEasylogo.jpg" style="width: 90px; height: 80px;" alt=""></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    
                    <!--Menu start-->
                    <div class="col d-none d-lg-flex">
                        <nav class="main-menu">
                            <ul>
                                <li ><a href="my-account.php" style="text-decoration: none;">Home</a> 
                                   
                                </li>
                                  
                                <li class="active"><a href="upload-house.php" style="text-decoration: none;">Upload House</a>
                                   
                                </li>
                               
                               
                                <?php
        if (isset($_SESSION['agentaffilate_id'])){?> 
                                  <li ><a href="my-account.php" style="text-decoration: none;">Dashboard</a> </li> 
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li>  
                                  <?php 
                                   
                                   }else{?>
                                              <li ><a href="login.php" style="text-decoration: none;">Login</a> </li>
                                  <li ><a href="register.php" style="text-decoration: none;">Register</a>   </li>  
                                    <?php } ?>
                               
                                  
                                    
                                
                            </ul> 
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start-->
<?php
$query2 = mysqli_query($con,"SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");  
$row2 = mysqli_fetch_assoc($query2);
//$teachname=$row2['myteacherlast']." ".$row2['myteacherfirst'] ;
$prof = (!empty($row2['picture'])) ? 'assets/images/hmeaffilate_img/'.$row2['picture'] : 'assets/images/user.png';  
?>
                   <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                            <img class="img-fluid img-circle user-toggle" style="height:50px;" src="<?php echo $prof?>" alt="Image">  
                           
                        </div>
                    </div>
                    <!--User end-->
                </div>
                
                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->
                
            </div>
        </div>
    </header>
    <!--Header section end-->
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Upload House</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">Upload House</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
   
  
 
 <!-- Upload House -->
<!--Add Properties section start-->
    <div class="add-properties-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
        <div class="container">
            <div class="row">
                <div class="add-property-wrap col">
                    
               
                    <p style="text-align:center; color: red; font-weight: bolder; background-color: whitesmoke; padding: 15px;"> Upload the Details of the House </p>
                    <div class="add-property-form tab-content">
                       
                              
                                <form method="POST" action="upload-house.php" id="upload-house-form" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="row">
                                         <div class="col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Enter your Whatapp Number</label> 
                          
                          <input name="whatapp" type="text" class="form-control" placeholder="Enter your active Whatapp Number" required>
                          
                      </div>
                                          <div class="col-12 mb-30"> 
                                            <label for="property_address">House Type</label> 
                                             <select name="house_type" id="class_school" required class="form-control" ><!-- form-control Begin -->
                               
                               <option selected disabled> Select House Type </option>
                               <option value="Single Room">Single Room</option>
                               <option value="Self contain">Self contain</option>
  
                               <option value="1 Bedroom Flat">1 Bedroom Flat</option>
                               
                               
                              <option value="2 Bedroom Flat">2 Bedroom Flat</option>
                              <option value="3 Bedroom Flat">3 Bedroom Flat</option>
                              <option value="4 Bedroom Flat">4 Bedroom Flat</option>
                               
                               
                          </select><!-- form-control Finish -->
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label for="property_title">House Name</label>
                                            <select id="subject" name="house_name" class="form-control" required>
                                <option value="">Select House Name</option>
                            </select>
                                          
                                        </div>
                                       
                       
                       
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                          <label class="control-label"> Location </label>
                           <select name="location" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select a Location </option>
                              
                             <option value="Sagamu">Sagamu</option>
                             <option value="Ago-Iwoye">Ago-Iwoye</option>
                             <option value="Ibogun">Ibogun</option>
                             <option value="Ayetoro">Ayetoro</option>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                      
                       
                    
                <div class="col-md-4 col-12 mb-30">
                                            <label for="property_price">House Location</label>
                                             <input name="house_location" required type="text" placeholder="Where is the house located at in Sagamu ?" class="form-control" >
                                        </div>
                                 
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                      <label class=" control-label"> House Image 1 </label> 
                       
                          <input name="house_img1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                     
                     
                        
                       
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                         <label class=" control-label"> House Image 2 </label> 
                          
                          <input name="house_img2" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                     
                    <div class="col-md-4 col-12 mb-30"><!-- form-group Begin -->
                         
                      <label class="control-label"> House Image 3 </label> 
                      
                         <input name="house_img3" type="file" class="form-control form-height-custom" required>
  
                    </div><!-- form-group Finish -->
                      <div class="col-md-4 col-12 mb-30"><!-- form-group Begin -->
                         
                      <label class="control-label"> House Image 4 </label> 
                      
                          <input name="house_img4" type="file" class="form-control form-height-custom" required>
      
                    </div><!-- form-group Finish -->
   
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label > Type of Toilet </label> 
                          
                           <select name="amenities" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="Water Closet">Water Closet</option>
                              <option value="Pit latrine">Pit latrine</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
  
                       
                        
                        
                        
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> House Label </label> 
                          
                          <select name="house_label" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select a Label Product </option>
                              
                             <option value="Hot">Hot</option>
                             <option value="New">New</option>
                            <option value="Old">Old</option>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                        
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                          <label class=" control-label"> Distance to school</label> 
                           <select name="distance" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="Treakable">Treakable</option>
                             <option value="Not Treakable">Not Treakable</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> How many kitchen does the house has </label> 
                          
                          <input name="kitchen" type="text" class="form-control" placeholder="how many kitchen is in there" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                        
                        
                         
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class="control-label"> How many bathroom does the house has </label>
                          
                          <input name="bathroom" type="text" class="form-control" placeholder="how many bathroom does the house has" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                         
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                           <label class=" control-label"> Is the house Tiled </label> 
                           <select name="door" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="yes">yes</option>
                             <option value="no">no</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                          <label class="control-label"> Is the house fence </label> 
                          <select name="fence" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="yes">yes</option>
                             <option value="no">no</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                        
                        
                    
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                           <label class=" control-label"> Electricity</label> 
                          <select name="electricity" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="Prepaid">Prepaid</option>
                             <option value="Postpaid">Postpaid</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                    
                    
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                              <label class=" control-label"> Is the house Gated </label> 
                          <select name="gated" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="Gated">Gated</option>
                             <option value="Not Gated">Not Gated</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                     
                    
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                          <label class=" control-label"> Gender Required</label> 
                          <select name="gender" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="All Gender">All Gender</option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                    
                        
                       
                         
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                           <label class=" control-label"> Is Roommate Allowed</label> 
                          <select name="roommate" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                              <option value="Allowed">Allowed</option>
                              <option value="Not Allowed">Not Allowed</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                         
                      
                      <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                         <label class=" control-label"> Water-Source </label> 
                          <select name="water_source" class="form-control" required><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="Running Water">Running Water</option>
                             <option value="Well">Well</option>
                             <option value="Running Water & Well">Running Water & Well</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                    
                       
                       
                       
                       <!--  <div class="col-md-4 col-12 mb-30">
                            <label class=" control-label">Total Package for First Year Rent </label> 
                          <input name="first" type="text" class="form-control" placeholder="Enter total package for the first year" required>
                          
                      </div> -->
                      <!-- col-md-6 Finish --> 
                       
                     
                    
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> House Rent </label> 
                          
                          <input name="house_rent" required placeholder="Enter the house rent" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   
                      
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Agreement & Commission </label> 
                          
                          <input name="agreement" placeholder="Enter the Agreement & Comission" type="text" class="form-control" >
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                      
                        
                       
                       
                       
                       <!--  <div class="col-md-4 col-12 mb-30">
                        <label class="control-label"> Agent Fees </label> 
                          
                          <input name="agent_fees" type="text" class="form-control" required>
                          
                      </div> -->
                       
                     
                    
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Nepa bills </label>
                          
                          <input name="nepa" type="text" class="form-control" placeholder="Enter the Nepa bills">
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                      
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Cleaning Fees </label> 
                          
                          <input name="clean" type="text" class="form-control" placeholder="Enter the Cleaning Fees">
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                      
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Damage Fees </label> 
                          
                          <input name="damage" type="text" class="form-control" placeholder="Enter the Damage Fees">
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                      
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                         <label class=" control-label"> Security Fees </label>
                          
                          <input name="security" type="text" class="form-control" placeholder="Enter the Security Fees">
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                      
                        
                       
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                        <label class=" control-label"> Second Year Rent </label> 
                          
                          <input name="second" type="text" class="form-control" placeholder="Enter the Subsquent Year Rent" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30">
    <label class="control-label">Is the house a Multiple Room</label>
    <select name="multiple_room" required class="form-control">
        <option selected disabled>Choose an option</option>
        <option value="yes">yes</option>
        <option value="no">no</option>
    </select>
</div>
                       
                     
                    
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30">
    <label class="control-label">How many Multiple Room</label>
    <input name="how_many_multiple_room" type="text" placeholder="How many Multiple room (in number)" class="form-control" required>
</div>
                       
                    
                    
                        
                       
                       
                       <div class="col-md-4 col-12 mb-30"><!-- col-md-6 Begin -->
                            
                            <label class="control-label"> Does Landlord reside in the house </label> 
                          <select name="landlord_reside" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                             <option value="yes">yes</option>
                             <option value="no">no</option>
                              
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                    
                        
                        
                       
                       
                       
                      <!--  <div class="col-md-4 col-30">
                           
                          <label class=" control-label"> As the house being paid for  </label> 
                           <select name="status" required class="form-control">
                              
                              <option selected disabled> Choose an option </option>
                              
                              <option value="no">no</option>
                              
                              
                          </select>
                          
                      </div> --> 
                       
                    
                        
                        
                       
                       
                       
                     
                         
                        <div class="col-md-4 col-12 mb-30"><!-- form-group Begin -->
                        
                      <label class=" control-label"> House Video Upload  </label> 
                      
                      <div id="video-upload-section">
                          <!-- Google Authentication Button -->
                          <div id="google-auth-section" class="mb-3">
                              <button type="button" id="google-auth-btn" class="btn btn-danger" style="margin-bottom: 10px;" onclick="startGoogleOAuth()">
                                  <i class="fab fa-google"></i> Connect to Google
                              </button>
                              <div id="auth-status" class="alert alert-info" style="display: none; margin-bottom: 10px;"></div>
                          </div>
                          
                          <input type="file" id="house_video" name="house_video" accept="video/*" class="form-control" style="margin-bottom: 10px;" disabled>
                          <button type="button" id="upload-to-youtube" class="btn btn-secondary" style="margin-bottom: 10px; display: none;">Upload to YouTube</button>
                          <div id="upload-progress" style="display: none;">
                              <div class="progress" style="margin-bottom: 10px;">
                                  <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                              </div>
                              <span id="upload-status">Uploading...</span>
                          </div>
                          <div id="youtube-link-section" style="display: block;">
                              <input type="text" id="youtube_link" name="youtube" class="form-control" placeholder="Paste the video link for this house " readonly>
                          </div>
                      </div>
                           
                       
                        
                    </div>                  
                        
          
                       
                        
                      <div class="col-md-4 col-12 mb-30">
                        <label class=" control-label"> House  Description </label> 
                          
                          <textarea name="house_desc"  cols="100" rows="6" placeholder="Describe a little bit about the house" class="form-control"></textarea>
                          
                      </div>
                       
                    
                                        
                                        
                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                             
                                             <input name="submit" id="hidebutton" value="Upload House" type="submit" class="btn btn-primary form-control"> 
                                             
                                        </div>
                                          
                                      
                                </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Upload House end --> 
  <?php  include ('inc/footer.inc.php');  ?> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/youtube-upload.js"></script>
<script>
    $(document).ready(function() {
        // Handle OAuth callback parameters
        const urlParams = new URLSearchParams(window.location.search);
        
        // Check for OAuth success
        if (urlParams.get('oauth') === 'success') {
            console.log('OAuth successful, updating UI...');
            
            // Hide the Google auth section
            $('#google-auth-section').hide();
            
            // Enable video upload
            $('#house_video').prop('disabled', false);
            
            // Show success message
            const successMsg = '<div class="alert alert-success" style="margin-bottom: 10px;"><i class="fab fa-google"></i> Google connected successfully! You can now upload videos.</div>';
            $('#google-auth-section').after(successMsg);
            
            // Clean up URL parameters
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, cleanUrl);
        }
        
        // Check for OAuth error
        if (urlParams.get('oauth') === 'failed') {
            const errorMsg = '<div class="alert alert-danger" style="margin-bottom: 10px;">Google connection failed. Please try again.</div>';
            $('#google-auth-section').after(errorMsg);
            
            // Clean up URL parameters
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, cleanUrl);
        }
        
        // Function to start Google OAuth
        window.startGoogleOAuth = function() {
            // Generate state parameter for security
            const state = 'upload-house.php';
            const scope = 'https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube.force-ssl';
            
            // Google OAuth URL
            const googleAuthUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' +
                'client_id=488890072316-a367l4n2ns3l17o0unoab7jp9t4mgd52.apps.googleusercontent.com&' +
                'redirect_uri=' + encodeURIComponent('https://housemadeeasy.com.ng/hmeaffilate/callback.php') + '&' +
                'response_type=code&' +
                'scope=' + encodeURIComponent(scope) + '&' +
                'access_type=offline&' +
                'prompt=consent&' +
                'state=' + encodeURIComponent(state);
            
            // Redirect to Google OAuth
            window.location.href = googleAuthUrl;
        };
        // Listen for changes on the "Is the house a Multiple Room" dropdown
        $('select[name="multiple_room"]').on('change', function() {
            var value = $(this).val(); // Get the selected value
            var howManyField = $('input[name="how_many_multiple_room"]'); // Target the input field
            if (value === "no") {
                howManyField.val(0); // Set value to 0 if 'no' is selected
                howManyField.attr('readonly', true); // Make it readonly
            } else {
                howManyField.val(''); // Clear the field if 'yes' is selected
                howManyField.removeAttr('readonly'); // Make it editable again
            }
        });
        // Video upload handling
        $('#house_video').on('change', function() {
            if (this.files.length > 0) {
                $('#upload-to-youtube').show();
            } else {
                $('#upload-to-youtube').hide();
                $('#youtube-link-section').hide();
                $('#upload-progress').hide();
            }
        });
        // YouTube upload handling
        $('#upload-to-youtube').on('click', function() {
            const videoFile = $('#house_video')[0].files[0];
            if (!videoFile) {
                alert('Please select a video file first.');
                return;
            }
            // Check file size (100MB limit)
            const maxSize = 100 * 1024 * 1024; // 100MB
            if (videoFile.size > maxSize) {
                alert('File too large. Maximum size is 100MB.');
                return;
            }
            // Check file type
            const allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/flv', 'video/webm'];
            if (!allowedTypes.includes(videoFile.type)) {
                alert('Invalid file type. Please upload a video file.');
                return;
            }
            $('#upload-progress').show();
            $('#upload-to-youtube').prop('disabled', true);
            $('#upload-status').text('Preparing upload...');
            // Create form data for video upload
            const formData = new FormData();
            formData.append('video', videoFile);
            formData.append('action', 'upload_to_youtube');
            console.log('Uploading video:', {
                name: videoFile.name,
                size: videoFile.size,
                type: videoFile.type
            });
            // Upload video via AJAX
            $.ajax({
                url: 'callback.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            const percentComplete = evt.loaded / evt.total * 100;
                            $('#progress-bar').css('width', percentComplete + '%');
                            $('#upload-status').text('Uploading... ' + Math.round(percentComplete) + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    console.log('Upload response:', response);
                    
                    // jQuery automatically parses JSON, so response is already an object
                    let result;
                    try {
                        if (typeof response === 'string') {
                            result = JSON.parse(response);
                        } else {
                            result = response;
                        }
                        
                        if (result.success) {
                            $('#youtube_link').val(result.youtube_url);
                            $('#youtube-link-section').show();
                            $('#upload-status').text('Upload completed successfully!');
                            $('#progress-bar').css('width', '100%');
                            
                            // Hide progress after a delay
                            setTimeout(function() {
                                $('#upload-progress').hide();
                            }, 2000);
                        } else {
                            alert('Upload failed: ' + (result.error || 'Unknown error'));
                            $('#upload-progress').hide();
                        }
                    } catch (e) {
                        console.error('Response processing error:', e);
                        console.log('Raw response:', response);
                        alert('Error processing upload response: ' + e.message);
                        $('#upload-progress').hide();
                    }
                    $('#upload-to-youtube').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', {xhr, status, error});
                    let errorMsg = 'Upload failed: ' + error;
                    if (xhr.responseText) {
                        console.log('Error response:', xhr.responseText);
                        errorMsg += '\nServer response: ' + xhr.responseText.substring(0, 200);
                    }
                    alert(errorMsg);
                    $('#upload-progress').hide();
                    $('#upload-to-youtube').prop('disabled', false);
                }
            });
        });
    });
</script>
   
 
   
    <script type="text/javascript">
    
    $(document).ready(function() {
    // Show modal on button click
   
         // Function to update subjects based on class selection
    function updateSubjectOptions() {
        var classValue = $('#class_school').val();
        var subjectDropdown = $('#subject');
        subjectDropdown.empty(); // Clear current options
        // Define subjects based on class selected
        var singleroom = ['Single room with shared toilet and bathroom', 'Single room in a flat with shared toilet and bathroom', 'Single room with personal toilet and bathroom', 'Single room and palour with shared toilet and bathroom'];
        var selfcontain = ['Self contain'];
        var onebedroomflat = ['One bedroom flat'];
        var twobedroomflat = ['Two bedroom flat with shared toilet and bathroom', 'Two bedroom flat with personal toilet in each room'];
        var threebedroomflat = ['Three bedroom flat with one bathroom and toilet', 'Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet', 'Three bedroom flat with personal toilet and bathroom each'];
        var fourbedroomflat = ['Four bedroom flat with one bathroom and toilet', 'Four bedroom flat with a master bedroom(having personal toilet and bathroom) and the three rooms sharing one bathroom and toilet', 'Four bedroom flat with personal toilet and bathroom each', 'Four bedroom flat with two toilet and bathroom'];
        // Populate the subject dropdown based on selected class
        if (classValue === 'Single Room') {
            singleroom.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        } else if (classValue === 'Self contain') {
            selfcontain.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '1 Bedroom Flat') {
            onebedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '2 Bedroom Flat') {
            twobedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '3 Bedroom Flat') {
            threebedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '4 Bedroom Flat') {
            fourbedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        
    }
    // Listen for changes in the class dropdown and update subjects accordingly
    $('#class_school').on('change', function() {
        updateSubjectOptions();
        
    });
    
   
  
});
 
</script>
<?php
function val($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data =strip_tags($data);
    return $data;
}
if(isset($_POST['submit'])){
     // $agentid = $_POST['agentid']; 
        if(isset($_SESSION['agentaffilate_id'])) {
       $query2 = mysqli_query($con,"SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");  
$row2 = mysqli_fetch_assoc($query2);
//$gender = ucfirst($row2['gender']);
$agent_fname= $row2['fname'];
$agent_lname= $row2['lname'];
$agent_email = $row2['email'];   
$agent_pno = $row2['pno'];
$agentaffilate_id=$row2['agentaffilate_id'];
         
    }
    
    
    $location = $_POST['location'];
    $house_location = $_POST['house_location'];
    $house_type = $_POST['house_type'];
   
    // $agent_img = $_FILES['agent_img']['name'];
    
    $multiple_room = $_POST['multiple_room'];
     $how_many_multiple_room = $_POST['how_many_multiple_room'];
     //$how_many_multiple_room_new=$how_many_multiple_room
     // $house_price = $_POST['house_price'];
    $house_desc = $_POST['house_desc'];
    $amenities = $_POST['amenities'];
    $house_label = $_POST['house_label'];
       $gated = $_POST['gated'];
    $electricity = $_POST['electricity'];
    $gender = $_POST['gender'];
    $roommate = $_POST['roommate'];
     $distance = $_POST['distance'];
    $kitchen = $_POST['kitchen'];
    $bathroom = $_POST['bathroom'];
    $door = $_POST['door'];
    $fence = $_POST['fence'];
    $water_source = $_POST['water_source'];
      //$status = $_POST['status'];
       $whatapp = $_POST['whatapp'];
        $second = $_POST['second'];
         $agreement = $_POST['agreement'];
          
         $nepa = $_POST['nepa'];
        $clean = $_POST['clean'];
         $damage = $_POST['damage'];
        $security = $_POST['security'];
        $house_rent = $_POST['house_rent'];
        $landlord_reside=$_POST['landlord_reside'];
        $house_name = $_POST['house_name'];
        
          $house_agent_fname_session=$_SESSION['fname'];
    $house_agent_lname_session=$_SESSION['lname'];
    $house_agent_pno_session=$_SESSION['pno'];
    $house_agent_email_session=$_SESSION['email'];
      $house_agent_user_id_session=$_SESSION['agentaffilate_id'];
      $youtube = $_POST['youtube'];
    
if ($house_name == 'Single room with shared toilet and bathroom') {
    $agent_fees = 10000; // Integer
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 20000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Single room in a flat with shared toilet and bathroom') {
    $agent_fees = 10000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Single room with personal toilet and bathroom') {
    $agent_fees = 20000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
   $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Single room and palour with shared toilet and bathroom') {
    $agent_fees = 20000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Self contain') {
    $agent_fees = 30000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 40000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'One bedroom flat') {
    $agent_fees = 30000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 50000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Two bedroom flat with shared toilet and bathroom') {
    $agent_fees = 40000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 50000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Two bedroom flat with personal toilet in each room') {
    $agent_fees = 40000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 70000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Three bedroom flat with one bathroom and toilet') {
    $agent_fees = 60000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 70000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet') {
    $agent_fees = 60000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 90000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
} elseif ($house_name == 'Three bedroom flat with personal toilet and bathroom each') {
    $agent_fees = 70000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 100000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
}
elseif ($house_name == 'Four bedroom flat with personal toilet and bathroom each') {
    $agent_fees = 80000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 120000);
    $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
}
elseif ($house_name == 'Four bedroom flat with two bathroom and toilet') {
    $agent_fees = 50000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 90000);
   $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
}
elseif ($house_name == 'Four bedroom flat with one bathroom and toilet') {
    $agent_fees = 40000;
    $agreement_new = number_format((int)str_replace(',', '', $agreement) + 80000);
   $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
}
   // Allowed MIME types
$allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp', 'image/bmp', 'image/svg+xml'];
function isValidImage($tmp_name, $allowedMimeTypes) {
    if (!file_exists($tmp_name)) return false;
    $mime = mime_content_type($tmp_name);
    return in_array($mime, $allowedMimeTypes);
}
$uploadDir = "../assets/images/property/";
$shortTermDir = "../assets/images/short-term-stay/";
$imageFiles = [
    'house_img1',
    'house_img2',
    'house_img3',
    'house_img4'
];
$uploadedImages = []; // Store new names to use later in DB insert
foreach ($imageFiles as $key) {
    $tmpName = $_FILES[$key]['tmp_name'];
    $originalName = $_FILES[$key]['name'];
    if (!empty($tmpName)) {
        if (!isValidImage($tmpName, $allowedMimeTypes)) {
            die("Error: The file uploaded for $key is not a valid image format.");
        }
        // Get file extension
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $extension = strtolower($extension); // normalize case
        // Generate a unique filename
        $uniqueName = uniqid('img_', true) . '.' . $extension;
        $destinationPath = $uploadDir . $uniqueName;
        $shortTermPath = $shortTermDir . $uniqueName;
        // Move and copy
        if (move_uploaded_file($tmpName, $destinationPath)) {
            copy($destinationPath, $shortTermPath);
            $uploadedImages[$key] = $uniqueName; // Save for DB use
        } else {
            die("Failed to upload $key.");
        }
    }
}
$house_img1 = $uploadedImages['house_img1'] ?? '';
$house_img2 = $uploadedImages['house_img2'] ?? '';
$house_img3 = $uploadedImages['house_img3'] ?? '';
$house_img4 = $uploadedImages['house_img4'] ?? '';
  
    // $temp_name5 = $_FILES['agent_img']['tmp_name'];
    $house_id= bin2hex(random_bytes(4));
    $house_id_short= bin2hex(random_bytes(4));
     
  
   //  $house_id_short= bin2hex(random_bytes(4));
    // short term features end
    
    $insert_product = "INSERT into properties (agent, agent_img, agent_pno, agent_email, location, house_location, type, date, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, status,date_due, first_year_rent, second_year_rent, house_id,multiple_room,how_many_multiple_room, house_owner, youtube_link, negotiable, agentaffilate_id, how_many_multiple_room_new, electricity, gated, gender, roommate, agree_com, agent_fees,nepa_bills, clean_fees, damage_fees, security_fees,house_rent) values ('$agent_fname', '', '$whatapp','$agent_email', '$location', '$house_location', '$house_type', NOW(),'$house_name','$house_img1','$house_img2','$house_img3','$house_img4','$house_desc','$amenities','$house_label','$distance', '$kitchen', '$bathroom', '$door', '$fence', '$water_source', 'no', '', '$first_new', '$second', '$house_id', '$multiple_room', '$how_many_multiple_room', '$landlord_reside', '$youtube', '', '$agentaffilate_id', '$how_many_multiple_room', '$electricity', '$gated', '$gender', '$roommate', '$agreement_new', '$agent_fees', '$nepa', '$clean', '$damage', '$security', '$house_rent')";
    
    $run_product1 = mysqli_query($con,$insert_product);
        $insert_product2 = "INSERT into short_term_rentals_properties (agent, agent_img, agent_pno, agent_email, location, house_location, type, date, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, status,date_due, house_id,multiple_room,how_many_multiple_room, house_owner, youtube_link) values ('$agent_fname', '', '$whatapp','$agent_email', '$location', '$house_location', '$house_type', NOW(),'$house_name','$house_img1','$house_img2','$house_img3','$house_img4','$house_desc','$amenities','$house_label','$distance', '$kitchen', '$bathroom', '$door', '$fence', '$water_source', 'no', '', '$house_id_short', '$multiple_room', '$how_many_multiple_room', '$landlord_reside', '$youtube')";
     
     $run_product2 = mysqli_query($con,$insert_product2);
    
   if ($run_product1 && $run_product2) {
       // Update YouTube video metadata if video was uploaded
       if (!empty($youtube)) {
           $accessToken = null;
           if (isset($_SESSION['google_access_token'])) {
               $accessToken = $_SESSION['google_access_token'];
           } elseif (isset($_SESSION['agentaffilate_id'])) {
               $tokens = getGoogleTokens($_SESSION['agentaffilate_id']);
               if ($tokens && isTokenValid($tokens['google_token_expires_at'])) {
                   $accessToken = $tokens['google_access_token'];
               }
           }
           if ($accessToken) {
               // Extract video_id from YouTube URL
               $url = $youtube;
               $query = [];
               parse_str(parse_url($url, PHP_URL_QUERY), $query);
               $video_id = $query['v'] ?? '';
               if (!empty($video_id)) {
                   // Construct SEO-friendly title
                   $title = $house_label . ' ' . $house_type . ' in ' . $house_location . ', ' . $location . ' - ₦' . number_format($house_rent) . ' per year';
                   // Construct detailed SEO-friendly description
                   $description = "🏠 Discover this amazing " . $house_type . " located in " . $house_location . ", " . $location . ".\n\n";
                   $description .= "📝 Description: " . $house_desc . "\n\n";
                   $description .= "✨ Key Features:\n";
                   $description .= "• Toilet Type: " . $amenities . "\n";
                   $description .= "• Kitchen: " . $kitchen . " kitchen(s)\n";
                   $description .= "• Bathroom: " . $bathroom . " bathroom(s)\n";
                   $description .= "• Tiled: " . ($door == 'yes' ? 'Yes' : 'No') . "\n";
                   $description .= "• Fenced: " . ($fence == 'yes' ? 'Yes' : 'No') . "\n";
                   $description .= "• Electricity: " . $electricity . "\n";
                   $description .= "• Gated: " . $gated . "\n";
                   $description .= "• Gender Requirement: " . $gender . "\n";
                   $description .= "• Roommate Allowed: " . $roommate . "\n";
                   $description .= "• Water Source: " . $water_source . "\n";
                   $description .= "• Landlord Resides: " . $landlord_reside . "\n";
                   $description .= "• Distance to School: " . $distance . "\n";
                   $description .= "• Multiple Rooms: " . $multiple_room;
                   if ($multiple_room == 'yes') {
                       $description .= " (" . $how_many_multiple_room . " rooms)";
                   }
                   $description .= "\n\n";
                   $description .= "💰 Pricing Details:\n";
                   $description .= "• Annual Rent: ₦" . number_format($house_rent) . "\n";
                   $description .= "• Agreement & Commission: ₦" . number_format($agreement_new) . "\n";
                   $description .= "• NEPA Bills: ₦" . number_format($nepa) . "\n";
                   $description .= "• Cleaning Fees: ₦" . number_format($clean) . "\n";
                   $description .= "• Damage Fees: ₦" . number_format($damage) . "\n";
                   $description .= "• Security Fees: ₦" . number_format($security) . "\n";
                   $description .= "• Second Year Rent: ₦" . number_format($second) . "\n\n";
                   $description .= "📞 Contact Information:\n";
                   $description .= "WhatsApp: " . $whatapp . "\n\n";
                   $description .= "🔗 View full details and book this house: https://housemadeeasy.com.ng/details.php?id=" . $house_id . "\n\n";
                   $description .= "#HouseMadeEasy #HouseForRent #" . str_replace(' ', '', $location) . " #" . str_replace(' ', '', $house_type) . " #StudentHousing #OlabisiOnabanjoUniversity";
                   // Update video metadata
                   $updateResult = updateVideoMetadata($accessToken, $video_id, $title, $description);
                   if ($updateResult) {
                       error_log("Successfully updated YouTube video metadata for video ID: " . $video_id);
                   } else {
                       error_log("Failed to update YouTube video metadata for video ID: " . $video_id);
                   }
               }
           }
       }
    echo "<script>alert('Your House has been uploaded Successfully')</script>";
    echo "<script>window.open('my-account.php')</script>";
}
else{
        ///echo "<script>alert('House not inserted sucessfully')</script>";
        die(mysqli_error($con));
    } 
    
}
?>
