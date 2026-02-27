<?php  
include ('inc/session.php');  
include("../inc/connect.inc.php");

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
        // $house_name2=str_replace("-", " ", $house_name2);
        $sql ="SELECT * FROM short_term_rentals_properties WHERE id='$id' ";
$result = mysqli_query($con,$sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($posts as $post):
            $_SESSION['agent_pno']=$post['agent_pno'];
            $_SESSION['agent_img']=$post['agent_img'];
            $_SESSION['agent_email']=$post['agent_email'];
           
             $_SESSION['house_img1']=$post['house_img1']; 
                $_SESSION['house_label']=$post['house_label'];
                      //$_SESSION['first_year_rent']=$post['first_year_rent'];
                     $_SESSION['location']=$post['location'];
                     $_SESSION['house_name']=$post['house_name'];
                       $_SESSION['agent']=$post['agent'];
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
                    $_SESSION['house_location']=$post['house_location'];
                    $_SESSION['water_source']=$post['water_source'];
                   // $_SESSION['first_year_rent']=$post['first_year_rent'];
                    //$_SESSION['second_year_rent']=$post['second_year_rent'];
                    $_SESSION['house_id']=$post['house_id'];
                    $_SESSION['multiple_room']=$post['multiple_room'];
                    $_SESSION['how_many_multiple_room']=$post['how_many_multiple_room'];
                     $_SESSION['house_owner']=$post['house_owner'];
                     $_SESSION['youtube_link']=$post['youtube_link'];
                   
                    
                      $id=$post['id'];
                      $house_id1=$post['house_id'];
                      $status=$post['status'];
                        
                     $query3 = mysqli_query($con,"SELECT * FROM bookings WHERE house_id='$house_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id11=$row3['house_id'];
                    
                      //exit();
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
      <!--Start of Tawk.to Script-->
<!--End of Tawk.to Script-->
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
                                <li ><a href="housemadeeasy-logistics.php" style="text-decoration: none;">Logistics</a>
                                   
                                </li>
                                <li ><a href="home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>
                                 <li ><a href="marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 
                                <li ><a href="../housemadeeasy/flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
                                </li> 
                                <!-- <li ><a href="short-term-stay.php" style="text-decoration: none;">Short term Rentals</a>
                                   
                                </li> -->
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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/shortrentals2.jpg)">
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
                                           <?php 
                             if ($post['multiple_room']=='yes') {?>
                                <span  style="font-weight:bolder; font-size: 15px;"><?php echo $post['how_many_multiple_room'] ?> Room left</span>
                             <?php }else{
                                
                             }
                            
                            ?>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            
                                            
                                            <span class="type"><?php echo ucwords($post['house_label']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="image mb-30"> 
                                                <?php 
                                                   if ($post['multiple_room']=='yes') {
                                // code...
                            
                                if ($post['how_many_multiple_room']==0) {
                                    //it will display an image of allbooked
                                    ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 20px 50px 140px; width: 50%; height: 50%; " > 
                                </span>
                                </a>
                           <?php }
                            elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                <span class="label4">
                                <img src="assets/images/notavailable/unnew.png" style="   margin: 50px 20px 50px 140px; width: 50%; height: 50%;  " >
                                </span>
                               
                               <?php }
                            
                        }//end of multiple room
                        //begin of not multiple room
                        elseif ($post['multiple_room']=='no'){
                            if ($house_id1==$house_id11) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 
                                <span class="label4">
                               <img src="assets/images/notavailable/4new.png" class="img-responsive" style="  margin: 50px 20px 50px 140px; width: 50%; height: 50%; " > 
                                </span>
                                
                            <?php }
                                elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                <span class="label4">
                                <img src="assets/images/notavailable/unnew.png" style="   margin: 50px 20px 50px 140px; width: 50%; height: 50%;  " >
                                </span>
                               
                               <?php }
                           }//end
                               ?>
                                    <div class="single-property-gallery">
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img4']; ?>" alt=""></div>
                                    </div>
                                    <div class="single-property-thumb">
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/short-term-stay/<?php echo $post['house_img4']; ?>" alt=""></div>
                                    </div>
                                </div>
                           <style type="text/css">
                
                .embed-responsive-9by16 {
    position: relative;
    width: 100%;
    padding-bottom: 177.78%; /* 16:9 is 56.25%, so 9:16 is 177.78% */
    height: 0;
}
.embed-responsive-9by16 .embed-responsive-item,
.embed-responsive-9by16 iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
            </style>
<div class="embed-responsive embed-responsive-9by16">
    <?php
    // Get the YouTube link from the database
    $youtubeLink = $post['youtube_link'];
    if (strpos($youtubeLink, '/shorts/') !== false) {
        // Convert Shorts link to standard embed format
        $videoId = explode('/shorts/', $youtubeLink)[1];
        $videoId = strtok($videoId, '?'); // Remove any query parameters
        $embedUrl = "https://www.youtube.com/embed/$videoId";
    } elseif (strpos($youtubeLink, 'youtu.be/') !== false) {
        // Handle shortened YouTube links
        $videoId = explode('youtu.be/', $youtubeLink)[1];
        $videoId = strtok($videoId, '?'); // Remove any query parameters
        $embedUrl = "https://www.youtube.com/embed/$videoId";
    } else {
        // For regular YouTube links, convert to embed format
        $embedUrl = str_replace('watch?v=', 'embed/', $youtubeLink);
        $embedUrl = strtok($embedUrl, '&'); // Remove additional query parameters 
    }
    // Append autoplay parameter
    $embedUrl .= '?autoplay=1';
    ?>
    <iframe 
        class="embed-responsive-item"
        src="<?php echo htmlspecialchars($embedUrl); ?>" 
        allow="autoplay; encrypted-media" 
        allowfullscreen>
    </iframe>
</div>
<br>
                                
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
                                                
                                                <li>Tiled - <?php // door is tiles
                                                echo $post['door']; ?></li>
                                                <li> Fenced - <?php echo $post['fence']; ?></li>
                                                <li><?php echo $post['kitchen']; ?> Kitchen</li>
                                               
                                                <li><?php echo $post['bathroom']; ?> Bathroom  <!--Bathroom containig shower or tap--></li><br>
                                                
                                                
                                                
                                                <li>Toilet- <?php // amenities is type of toilet
                                                echo $post['amenities']; ?><!--water closet, pit latrine--></li>
                                         
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                  
                                  
                                             <br>
                                                
                                            </span>
                                          
                                    <!-- Breakdown of House Rent end--->
                                        <br>
                                        <br>
                               <?php
 $embedUrl = $post['youtube_link'];
 $house_name = $post['house_name'];
 //$first_year_rent = $post['first_year_rent'];
 //$second_year_rent = $post['second_year_rent'];
                // Predefine messages for each house type
 // Predefine messages for each house type
$houseMessages = [
    "Single room with shared toilet and bathroom" => "
    Hello, i like this Single room with shared toilet and bathroom
{{embedUrl}}
 
https://housemadeeasy.com.ng/details.php?id={{id}}
How can i get this apartment ?
    ",
     "Single room with personal toilet and bathroom" => "
Hello, i like Single room with personal toilet and bathroom
 {{embedUrl}}
 
https://housemadeeasy.com.ng/details.php?id={{id}}
 How can i get this apartment ?
     ",
    "Self contain" => "
    Hello, i like this Self contain
{{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
How can i get this apartment ?
    ",
     "Room and Palour Self contained" => "
Hello, i like this Room and Palour Self contained
 
{{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
How can i get this apartment ?
    ",
   
    "Two bedroom flat with shared toilet and bathroom" => "
    Hello, i like this Two bedroom flat with shared toilet and bathroom
{{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
How can i get this apartment ?
    ",
    "Two bedroom flat with personal toilet in each room" => "
    
Hello, i like this Two bedroom flat with personal toilet in each room
{{embedUrl}} 
How can i get this apartment ?
 
https://housemadeeasy.com.ng/details.php?id={{id}}
    ",
    "Three bedroom flat with one bathroom and toilet" => "
   Hello, i like this Three bedroom flat with one bathroom and toilet
 {{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
    ",
  
    "Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet" => "
    Hello, i like this Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet
{{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
    ",
    "Three bedroom flat with personal toilet and bathroom each" => "
   Hello, i like this three-bedroom flat with personal bathrooms for every room 
{{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
How can i get this apartment ?
    ",
 "Four bedroom flat with personal toilet and bathroom each" => "
 Hello, i like this four-bedroom flat with personal bathrooms for every room!
  {{embedUrl}}
https://housemadeeasy.com.ng/details.php?id={{id}}
 How can i get this apartment ?
    ",
 
];
 
            ?>
                                                    <?php
// Check if there's a predefined message for this house type
$house_message_template = $houseMessages[$house_name] ?? null;
if ($house_message_template) {
    // Replace placeholders with actual values
    $house_message = str_replace(
        ['{{embedUrl}}',  '{{id}}'],
        [ $embedUrl, $id],
        $house_message_template
    );
    $whatapp=  $post['agent_pno'];
    // Encode message for WhatsApp sharing
    $whatsapp_message = urlencode($house_message);
    $whatsapp_link = "https://wa.me/+2348160852570?text=$whatsapp_message";
?>
    
    <!-- WhatsApp Share Button -->
    <a class="btn btn-danger btn-flat" href="<?php echo $whatsapp_link; ?>" style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;"><img src="whatsapp2.png" height="20" width="20" style=""> Message the agent in charge of the house directly</a>
<?php
}
else {
    // Default share message if house type is not predefined
    $default_message = "Check out this property: $house_name located at $location.  $embedUrl View more details: https://housemadeeasy.com.ng/details.php?id=$id";
    $whatsapp_link = "https://wa.me/+2348160852570?text=" . urlencode($default_message);
?>
    
    <!-- WhatsApp Share Button -->
    
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    
<?php } ?>
                                       
                                   
                                    <!-- end of booking an apartment--->
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                        ?>
                        
                    </div>
                </div> <!--display house end-->
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Search House</span><span class="shape"></span></h4>
                        
                    
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
                           <!---- <div class="form-group">
                                <select class="form-control" name="price" required>
                                    <option value="" required>Price</option>
                                    <?php 
                              /*
                              $get_cat = "select * from properties";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  //$cat_id = $row_cat['cat_id'];
                                  $first_year_rent = $row_cat['first_year_rent'];
                                  
                                  echo "
                                  
                                  <option> $first_year_rent </option>
                                  
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
                        <h4 class="sidebar-title"><span class="text">Similar House</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                            <?php 
                            $defined=$post['type']; 
                              $sql = "SELECT * FROM properties where type LIKE '%$defined%' and  status='no' order by id ASC";
                    $query = $con->query($sql);
                     if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      $house_id1=$row2['house_id'];
                      $house_name2=$row2['house_name'];
                      $status=$row2['status'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                            ?>
                              <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM bookings WHERE house_id='$house_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id11=$row3['house_id'];
                    ?>
                            <div class="sidebar-property">
                                <div class="image">
                                     <?php 
                            if ($house_id1==$house_id11) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style="  padding: 20px;" > 
                                </span> 
                                </a>
                            <?php }
                                elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px ;  " >
                                </span>
                                </a> 
                               <?php }
                                        if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                    <span class="price">#<?php echo $first_year_rent?> </span>
                                </div>
                            </div>
                            
                          
                            <?php } } else{
                                 echo " Similar House  was not found";
                            } ?>
                            
                            
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
                    if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                      $id=$row2['id'];
                      $house_name=$row2['house_name'];
                      $house_name2=$row2['house_name'];
                      $status2=$row2['status'];
                      $house_id2=$row2['house_id'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                            ?>
                                   <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM bookings WHERE house_id='$house_id2'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id22=$row3['house_id'];
                    ?>
                              <div class="sidebar-property">
                                <div class="image">
                                           <?php 
                            if ($house_id2==$house_id22) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style=" padding: 20px" > 
                                </span>
                                </a>
                            <?php }
                                elseif ($status2=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px " >
                                </span>
                                </a> 
                               <?php }
                                        if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                    <span class="price">#<?php echo $first_year_rent?> </span>
                                </div>
                            </div>
                            
                           
                            <?php } }else{
                                 echo " Popular House  was not found";
                            } ?>
                            
                            
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
    <!-- pop up modal -->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 style="text-align: center;" class="modal-title">
                     <i class=""></i> Booking Detail's
                     </h4> 
                  </div> 
                       <div class="modal-body"> 
   
           <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 ml-auto mr-auto">
                    
                    <ul class="login-register-tab-list nav"> 
                        <li><a class="active" href="#login-tab" data-toggle="tab">Request Form!!</a></li><br><br>
                         <p style=" font-weight: bolder; text-align: center;">Looking for an apartment that you can stay for a short period (1 month or more)!!<br> Fill this form and make your request know to us. <br>For any request you made, We'll get back to you within 24hours.</p>
                         
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="short-term-stay-process.php" method="POST" >
                                 <p id="response" style="font-weight:bolder;"></p>  
                                <div class="row">
                                    
                                       
                                        
                               
                            <div class="col-12 mb-30">
                                            <label class="col-12" style="font-weight:bolder;">Preferred date the apartment will be needed </label>
                                        <input type="date" name="dateneeded" required class="form-control form-height-custom"  placeholder="">
                                        </div>
                                      <div class="col-12 mb-30">
                                          <select class="form-control" name="monthofstay" >
                                    <option value="" >How many months do you intend to stay in the apartment ? </option>
                                  
                                         <option value="1 Month">1 Month</option>
                             <option value="2 Month">2 Month</option>
                             <option value="3 Month">3 Month</option>
                             <option value="4 Month">4 Month</option>
                             <option value="5 Month">5 Month</option>
                             <option value="6 Month">6 Month</option>
                             <option value="7 Month">7 Month</option>
                             <option value="8 Month">8 Month</option>
                             <option value="9 Month">9 Month</option>
                             <option value="10 Month">10 Month</option>
                             <option value="11 Month">11 Month</option>
                    
 
                                 
                                   
                                </select>
                            </div>
                                        <div class="col-12 mb-30">
                                        <input type="text" name="people" class="form-control form-height-custom"  placeholder="How many people want to stay in the apartment">
                                        </div>
                                        
                                       
                                         
                               
                                  
            
                                    
                                   
                                    <div class="col-12 mb-30"><input type="submit" value="Submit Request" class="btn btn-lg btn-theme btn-block btn-flat" name="submitrequest"> </div>
                                    
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
          
    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       
        
   
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div> 
    <!-- pop up modal end -->
    <!--whatapp chat icon-->
   
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+Drop+your+Complain+here+and+we+would+respond+to+them+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    <?php  include ('inc/footer.inc.php');   ?>
    <script type="text/javascript">
        function notalreadyloginIn(){
alert('Login/Register first before you can book your time of stay ...');
                                         window.location.href='login.php';
         }
    </script>
<!-- <script type="text/javascript">
    window.addEventListener('load', function(){
      });
    function alreadyloginIn(){
       swal({
  title: "Kindly pay attention and consciously read this?",
  text: "You have clicked to book an appointment with the agent of this house.You would be paying an unredeemable sum of one thousand five hundred naira(#1,500) after clicking the I Agree icon. After Paying, you would be giving a time(tomorrow) to come and check the house. Note that you must make yourself available this time that you have picked otherwise, you may have to pay another (#1,500) to book another appointment. After picking the time, call the agent, introduce yourself and inform him that you will be coming by (the time you chose) to check the house.",
  buttons: [true, "I Agree!"],
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    payWithPaystack();
  } else {
    //swal("Your imaginary file is safe!");
  }
});
    
    }
</script>  -->
    <script>
// function payWithPaystack(e) {
//   let handler = PaystackPop.setup({
//     key: 'pk_test_ac9ec15d0168a4feddced75826c3ea5488056c46', // Replace with your public key 
//     email: '<?php  echo $email2;?>',
//     amount: '<?php echo $amount2; ?>' * 100,
//     firstname: '<?php echo $fname ; ?>',
//     lastname: '<?php echo $lname; ?>',
//     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
//     // firstname: '<?php //echo $firstname ; ?>',
//       //lastname: "<?php //echo $lastname; ?>",
//     // label: "Optional string that replaces customer email" 
//     /*
//          metadata: {
//          custom_fields: [
//             {
//                 display_name: "<?php //echo $firstname?>",
//                 variable_name: "<?php //echo $lastname?>",
//                 value: "<?php //echo $email; ?>"
//             }
//          ]
//       },*/ 
      
//     onClose: function(){
//       alert('Transaction Cancelled.');
//     },
//     callback: function(response){
//       //const referenced = response.reference;
//      // $referenced2=$_SESSION['referenced'];
      
//        window.location="print-receipt.php?reference=" + response.reference;
//     }
//   });
//   handler.openIframe(); 
// }
</script>
