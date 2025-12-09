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

                               

                                <li ><a href="../home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>

                                 <li ><a href="../marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 

                                <li ><a href="../flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
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
                          <?php 
                if (isset($_SESSION['user_id'])) {
                   $cart_count_query = "SELECT COUNT(*) as count FROM cart WHERE user_id = '$user_id'";
$cart_count_result = mysqli_query($con, $cart_count_query);
$cart_count = mysqli_fetch_assoc($cart_count_result)['count'];
?>

  <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                          <div class="cart-icon">
    <a href="cart.php" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart">
        <span id="cart-count"><?php echo $cart_count; ?></span>
    </a>
</div>
                           
                        </div>
                    </div>

               <?php }else{?>

                   
                       <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                          <div class="cart-icon">
    <a href="cart.php">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart">
        <span id="cart-count"><?php echo "0"; ?></span>
    </a>
</div>
                           
                        </div>
                    </div>
                    

               <?php }
               


?>

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


 <!--New property section start-->
    <div class="property-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Latest House in Town</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">

                  <?php 
                    //$sql = "SELECT * FROM properties where house_label='hot' and status='no' order by id ASC";
                       $sql="SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
        where p.house_label='hot'
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                         $house_img2=$row2['house_img2'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                     $status=$row2['status'];
                      $house_name=$row2['house_name'];
                      $house_name2=$row2['house_name'];
                      $house_location=$row2['house_location'];
                      $house_id1=$row2['house_id'];
                      $multiple_room=$row2['multiple_room'];
                      $bathroom2=$row2['bathroom'];
                      $kitchen2=$row2['kitchen'];
                       $distance2=$row2['distance'];
                       $negotiable=$row2['negotiable'];
                      
                      $how_many_multiple_room=$row2['how_many_multiple_room'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?> 

                      <?php 
                    // Check if the house is booked
                    $query3 = mysqli_query($con, "SELECT house_id FROM bookings WHERE house_id='$house_id1' UNION SELECT house_id FROM bookings_urgent WHERE house_id='$house_id1'"); 
                    if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                    $row3 = mysqli_fetch_assoc($query3);
                    $house_id11 = $row3['house_id'] ?? null;

                    ?>
               
                <!--Property start-->
                  
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40"> 
                    <div class="property-inner">
                    
                        <div class="image">
                            <?php 
                            if ($multiple_room=='yes') {

                                  // write a code to show if it is negotiable begin
                               

                                // write a code to show if it is negotiable end
                                // code...
                            
                                if ($how_many_multiple_room==0) {
                                    //it will display an image of allbooked
                                    ?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>


                           <?php }
                            
                        }//end of multiple room

                        //begin of not multiple room
                        elseif ($multiple_room=='no'){

                              

                                // write a code to show if it is negotiable end

                            if ($house_id1==$house_id11) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }

                                elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }

                           }// end


                            if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>



                            <a href="details.php?id=<?php echo $id; ?>" ><img src='assets/images/property/<?php echo $house_img2; ?>' alt=""></a>
                              <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance2?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom2?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen2?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="content">

                            <div class="left">
                                <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($house_location).', ' . $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                   <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                                <?php
                                     if ($negotiable=='yes') { ?>
                                     <a href="details.php?id=<?php echo $id; ?>"> <span class="type" style=""><?php echo strtoupper("negotiable"); ?></span></a>
                               
                                
                                <?php }else{ 

                                }
                                    ?>
                                </div>
                            </div>
                             <?php 
                             if ($multiple_room=='yes' &&$how_many_multiple_room!=0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }elseif ($multiple_room=='yes' && $how_many_multiple_room==0) { ?>
                                 <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }
                            
                            ?>
                        </div>
                 
                    </div>
                 
                </div>
                          <?php 
                }
                    ?>
                <!--Property end-->
               
                
                
            </div>
            
        </div>
    </div>
    <!--New property section end-->

     <!--Download apps section start-->
    <div class="download-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50" style="background-image: url(assets/images/bg/download-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!--Download Content start-->
                    <div class="download-content">
                        <h1 style="font-size: 20px;">Coming Soon.... <br> <span>HouseMadeeasy</span> App </h1>
                        <div class="buttons">
                            <a href="#">
                                <i class="fa fa-apple"></i>
                                <span class="text">
                                    <span>Available on the</span>
                                    Apple Store
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-android"></i>
                                <span class="text">
                                    <span>Get it on</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-windows"></i>
                                <span class="text">
                                    <span>Download from</span>
                                    Windows Store
                                </span>
                            </a>
                        </div>
                        <div class="image"><img src="assets/images/others/app4.png" alt=""></div>
                    </div>
                    <!--Download Content end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->


    <!--recommende property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
         <br><br><br>
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Bedrooms  Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                  
                
                     <?php
                   //$sql = "SELECT * FROM properties where type='2 Bedroom Flat' || type='3 Bedroom Flat' || type='4 Bedroom Flat' and status='no'  order by id ASC";

                    $sql="SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
     where p.type='2 Bedroom Flat' || p.type='3 Bedroom Flat' || p.type='4 Bedroom Flat'
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $house_location=$row2['house_location'];
                      $multiple_room=$row2['multiple_room'];
                      $how_many_multiple_room=$row2['how_many_multiple_room'];
                      $house_id2=$row2['house_id'];
                      $status2=$row2['status'];
                       $agentaffilate_id=$row2['agentaffilate_id'];

                       $bathroom3=$row2['bathroom'];
                      $kitchen3=$row2['kitchen'];
                       $distance3=$row2['distance'];
                       $negotiable=$row2['negotiable'];

                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                        <?php 
                     $query3 = mysqli_query($con,"SELECT house_id FROM bookings WHERE house_id='$house_id2' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id2'"); 
                     if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id22=$row3['house_id'] ?? null;

                    ?>
                    <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">
                            <?php
                               

                            if ($multiple_room=='yes') {

                               

                                // write a code to show if it is negotiable end
                                // code...
                            
                                if ($how_many_multiple_room==0) {?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>


                           <?php }
                            
                        }//end of multiple room

                        //begin of not multiple room
                        elseif ($multiple_room=='no'){

                              

                                // write a code to show if it is negotiable end

                            if ($house_id2==$house_id22) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }

                                elseif ($status2=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }

                           }// end

                             if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1?>' alt=""></a>
                               <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance3?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom3?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen3?></span>
                                </li>
                            </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title" ><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($house_location).', ' . $location; ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                                     <?php
                                     if ($negotiable=='yes') { ?>
                                     <a href="details.php?id=<?php echo $id; ?>"> <span class="type" style=""><?php echo strtoupper("negotiable"); ?></span></a>
                               
                                
                                <?php }else{ 

                                }
                                    ?>
                                    </div>
                                </div>
                                   <?php 
                             if ($multiple_room=='yes' &&$how_many_multiple_room!=0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }elseif ($multiple_room=='yes' && $how_many_multiple_room==0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                    <!--Property end-->
                       <?php
            }
                ?>
                
             
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--recommende property section end-->

    <!--Funfact Section start-->
    <div class="funfact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                
                <!--Funfact start-->
                <?php
                              $get_products = "select * from properties";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_available_properties = mysqli_num_rows($run_products);
                            ?>
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-home"></i>
                            <h3 class="counter"><?php echo $count_available_properties;?></h3> 
                        </div>
                        <p>Total House</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                  <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-users"></i>
                            <h3 class="counter">20</h3>
                        </div>
                        <p>Happy Agent</p>
                    </div>
                </div>
                <!--Funfact end-->
                
                <!--Funfact start-->
                <div class="single-fact col-lg-4 col-6 mb-30">
                    <div class="inner">
                        <div class="head">
                            <i class="pe-7s-users"></i>
                            <h3 class="counter">150</h3>
                        </div>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!--Funfact end-->
                
              
                
            </div>
        </div>
    </div>
    <!--Funfact Section end-->


    <!--Feature property section start-->

    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
         <br><br>
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Self Contain Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                

                     <?php
                   //$sql = "SELECT * FROM properties where type='self contain' and status='no'  order by id ASC";

                       $sql="SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
        where p.type='self contain'
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";

                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $house_location=$row2['house_location'];
                      $multiple_room=$row2['multiple_room'];
                      $how_many_multiple_room=$row2['how_many_multiple_room'];
                      $house_id3=$row2['house_id'];
                      $status3=$row2['status'];
                       $agentaffilate_id=$row2['agentaffilate_id'];

                       $bathroom4=$row2['bathroom'];
                      $kitchen4=$row2['kitchen'];
                       $distance4=$row2['distance'];
                       $negotiable=$row2['negotiable'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>
                         <?php 
                     $query3 = mysqli_query($con,"SELECT house_id FROM bookings WHERE house_id='$house_id3' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id3'"); 
                     if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id33=$row3['house_id']?? null;

                    ?>

                    <!--Property start-->
                    <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">
                                <?php
                                 if ($multiple_room=='yes') {

                                

                                // write a code to show if it is negotiable end
                                // code...
                            
                                if ($how_many_multiple_room==0) {?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>


                           <?php }
                            
                        }//end of multiple room

                        //begin of not multiple room
                        elseif ($multiple_room=='no'){

                              

                                // write a code to show if it is negotiable end

                            if ($house_id3==$house_id33) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }

                                elseif ($status3=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }

                           }// end

                                 if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                               <a href="details.php?id=<?php echo $id; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                               <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance4?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom4?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen4?></span>
                                </li>
                            </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($house_location).', ' . $location; ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                                     <?php
                                     if ($negotiable=='yes') { ?>
                                     <a href="details.php?id=<?php echo $id; ?>"> <span class="type" style=""><?php echo strtoupper("negotiable"); ?></span></a>
                               
                                
                                <?php }else{ 

                                }
                                    ?>
                                    </div>
                                </div>
                                 <?php 
                             if ($multiple_room=='yes' &&$how_many_multiple_room!=0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }elseif ($multiple_room=='yes' && $how_many_multiple_room==0) { ?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                                 
                             <?php }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                  <?php
              }
                  ?>

               
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Feature property section end-->

    <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!--CTA start-->
                    <div class="cta-content text-center" >
                        <h1 style="font-size:30px">Want to <span>View</span> All apartment At Once<br></h1>
                        <div class="buttons" style="font-size:10px">
                            <!--<a href="add-properties.html">Add Property</a>-->
                            <a href="view-all-properties.php" >Browse through our Catalogue</a>
                            
                        </div>
                    </div>
                    <!--CTA end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->

 

  <!--single property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
         <br><br>
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Single Room Apartment</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                
                      <?php
                   //$sql = "SELECT * FROM properties where type='single room' and status='no'   order by id ASC";

                       $sql="SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
     where p.type='single room'
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $house_label=$row2['house_label'];
                      $id=$row2['id'];
                      $house_location=$row2['house_location'];
                      $multiple_room=$row2['multiple_room'];
                      $how_many_multiple_room=$row2['how_many_multiple_room'];
                      $status4=$row2['status'];
                        $house_id4=$row2['house_id'];
                         $agentaffilate_id=$row2['agentaffilate_id'];

                         $bathroom5=$row2['bathroom'];
                      $kitchen5=$row2['kitchen'];
                       $distance5=$row2['distance'];
                       $negotiable=$row2['negotiable'];
                      //$house_img1 = (!empty($row2['profilepics'])) ? '../student/img/'.$row2['profilepics'] : '../student/img/profile.png';    
                      ?>

                      <?php 
                     $query3 = mysqli_query($con,"SELECT house_id FROM bookings WHERE house_id='$house_id4' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id4'"); 
                     if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id44=$row3['house_id'] ?? null;

                    ?>
                    <!--Property start-->
                    <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">

                                 <?php
                                  if ($multiple_room=='yes') {

                                    
                                // code...
                            
                                if ($how_many_multiple_room==0) {?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>


                           <?php }
                            
                        }//end of multiple room

                        //begin of not multiple room
                        elseif ($multiple_room=='no'){

                             

                            if ($house_id4==$house_id44) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }

                                elseif ($status4=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }

                           }// end

                                  if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                <a href="details.php?id=<?php echo $id; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                                <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance5?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom5?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen5?></span>
                                </li>
                            </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name?></a></h3>
                                   <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($house_location).', ' . $location; ?></span>
                                </div>
                                 <div class="right">
                                    <div class="type-wrap">
                                        <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                        <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                                     <?php
                                     if ($negotiable=='yes') { ?>
                                     <a href="details.php?id=<?php echo $id; ?>"> <span class="type" style=""><?php echo strtoupper("negotiable"); ?></span></a>
                               
                                
                                <?php }else{ 

                                }
                                    ?>
                                    </div>
                                </div>
                                <?php 
                             if ($multiple_room=='yes' &&$how_many_multiple_room!=0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }elseif ($multiple_room=='yes' && $how_many_multiple_room==0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                                 
                             <?php }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                    <!--Property end-->
                    <?php 
                }
                    ?>

                
                <!--Property Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--single property section end-->


 
    
   <?php  include ('inc/footer.inc.php');   ?>