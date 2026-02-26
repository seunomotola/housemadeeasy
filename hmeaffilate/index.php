<?php 
session_start();
include("../inc/connect.inc.php")');     
if(isset($_SESSION['agentaffilate_id'])){
    header("location:upload-house.php ");
    
  }
   
  ?> 
    
    <!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMEAffilate || Helping you to find your desire house easily</title>
    <meta name="description" content="Welcome to housemadeeasy Affilate is an e-platform housing website that help student of olabisi onabanjo University(Sagamu Campus) to get their  desire house of choice easily with no stress attached. We achieved this by working with trust worthy agent located in all vicinties of Sagamu Campus in Olabisi Onabanjo University.....">
    
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
                                <li class="active"><a href="index.php" style="text-decoration: none;">Home</a></li>
                                <?php if (isset($_SESSION['agentaffilate_id'])): ?>
                                    <li class="active"><a href="my-account.php" style="text-decoration: none;">Dashboard</a></li>
                                    <li><a href="logout.php" style="text-decoration: none;">Logout</a></li>
                                <?php else: ?>
                                    <li><a href="index.php" style="text-decoration: none;">Login</a></li>
                                    <li><a href="register.php" style="text-decoration: none;">Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start--> 
                    <?php 
                    ?>
     
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
                    <h1 class="page-banner-title">Login</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Login</li>
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
                        <li><a class="active" href="#login-tab" data-toggle="tab">Login</a></li>
                        
                        
                    </ul>
                    <!-- row for login --> 
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 ml-auto mr-auto text-center">
                                        <span style="font-weight:bolder;">New to HMEAffilate?&nbsp; <a  href="register.php" style="font-weight:bolder; font-size: 13px; text-decoration: underline;">Register!!</a></span>
                                        
                                    </div>
                                </div>
                                    <!-- //end row for login -->
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="index.php" method="POST">
                                 <p id="response" style="font-weight:bolder;"></p>
                                <div class="row">
                                    <div class="col-12 mb-30"><input type="text" placeholder="Enter E-mail" id="email"  ></div> 
                                    <div class="col-12 mb-30"><input type="password" placeholder="Password" id="pass"  ></div>
                                    <!-- <div class="col-12 mb-30">
                                        <ul>
                                            <li><input type="checkbox" id="login_remember"> <label for="login_remember">Remember me</label></li>
                                        </ul>
                                    </div> -->
                                    <div class="col-12 mb-30"><button type="button" class="btn btn-lg btn-theme btn-block btn-flat" id="logIn"><i class="fa fa-sign-in"></i> Login</button></div>
                                    <div class="col-lg-12 col-md-12 col-12 ml-auto mr-auto justify-content-between text-center">
                                        
                                        <span><a href="#myModal" style="font-weight:bolder; font-size: 15px;" data-toggle="modal">Forgot Password ?</a></span>
                                    </div> 
                                 </div>
                                <!-- modal --->
             <!-- Button to Open the Modal -->
  <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
               
                <h4 class="modal-title" style="text-align: center;">Forgot Password?</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <p id="response2" style="font-weight: bold;"></p>
                <p>Enter your e-mail address below to Reset Your Password.</p>
                <input type="email" name="email" placeholder="Email" autocomplete="off" class="email" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button" id="forgotpassword">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
                            </form>
                        </div>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
    <!--Login & Register Section end-->
    
 
     
    <?php  include ('inc/footer.inc.php');   ?>
     <script type="text/javascript">
        $(document).ready(function(){
            
             // when user click the post button
            //$(document).on('click', '#logIn', function()
            // it will perform the same function with the same query above
            $('#logIn').on('click', function(){
                 
                  var email = $('#email').val();
                  var pass = $('#pass').val();
                 
                  
                 
                  
                  $.ajax({
                    url: 'login-process.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'user_login' : 1,
                         
                         'email': email,
                         'pass': pass
                         
                         
                         
                         
                    }, // if  successful
                    success: function(response){
                        $("#response").html(response);
                         if(response.indexOf('success') >= 0){ 
                          setTimeout('window.location.href ="my-account.php";', 100);
                        }
                        
                    },
                    dataType: 'text'
                   });
                 // End of else
              
        
         });
             });
         //forgot password begin
            $(document).ready(function(){
             $('#forgotpassword').on('click', function(){
                 var email = $('.email').val();           
              
                  $.ajax({
                    url: 'forgot_password_verify.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'resetpassword' : 1,
                         'email' : email
                         
                         
                    }, // if  successful
                    success: function(response2){
                        $("#response2").html(response2);
                         if(response2.indexOf('success') >= 0){
                          setTimeout('window.location.href ="https://www.housemadeeasy.org/index.php";', 500);
                        }
                        
                    },
                    dataType: 'text'
                   });
             });
          });
           //forgot password end
///check cookie ajax
         
    </script> 
