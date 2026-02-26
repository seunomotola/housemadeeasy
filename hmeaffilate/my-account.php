<?php
ob_start();
session_start(); // Start session FIRST, before includes
include("../inc/connect.inc.php");
include ('inc/session.php');
?>
    
   
  
  <!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:25:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMEAffilate || Helping you to find your desire house easily</title>
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
    <style>
    /* Modal header styling */
    .modal-header {
        border-bottom: none;
    }
    /* List group item styling */
    .list-group-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    /* Numbered list styling */
    .list-group-item h5 {
        color: #007bff;
        font-weight: bold;
    }
    /* Highlight hover */
    .list-group-item:hover {
        background-color: #f1f1f1;
    }
    /* Modal body background */
    .modal-body {
        padding: 20px;
        background-color: #f8f9fa;
    }
    .whatsapp-share-item {
    display: flex;
    gap: 10px; /* Adds space between items if needed */
}
.whatsapp-share-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    text-decoration: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
.whatsapp-share-btn:hover {
    background-color: #25d366;
    color: white;
}
.whatsapp-share-btn .fa-whatsapp {
    margin-right: 5px;
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
                                <li><a href="index.php" style="text-decoration: none;">Home</a></li>
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
                    $prof = 'assets/images/user.png'; // Default image
                    if (isset($_SESSION['agentaffilate_id'])) {
                        $query2 = mysqli_query($con, "SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");
                        if ($row2 = mysqli_fetch_assoc($query2)) {
                            $prof = (!empty($row2['picture'])) ? 'assets/images/hmeaffilate_img/'.$row2['picture'] : $prof;
                        }
                    }
                    ?>
                   <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                            <img class="img-fluid img-circle user-toggle" style="height:50px;" src="<?php echo $prof?>" alt="Image">  
                           
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
                    <h1 class="page-banner-title">My Account</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row row-25">
               
               <!-- Edit Modal Begin -->
    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">House Uploaded Successfully!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Your house was uploaded successfully.</p>
        <a href="my-account.php" style="color:red; text-align: center; font-weight: bolder;"> click to go to your dashboard to share the house</a>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
               <!-- Edit Modal end -->
                
                <div class="col-lg-8 col-12">
                    
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane ">
                            <form action="" method="POST">
                               
                                <div class="row">
                                    
                                    <div class="col-12 mb-30"><h3 class="mb-0">Personal Profile</h3>
                                        <p id="response" style="font-weight: bolder; text-align: center;"></p>
                                    </div>
                                    
                                    <div class="col-md-6 col-12 mb-30"><label for="f_name">First Name</label><input type="text" id="fname2" value="<?php echo $fname; ?>"></div>
                                    <div class="col-md-6 col-12 mb-30"><label for="l_name">Last Name</label><input type="text" id="lname2" value="<?php echo $lname; ?>"></div>
                                    <div class="col-md-6 col-12 mb-30"><label for="l_name">E-mail</label><input type="text" id="email2" value="<?php echo $email2; ?>"></div>
                                      <div class="col-md-6 col-12 mb-30"><label for="l_name">Phone Number</label><input type="text" id="cust_no" value="<?php echo $pno; ?>"></div>
                                   
                                
                                    <div class="col-12 mb-30"><button class="btn" type="button" id="update">Save Change</button></div>
                                </div>
                            </form>
                        </div>
                        <!--  -->
                        <style type="text/css">
                            form{
                                text-align: center;
                            }
                            form select{
                                width: 100%;
                            }
                        </style>
                           <div id="generate-list" class="tab-pane">
            
                            <div class="row row-25">
                                <div class="col-lg-12 col-12 "> 
                               <form method="POST" action="upload-house.php" class="form-horizontal" enctype="multipart/form-data">
                                    
                                          
                                            <label for="property_address">House Type</label> 
                                             <select name="house_type" id="house_type" required class="form-control" ><!-- form-control Begin -->
                               
                              <option selected disabled> Select House Type </option>
                              <option value="Single Room">Single Room</option>
                              <option value="Self contain">Self contain</option>
                              <option value="Room and Palour Self contained">Room and Palour Self contained</option>
                             
                              
                             <option value="2 Bedroom Flat">2 Bedroom Flat</option>
                             <option value="3 Bedroom Flat">3 Bedroom Flat</option>
                             <option value="4 Bedroom Flat">4 Bedroom Flat</option>
                             
                              
                          </select><!-- form-control Finish -->
                                        
                                    
                                    
                                    <br>
                                     
                                           
                                             
    <button id="hidebutton" type="button" class="btn btn-primary form-control">Search House</button>
<br><br>
                                             
                                        
                                    </form>
                               </div>
                            </div>
                            
                        </div>
                        <!--  -->
                       
                        <div id="houseuploaded-tab" class="tab-pane show">
            
                            <div class="row">
                               
                                <!--Property start--> 
                                  <?php 
                                  $agentaffilate_id=$_SESSION['agentaffilate_id'];
                                   $get_customers = "SELECT * FROM properties where agentaffilate_id='$agentaffilate_id'";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);?>
<p style="text-align:center; color:red; font-weight:bolder;">You have a total of <?php echo "$count_customers";?> House's Uploaded</p>
<?php
                                  
                    $sql = "SELECT * FROM properties where agentaffilate_id='$agentaffilate_id' order by id ASC";
                    $result = $con->query($sql);
                   if (mysqli_num_rows($result) > 0){
                    while($row2 = mysqli_fetch_array($result)) {
                    $house_img1=$row2['house_img1'];                     
                     $id=$row2['id'];
                    $house_name=$row2['house_name'];
                    $house_id=$row2['house_id'];
                    $house_location=$row2['house_location'];
                     $first_year_rent = $row2['first_year_rent'];
                       $embedUrl = $row2['youtube_link'];
                    $first_year_rent = (int)str_replace(',', '', $row2['first_year_rent']);
             $agent_fees = (int)str_replace(',', '', $row2['agent_fees']);
            $initial_payment2 = $first_year_rent - $agent_fees;
                $initial_payment=number_format($initial_payment2);
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
                                <div class="property-item col-md-4 col-12 mb-40"> 
                                    <div class="property-inner">
                                        <div class="image">
                                              
                                            <a href="../details.php?id=<?php echo $id; ?>" target="_blank"><img src="../assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                                      
                                        </div>
                                        <div class="content">
                                            <div class="left">
                                                <h3 class="title"><a href="../details.php?id=<?php echo $id; ?>" target="_blank"><?php echo $house_name?></a></h3>
                                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $house_location; ?></span>
                                            </div>
                                             <div class="right">
                <div class="type-wrap">
                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                    <a href="#successModal" class="editHouseBtn" data-id="<?php echo $id; ?>" data-toggle="modal"><span class="type" style="margin-bottom:5px">Edit</span></a>
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
    $default_message = "Check out this property: $house_name located at $house_location. Price: #$first_year_rent. $embedUrl View more details: https://housemadeeasy.com.ng/details.php?id=$id";
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
                                </div>
                            <?php } } else{
                                echo"You are yet to Upload any House at the moment...";
                            } ?>
                                <!--Property end-->
                                <!--Property start-->
                              
                                <!--Property end-->
                            </div>
                            
                        </div>
                        <div id="password-tab" class="tab-pane">
                            <form action="" method="POST">
                               
                                <div class="row">
                                    <div class="col-12 mb-30"><h3 class="mb-0">Change Password</h3></div>
                                    <p id="response_change" style="font-weight: bolder; text-align: center; margin-left: 150px;"></p>
                                    <div class="col-12 mb-30"><label for="current_password">Current Password</label><input type="password" id="old" ></div>
                                    <div class="col-12 mb-30"><label for="new_password">New Password</label><input type="password" id="newpass"></div>
                                    <div class="col-12 mb-30"><label for="confirm_new_password">Confirm New Password</label><input type="password" id="conf"></div>
                                    <div class="col-12 mb-30"><button class="btn" type="button" id="logIn">Save Change</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>   <br><br><br>
                <div class="col-lg-4 col-12 mb-sm-50 mb-xs-50">
                    <ul class="myaccount-tab-list nav">
                        <li ><a class="active"  href="upload-house.php" style="text-decoration: none;"><i class="pe-7s-home"></i>Upload House</a>
                                   
                                </li> 
                        <li><a href="#houseuploaded-tab" data-toggle="tab"><i class="pe-7s-home"></i>Total House's Uploaded</a></li>
                         <li><a  href="#generate-list" data-toggle="tab"><i class="pe-7s-link"></i>Generate List for Available House</a></li>
                        <!-- <li><a  href="#properties-tab" data-toggle="tab"><i class="pe-7s-home"></i>House's Booked</a></li> -->
                        <li><a  href="#profile-tab" data-toggle="tab"><i class="pe-7s-user"></i>My Profile</a></li>
                        <!--<li><a href="#agency-tab" data-toggle="tab"><i class="pe-7s-note2"></i>Agency Profile</a></li>-->
                        
                        <!--<li><a href="add-properties.html"><i class="pe-7s-back fa-flip-horizontal"></i>Add New Property</a></li>-->
                        <li><a href="#password-tab" data-toggle="tab"><i class="pe-7s-lock"></i>Change Password</a></li>
                        <li><a href="logout.php"><i class="pe-7s-power"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
    <!--Login & Register Section end-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<!-- Modal Structure -->
<!-- Modal Structure -->
<div class="modal fade" id="resultsModal" tabindex="-1" role="dialog" aria-labelledby="resultsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="houseModalLabel">Available Houses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                 <div style="text-align:center;">
    <a id="whatsapp-share-btn" class="btn btn-success" href="#" target="_blank" style="display:none;">
        <i class="fa fa-whatsapp"></i> Share
    </a>
</div>
      <div class="modal-body" id="resultsContainer">
        <!-- Results will be populated here -->
        <p>Searching for available houses...</p>
      </div>
    </div>
  </div>
</div>
    
     <?php  include ('inc/footer.inc.php');   ?>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
         
       $(document).ready(function() {
    $('#hidebutton').click(function() {
        var houseType = $('#house_type').val();
        if (!houseType) {
            alert("Please select a house type.");
            return;
        }
          // Set the modal title dynamically
        $('#houseModalLabel').text(`Available Houses for ${houseType}`);
        // Show loading message
        $('#resultsContainer').html('<p>Searching for available houses...</p>');
         $('#whatsapp-share-btn').hide(); // Hide button before results load
        // Make AJAX request
        $.ajax({
            url: 'search-house.php', 
            type: 'POST',
            data: { house_type: houseType },
            success: function(response) {
                var whatsappText = `Available Houses for ${houseType}:\n\n`;
                $('#resultsContainer').html(response);
                $('#resultsModal').modal('show'); // ✅ Trigger modal manually here
                       // Extract text to share
                let textToShare = `Available ${houseType} Houses:\n\n`;
                // Loop through each list-group-item and extract text
                $('#resultsContainer .list-group-item').each(function() {
                    let house_name = $(this).find('h5').text();
                    let house_location = $(this).find('p').eq(0).text();
 let video_link= $(this).find('p').eq(1).text();
 let first_year_rent= $(this).find('p').eq(2).text();
 let second_year_rent= $(this).find('p').eq(3).text();
  let house_link= $(this).find('p').eq(4).text();
  textToShare += `🏠 ${house_name}\n📍 ${house_location}\n📹 ${video_link}\n💰 ${first_year_rent}\n💸 ${second_year_rent}\n🔗 ${house_link}\n\n`;
                });
                if (textToShare.trim() !== `Available ${houseType} Houses:`) {
                    let encodedMessage = encodeURIComponent(textToShare + '\nCheck more on our site!');
                    let whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
                    $('#whatsapp-share-btn').attr('href', whatsappUrl).show();
                }
            },
            error: function() {
                $('#resultsContainer').html('<p class="text-danger">An error occurred while searching for houses.</p>');
                $('#resultsModal').modal('show'); // Optional: show error inside modal too
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // When Edit is clicked, load house info into modal
    $('.editHouseBtn').on('click', function() {
        var houseId = $(this).data('id');
        $('#successModal .modal-body').html('<p>Loading details...</p>');
        $.ajax({
            url: 'fetch_house.php',
            type: 'POST',
            data: { id: houseId },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    $('#successModal .modal-body').html('<p class="text-danger">' + response.error + '</p>');
                } else {
                    // Modal content including two dropdowns
                    let content = `
                        <div class="container">
                            <h5>House Details</h5>
                            <form id="editHouseForm">
                                <input type="hidden" name="id" value="${response.id}">
                                <div class="form-group">
                                    <label>Enter your WhatsApp Number</label>
                                    <input name="whatapp" type="text" value="${response.agent_pno}" class="form-control" placeholder="Enter your active WhatsApp Number" required>
                                </div>
                               <div class="form-group">
    <label>House Type</label>
 <select name="house_type" id="class_school" required class="form-control">
    <option disabled>Select House Type</option>
    <option value="Single Room" ${response.house_type === 'Single Room' ? 'selected' : ''}>Single Room</option>
    <option value="Self contain" ${response.house_type === 'Self contain' ? 'selected' : ''}>Self contain</option>
    <option value="1 Bedroom Flat" ${response.house_type === '1 Bedroom Flat' ? 'selected' : ''}>1 Bedroom Flat</option>
    <option value="2 Bedroom Flat" ${response.house_type === '2 Bedroom Flat' ? 'selected' : ''}>2 Bedroom Flat</option>
    <option value="3 Bedroom Flat" ${response.house_type === '3 Bedroom Flat' ? 'selected' : ''}>3 Bedroom Flat</option>
    <option value="4 Bedroom Flat" ${response.house_type === '4 Bedroom Flat' ? 'selected' : ''}>4 Bedroom Flat</option>
</select>
</div>
                                <!-- SECOND DROPDOWN (House Name / Description) -->
                                <div class="form-group">
                                    <label>House Name</label>
                                    <select name="house_name" id="subject" class="form-control">
                                        <option value="${response.house_name}" selected>${response.house_name}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="house_location" value="${response.house_location}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>First Year Rent</label>
                                    <input type="text" name="first_year_rent" value="${response.first_year_rent}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Agent Fees</label>
                                    <input type="text" name="agent_fees" value="${response.agent_fees}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>YouTube Link</label>
                                    <input type="text" name="youtube_link" value="${response.youtube_link}" class="form-control">
                                </div>
                                <button type="button" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    `;
                    $('#successModal .modal-body').html(content);
                }
            },
            error: function() {
                $('#successModal .modal-body').html('<p class="text-danger">Error loading data. Please try again.</p>');
            }
        });
    });
    // ✅ Use EVENT DELEGATION for dynamically added dropdown
    $(document).on('change', '#class_school', function() {
        var classValue = $(this).val();
        var subjectDropdown = $('#subject');
        subjectDropdown.empty(); // Clear current options
        // Define descriptions per house type
        var singleroom = [
            'Single room with shared toilet and bathroom',
            'Single room in a flat with shared toilet and bathroom',
            'Single room with personal toilet and bathroom',
            'Single room and parlour with shared toilet and bathroom'
        ];
        var selfcontain = ['Self contain'];
        var onebedroomflat = ['One bedroom flat'];
        var twobedroomflat = [
            'Two bedroom flat with shared toilet and bathroom',
            'Two bedroom flat with personal toilet in each room'
        ];
        var threebedroomflat = [
            'Three bedroom flat with one bathroom and toilet',
            'Three bedroom flat with a master bedroom (personal toilet/bathroom) and two rooms sharing one bathroom and toilet',
            'Three bedroom flat with personal toilet and bathroom each'
        ];
        var fourbedroomflat = [
            'Four bedroom flat with one bathroom and toilet',
            'Four bedroom flat with a master bedroom (personal toilet/bathroom) and three rooms sharing one bathroom and toilet',
            'Four bedroom flat with personal toilet and bathroom each',
            'Four bedroom flat with two toilets and bathrooms'
        ];
        // Populate the subject dropdown
        if (classValue === 'Single Room') {
            singleroom.forEach(s => subjectDropdown.append(new Option(s, s)));
        } else if (classValue === 'Self contain') {
            selfcontain.forEach(s => subjectDropdown.append(new Option(s, s)));
        } else if (classValue === '1 Bedroom Flat') {
            onebedroomflat.forEach(s => subjectDropdown.append(new Option(s, s)));
        } else if (classValue === '2 Bedroom Flat') {
            twobedroomflat.forEach(s => subjectDropdown.append(new Option(s, s)));
        } else if (classValue === '3 Bedroom Flat') {
            threebedroomflat.forEach(s => subjectDropdown.append(new Option(s, s)));
        } else if (classValue === '4 Bedroom Flat') {
            fourbedroomflat.forEach(s => subjectDropdown.append(new Option(s, s)));
        }
    });
});
</script>
    
