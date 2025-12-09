<?php 
 
include ('inc/session.php'); 

    
include ('inc/header.inc.php');   
                                      
$user_id = $_SESSION['user_id'];

// Fetch only non-expired referrals
$stmt = $con->prepare("SELECT * FROM referrals WHERE user_id = ? AND expires_at > NOW() ORDER BY expires_at DESC");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$referrals = $result->fetch_all(MYSQLI_ASSOC);

$can_generate = true;
if (!empty($referrals)) {
    $expires_at = new DateTime($referrals[0]['expires_at']);
    $now = new DateTime();
    if ($expires_at > $now) {
        $can_generate = false;
        $_SESSION['referral_message_visible'] = false;
    }
} else {
    $_SESSION['referral_message_visible'] = true;
}

if (!isset($_SESSION['referral_message_visible'])) {
    $_SESSION['referral_message_visible'] = true;
}
                                      
?>  

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
        <div class="container" >
            <div class="row row-25">
               
             
                
                <div class="col-lg-9 col-12">
                    
                    <div class="tab-content">


                           <div id="generate-referral-link" class="tab-pane ">
                            
                               
                                <div class="row">

                                    
                                    <div class="col-12 mb-30"><h3 class="mb-0">Generate Referral Link</h3>
                                   
                                    <?php if ($_SESSION['referral_message_visible']): ?>
        <span id="generate-message" style="color: red; text-align:center;">Click the button below to generate your referral link</span>
    <?php endif; ?>
                                   </div>
                                                            

                                    <div class="col-12 mb-30"> <button id="generate-referral" style="border-radius:10px; padding:15px" class="btn btn-primary" <?php if (!$can_generate) echo 'disabled'; ?>>Generate Referral Link</button>
        <div id="generate-warning">
        <?php if (!$can_generate): ?>
            <p class="text-danger">You cannot generate a new referral link until the current one expires.</p>
        <?php endif; ?>
    </div>
                                    </div>

 

     <ul id="referral-list" class="list-group">
        <?php foreach ($referrals as $referral): 
            $referralLink = 'https://housemadeeasy.org/search-made-easy.php?code=' . $referral['referral_code']; ?>
            <li class="list-group-item">
                <?php echo $referralLink; ?>
                
                <input type="hidden" value="<?php echo $referralLink; ?>"><br>
                <style type="text/css">
                    a{
                        text-decoration: none;
                    }
                    a:hover{
                        text-decoration: none; 
                    }
                </style>
                
                <button style="border-radius: 20px; " class="copy-link btn btn-secondary" data-link="<?php echo $referralLink; ?>">
                    <i class="fas fa-copy"></i> Copy Link
                </button>
                <button style="border-radius: 20px; " class="share-link btn btn-info" data-link="<?php echo $referralLink; ?>">
                    <i class="fas fa-share-alt"></i> Share
                </button>
                
                <span style="border-radius: 20px; padding:10px" class="expires-at badge badge-warning" data-expires-at="<?php echo $referral['expires_at']; ?>"></span>
            </li>
        <?php endforeach; ?>
    </ul>

                                </div>
                            
                        </div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Link copied Suceesfully</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                 <div id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal end-->

 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
               
<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Share Referral Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Select a platform to share your referral link:</p>
        <div class="d-flex justify-content-around">
          <a id="share-facebook" class="btn btn-primary" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
          <a id="share-twitter" class="btn btn-info" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
          <a id="share-whatsapp" class="btn btn-success" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          <a id="share-linkedin" class="btn btn-secondary" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Share modal end -->


    
   <!-- Add to Cart Modal -->
<div class="modal fade" id="generatereferral" tabindex="-1" aria-labelledby="generatereferral" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generatereferral">Referral Link Generated successfully</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="messagegeneratereferral"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add to cart modal end -->

<!-- Fallback Modal for Unsupported Share API -->
<!-- <div class="modal fade" id="shareFallbackModal" tabindex="-1" aria-labelledby="shareFallbackModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareFallbackModalLabel">Share Referral Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Your browser does not support direct sharing. Please copy the link below manually:</p>
        <input type="text" id="fallback-share-link" class="form-control" readonly>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="copy-fallback-link" class="btn btn-primary">Copy Link</button>
      </div>
    </div>
  </div>
</div> -->

<!-- track-referral-link begins -->
    <div id="track-referral-link" class="tab-pane ">         
                                <div class="row">
                                    <div class="col-12 mb-30">  
                                  
                                        <?php include 'track_referral.php';?>
                                </div>      
                        </div>
                    </div>
                <!-- track-referral-link end -->



<!-- withdraw-referral-money begins -->
                     <div id="withdraw-referral-money" class="tab-pane ">         
                                <div class="row">

                                    
                                    <div class="col-12 mb-30">
                                        
                                  
                                        <?php include 'withdraw-new.php';?>
                                </div>      
                        </div>
                    </div>
    <!-- withdraw-referral-money end -->


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
                       
                        <div id="properties-tab" class="tab-pane show active">
            
                            <div class="row">

                               

                                <!--Property start-->
                                  <?php 
                                  $user_id=$_SESSION['user_id'];
                    $sql = "SELECT * FROM bookings where user_id='$user_id' order by id ASC";
                    $result = $con->query($sql);
                   if (mysqli_num_rows($result) > 0){
                    while($row2 = mysqli_fetch_array($result)) {

                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                      $house_name=$row2['house_name'];
                      $house_id=$row2['house_id'];
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     $bathroom2=$row2['bathroom'];
                      $kitchen2=$row2['kitchen'];
                       $distance2=$row2['distance'];
                     ?> 
                                <div class="property-item col-md-6 col-12 mb-40">
                                    <div class="property-inner">
                                        <div class="image">
                                              <?php if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span> 
                                         <?php }else{
                                                     }
                                                 ?> 
                                            <a href="house-check.php?id=<?php echo $id; ?>&&key=<?php echo $house_id ?>" target="_blank"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
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
                                                <h3 class="title"><a href="house-check.php?id=<?php echo $id; ?>&&key=<?php echo $house_id ?>" target="_blank"><?php echo $house_name?></a></h3>
                                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                                            </div>
                                            <div class="right">
                                                <div class="type-wrap">
                                                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                                    <a href="house-check.php?id=<?php echo $id; ?>&&key=<?php echo $house_id ?>" target="_blank"> <span class="type">View</span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } else{
                                echo"You are yet to book for any House yet... Check your desire House and request for Booking";
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
                    
                </div>

                   <div class="col-lg-3 col-12 mb-sm-50 mb-xs-50">
                    <ul class="myaccount-tab-list nav">
 
                        <li><a class="active" href="#properties-tab" data-toggle="tab"><i class="pe-7s-home"></i>House's Booked</a></li>
                        <li><a  href="#generate-referral-link" data-toggle="tab"><i class="pe-7s-link"></i>Generate Referral Link</a></li>
                         <li><a  href="#track-referral-link" data-toggle="tab"><i class="pe-7s-search"></i>Track Referral Link</a></li>
                          <li><a  href="#withdraw-referral-money" data-toggle="tab"><i class="pe-7s-cash"></i>Withdraw your Referral Link Money</a></li>
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
    
     <?php  include ('inc/footer.inc.php');   ?>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
               

<script>
$(document).ready(function() {
    // Function to start countdown
    function startCountdown(element, expiresAt) {
        function updateCountdown() {
            var now = new Date().getTime();
            var distance = new Date(expiresAt).getTime() - now;

            if (distance < 0) {
                clearInterval(interval);
                element.closest('li').remove();  // Remove the list item when expired
                $('#generate-referral').prop('disabled', false);
                $('#generate-warning').html('');
                $('#generate-message').show();
                $.ajax({
                    url: 'update_session.php',
                    method: 'POST',
                    data: { referral_message_visible: true },
                    success: function(response) {
                        // Session updated
                    }
                });
            } else {
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                element.text('Expires in: ' + hours + 'h ' + minutes + 'm ' + seconds + 's');
            }
        }

        updateCountdown();
        var interval = setInterval(updateCountdown, 1000);
    }

    // Initialize countdowns for existing referrals
    $('.expires-at').each(function() {
        var expiresAt = $(this).data('expires-at');
        startCountdown($(this), expiresAt);
    });

    $('#generate-referral').click(function() {
        $.ajax({
            url: 'generate_referral.php',
            method: 'POST',
            success: function(response) {
                let expiresAt = new Date(new Date().getTime() + 24*60*60*1000).toISOString().slice(0, 19).replace('T', ' ');
                let referralLink = 'localhost/housemadeeasy/search-made-easy.php?code=' + response.trim();

               $('#referral-list').append(
                    '<li class="list-group-item">'
                    + referralLink
                    + ' <input type="hidden" value="' + referralLink + '"><br>'
                    + ' <button style="border-radius: 20px" class="copy-link btn btn-secondary" data-link="' + referralLink + '"><i class="fas fa-copy"></i> Copy Link</button>'
                    + ' <button style="border-radius: 20px" class="share-link btn btn-info" data-link="' + referralLink + '"><i class="fas fa-share-alt"></i> Share</button>'
                    + ' <span style="border-radius: 20px; padding:10px" class="expires-at badge badge-warning" data-expires-at="' + expiresAt + '"></span>'
                    + '</li>'
                );
                startCountdown($('.expires-at').last(), expiresAt);
                $('#generate-referral').prop('disabled', true);
                $('#generatereferral').modal('show');
                $('#messagegeneratereferral').html('<div class="alert alert-success">Referral link generated Successfully</div>');
                $('#generate-warning').html('<p class="text-danger">You cannot generate a new referral link until the current one expires.</p>');
                $('#generate-message').hide(); 
                $.ajax({
                    url: 'update_session.php',
                    method: 'POST',
                    data: { referral_message_visible: false },
                    success: function(response) {
                        // Session updated
                    }
                });
            }
        });
    });

    $(document).on('click', '.copy-link', function(event) {
        event.preventDefault();
        var referralLink = $(this).data('link');
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(referralLink).select();
        document.execCommand('copy');
        tempInput.remove();

        $('#successModal').modal('show');
         $('#message').html('<div class="alert alert-success">Referral link copied to clipboard!!</div>');
    });


       $(document).on('click', '.share-link', function(event) {
        event.preventDefault();
        var referralLink = $(this).data('link');
        
        // Update the share links for each social media platform
        $('#share-facebook').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(referralLink));
        $('#share-twitter').attr('href', 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(referralLink) + '&text=Check out this referral link!');
        $('#share-whatsapp').attr('href', 'https://wa.me/?text=' + encodeURIComponent('Check out this referral link: ' + referralLink));
        $('#share-linkedin').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(referralLink) + '&title=Referral Link');

        $('#shareModal').modal('show');
    });



    // $(document).on('click', '.share-link', function(event) {
    //     event.preventDefault();
    //     var referralLink = $(this).data('link');
    //     if (navigator.share) {
    //         navigator.share({
    //             title: 'Referral Link',
    //             text: 'Check out this referral link:',
    //             url: referralLink
    //         }).then(() => {
    //             console.log('Link shared successfully');
    //         }).catch((error) => {
    //             console.error('Error sharing the link:', error);
    //         });
    //     } else {
    //         $('#fallback-share-link').val(referralLink);
    //         $('#shareFallbackModal').modal('show');
    //     }
    // });


    //    $('#copy-fallback-link').click(function() {
    //     var fallbackLink = $('#fallback-share-link').val();
    //     var tempInput = $('<input>');
    //     $('body').append(tempInput);
    //     tempInput.val(fallbackLink).select();
    //     document.execCommand('copy');
    //     tempInput.remove();
    //     alert('Link copied to clipboard!');
    //     $('#shareFallbackModal').modal('hide');
    // });
});
</script>



        <script type="text/javascript">

        $(document).ready(function(){
            
             // when user click the post button
            //$(document).on('click', '#logIn', function()
            // it will perform the same function with the same query above
            $('#logIn').on('click', function(){
                 var old = $('#old').val();           
                  var newpass = $('#newpass').val();
                  var conf = $('#conf').val();
                 
                  
                  $.ajax({
                    url: 'change_password_verify.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'user_login' : 1,
                         'old' : old,
                         'newpass': newpass,
                         'conf': conf

                         
                    }, // if  successful
                    success: function(response){
                        $("#response_change").html(response); 
                         
                        
                    },
                    dataType: 'text'


                   });
                 // End of else
              
       
         });
          });



    </script>
    <script type="text/javascript">
        
                //update user begin
 
         $(document).ready(function(){
            
             // when user click the post button
            //$(document).on('click', '#logIn', function()
            // it will perform the same function with the same query above
            $('#update').on('click', function(){
                 var fname = $('#fname2').val();           
                  var lname = $('#lname2').val();
                  var email = $('#email2').val();
                  var cust_no = $('#cust_no').val();
                  //var confpass = $('#confpass').val();
                  //var register_agree=$('#register_agree').val();
                 
                  
                  $.ajax({
                    url: 'update-user-details.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'update-user' : 1,
                         'fname' : fname,
                         'lname': lname,
                         'email': email,
                         'cust_no' : cust_no
                         
                    }, // if  successful
                    success: function(response){
                        $("#response").html(response);
                        
                        
                    },
                    dataType: 'text'


                   });
                 // End of else
              
        
         });
             });

    </script> 
    <?php
