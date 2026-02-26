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
  //  if(!isset($_SESSION['email'])){
  //    echo  "<script>
  //   alert('Login/Register first ...');
  //   window.location.href='index.php';
  //   </script>";
  // }
  ?> 
<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Housemadeeasy Logistics || Helping you to find your desire house easily</title>
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
                            <a href="index.php"><img src="assets/images/HouseMadeEasylogo.jpg" style="width: 90px; height: 80px;" alt=""></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    
                   <!--Menu start-->
                    <div class="col d-none d-lg-flex">
                        <nav class="main-menu">
                            <ul>
                                <li ><a href="index.php" style="text-decoration: none;">Home</a>
                                   
                                </li>
                                
                                <li ><a href="make-money-with-housemadeeasy.php" style="text-decoration: none;">Make Money</a>
                                   
                                </li>
                             
                                <li ><a href="../home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>
                                 <li ><a href="../marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 
                                 <li ><a href="../flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
                                </li> 
                                 <li ><a href="short-term-stay.php" style="text-decoration: none;">Short term Rentals</a>
                                   
                                </li> 
                                   <li class="active"><a href="housemadeeasy-logistics.php" style="text-decoration: none;">Logistics</a>
                                   
                                </li>
                                <!-- <li class=""><a href="view-all-properties.php" style="text-decoration: none;">View all Houses</a>
                                  
                                </li> -->
                               <!--  <li ><a href="how-it-works.php" style="text-decoration: none;">How it Works</a>
                                 
                                </li> -->
                                <!--  <li ><a href="about-us.php" style="text-decoration: none;">About Us</a>
                                 
                                </li>
                                <li ><a href="contact-us.php" style="text-decoration: none;">Contact Us</a>
                                 
                                </li> -->
                                <?php
        //if (isset($_SESSION['user_id'])){?> 
                                 <!-- <li ><a href="my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li>  -->
                                  <?php 
                                   
                                  //else{?>
                                             <!-- <li ><a href="login.php" style="text-decoration: none;">Login</a> </li>
                                 <li ><a href="register.php" style="text-decoration: none;">Register</a>   </li> --> 
                                   <?php //} ?>
                               
                                
                                  
                              
                            </ul> 
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start-->
                   <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                           <!-- <img class="img-fluid img-circle user-toggle" src="assets/images/user.png" alt="Image">  -->
                           
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
    <div style="background-image: url(assets/images/bg/logistics.jpg);" class="page-banner-section section"   > 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Housemadeeasy Logistics</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Housemadeeasy Logistics</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 ml-auto mr-auto">
                    
                    <ul class="login-register-tab-list nav"> 
                        <li><a class="active" href="#login-tab" data-toggle="tab">Request Form</a></li><br><br>
                         <p style=" font-weight: bolder; text-align: center;">With housemadeeasy logistics services, you don't need to bother about  looking for transport services to transport  your luggages. Just make your request!<br> For any request  made, We'll get back to you within 24hours.</p>
                         <!-- <p style="text-align: center; color: red; font-weight:bolder;">N.B: Transportation Fees is #6,000 for Bus and #12,000 for Private car</p> -->
                         
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="housemadeeasy-logistics-process.php" method="POST" enctype="multipart/form-data">
                                 <p id="response" style="font-weight:bolder;"></p> 
                                <div class="row">
                                     <div class="col-12 mb-30">
                                        <input type="text" name="lname" required class="form-control form-height-custom"  placeholder="Your Last name" >
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="fname" required class="form-control form-height-custom"  placeholder="Your First name">
                                        </div> 
                                        <div class="col-12 mb-30"> 
                                        <input type="text" name="pno" required class="form-control form-height-custom"  placeholder="Your Phone Number">
                                        </div> 
 
                                        <div class="col-12 mb-30">
                                        <input type="email" name="email" required class="form-control form-height-custom"  placeholder="Your E-mail">
                                        </div>
                                        
                                        <div class="col-12 mb-30">
                                            <label class="col-12" style="font-weight:bolder;">Preferred day of transportation </label>
                                        <input type="date" name="datetransport" required class="form-control form-height-custom"  placeholder="">
                                        </div>
                                         <div class="col-12 mb-30">
                                            <label class="col-12" style="font-weight:bolder;">Type out the item you want to transport:</label>
        <textarea  name="itemDescription" rows="4" required></textarea>
        </div>
                                         <div class="col-12 mb-30">
                                       <label for="edit_lastname" class="col-12 control-label" style="font-weight:bolder;">Upload a picture of your luggage 1</label>
                                        <input type="file" required class="form-control"  name="photo1" >
                                        </div>
                                         <div class="col-12 mb-30">
                                       <label for="edit_lastname" class="col-12 control-label" style="font-weight:bolder;">Upload a picture of your luggage 2</label>
                                        <input type="file" required class="form-control"  name="photo2" >
                                        </div>
                                         <div class="col-12 mb-30">
                                       <label for="edit_lastname" class="col-12 control-label" style="font-weight:bolder;">Upload a picture of your luggage 3</label>
                                        <input type="file" required class="form-control"  name="photo3" >
                                        </div>
                                         <div class="col-12 mb-30">
                                       <label for="edit_lastname" class="col-12 control-label" style="font-weight:bolder;">Upload a picture of your luggage 4</label>
                                        <input type="file" required class="form-control"  name="photo4" >
                                        </div>
                                        <div class="col-12 mb-30">
                                        <input type="location" name="locationofload" required class="form-control form-height-custom"  placeholder="Location of your load in Ago-Iwoye">
                                        </div>
                                        <div class="col-12 mb-30">
                                        <input type="location" name="destinationofload" required class="form-control form-height-custom"  placeholder="Destination of offloading in Sagamu">
                                        </div>
                                    
                                         
                                   
                                    <div class="col-12 mb-30"><input type="submit" value="Submit Request" class="btn btn-lg btn-theme btn-block btn-flat" name="submitload"> </div>
                                    
                                 </div>
                                <!-- modal --->
             <!-- Button to Open the Modal -->
                            </form>
                        </div>
                   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->
    
  <!--whatapp chat icon-->
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+How+may+we+help+you..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    
    <?php  include ('inc/footer.inc.php');   ?>
     
