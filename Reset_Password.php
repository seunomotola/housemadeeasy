<?php session_start();
  include ('inc/connect.inc.php');   
//include 'inc/session.php';
if(!isset($_SESSION['email'])){
header("location:index.php");
  }
?>
<?php
if(isset($_POST['reset'])){
    $password=$_POST['password'];
    $hashed_Password=md5($password);
    $email=$_SESSION['email'];
    if(empty($password)){
      exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
    }
    else{
     $sql= "UPDATE user SET password='$hashed_Password', token='' WHERE email='$email'";
         $result=mysqli_query($con, $sql);
          if($result){
         exit('<div style="color:green; text-align:center; font-size:15px;">Password Change successfully! logging in you with your new password</div>');
         
                }
    }
    

  }

  ?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Housemadeeasy || Helping you to find your desire house easily</title>
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
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Reset Password</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Reset Password</li>
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
                        <li><a class="active" href="#login-tab" data-toggle="tab">Reset Password</a></li>
                        
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="login.php" method="POST">
                                 <p id="response" style="font-weight:bolder;"></p>
                                <div class="row">
                                    
                                    <div class="col-12 mb-30"><input type="password" id="password" autofocus placeholder="Enter your New Password"></div>
                                    
                                    <div class="col-12 mb-30"><button type="button" class="btn btn-theme btn-block btn-flat" id="reset"><i class="fa fa-sign-in"></i> Reset Password</button></div>

                                   
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

      
    
    <?php  include ('inc/footer.inc.php');   ?>

     <script type="text/javascript">

       
            //forgot password begin
            $(document).ready(function(){
             $('#reset').on('click', function(){

                 var password = $('#password').val();           
              
                  $.ajax({
                    url: 'Reset_Password.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'reset' : 1,
                         'password' : password
                         

                         
                    }, // if  successful
                    success: function(response){
                        $("#response").html(response);
                         if(response.indexOf('success') >= 0){
                          setTimeout('window.location.href ="https://www.housemadeeasy.org/login.php";', 3000);
                        }
                        
                    },
                    dataType: 'text'


                   });


             });

          });
           //forgot password end


         
    </script>