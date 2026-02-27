  <?php  
   session_start(); 
    include("../inc/connect.inc.php");
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
    <title>Short Term Rentals || Helping you to find your desire house easily</title>
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
                                
                                <li ><a href="home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>
                                 <li ><a href="marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 
                                <li ><a href="../housemadeeasy/flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
                                </li> 
                                 <li class="active"><a href="short-term-stay.php" style="text-decoration: none;">Short term Rentals</a>
                                   
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
                                <!--  <li ><a href="../my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="../logout.php" style="text-decoration: none;">logout</a>   </li> --> 
                                  <?php 
                                   
                                   //}else{?>
                                     <!--         <li ><a href="../login.php" style="text-decoration: none;">Login</a> </li>
                                 <li ><a href="../register.php" style="text-decoration: none;">Register</a>   </li>  -->
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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/shortrentals2.jpg);"> 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Short term Rentals</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Short term Rentals</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <div class="row">
                 <?php 
                    $sql = "SELECT * FROM short_term_rentals_properties where status='no'";
                    $query = $con->query($sql);
                     if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      //$first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                      $house_name=ucwords($row2['house_name']);
                      $house_name2=$row2['house_name'];
                      $house_id1=$row2['house_id'];
                      $status=$row2['status'];
                       $multiple_room=$row2['multiple_room']; 
                       $bathroom6=$row2['bathroom'];
                      $kitchen6=$row2['kitchen'];
                       $distance6=$row2['distance'];
                       $how_many_multiple_room=$row2['how_many_multiple_room'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?> 
                <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM short_term_rentals_bookings WHERE house_id='$house_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id11=$row3['house_id'];
                    ?>
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40"> 
                    <div class="property-inner">
                        <div class="image">
                             <?php 
                               if ($multiple_room=='yes') {
                                // code...
                            
                                if ($how_many_multiple_room==0) {
                                    //it will display an image of allbooked
                                    ?>
                                 <a href="short-term-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                           <?php }
                            
                        }//end of multiple room
                         //begin of not multiple room
                        elseif ($multiple_room=='no'){
                            if ($house_id1==$house_id11) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="short-term-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }
                              elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="short-term-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }
                           }// end
                               /// working for label
                             if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                             <a href="short-term-details.php?id=<?php echo $id; ?>"><img src='assets/images/short-term-stay/<?php echo $house_img1; ?>' alt=""></a>
                            <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance6?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom6?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen6?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"> <a href="short-term-details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    
                                    <a href="short-term-details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                </div>
                            </div>
                              <?php 
                             if ($multiple_room=='yes') {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?> Room left</p>
                             <?php }else{
                                
                             }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <!--Property end-->
               
               <?php } }else{
                echo "<div style='text-align:center; font-weight:bolder'> No apartment Yet..</div>";
               }
               ?>
                
            </div>
            
             
           
            
        </div>
    </div>
    <!--New property section end-->
    
    <?php  include ('inc/footer.inc.php');   ?> 
     
