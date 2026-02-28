<?php 
session_start();
include("../inc/connect.inc.php");     
if(isset($_SESSION['agentaffilate_id'])){
    header("location:upload-house.php ");
    
  }
  
  ?>     
  
    <!doctype html>
<html class="no-js" lang="en">
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
    
    <style>
        /* Custom styles for improved login page */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-wrapper {
            background: transparent;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        
        .page-banner-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px 0;
            margin-bottom: 30px;
        }
        
        .page-banner-title {
            color: white;
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .page-breadcrumb li {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .page-breadcrumb li a {
            color: white;
            text-decoration: none;
        }
        
        .page-breadcrumb li a:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        .login-register-section {
            padding: 40px 0;
        }
        
        .login-register-tab-list {
            margin-bottom: 30px;
            justify-content: center;
        }
        
        .login-register-tab-list li a {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .login-register-tab-list li a:hover,
        .login-register-tab-list li a.active {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .tab-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: white;
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-1px);
        }
        
        .btn-theme {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-theme:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-default {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
            color: #667eea;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-default:hover {
            background: rgba(102, 126, 234, 0.2);
            border-color: #667eea;
            color: #667eea;
        }
        
        .modal-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            border-bottom: none;
        }
        
        .modal-header .close {
            color: white;
            opacity: 0.8;
        }
        
        .modal-header .close:hover {
            opacity: 1;
        }
        
        /* Mobile responsiveness improvements */
        @media (max-width: 767px) {
            .page-banner-title {
                font-size: 2rem;
            }
            
            .tab-content {
                padding: 30px 20px;
            }
            
            .login-register-section {
                padding: 20px 0;
            }
            
            .page-banner-section {
                padding: 30px 0;
            }
            
            .logo img {
                width: 70px !important;
                height: 60px !important;
            }
            
            .main-menu {
                font-size: 14px;
            }
            
            .btn-theme {
                font-size: 14px;
                padding: 12px;
            }
        }
        
        @media (max-width: 480px) {
            .page-banner-title {
                font-size: 1.5rem;
            }
            
            .tab-content {
                padding: 25px 15px;
            }
            
            .login-register-section {
                padding: 15px 0;
            }
            
            .page-banner-section {
                padding: 20px 0;
            }
        }
        
        /* Animation effects */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .tab-pane {
            animation: fadeInUp 0.6s ease;
        }
        
        /* Custom focus styles for better accessibility */
        input:focus,
        button:focus {
            outline: none;
        }
        
        /* Success/Error message styling */
        #response,
        #response2 {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        #response.success,
        #response2.success {
            background: rgba(76, 175, 80, 0.1);
            color: #2e7d32;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }
        
        #response.error,
        #response2.error {
            background: rgba(244, 67, 54, 0.1);
            color: #c62828;
            border: 1px solid rgba(244, 67, 54, 0.3);
        }
        
        /* Forgot password link styling */
        a[href="#myModal"] {
            color: #667eea;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        a[href="#myModal"]:hover {
            color: #764ba2;
            text-decoration: none;
        }
        
        /* New user link styling */
        .new-user-link {
            color: #667eea;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .new-user-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }
    </style>
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
                            <span style="font-weight:bolder; color: white;">New to HMEAffilate?&nbsp; <a href="register.php" style="font-weight:bolder; font-size: 13px; text-decoration: underline; color: #ffd700;">Register!!</a></span>
                            
                        </div>
                    </div>
                    <!-- //end row for login -->
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="index.php" method="POST">
                                <p id="response" style="font-weight:bolder;"></p>
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input type="text" placeholder="Enter E-mail" id="email" class="form-control">
                                        </div>
                                    </div> 
                                    <div class="col-12 mb-30">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input type="password" placeholder="Password" id="pass" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-30">
                                        <button type="button" class="btn btn-lg btn-theme btn-block btn-flat" id="logIn">
                                            <i class="fa fa-sign-in"></i> Login
                                        </button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12 ml-auto mr-auto justify-content-between text-center">
                                        <span><a href="#myModal" style="font-weight:bolder; font-size: 15px;" data-toggle="modal">Forgot Password ?</a></span>
                                    </div> 
                                 </div>
                                
                                <!-- modal -->
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
                                                <input type="email" name="email" placeholder="Email" autocomplete="off" class="email form-control placeholder-no-fix">
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
    
  
      
    <?php include ('inc/footer.inc.php');   ?>
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
                        var $response = $("#response");
                        $response.html(response);
                        
                        if(response.indexOf('success') >= 0){ 
                            $response.addClass('success').removeClass('error');
                            setTimeout('window.location.href ="my-account.php";', 1000);
                        } else {
                            $response.addClass('error').removeClass('success');
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
                        var $response2 = $("#response2");
                        $response2.html(response2);
                        
                        if(response2.indexOf('success') >= 0){
                            $response2.addClass('success').removeClass('error');
                            setTimeout('window.location.href ="https://www.housemadeeasy.org/index.php";', 1500);
                        } else {
                            $response2.addClass('error').removeClass('success');
                        }
                        
                    },
                    dataType: 'text'
                   });
             });
          });
           //forgot password end
///check cookie ajax
          
    </script> 
