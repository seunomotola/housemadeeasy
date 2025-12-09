<?php 
session_start();
// if(!isset($_SESSION['email'])){
//      echo  "<script>
//     alert('Login/Register first ...');
//     window.location.href='index.php';
//     </script>";
//   }

 ('inc/connect.inc.php');   ?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search your desire house easily || Housemadeeasy - Helping you to find your desire house easily</title>
    <meta name="description" content="Search your desire house easily in sagamu campus of olabisi onabanjo University  on housemadeeasy. housemadeeasy is an e-platform housing website that help student of olabisi onabanjo University(Sagamu Campus) to get their  desire house of choice easily with no stress attached. We achieved this by working with trust worthy agent located in all vicinties of Sagamu Campus in Olabisi Onabanjo University.....">
    

    <meta content="Search your desire house easily in sagamu campus of olabisi onabanjo University  on housemadeeasy. housemadeeasy is an e-platform housing website that help student of olabisi onabanjo University(Sagamu Campus) to get their  desire house of choice easily with no stress attached. We achieved this by working with trust worthy agent located in all vicinties of Sagamu Campus in Olabisi Onabanjo University....." name="keywords">

    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">   

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/626914f1b0d10b6f3e6f966c/1g1l7jkoo';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    
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
                                <li class=""><a href="view-all-properties.php" style="text-decoration: none;">View all Houses</a>
                                  
                                </li>

                               <!--  <li ><a href="how-it-works.php" style="text-decoration: none;">How it Works</a>
                                 
                                </li> -->

                                 <li ><a href="about-us.php" style="text-decoration: none;">About Us</a>
                                 
                                </li>
                                <li ><a href="contact-us.php" style="text-decoration: none;">Contact Us</a>
                                 
                                </li>
                               <?php
       if (isset($_SESSION['email'])){?> 
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
                    <h1 class="page-banner-title">Search Your House Easily</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">Search Your House Easily</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

   




       <!--Search Section section start-->
    <div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Search Your House  Easily</h1>
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
                                     
                                    <option value="Sagamu">Sagamu</option>
                                    
                                   
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
                         

                  
                           <!---- <div class="form-group">
                                <select class="form-control" name="price" required>
                                    <option value="" required>Price</option>
                                    
                                       <?php 
                              /*
                              $get_cat = "select * from properties";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  //$cat_id = $row_cat['cat_id'];
                                  $house_price = $row_cat['house_price'];
                                  
                                  echo "
                                  
                                  <option> $house_price </option>
                                  
                                  ";
                                  
                              }
                              */
                              
                              ?>
                                    
                                </select>
                            </div>

                          

                            <div>
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



      <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!--CTA start-->
                    <div class="cta-content text-center" >
                        <h1 style="font-size:30px; color: white;">Can't find Your desired<span> house </span> above <br>Click the link below to let us Know the type of house you want <br></h1>
                        <div class="buttons" style="font-size:10px">
                            <!--<a href="add-properties.html">Add Property</a>-->
                            <a href="book-a-request-house.php" >Make a Request</a>
                            
                        </div>
                    </div>
                    <!--CTA end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->




       
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