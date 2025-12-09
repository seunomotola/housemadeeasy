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
        // $house_name2=str_replace("-", " ", $house_name2);
        $sql ="SELECT * FROM properties WHERE id='$id' ";
$result = mysqli_query($con,$sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($posts as $post):
            $_SESSION['agent_pno']=$post['agent_pno'];
            $_SESSION['agent_img']=$post['agent_img']; 
            $_SESSION['agent_email']=$post['agent_email'];
             $_SESSION['agentaffilate_id']=$post['agentaffilate_id'];
           
             $_SESSION['house_img1']=$post['house_img1']; 
                $_SESSION['house_label']=$post['house_label'];
                      $_SESSION['first_year_rent']=$post['first_year_rent'];
                     $_SESSION['location']=$post['location'];
                     $_SESSION['house_name']=$post['house_name'];
                       $_SESSION['agent']=$post['agent'];
                       $_SESSION['location']=$post['location'];
                         $_SESSION['house_location']=$post['house_location'];
                          $_SESSION['type']=$post['type'];
                          $_SESSION['negotiable']=$post['negotiable'];
                         
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
                    $_SESSION['first_year_rent']=$post['first_year_rent'];
                    $_SESSION['second_year_rent']=$post['second_year_rent'];
                    $_SESSION['negotiable']=$post['negotiable'];
                    $_SESSION['house_id']=$post['house_id'];
                    $_SESSION['multiple_room']=$post['multiple_room'];
                    $_SESSION['how_many_multiple_room']=$post['how_many_multiple_room'];

                     $_SESSION['house_owner']=$post['house_owner'];
                     $_SESSION['youtube_link']=$post['youtube_link'];
                   
                    $location=$post['location'];
                      $id=$post['id'];
                      $_SESSION['house_id1']=$post['house_id'];
                       $_SESSION['status']=$post['status'];

              
// Fetch house IDs from bookings and bookings_urgent to check for conflicts
$house_id_union = mysqli_real_escape_string($con, $_SESSION['house_id1']);
$query3 = "
    SELECT house_id FROM bookings WHERE house_id='$house_id_union' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id_union'
";
$result3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_assoc($result3);
$_SESSION['house_id11'] = $row3['house_id'];




                    
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->  
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
            height: 24px;
        }
        #cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
         .modal-footer .btn {
            
            font-size: 14px;
        }

        
       .blinking-text {
        animation: blinkTextOnly 1.5s infinite; /* Adjust speed as needed */
        color: green; /* Initial text color */
        font-weight: bold; /* Optional: Add emphasis */
    }

    @keyframes blinkTextOnly {
        0% { color: green; }
        50% { color: transparent; } /* Makes the text disappear */
        100% { color: green; }
    }

      .blinking-text2 {
        animation: blinkTextOnly2 1.5s infinite; /* Adjust speed as needed */
        color: red; /* Initial text color */
        font-weight: bold; /* Optional: Add emphasis */
    }

    @keyframes blinkTextOnly2 {
        0% { color: red; }
        50% { color: transparent; } /* Makes the text disappear */
        100% { color: red; }
    }




    </style>

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
                                 <!-- <li ><a href="my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li>  -->
                                  <?php 
                                   

                                  //else{?>

                                             <!-- <li ><a href="login.php" style="text-decoration: none;">Login</a> </li>
                                 <li ><a href="register.php" style="text-decoration: none;">Register</a>   </li> --> 
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
                                        <h3 class="title"><?php echo ucwords($post['house_name']); ?></h3>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($post['house_location']).', ' .ucwords($post['location']); ?></span>
                                           <?php 
                                           //echo $_COOKIE['referral_code'] ?? null;
                             if ($post['multiple_room']=='yes') {?>
                                <span  style="font-weight:bolder; font-size: 15px;"><?php echo $post['how_many_multiple_room'] ?> Room left</span>
                             <?php }else{
                                
                             }
                            
                            ?>
                                    </div>
                                    <?php


 $embedUrl = $post['youtube_link'];
 $house_name = $post['house_name'];


                                            
// Clean input values
$house_rent = (int)str_replace(',', '', $post['house_rent']);
$first_year_rent = (int)str_replace(',', '', $post['first_year_rent']);


 $agent_fees = (int)str_replace(',', '', $post['agent_fees']);

$initial_payment2 = $first_year_rent - $agent_fees;

$initial_payment=number_format($initial_payment2);




                // Predefine messages for each house type
 // Predefine messages for each house type
$houseMessages = [
    "Single room with shared toilet and bathroom" => "
    Hello,

A Single room in a cool student hall, available now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

    "Single room in a flat with shared toilet and bathroom" => "
    Hello,

A Single room in a flat with shared toilet and bathroom is available now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

     "Single room with personal toilet and bathroom" => "


Hello,

Single room with a private bathroom and toilet is available now 

 {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW



https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

     ",

    "Self contain" => "
    Hello,


A single room self-contained unit just landed on Housemadeeasy, and it's perfect for you!
No sharing a kitchen or bathroom!

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",


     "One bedroom flat" => "

  Be Your Own Boss! One bedroom flat Available Now!

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",
   
    "Two bedroom flat with shared toilet and bathroom" => "

    Hello, 

A brand new 2-bedroom flat is now available on Housemadeeasy, perfect for you and your bestie (or study buddy)!  

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

    "Two bedroom flat with personal toilet in each room" => "

    
Hello, 


A brand new 2-bedroom flat just landed on Housemadeeasy, and guess what?  *Each room has its own private bathroom!*   


This is perfect for you and your bestie (or study buddy!).  

{{embedUrl}} 
 
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

    "Three bedroom flat with one bathroom and toilet" => "


   Hello,

We have a 3-bedroom flat perfect for you and your roommates with 1 shared bathroom and toilet.

 {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

  

    "Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet" => "
    Hello,

We've got a brand new 3-bedroom flat with a master suite (bathroom included!) and a shared bathroom for the other two rooms!


{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

    "Three bedroom flat with personal toilet and bathroom each" => "

    A three-bedroom flat with personal bathrooms for every room is available  now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

 "Four bedroom flat with personal toilet and bathroom each" => "

 A  four-bedroom flat with personal bathrooms for every room!

  {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team


    ",

 
];

 
            
                                 
                                    ?>
                                 <div class="right">
    <div class="type-wrap">
        <span class="price" style="font-weight: bold;">
            #<?php echo ucwords($post['first_year_rent']); ?>
        </span>
    
        <div style="display: flex; align-items: center; gap: 15px;">
            <!--  <?php //if ($post['negotiable'] == 'yes') { ?>
            <span class="type">
                <?php //echo ucwords("negotiable"); ?>
             </span> -->
        <!-- <?php //}?> -->
       
        
        <?php if ($post['status'] == 'no') { ?>
            <span class="type">
                <?php echo  '<span class="blinking-text" style="font-weight:bolder; color: green;">Available</span>' ?>
            </span> 
        <?php }else{
            echo '<span class="type">
                <span class="blinking-text2" style="font-weight:bolder; color: red;">Unavailable</span>
            </span>';
        } ?>


            <?php
// Check if there's a predefined message for this house type
$house_message_template = $houseMessages[$house_name] ?? null;

if ($house_message_template) {
    // Replace placeholders with actual values
    $house_message = str_replace(
        ['{{first_year_rent}}', '{{initial_payment}}', '{{embedUrl}}',  '{{id}}'],
        [number_format($first_year_rent), $initial_payment, $embedUrl, $id],
        $house_message_template
    );

    // Encode message for WhatsApp sharing
    $whatsapp_message = urlencode($house_message);
    $whatsapp_link = "https://wa.me/?text=$whatsapp_message";
?>
    
    <!-- WhatsApp Share Button -->
    <span class="type">
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    </span>

<?php
} else {
    // Default share message if house type is not predefined

    $default_message = "Check out this property: $house_name located at $location. Price: #$first_year_rent. $embedUrl View more details: https://housemadeeasy.com.ng/details.php?id=$id";
    $whatsapp_link = "https://wa.me/?text=" . urlencode($default_message);
?>
    
    <!-- WhatsApp Share Button -->
    <span class="type">
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    </span>

<?php } ?>
    </div>
    </div>
</div>

                                </div>
                                
                                

                                <div class="image mb-30"> 
                                                <?php 
                                                   if ($post['multiple_room']=='yes') {

                                                     // write a code to show if it is negotiable begin
                              

                                // write a code to show if it is negotiable end
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
                            elseif ($_SESSION['status']=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                <span class="label4">
                                <img src="assets/images/notavailable/unnew.png" style="   margin: 50px 20px 50px 140px; width: 50%; height: 50%;  " >
                                </span>
                               
                               <?php }
                            
                        }//end of multiple room

                        //begin of not multiple room
                        elseif ($post['multiple_room']=='no'){

                             // write a code to show if it is negotiable begin
                               

                                // write a code to show if it is negotiable end

                            if ($_SESSION['house_id1']==$_SESSION['house_id11']) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 
                                <span class="label4">
                               <img src="assets/images/notavailable/4new.png" class="img-responsive" style="  margin: 50px 20px 50px 140px; width: 50%; height: 50%; " > 
                                </span>
                                
                            <?php }
                                elseif ($_SESSION['status']=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                <!-- <span class="label4">
                                <img src="assets/images/notavailable/unnew.png" style="   margin: 50px 20px 50px 140px; width: 50%; height: 50%;  " >
                                </span> -->

                             <!--     <a href="details.php?id=<?php echo $id; ?>">
                            <span class="label2 blinking-text2" style="font-weight:bolder; color:red; font-size:20px">Unavailable</span>
                        </a> -->
                               
                               <?php }
                           }//end

                               ?>
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



                                     <!-- <span class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15" style="text-align: center; font-weight:bolder; color: red"><i class="fab fa-youtube"></i> <a href="<?php //echo ucwords($post['youtube_link']); ?>" >Click me to watch video</a> </span><br><br> -->
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

                                                <li> Fenced - <?php 
                                                if ($post['fence']=='yes') {
                                                    echo 'Fenced';
                                                }else{
                                                echo 'Not fenced';
                                                 }?></li>

                                                <li><?php echo $post['kitchen']; ?> Kitchen</li>

                                                <li> gated - <?php echo $post['gated']; ?></li>

                                                <li> Gender required - <?php echo $post['gender']; ?></li>

                                                <li> Electricity - <?php echo $post['electricity']; ?></li>

                                                <li> Room mate - <?php echo $post['roommate']; ?></li>

                                               
                                                <li><?php echo $post['bathroom']; ?> Bathroom  <!--Bathroom containig shower or tap--></li><br>
                                                
                                                
                                                
                                                <li>Toilet- <?php // amenities is type of toilet

                                                echo $post['amenities']; ?><!--water closet, pit latrine--></li>
               
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">






                                    
                                      <!-- Breakdown of House Rent begin--->
                                    <h4>Payment</h4>
                                    <hr>
                                       <ol type="A">
                                                
                                              <?php
// Clean input values
$house_rent = (int)str_replace(',', '', $post['house_rent']);
$first_year_rent = (int)str_replace(',', '', $post['first_year_rent']);

// Calculate agent fees (15% of house rent)
//$agent_fees = 0.15 * $house_rent;

$agent_fees = (int)str_replace(',', '', $post['agent_fees']);

// Calculate initial payment
$initial_payment = $first_year_rent - $agent_fees;

?>
                                               <li style="font-weight: bolder;">
                                            Total Package for First Year Rent: # <?php echo number_format($first_year_rent); ?>
                                                </li>

                                                <h5>Breakdown of  First Year Rent</h5>
                                                <hr>
                                                <ol type="a">
                                                     <li style="font-weight: bolder;">House Rent: # <?php echo $post['house_rent'];?> </li>
                                                     <li style="font-weight: bolder;">Agreement & Comission: # <?php echo $post['agree_com'];?> </li>
                                                    
                                                   

                                                     <li style="font-weight: bolder;">
                                                        Agent Fees: # <?php echo number_format($post['agent_fees']);?>
                                                    </li>

                                                     <?php 
                                                     if (!empty($post['nepa_bills'])) {?>
                                                        <li style='font-weight: bolder;'>Nepa Bill: #  <?php echo $post['nepa_bills']; ?></li>
                                                     <?php }else{

                                                     }
                                                     
                                                     if (!empty($post['clean_fees'])) {?>
                                                         <li style='font-weight: bolder;'>Cleaning Fees: #  <?php echo $post['clean_fees'];?> </li>
                                                     <?php }else{

                                                     }
                                                     
                                                   
                                                    if (!empty( $post['damage_fees'])) {?>
                                                      <li style='font-weight: bolder;'>Damage Fees: #  <?php echo $post['damage_fees']; ?></li>
                                                    <?php }else{

                                                    }
                                                     
                                                     if (!empty($post['security_fees'])) {?>
                                                         <li style='font-weight: bolder;'>Security Fees: # <?php echo  $post['security_fees']; ?></li>
                                                     <?php }

                                                      if (!empty($post['second_year_rent'])) {?>
                                                         <li style='font-weight: bolder;'>Subsquent Payment: # <?php echo  $post['second_year_rent']; ?></li>
                                                     <?php }
                                                     
                                                 
                                                     ?>
                                                </ol><br> 

                                                <li style="font-weight: bolder;">Initial Payment: # <?php echo number_format($initial_payment); ?> </li>
                                                
                                               
                                                 
                                                
                                            </ol>

                                  
                                             <br>
                                                
                                            </span>
                                          

                                    <!-- Breakdown of House Rent end--->
                                        <br>

                                        <br>

                                        <?php
                        //                 if (isset($_SESSION['multiple_room']) && $_SESSION['multiple_room'] == 'yes') { 
                        //         // code...
                            
                        //         if ($_SESSION['how_many_multiple_room']!=0) {

                        //                 $addtocarthouseid=$_SESSION['house_id1'];?>
                        <!-- //                  <button class="btn btn-primary btn-flat add-to-cart type col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15" style="border-radius:50px; padding:20px; text-transform: lowercase;"  data-property-id="<?php //echo htmlspecialchars($post['id']); ?>" data-house-id="<?php //echo htmlspecialchars($addtocarthouseid); ?>"><i class="fas fa-shopping-cart"></i> Add to Cart</button> -->

                                           <?php // }else{ ?>
                        <!-- //        <a class="btn btn-danger btn-flat " style="pointer-events: none; border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;"><i class="fa fa-calendar"></i> This house is not available at the moment</a> -->
                                 

                          <?php //}      } 
                        //     //begin of not multiple room
                        // elseif (isset($_SESSION['multiple_room']) && $_SESSION['multiple_room'] == 'no') {

                        //      if ($_SESSION['house_id1']==$_SESSION['house_id11'] || $_SESSION['status']=='yes') {
                        //         //put an image that we say house booked already check bak later
                        //               //OR
                        //     //put an image that we say house not available for now  
                        //        ?>
                        <!-- //         <a class="btn btn-danger btn-flat " style="pointer-events: none; border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;"><i class="fa fa-calendar"></i> This house is not available at the moment</a> -->

                                 
                                
                           <?php //} else{

                        //          $addtocarthouseid=$_SESSION['house_id1'];?>
                        <!-- //                  <button class="btn btn-primary btn-flat add-to-cart type col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15" style="border-radius:50px; padding:20px; text-transform: lowercase;"  data-property-id="<?php //echo htmlspecialchars($post['id']); ?>" data-house-id="<?php //echo htmlspecialchars($addtocarthouseid); ?>"><i class="fas fa-shopping-cart"></i> Add to Cart</button> -->
                           <?php  //}

                        // } //end of not multiple room
                        ?>
                                         
                                       
                                              <div>
<?php

 $embedUrl = $post['youtube_link'];
 $house_name = $post['house_name'];

 $agent_fees = (int)str_replace(',', '', $post['agent_fees']);

$initial_payment2 = $first_year_rent - $agent_fees;

$initial_payment=number_format($initial_payment2);

                // Predefine messages for each house type
 // Predefine messages for each house type
$houseMessages = [
    "Single room with shared toilet and bathroom" => "
    Hello,

A Single room in a cool student hall, available now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

    "Single room in a flat with shared toilet and bathroom" => "
    Hello,

A Single room in a flat with shared toilet and bathroom is available now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

     "Single room with personal toilet and bathroom" => "


Hello,

Single room with a private bathroom and toilet is available now 

 {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW



https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

     ",

    "Self contain" => "
    Hello,


A single room self-contained unit just landed on Housemadeeasy, and it's perfect for you!
No sharing a kitchen or bathroom!

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",


     "One bedroom flat" => "

  Be Your Own Boss! One bedroom flat Available Now!

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",
   
    "Two bedroom flat with shared toilet and bathroom" => "

    Hello, 

A brand new 2-bedroom flat is now available on Housemadeeasy, perfect for you and your bestie (or study buddy)!  

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

    "Two bedroom flat with personal toilet in each room" => "

    
Hello, 


A brand new 2-bedroom flat just landed on Housemadeeasy, and guess what?  *Each room has its own private bathroom!*   


This is perfect for you and your bestie (or study buddy!).  

{{embedUrl}} 
 
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

    "Three bedroom flat with one bathroom and toilet" => "


   Hello,

We have a 3-bedroom flat perfect for you and your roommates with 1 shared bathroom and toilet.

 {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable


 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team
    ",

  

    "Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet" => "
    Hello,

We've got a brand new 3-bedroom flat with a master suite (bathroom included!) and a shared bathroom for the other two rooms!


{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}

Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

    "Three bedroom flat with personal toilet and bathroom each" => "

    A three-bedroom flat with personal bathrooms for every room is available  now

{{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team

    ",

 "Four bedroom flat with personal toilet and bathroom each" => "

 A  four-bedroom flat with personal bathrooms for every room!

  {{embedUrl}}

Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}


Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable

 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW


https://housemadeeasy.com.ng/details.php?id={{id}}

See you soon,
The Housemadeeasy Team


    ",

 
];

 
            ?>

                                                    <?php
// Check if there's a predefined message for this house type
$house_message_template = $houseMessages[$house_name] ?? null;

if ($house_message_template) {
    // Replace placeholders with actual values
    $house_message = str_replace(
        ['{{first_year_rent}}', '{{initial_payment}}',  '{{embedUrl}}',  '{{id}}'],
        [number_format($first_year_rent), $initial_payment, $embedUrl, $id],
        $house_message_template
    );

    $whatapp=  $post['agent_pno'];

    // Encode message for WhatsApp sharing
    $whatsapp_message = urlencode($house_message);
    $whatsapp_link = "https://wa.me/+234$whatapp?text=$whatsapp_message";
?>
    
    <!-- WhatsApp Share Button -->
    <a class="btn btn-danger btn-flat" href="<?php echo $whatsapp_link; ?>" style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;"><img src="whatsapp2.png" height="20" width="20" style=""> Message the agent in charge of the house directly</a>

<?php
}

else {
    // Default share message if house type is not predefined

    $default_message = "Check out this property: $house_name located at $location. Price: #$first_year_rent. $embedUrl View more details: https://housemadeeasy.com.ng/details.php?id=$id";
    $whatsapp_link = "https://wa.me/+234$whatapp?text=" . urlencode($default_message);
?>
    
    <!-- WhatsApp Share Button -->
    
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    

<?php } ?>
                                

           

                            </div>
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
                     $query3 = mysqli_query($con,"SELECT house_id FROM bookings WHERE house_id='$house_id1' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id1'"); 

                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id11=$row3['house_id'];



                    ?>
                            <div class="sidebar-property">
                                <div class="image">

                                     

                                    <?php 
                                      if ($row2['multiple_room']=='yes') {

                                            if ($row2['how_many_multiple_room']==0) {
                                    //it will display an image of allbooked
                                    ?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style="  padding: 20px;" > 
                                </span> 
                                </a>


                           <?php }   elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px ;  " >
                                </span>
                                </a> 
                               
                               <?php }

                                      }

                                     //begin of not multiple room
                        elseif ($row2['multiple_room']=='no'){
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
                           }///end of not multiple


                                        if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{

                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                                  <?php 
                             if ($row2['multiple_room']=='yes') {?>
                                <span class="location" style="font-weight:bold"><?php echo $row2['how_many_multiple_room'] ?> Room left</span>
                             <?php }else{
                                
                             }
                            
                            ?>
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
                     $query3 = mysqli_query($con,"SELECT house_id FROM bookings WHERE house_id='$house_id2' UNION
    SELECT house_id FROM bookings_urgent WHERE house_id='$house_id2'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id22=$row3['house_id'];

                    ?>
                              <div class="sidebar-property">
                                <div class="image">
                                           <?php 
                                              if ($row2['multiple_room']=='yes') {

                                            if ($row2['how_many_multiple_room']==0) {
                                    //it will display an image of allbooked
                                    ?>

                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style="  padding: 20px;" > 
                                </span> 
                                </a>


                           <?php }   elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px ;  " >
                                </span>
                                </a> 
                               
                               <?php }

                                      }///end of multiple

                                elseif ($row2['multiple_room']=='no'){
                            if ($house_id2==$house_id22) {
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
                           }///end of not multiple

                         
                                        if(!empty($house_label)){?>
                                <span class="type"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h5>
                                                        <?php 
                             if ($row2['multiple_room']=='yes') {?>
                                <span class="location" style="font-weight:bold"><?php echo $row2['how_many_multiple_room'] ?> Room left</span>
                             <?php }else{
                                
                             }
                            
                            ?>
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
                     // $query2 = mysqli_query($con,"SELECT * FROM amount_to_pay"); 
                     //  $row = mysqli_fetch_assoc($query2);
                     //  $_SESSION['amount']=$row['amount'];
                     //  $amount2=$_SESSION['amount'];

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

    <!-- Add to Cart Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addToCartModalLabel">Item Added to Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="message"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
        <a href="cart.php" class="btn btn-primary">View Cart and Checkout</a>
      </div>
    </div>
  </div>
</div>


    <!--whatapp chat icon-->
   
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+Drop+your+Complain+here+and+we+would+respond+to+them+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->

    <?php  include ('inc/footer.inc.php');   ?>

<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var propertyId = $(this).data('property-id');
        var houseId = $(this).data('house-id');
        $.ajax({
            url: 'add-to-cart.php',
            method: 'POST',
            data: {
             property_id: propertyId,
             house_id: houseId
              },
            dataType: 'json',
            success: function(response) {
                if (response.success) { 

                    $('#cart-count').text(response.cart_count);
                    $('#addToCartModal').modal('show'); // Show the modal
                     $('#message').html('<div class="alert alert-success">This house was added to your cart successfully!</div>');
                } else {
                     console.warn('Warning:', response.message); // Log the warning message
                    alert(response.message); // Display the warning message
                    // console.error('Error message:', response.message); // Log the error message
                    // alert('Failed to add to cart: ' + response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                alert('Failed to add to cart.');
            }
        });
    });
});
</script>



 
<!-- <script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var propertyId = $(this).data('property-id');
        $.ajax({
            url: 'add-to-cart.php',
            method: 'POST',
            data: { 
                property_id: propertyId
                
                 },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#cart-count').text(response.cart_count);
                    alert('Added to cart successfully!');
                } else {
                    console.error(response.message); // Log the error message
                    alert('Failed to add to cart.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                alert('Failed to add to cart.');
            }
        });
    });
});
</script> -->



    

   





 

