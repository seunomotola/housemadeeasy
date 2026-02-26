<?php
ob_start();
session_start(); // Start session FIRST, before includes
include("../inc/connect.inc.php")');
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
                                             <select name="house_type" id="class_school" required class="form-control" ><!-- form-control Begin -->
                              
                              <option selected disabled> Select House Type </option>
                              <option value="Single Room">Single Room</option>
                              <option value="Self contain">Self contain</option>
                              <option value="Room and Palour">Room and Palour </option>
                             
                              
                             <option value="2 Bedroom Flat">2 Bedroom Flat</option>
                             <option value="3 Bedroom Flat">3 Bedroom Flat</option>
                             <option value="4 Bedroom Flat">4 Bedroom Flat</option>
                             
                              
                          </select><!-- form-control Finish -->
                                        
                                        <!-- <div class="col-12 mb-30">
                                            <label for="property_title">House Name</label>
                                            <select id="subject" name="house_name" class="form-control" required>
                                <option value="">Select House Name</option>
                            </select>
                                          
                                        </div> -->
                                    
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
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      // $house_label=$row2['house_label'];
                      // $house_price=$row2['house_price'];
                     
                     $id=$row2['id'];
                      $house_name=$row2['house_name'];
                      $house_id=$row2['house_id'];
                       $house_location=$row2['house_location'];
                    // $house_name2=str_replace(" ", "-", $house_name2);
                    //  $bathroom2=$row2['bathroom'];
                    //   $kitchen2=$row2['kitchen'];
                    //    $distance2=$row2['distance'];
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
                                                   
                                                    <!-- <a href="house-check.php?id=<?php //echo $id; ?>&&key=<?php //echo $house_id ?>" target="_blank"> <span class="type">View</span> </a> -->
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
<div id="house-results" class="search-results-section">
    <!-- Search results will appear here -->
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
        .header-bottom .logo img {
            width: 90px;
            height: 80px;
        }
        
        /*.table thead th {
            white-space: nowrap;
        }*/
        .btn-flat {
            border-radius: 50px;
            padding: 20px;
            text-align: center;
            color: white;
            text-transform: lowercase;
        }
               /* Responsive table styles */
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
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
<!-- Modal Structure -->
<!-- Modal Structure -->
<div id="houseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="houseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="houseModalLabel">Available Houses</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
                 
            </div><br>
        <span style="float: right;"><div id="whatsapp-share-container"></div></span>
            <div class="modal-body" style="background-color: #f8f9fa;">
              
                <div id="modal-house-results">
                    <!-- Results will be dynamically inserted here -->
                </div>
            </div>
      <div class="modal-footer">
    <!-- <div id="whatsapp-share-container"></div> -->
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
        </div>
    </div>
</div>
    
     <?php  include ('inc/footer.inc.php');   ?>
     <script type="text/javascript">
         
        $(document).ready(function () {
    $('#hidebutton').on('click', function () {
        var houseType = $('#class_school').val();
        if (!houseType) {
            alert('Please select a house type.');
            return;
        }
        // Set the modal title dynamically
        $('#houseModalLabel').text(`Available Houses for ${houseType}`);
        $.ajax({
            url: 'search-house.php', // Backend endpoint
            type: 'POST',
            data: { house_type: houseType },
            success: function (response) {
                var houses = JSON.parse(response);
                var resultHtml = '';
                 var whatsappText = `Available Houses for ${houseType}:\n\n`;
                var maxChars = 4000; // WhatsApp message character limit
                var messages = []; // Array to hold chunks of messages
                if (houses.length > 0) {
                    resultHtml += '<ul class="list-group">';
                    houses.forEach(function (house, index) {
                         var houseDetails = `${index + 1}. ${house.house_name}\nTotal Package: #${house.first_year_rent}\nSubsquent Payment: #${house.second_year_rent}\nLocation: ${house.house_location}\nClick 👇👇 the link below to check details: ${house.house_link}\n\n`;
                        // Add to WhatsApp text if within character limit
                        if ((whatsappText + houseDetails).length > maxChars) {
                            messages.push(whatsappText); // Save current chunk
                            whatsappText = ''; // Start new chunk
                        }
                        whatsappText += houseDetails;
                        resultHtml += `
                            <li class="list-group-item">
                                <h5 class="mb-1">${index + 1}. ${house.house_name}</h5>
                                
                                
                                <p class="mb-0"><strong>Total Package:</strong> #${house.first_year_rent}</p>
                            <p class="mb-0"><strong>Subsquent Payment:</strong> #${house.second_year_rent}</p>
                            <p class="mb-1"><strong>Location:</strong> ${house.house_location}</p>
                            
                            <p class="mb-1"><strong>Click 👇👇 the link below to check details</p>
                             <a href="${house.house_link}" target="_blank" class="btn btn-primary mt-2">View Details</a>
                            
                            </li>
                        `;
                       
                    });
                    resultHtml += '</ul>';
                } else {
                    resultHtml = '<p>No houses found for the selected type.</p>';
                    whatsappText = `No available houses for ${houseType}.`;
                }
                 // Push the last chunk of messages
                if (whatsappText) {
                    messages.push(whatsappText);
                }
                // Inject results into the modal body
                $('#modal-house-results').html(resultHtml);
                 // Create WhatsApp share links for each chunk
                var shareLinksHtml = '';
                messages.forEach(function (msg, index) {
                    var whatsappLink = `https://wa.me/?text=${encodeURIComponent(msg)}`;
                   shareLinksHtml += `
        <a href="${whatsappLink}" 
           target="_blank" 
           class="btn btn-success whatsapp-share-btn" 
           data-index="${index}" 
           style="display: inline-block; margin-right: 5px; margin-left: 10px; margin-bottom: 10px;">
           <i class="fa fa-whatsapp"></i> Share ${index + 1}
        </a>
    `;
                });
                 // Create WhatsApp share link
                // var whatsappLink = `https://wa.me/?text=${encodeURIComponent(whatsappText)}`;
                // $('#whatsapp-share').attr('href', whatsappLink).show();
                 // Add share links to the modal footer
                $('#whatsapp-share-container').html(shareLinksHtml);
                // Show the modal
                $('#houseModal').modal('show');
                 // Event listener for WhatsApp share buttons
                $('.whatsapp-share-btn').on('click', function () {
                    var btn = $(this);
                    var index = btn.data('index');
                    setTimeout(function () {
                        btn.text(`Successfully Shared Message ${index + 1}`);
                        btn.removeClass('btn-success').addClass('btn-secondary').prop('disabled', true);
                    }, 2000); // Delay for user interaction
                });
            },
            error: function () {
                alert('An error occurred while fetching the houses.');
            }
        });
    });
});
     </script>
     <script type="text/javascript">
    
    $(document).ready(function() {
    // Show modal on button click
  
         // Function to update subjects based on class selection
    function updateSubjectOptions() {
        var classValue = $('#class_school').val();
        var subjectDropdown = $('#subject');
        subjectDropdown.empty(); // Clear current options
        // Define subjects based on class selected
        var singleroom = ['Single room with shared toilet and bathroom', 'Single room in a flat with shared toilet and bathroom', 'Single room with personal toilet and bathroom', 'Single room and palour with shared toilet and bathroom'];
        var selfcontain = ['Self contain'];
        var roomandpalour = ['Room and Palour Self contain'];
        var twobedroomflat = ['Two bedroom flat with shared toilet and bathroom', 'Two bedroom flat with personal toilet in each room'];
        var threebedroomflat = ['Three bedroom flat with one bathroom and toilet', 'Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet', 'Three bedroom flat with personal toilet and bathroom each'];
        var fourbedroomflat = ['Four bedroom flat with one bathroom and toilet', 'Four bedroom flat with a master bedroom(having personal toilet and bathroom) and the three rooms sharing one bathroom and toilet', 'Four bedroom flat with personal toilet and bathroom each', 'Four bedroom flat with two toilet and bathroom'];
        // Populate the subject dropdown based on selected class
        if (classValue === 'Single Room') {
            singleroom.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        } else if (classValue === 'Self contain') {
            selfcontain.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === 'Room and Palour') {
            roomandpalour.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '2 Bedroom Flat') {
            twobedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '3 Bedroom Flat') {
            threebedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        else if (classValue === '4 Bedroom Flat') {
            fourbedroomflat.forEach(function(subject) {
                subjectDropdown.append(new Option(subject, subject));
            });
        }
        
    }
    // Listen for changes in the class dropdown and update subjects accordingly
    $('#class_school').on('change', function() {
        updateSubjectOptions();
        
    });
    
   
  
  
});
</script>
      
   
