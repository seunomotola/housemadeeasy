<?php  
include ('inc/session.php'); 
//include ('inc/connect.inc.php'); 
$basename= basename($_SERVER['PHP_SELF']);
$domain= str_replace("$basename", "", $_SERVER['PHP_SELF']); 
    ?>
<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from template.hasthemes.com/khonike/khonike/single-properties-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:26:05 GMT -->
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge"> 
    <?php
         $id = $_GET['id'];
         $key = $_GET['key'];
         $user_id=$_SESSION['user_id'];
        // $house_name2=str_replace("-", " ", $house_name2);
        $sql ="SELECT * FROM bookings WHERE user_id='$user_id' AND house_id='$key'";
$result = mysqli_query($con,$sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($posts as $post):
           // $_SESSION['id']=$found_user['id'];
             $_SESSION['house_img1']=$post['house_img1']; 
                $_SESSION['house_label']=$post['house_label'];
                      $_SESSION['house_price']=$post['house_price'];
                     $_SESSION['location']=$post['location'];
                     $_SESSION['house_name']=$post['house_name'];
                       $_SESSION['agent']=$post['agent'];
                       $_SESSION['agent_img']=$post['agent_img'];

                       $_SESSION['location']=$post['location'];
                         $_SESSION['house_location']=$post['house_location'];
                          $_SESSION['type']=$post['type'];
                         
                     $_SESSION['house_img2']=$post['house_img2'];
                     $_SESSION['house_img3']=$post['house_img3'];
                    $_SESSION['house_img4']=$post['house_img4'];
                    $_SESSION['house_desc']=$post['house_desc'];
                    $_SESSION['amenities']=$post['amenities'];
                    $_SESSION['distance']=$post['distance'];
                    $_SESSION['kitchen']=$post['kitchen'];
                    $_SESSION['bathroom']=$post['bathroom'];
                    $_SESSION['door']=$post['door'];
                    $_SESSION['fence']=$post['fence'];
                    $_SESSION['water_source']=$post['water_source'];
                      $_SESSION['agent_pno']=$post['agent_pno'];
            $_SESSION['agent_email']=$post['agent_email'];
                 $_SESSION['first_year_rent']=$post['first_year_rent'];
            $_SESSION['second_year_rent']=$post['second_year_rent'];
                   
                    
                      $id=$post['id'];

           ?>
    <title><?php echo $post['house_name'] ?> | Housemadeeasy - Helping you to find your desire house easily</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="<?php  echo $domain; ?>assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/iconfont.min.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/plugins.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/helper.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/style.css">   
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <base href="<?php  echo $domain; ?>">
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
                            <a href="index.php"><img src="assets/images/easy2.png" style="width: 90px; height: 80px;" alt=""></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    
                    <!--Menu start-->
                    <div class="col d-none d-lg-flex">
                        <nav class="main-menu">
                                 <ul>
                                <li ><a href="index.php">Home</a>
                                    
                                </li>
                                <li class=""><a href="view-all-properties.php">View all Houses</a>
                                  
                                </li>

                                 <!--<li ><a href="how-it-works.php" style="text-decoration: none;">How it Works</a>
                                 
                                </li>-->

                                 <li ><a href="about-us.php" style="text-decoration: none;">About Us</a>
                                 
                                </li>
                                
                                <li ><a href="contact-us.php">Contact Us</a>
                                 
                                </li>
                               <?php
       if (isset($_SESSION['user_id'])){?> 
                                <li ><a href="my-account.php">Dashboard</a> </li>
                                <li ><a href="logout.php">logout</a>   </li>
                                   <?php 
                                   

                                    }else{?>

                                             <li ><a href="login.php">Login</a> </li>
                                <li ><a href="register.php">Register</a>   </li> 
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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/single-property-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title"><?php echo ucwords($post['type']); ?></h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><?php echo ucwords($post['house_name']); ?></li>
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
            
            <!--display Property start-->
                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                               
                                <div class="head">
                                    <div class="left">
                                        <h1 class="title"><?php echo ucwords($post['house_name']); ?></h1>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($post['house_location']).', ' .ucwords($post['location']); ?></span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">#<?php echo ucwords($post['house_price']); ?></span>
                                            <span class="type"><?php echo ucwords($post['house_label']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="image mb-30">
                                    <div class="single-property-gallery">
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img4']; ?>" alt=""></div>
                                    </div>
                                    <div class="single-property-thumb">
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/property/<?php echo $post['house_img4']; ?>" alt=""></div>
                                    </div>
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p><?php echo $post['house_desc']; ?>.</p>
                                  
                                    
                                    <div class="row mt-30 mb-30">
                                        
                                        <div class="col-md-5 col-12 mb-xs-30">
                                            <h3>Condition</h3>
                                            <ul class="feature-list">
                                                <li><div class="image"><img src="assets/images/icons/area.png" alt=""></div>Distance to School - <?php echo $post['distance']; ?></li>
                                                <!--<li><div class="image"><img src="assets/images/icons/bed.png" alt=""></div><?php //echo $post['Door']; ?>Door </li>-->
                                                
                                              
                                                <li><div class="image"><img src="assets/images/icons/user.png" alt=""></div> Does Landlord reside in the Apartment - <?php echo $post['house_owner']; ?></li>
                                               
                                            </ul>
                                        </div>
                                        
                                        <div class="col-md-7 col-12">
                                            <h3>Amenities</h3>
                                               <ul class="amenities-list">
                                                
                                                

                                                <li> Water Source - <?php echo $post['water_source']; ?></li>
                                                
                                                <li><?php // door is tiles
                                                echo $post['door']; ?></li>

                                                <li><?php echo $post['fence']; ?></li>

                                                <li><?php echo $post['kitchen']; ?> Kitchen</li>
                                               
                                                <li><?php echo $post['bathroom']; ?> Bathroom  <!--Bathroom containig shower or tap--></li><br>
                                                
                                                
                                                
                                                <li>Toilet- <?php // amenities is type of toilet

                                                echo $post['amenities']; ?><!--water closet, pit latrine--></li>
                                               
                                                
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                   <!-- <div class="row">
                                        <div class="col-12 mb-30">
                                            <h3>Video</h3>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8CbvItGX7Vk"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h3>Location</h3>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <div id="single-property-map" class="embed-responsive-item google-map" data-lat="40.740178" data-Long="-74.190194"></div>
                                            </div>
                                        </div>
                                    </div>-->

                                    <!-- begin of booking an apartment--->
                                    <h4>Thank You For Booking this Apartment.</h4><br> <p>Below are the details of the house and agent of the house:</p>
                                     
                                            
                                            <ol>
                                                <li>Agent Image:<br> <img  style="padding: 5px" src="assets/images/agent_img/<?php echo $_SESSION['agent_img']; ?>" class="img-fluid" width="100" height="100"> </li>
                                                <li>Agent Name: <?php echo ucwords($_SESSION['agent']); ?></li>
                                                <li>Agent Phone Number: <?php echo $_SESSION['agent_pno']; ?></li>
                                                <li>Agent E-mail: <?php echo $_SESSION['agent_email']; ?></li>

                                                <li>House Type: <?php echo $_SESSION['house_name']; ?> </li>
                                                <li>Location: <?php echo $_SESSION['house_location']; ?></li>
                                                <li>First Year Price: #<?php echo $_SESSION['first_year_rent']; ?></li>
                                                <li>Subsquent Price: #<?php echo $_SESSION['second_year_rent']; ?></li>
                                                
                                                                                              
                                                
                                                
                                            </ol><br><br>
                                       
                                              <div>
                                                <h4 style="color:green; font-weight:bolder;">Thank You for having the trust in Us to help you to find your desire house....... </h4>
                            
                                 
                            </div>
                                    <!-- end of booking an apartment--->
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                        ?>
                        <!--Property end-->
                        
                        <!--Comment start-->
                       <!-- <div class="comment-wrap col-12">
                            <h3>3 Feedback</h3>

                            <ul class="comment-list">
                                <li>
                                    <div class="comment">
                                        <div class="image"><img src="assets/images/review/review-1.jpg" alt=""></div>
                                        <div class="content">
                                            <h5>Alvaro Santos</h5>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <span class="time">10 August, 2018  |  10 Min ago</span>
                                                <a href="#" class="reply">reply</a>
                                            </div>
                                            <div class="decs">
                                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="child-comment">
                                        <li>
                                            <div class="comment">
                                                <div class="image"><img src="assets/images/review/review-2.jpg" alt=""></div>
                                                <div class="content">
                                                    <h5>Silvia Anderson</h5>
                                                    <div class="d-flex flex-wrap justify-content-between">
                                                        <span class="time">10 August, 2018  |  25 Min ago</span>
                                                        <a href="#" class="reply">reply</a>
                                                    </div>
                                                    <div class="decs">
                                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="image"><img src="assets/images/review/review-3.jpg" alt=""></div>
                                        <div class="content">
                                            <h5>Nicolus Christopher</h5>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <span class="time">10 August, 2018  |  35 Min ago</span>
                                                <a href="#" class="reply">reply</a>
                                            </div>
                                            <div class="decs">
                                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <h3>Leave a Feedback</h3>

                            <div class="comment-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-30"><input type="text" placeholder="Name"></div>
                                        <div class="col-md-6 col-12 mb-30"><input type="email" placeholder="Email"></div>
                                        <div class="col-12 mb-30"><textarea placeholder="Message"></textarea></div>
                                        <div class="col-12"><button class="btn">send now</button></div>
                                    </div>
                                </form>
                            </div>
                        
                        </div>--->
                        <!--Comment end-->

                    </div>
                </div> <!--display house end-->
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Search Property</span><span class="shape"></span></h4>
                        
                    
                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">

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

                            <!----  <div class="form-group">
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

                        </div>
                        <!--Property Search end-->
                        
                    </div>
                    <!--Sidebar end-->
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Similar Property</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                            <?php 
                            $defined=$post['type'];
                              $sql = "SELECT * FROM properties where type='$defined' and status='no' order by id ASC";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                            ?>
                            <div class="sidebar-property">
                                <div class="image">
                                       <?php if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                    <span class="price">#<?php echo $house_price?> </span>
                                </div>
                            </div>
                            
                          
                            <?php } ?>
                            
                            
                        </div>
                        <!--Sidebar Property end-->
                        
                    </div>
                    
                   <!--Sidebar popular start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular House</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                              <?php 
                            $defined=$post['type'];
                              $sql = "SELECT * FROM properties where status='no' order by rand() LIMIT 0,3";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $id=$row2['id'];
                      $house_name=$row2['house_name'];
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                            ?>
                              <div class="sidebar-property">
                                <div class="image">
                                       <?php if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                    <span class="price">#<?php echo $house_price?> </span>
                                </div>
                            </div>
                            
                           
                            <?php } ?>
                            
                            
                        </div>
                        <!--Sidebar Property end-->
                        
                    </div>
                    <?php 
                     $query2 = mysqli_query($con,"SELECT * FROM amount_to_pay"); 
                      $row = mysqli_fetch_assoc($query2);
                      $_SESSION['amount']=$row['amount'];
                      $amount2=$_SESSION['amount'];

                    ?>
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular Tags</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Tags start-->
                        <div class="sidebar-tags">
                            <a href="#">Houses</a>
                            <a href="#">Real Home</a>
                            <a href="#">Baths</a>
                            <a href="#">Beds</a>
                            <a href="#">Garages</a>
                            <a href="#">Family</a>
                            <a href="#">Real Estates</a>
                            <a href="#">Properties</a>
                            <a href="#">Location</a>
                            <a href="#">Price</a>
                        </div>
                        <!--Sidebar Tags end-->
                    
                    </div>
            
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->
     
       <!--whatapp chat icon-->
   
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+Drop+your+Complain+here+and+we+would+respond+to+them+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
      
    <?php  include ('inc/footer.inc.php');   ?>
  