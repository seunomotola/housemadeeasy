<?php   
include("../inc/connect.inc.php")');
  if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
} 
if(isset($_SESSION['user_id'])){
    header("location:index.php ");
    
  }
 
 // include ('inc/header.inc.php');   ?>
 <!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Housemadeeasy--Register || Helping you to find your desire house easily</title>
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
      <style>
         .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }
        .modal-content {
            margin: auto;
        }
        .cart-icon {
            position: relative;
            display: inline-block;
        }
        .cart-icon img {
            width: 24px;
            height: 25px;
        }
        #cart-count {
            position: absolute;
            top: -8px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
         .modal-footer .btn {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
 
    
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
                                <li class="active"><a href="index.php" style="text-decoration: none;">Home</a>
                                   
                                </li>
                                 
                                <li ><a href="make-money-with-housemadeeasy.php" style="text-decoration: none;">Make Money</a>
                                   
                                </li>
                               
                                <li ><a href="../housemadeeasy/home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>
                                 <li ><a href="../housemadeeasy/marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 
                                <li ><a href="../housemadeeasy/flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
                                </li> 
                                <li ><a href="short-term-stay.php" style="text-decoration: none;">Short term Rentals</a>
                                   
                                </li> 
                                 <li ><a href="housemadeeasy-logistics.php" style="text-decoration: none;">Logistics</a>
                                   
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
                               <!--   <li ><a href="my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li> --> 
                                  <?php 
                                   
                                   //}else{?>
<!-- 
                                             <li ><a href="login.php" style="text-decoration: none;">Login</a> </li>
                                 <li ><a href="register.php" style="text-decoration: none;">Register</a>   </li>  -->
                                   <?php //} ?>
                               
                                
                                  
                               
                            </ul>  
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start-->
                    <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
      <div class="cart-icon">
            <a href="cart.php">
                <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart">
                <span id="cart-count">0</span>
            </a>
        </div>
                           
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        function updateCartCount() {
            $.ajax({
                url: 'get_cart_count.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#cart-count').text(response.cart_count);
                    } else {
                        console.error('Failed to update cart count:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }
        // Update cart count on page load
        updateCartCount();
    });
    </script>
    
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
                    
                    
                            <form action="register.php" method="post">
                                <p id="response" style="font-weight:bolder;"></p>
                                <div class="row">
                                    <div class="col-12 mb-30"><input type="text" placeholder="First Name" id="fname">
                                    </div>
                                    <div class="col-12 mb-30"><input type="text" placeholder="Last Name" id="lname" ></div>
                                    <div class="col-12 mb-30"><input type="email" placeholder="Email" id="email" ></div>
                                    <div class="col-12 mb-30"><input type="text" placeholder="Enter your Phone number" id="pno"></div>
                                    <div class="col-12 mb-30"><input type="password" placeholder="Password" id="pass"></div>
                                    <div class="col-12 mb-30"><input type="password" placeholder="Confirm Password"  id="confpass"></div>
                                   
                                    <!--<div class="col-12 mb-30">
                                        <ul>
                                            <li><input type="radio" name="account_type" id="register_normal" checked><label for="register_normal">Normal</label></li>
                                            <li><input type="radio" name="account_type" id="register_agent"><label for="register_agent">Agent</label></li>
                                            <li><input type="radio" name="account_type" id="register_agency"><label for="register_agency">Agency</label></li>
                                        </ul>
                                    </div>-->
                                    <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER']); ?>">
                                    
                                    <div class="col-12"><button type="button" class="btn btn-theme btn-block btn-flat" id="logIn"><i class="fa fa-sign-in"></i> Register</button>
                                        <br>
                                    </div>
                                  <div class="col-12 mb-30">
                                         
                                        <p style="text-align: center;">By clicking Register, you accept our <a href="#myModal" data-toggle="modal">terms and conditions</a></p>
                                    </div>
                                  
                                     <div class="col-12 mb-30">
                                         <hr>
                                        <p style="text-align: center; font-weight: bolder;"><span>Registered already?&nbsp; <a  href="login.php" style="font-weight:bolder;">Login!</a></span></p>
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
    <script type="text/javascript">
        $(document).ready(function(){
            
             // when user click the post button
            //$(document).on('click', '#logIn', function()
            // it will perform the same function with the same query above
            $('#logIn').on('click', function(){
                 var fname = $('#fname').val();           
                  var lname = $('#lname').val();
                  var email = $('#email').val();
                  var pass = $('#pass').val();
                  var confpass = $('#confpass').val();
                  var pno=$('#pno').val();
                  var redirect_url = $('#redirect_url').val();
                 
                  
                  $.ajax({
                    url: 'register-process.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'user_register' : 1,
                         'fname' : fname,
                         'lname': lname,
                         'email': email,
                         'pass': pass,
                         'confpass': confpass,
                         'pno':pno,
                         'redirect_url': redirect_url
                         
                         
                    }, // if  successful
                    success: function(response){
                        $("#response").html(response);
                        //  if(response.indexOf('success') >= 0){
                        //   //setTimeout('window.location.href ="https://www.housemadeeasy.org/index.php";', 3000);
                        // }
                        
                    },
                    dataType: 'text'
                   });
                 // End of else
              
        
         });
             });
            //forgot password begin
          //   $(document).ready(function(){
          //    $('#forgotportalid').on('click', function(){
          //        var email = $('#email').val();           
              
          //         $.ajax({
          //           url: 'forgot_password_verify.php',
          //           type: 'POST',
          //           data:{
          //             // all the quotation strings are Variable,
          //             //they can Change anytime
          //               'resetportalid' : 1,
          //                'email' : email
                         
                         
          //           }, // if  successful
          //           success: function(response2){
          //               $("#response2").html(response2);
          //                if(response2.indexOf('success') >= 0){
          //                 setTimeout('window.location.href ="index.php";', 3000);
          //               }
                        
          //           },
          //           dataType: 'text'
          //          });
          //    });
          // });
           //forgot password end
         
    </script> 
