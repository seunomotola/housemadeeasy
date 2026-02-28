<?php   
include("../inc/connect.inc.php");
include("../inc/session.php"); 

?>
 <!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMEAffilate || Helping you to Make Money Easily</title>
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
                                 
                               <!--  <li ><a href="upload-house.php" style="text-decoration: none;">Upload House</a>
                                   
                                </li> -->
                               
                               
                                <?php
        if (isset($_SESSION['agentaffilate_id'])){?> 
                                
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li>  
                                  <?php 
                                   
                                   }else{?>
                                             <li ><a href="index.php" style="text-decoration: none;">Login</a> </li>
                                 <li class="active"><a href="register.php" style="text-decoration: none;">Register</a>   </li>  
                                   <?php } ?>
                               
                                
                                  
                               
                            </ul> 
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start-->
                   <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                           <img class="img-fluid img-circle user-toggle" src="assets/images/user.png" alt="Image">  
                           
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
                    <h1 class="page-banner-title">Register</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">Register</li>
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
                        
                        <li><a class="active" href="#register-tab" data-toggle="tab">Register</a></li>
                    </ul>
                    <?php
                    $pno='';
                    ?>
                    
                    
                            <form action="register-process.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="col-12 mb-30"><input required type="text" placeholder="First Name" name="fname">
                                    </div>
                                    <div class="col-12 mb-30"><input required type="text" placeholder="Last Name" name="lname" ></div>
                                    <div class="col-12 mb-30">
                                       <label for="edit_lastname" class="col-12 control-label" style="font-weight:bolder;">Upload a Profile picture</label>
                                        <input type="file" required class="form-control"  name="picture" >
                                        </div>
                                    <div class="col-12 mb-30"><input required type="email" placeholder="Email" name="email" value=""></div>
                                    <div class="col-12 mb-30"><input required type="text" placeholder="Enter your Phone number" name="pno"></div>
                                    <div class="col-12 mb-30"><input required type="password" placeholder="Password" name="pass"></div>
                                    <div class="col-12 mb-30"><input required type="password" placeholder="Confirm Password"  name="confpass"></div>
                                     <div class="col-12 mb-30"><input required type="text" placeholder="Enter your Bank Name e.g Gtb, Polaris etc" name="bankname"></div>
                                      <div class="col-12 mb-30"><input required type="text" placeholder="Enter your Account Name" name="accountname"></div>
                                       <div class="col-12 mb-30"><input required type="text" placeholder="Enter your Account Number" name="accountno"></div>
                                   
                                    <!--<div class="col-12 mb-30">
                                        <ul>
                                            <li><input type="radio" name="account_type" id="register_normal" checked><label for="register_normal">Normal</label></li>
                                            <li><input type="radio" name="account_type" id="register_agent"><label for="register_agent">Agent</label></li>
                                            <li><input type="radio" name="account_type" id="register_agency"><label for="register_agency">Agency</label></li>
                                        </ul>
                                    </div>-->
                                    
                                    <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15"><input name="submit" value="Register" type="submit" class="btn btn-primary form-control">
                                         
                                        <br>
                                    </div>
                                 <!--  <div class="col-12 mb-30">
                                         
                                        <p style="text-align: center;">By clicking Register, you accept our <a href="#myModal" data-toggle="modal">terms and conditions</a></p>
                                    </div> -->
                                  
                                     <div class="col-12 mb-30">
                                         <hr>
                                        <p style="text-align: center; font-weight: bolder;"><span>Already Register?&nbsp; <a  href="index.php" style="font-weight:bolder;">Login!</a></span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->
  <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title" style="text-align: center;">Terms and Condition</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <ol>
                    <p style="font-weight:bolder; text-align: center;">Please note the following terms and condition of our services to you</p>
                    <hr>
                    <li>Please note that every houses and agent Information on this website are not counterfeit. They are simply the same house you would see hen you come for the checking of the House</li>
                    <li>Customer are not allowed to follow agent to check a House that is not available on the website</li>
                </ol>
                 <ol>
                    <p style="font-weight:bolder; text-align: center; ">Refund Condition Policy</p>
                    <hr>
                    <li>If two(2) Customer booked a house for checking on the same day, the first(1<sup>st</sup>) customer choose a time range of 11am-11:30am while the second(2<sup>nd</sup>) Customer choose a time range of 12pm-12:30pm.<br>
                        The first(1<sup>st</sup>) Customer decide to go and check the house at the stipulated time and decided to pay Immediately for the House. <br>The second(2<sup>nd</sup>) Customer which choose the time range of 12pm-12:30pm for the same house that the first(1<sup>st</sup>) Customer had already paid for, the second(2<sup>nd</sup>) Customer can either choose whether he/she want  his/her checking fees to be refunded or book an appointment again without paying for the checking fees again due to the initial checking fee that he/she had already pay for.</li>
                    <li>Sequel to the above, if the second(2<sup>nd</sup>) Customer did not find his/her exact house of choice on the platform, the checking fee that he/she had already paid for we be refunded back to him/her within 24hrs that the complain(that he/she could not find his exact house of choice) was issued.</li>
                    <li> The only condition that checking fee paid by the customer will not be refunded is that if he/she  come late or fail to come at the exact date and time that he/she booked for on the website</li>
                </ol>
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
   <?php  include ('inc/footer.inc.php');   ?>
   
