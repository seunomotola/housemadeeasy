<?php  
  //  session_start(); 

  //  if(!isset($_SESSION['user_id'])){ 
  //    echo  "<script>
  //   alert('Login/Register first before you use this service');
  //   window.location.href='login.php';
  //   </script>";
  // }

   if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
} 
  ?> 

<?php  include ('inc/connect.inc.php');   ?>
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 

  <style>
         .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 0.1rem);
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
        if (isset($_SESSION['user_id'])){?> 
                                 <li ><a href="my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="logout.php" style="text-decoration: none;">logout</a>   </li> 
                                  <?php 
                                   

                                   } else{?>

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
      <div class="cart-icon">
            <a href="cart.php">
                <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart">
                <span id="cart-count">0</span>
            </a>
        </div>
                           
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



    <!--Hero Section start-->
    <div class="hero-section section position-relative">
       
        <!--Hero Slider start-->
        <div class="hero-slider section">

            <!--Hero Item start-->
           
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1" ></li>



</ol>
<div class="carousel-inner" role="listbox">

       <div class="carousel-item active">
         <div class="hero-item" style="background-image: url(assets/images/slide/SammyWebBannera.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                      

                        </div>
                    </div>
                </div>
            </div> 
    </div>


     <div class="carousel-item">
         <div class="hero-item" style="background-image: url(assets/images/bg/makemoney.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                      

                        </div>
                    </div>
                </div>
            </div>
    </div>


     

        </div>
        <a href="#carousel-example-generic" class="carousel-control-prev" data-slide="prev" role="button">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>

<a href="#carousel-example-generic" class="carousel-control-next" data-slide="next" role="button">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
        </div>
            <!--Hero Item end-->
        

    

        </div>
        <!--Hero Slider end-->
        
    </div>
    <!--Hero Section end-->




<!-- Group bar begin -->
    


    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
        </div>
    </div>
    <!--Login & Register Section end-->
    
  <!--whatapp chat icon-->
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+How+may+we+help+you..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->

        <!-- whatapp chat icon -->
    <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; ">
        <img src="whatsapp2.png" height="20" width="20" style=""> 
        <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+How+may+we+help+you..." style="color: #183153"><b>Need help?</b></a> 
    </span><!-- whatapp chat icon end -->






      <!-- Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-lg">
        <div class="modal-content p-4 modal-animate" 
             style="border-radius: 20px; box-shadow: 0 10px 30px -10px black; background: #edf2ff">


 <div id="stepsProgress" style="margin-bottom: 20px">
  <ul style="list-style: none; padding: 0; display: flex; justify-content: space-between">
    <li id="step1" style="flex: 1; text-align: center; color: #183153; font-weight: bold">
      1. Introduction
    </li>
    <li id="step2" style="flex: 1; text-align: center; color: #888">
      2. BioData
    </li>
    <li id="step3" style="flex: 1; text-align: center; color: #888">
      3. Apartment
    </li>

     <li id="step4" style="flex: 1; text-align: center; color: #888">
          4. Pictures & Video
        </li>
        
  </ul>
  <div style="width: 100%; height: 5px; background: #ccc">
        <div id="stepsProgressBar" style="width: 15%; height: 100%; background: #183153; transition: width 0.5s ease"></div>
      </div>
</div>



 
          <div id="welcome-step">
            <h4 style="color: #183153; font-weight: bold; margin-bottom: 20px;"><i class="fa fa-home mr-2"></i> Welcome to HouseMadeEasy</h4>
            <p style="color: #334; font-size: 1.05em; margin-bottom: 30px">
              We are glad you are here. Please click Next to view our terms and conditions.
            </p>
            <div class="modal-footer" style="border-top: none">
              <button id="nextBtn" type="button" class="btn" 
                      style="background: #183153; color: #ffffff; padding: 10px 20px; border-radius: 10px">
                Next
              </button>
            </div>
          </div>


          <div id="terms-step" style="display: none">
  <h4 style="color: #183153; font-weight: bold; margin-bottom: 20px;"><i class="fa fa-info-circle mr-2"></i> Terms and Conditions</h4>
  <p style="color: #334; font-size: 1.05em; margin-bottom: 30px">
    YOU GET PAID ONLY WHEN THE HOUSE IS RENTED THROUGH HOUSEMADEEASY
  </p>
  <div class="modal-footer" style="border-top: none">
   
    <button id="disagreeBtn" type="button" class="btn" 
            style="background: #dc3545; color: #ffffff; padding: 10px 20px; border-radius: 10px">
      I Do Not Agree
    </button>

     <button id="agreeBtn" type="button" class="btn" 
            style="background: #28a745; color: #ffffff; padding: 10px 20px; border-radius: 10px">
      I Agree
    </button>
  </div>
</div>

<div id="user-form-step" style="display: none">
  <h4 style="color: #183153; font-weight: bold; margin-bottom: 20px;"><i class="fa fa-user mr-2"></i> Let us know about you</h4>
  <form id="userForm">
    <input id="name" class="form-control mb-3" placeholder="Your Name" required>
    <input id="whatsapp" class="form-control mb-3" placeholder="Your WhatsApp Contact" required>
    <input id="phone" class="form-control mb-3" placeholder="Your Call Line (if different)">
    <button type="button" id="nextBtn1" class="btn" 
            style="background: #183153; color: #ffffff; padding: 10px 20px; border-radius: 10px">
      Next
    </button>
  </form>
</div>

<div id="apartment-form-step" style="display: none">
  <h4 style="color: #183153; font-weight: bold; margin-bottom: 20px;"><i class="fa fa-home mr-2"></i> Let us know about the Apartment</h4>
  <form id="apartmentForm">
   
     <select id="type" class="form-control mb-3" required>
          <option value="">Select Type</option>
          <option value="Single Room">Single Room</option>
          <option value="Self Contained">Self Contained</option>
          <option value="Room and Palour Self Contained">Room and Palour Self Contained</option>
          <option value="Two Bedroom Flat">Two Bedroom Flat</option>
          <option value="Three Bedroom Flat">Three Bedroom Flat</option>
    </select>
    <select id="area" class="form-control mb-3" required>
          <option value="">Select area</option>
          <option value="ISALE OKO">ISALE OKO</option>
          <option value="HOSPITAL ROAD">HOSPITAL ROAD</option>
          <option value="ARAROMI">ARAROMI</option>
          <option value="AYEGBAMI">AYEGBAMI</option>
          <option value="AYEPE ROAD">AYEPE ROAD</option>
    </select>
    <input id="address" class="form-control mb-3" placeholder="Address of Apartment" required>
    <input id="landlord" class="form-control mb-3" placeholder="Landlord's Contact (if available)">  
    <button  type="button" id="nextBtn2" class="btn" 
            style="background: #183153; color: #ffffff; padding: 10px 20px; border-radius: 10px">
      Next
    </button>
  </form>
</div>


 <div class="modal-step7" style="display: none">
        <h2>Submission Successful</h2>
        <p>Your submission has been received. Thank you.</p>
        <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                
              </div>
      </div> 



<div class="modal-step4" style="display: none">
      <h5>Picture and Video Information(If available)</h5>
      <form id="pictureForm" enctype="multipart/form-data">
        <label>Pictures</label>
        <input name="images[]" type="file" multiple /><br>
        <label>Video</label>
        <input name="house_video" type="file" /><br>
        <br>
        <button id="nextBtn3" type="button" class="btn btn-primary">Next</button>
      </form>
    </div>


     <!--    <div class="modal-step5" style="display: none">
      <h5>More Details</h5>
      <form id="moreDetailsForm">
        <label>Treakable</label>
        <select name="treakable" class="form-control  mb-3"><option>yes</option><option>no</option></select> 

        <label>Tiled</label>
        <select name="tiled" class="form-control  mb-3"><option>yes</option><option>no</option></select>

        <label>Fence</label>
        <select name="fence" class="form-control  mb-3"><option>yes</option><option>no</option></select>

        <label>Electricity</label>
        <select name="electricity" class="form-control  mb-3"><option>prepaid</option><option>postpaid</option></select>

        <label>Gated</label>
        <select name="gated" class="form-control  mb-3"><option>yes</option><option>no</option></select>

        <label>Gender</label>
        <select name="gender" class="form-control  mb-3"><option>all</option><option>male</option><option>female</option></select>

        <label>Roommate</label>
        <select name="roommate" class="form-control  mb-3"><option>yes</option><option>no</option></select>

        <label>Water Source</label>
        <select name="water" class="form-control  mb-3"><option>borehole</option><option>running water</option></select>

        <label>Landlord</label>
        <select name="landlord" class="form-control  mb-3"><option>yes</option><option>no</option></select>

        <br>
        <button id="nextBtn4" type="button" class="btn btn-primary">Next</button>
      </form>
    </div> -->


   <!--  <div class="modal-step6" style="display: none">
      <h5>Payment</h5>
      <form id="paymentForm">
        <input name="house_rent"  class="form-control mb-3"placeholder="House Rent" /><br>
        <input name="agreement" class="form-control mb-3" placeholder="Agreement Fee" /><br>
        <input name="cleaning_fee" class="form-control mb-3" placeholder="Cleaning Fee" /><br>
        <input name="damages_fee" class="form-control mb-3" placeholder="Damages Fee" /><br>
        <input name="security_fee" class="form-control mb-3" placeholder="Security Fee" /><br>
        <input name="commission"  class="form-control mb-3"placeholder="Commission" /><br>
        <input name="second_year"  class="form-control mb-3"placeholder="Second Year Rent" /><br>
        <input name="nepa_bill"  class="form-control mb-3"placeholder="Nepa Bill" /><br>
        <br>
        <button id="nextBtn5" type="button" class="btn btn-primary">Submit</button>
      </form>
    </div> -->


       
        </div>
      </div>
    </div><!-- End Modal -->
    
    <?php  include ('inc/footer.inc.php');   ?>

    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    <style>
      .modal-animate {
        transform: translateY(50px) scale(0.9);
       opacity: 0;
        transition: all 0.5s ease;
      }
      .modal.show .modal-animate {
        transform: translateY(0) scale(1);
       opacity: 1;
      }
    </style>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

   function updateProgress(step) {
    var percent = (step / 4) * 100;
    $("#stepsProgressBar").css('width', percent + '%');
    ['1', '2', '3', '4'].forEach(function(id){
      $("#step" + id).css('color', step >= id ? "#183153" : "#888");
    });
}

  $(document).ready(function(){
    // show modal immediately and disable closing by clicking outside
    $('.modal').modal({backdrop:'static', keyboard:false});
    $('.modal').modal('show');  

    // Introduction
    $('#nextBtn').on('click', function(){
       // Update progress
        //$('.progress-bar').css('width', '50%').attr('aria-valuenow', 50).text('50%');
 
      // Fade from Introduction to Terms
      $('#welcome-step').fadeOut(500, function(){
        $('#terms-step').fadeIn(500);

        updateProgress(1);
      });
    });

    // If User agrees
    $('#agreeBtn').on('click', function(){

        updateProgress(2);
       // Update progress
        //$('.progress-bar').css('width', '60%').attr('aria-valuenow', 60).text('60%');
 
      // Fade from Terms to User form
      $('#terms-step').fadeOut(500, function(){
        $('#user-form-step').fadeIn(500);
      });
    });

    // If User dislikes
    $('#disagreeBtn').on('click', function(){
      window.location.href = "make-money-with-housemadeeasy.php"
    });


   

    // Handle User submission
$('#nextBtn1').on('click', function(){
    let name = $('#name').val();
    let whatsapp = $('#whatsapp').val();
    let phone = $('#phone').val();

    if (name === '' || whatsapp === '') {
        alert('Please fill all required fields');
        return;
    }
    $.ajax({ 
        url:'save-user-make-money.php',
        type:'POST',
        data:{name: name, whatsapp: whatsapp, phone: phone},
        success: function(data) {
            console.log(data);
            if (data.success) {
                $('#user-form-step').fadeOut(function(){
                    $('#apartment-form-step').fadeIn(300);

                     // Update progress
                    updateProgress(3);
            //$('.progress-bar').css('width', '80%').attr('aria-valuenow', 80).text('80%');
                });
            } else {
                alert('Submission failed. Please try again');
            }
        },
        error: function (xhr, status, error) {
            console.log('AJAX Error!', error);
        }
    });

}); 

 

    // Handle Apartment submission
$('#nextBtn2').on('click', function(){
    let type = $('#type').val();
    let area = $('#area').val();
    let address = $('#address').val();
    let landlord = $('#landlord').val();

    if (type === '' || area === '' || address === '') {
        alert('Please fill all required fields');
        return;
    }
    $.ajax({ 
        url:'save-apartment-make-money.php',
        type:'POST',
        data:{type: type, area: area, address: address, landlord: landlord},
        success: function(data) {
            console.log(data);
            if (data.success) {
                $('#apartment-form-step').fadeOut(function(){
                    $('.modal-step4').fadeIn(500);

                      // Update progress
                    updateProgress(4);
            //$('.progress-bar').css('width', '100%').attr('aria-valuenow', 100).text('100%');
                });
            } else {
                alert('Submission failed. Please try again');
            }
        },
        error: function (xhr, status, error) {
            console.log('AJAX Error!', error);
        }
    });

});



// // Picture submission
// $('#nextBtn3').on('click',function(){
//     var formData = new FormData($('#pictureForm')[0]);
//     $.ajax({ url:'handle_pictures.php', type:'POST', data:formData, 
//         processData:false, contentType:false,
//         success:function(){
//              window.location.href = 'finalize.php';
//             $('.modal-step4').fadeOut(function(){
//                 $('.modal-step7').fadeIn(function(){
//                     //updateProgress(5);
//                 });
//             });
//         },


//        error: function(xhr, status, error) {
//   console.log("XHR:", xhr.responseText);
//   console.log("Status:", status);
//   console.log("Error:", error);
//   alert('Picture submission failed');
// }

//     });
// });


$('#nextBtn3').on('click', function () {
    var formData = new FormData($('#pictureForm')[0]);

    $.ajax({
        url: 'handle_pictures.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function () {

            // 🔁 Run finalize.php without redirecting
            $.ajax({
                url: 'finalize.php',
                type: 'GET', // or 'POST' depending on what finalize.php expects
                success: function (finalizeResponse) {
                    console.log('Finalize script ran:', finalizeResponse); // you can use it or ignore

                    // ✅ Show next modal step
                    $('.modal-step4').fadeOut(function () {
                        $('.modal-step7').fadeIn(function () {
                            // updateProgress(5);
                        });
                    });
                },
                  error: function (xhr, status, error) {
            console.log("XHR:", xhr.responseText);
            console.log("Status:", status);
            console.log("Error:", error);
            alert('Picture submission failed');
        }
            });

        },
        error: function (xhr, status, error) {
            console.log("XHR:", xhr.responseText);
            console.log("Status:", status);
            console.log("Error:", error);
            alert('Picture submission failed');
        }
    });
});






// More details submission
// $('#nextBtn4').on('click',function(){
//     $.ajax({ url:'handle_more_details.php', type:'POST', data:$('#moreDetailsForm').serialize(), 
//         success:function(){
//             $('.modal-step5').fadeOut(function(){
//                 $('.modal-step6').fadeIn(function(){
//                     updateProgress(6);
//                 });
//             });
//         },
//              error: function(xhr, status, error) {
//   console.log("XHR:", xhr.responseText);
//   console.log("Status:", status);
//   console.log("Error:", error);
//   alert('Picture submission failed'); 
// }
//     });
// });


// Payment submission
// $('#nextBtn5').on('click',function(){
//     $.ajax({ url:'handle_payment.php', type:'POST', data:$('#paymentForm').serialize(), 

//         success: function (data) {
//   if (data.status === 'success') {
//     // ✅ Instead of alert:
//     window.location.href = 'finalize.php';
//     $('.modal-step6').fadeOut();
//     $('.modal-step7').fadeIn(500);
//   } else {
//     alert('Something went wrong: ' + data.message);
//   }
// },

//                    error: function(xhr, status, error) {
//   console.log("XHR:", xhr.responseText);
//   console.log("Status:", status);
//   console.log("Error:", error);
//   alert('Picture submission failed');
// }
//     });
// });


  });
</script>
