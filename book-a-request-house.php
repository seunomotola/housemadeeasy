<?php  
   if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
} 
  //  if(!isset($_SESSION['email'])){
  //    echo  "<script>
  //   alert('Login/Register first ...');
  //   window.location.href='index.php';
  //   </script>";
  // }
include ('inc/header.inc.php');   ?>
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section"> 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Request Form</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Request Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 ml-auto mr-auto">
                    
                    <ul class="login-register-tab-list nav">
                        <li><a class="active" href="#login-tab" data-toggle="tab">Request Form</a></li><br><br>
                        <p style=" font-weight: bolder;">For any request you made, We'll get back to you in a jiffy</p>
                        
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="request-known.php" method="POST"> 
                                 
                                <div class="row">
                                     <div class="col-12 mb-30">
                                        <input type="text" name="lname" class="form-control form-height-custom" required placeholder="Your Last name" >
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="fname" class="form-control form-height-custom" required placeholder="Your First name">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="email" name="email" class="form-control form-height-custom" required placeholder="Your E-mail">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="pno"  class="form-control form-height-custom" required placeholder="Your Phone Number">
                                        </div> 
                                    <div class="col-12 mb-30">
                                         
                                <select class="form-control" name="kindofapartment" required>
                                    <option value="" required>What kind of Apartment are you looking for ?</option>
                                    <option>2 Bedroom Flat</option>
                                    <option>3 Bedroom Flat</option>
                                    
                                    <option>Room and palour self contain</option>
                                    <option>self contain</option>
                                    <option>single room</option>
                                   
                                </select>
                             
                                    </div> 
                                    <div class="col-12 mb-30">
                                         <select class="form-control" name="tiled" required>
                                    <option value="" required>Do you want the apartment to be tiled or not?</option>
                                    <option>Tiled </option>
                                    <option>Not Tiled</option>
                                                                       
                                </select>
                                    </div> 
                                    <div class="col-12 mb-30"><textarea name="present" required placeholder="What do you want to be present in the Apartment e.g Wardrobe ?"></textarea></div> 
                                    <div class="col-12 mb-30"><textarea name='bathroom' required placeholder="About the bathroom and toilet ? do you want it Personal or General ?"></textarea></div>
                                     <div class="col-12 mb-30"><textarea name="other" required placeholder="Tell us other things you would like your desired apartment to have ?"></textarea></div>
                                      <div class="col-12 mb-30"><textarea name="budget"  required placeholder="What is your budget for this apartment, you can give a range e.g 100-160k.?"></textarea></div>
                                       <div class="col-12 mb-30"><textarea name="dislike" required placeholder="What can make you to dislike the house e.g Landlord staying in the house or indigene staying in the house ?"   ></textarea></div>
                                      <!--  <div class="form-group has-feedback col-12 mb-30">
                                       <label class="form-group has-feedback" style="font-weight: bolder;">Pick a date on how soon you want the House</label>
                                       <input type="date" class="form-control" id="pick" placeholder="How soon do you want">
                                   </div> -->
            
                                    
                                   
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
    
  <!--whatapp chat icon-->
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+I+need+the+Video+of+this+House+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    
    <?php  include ('inc/footer.inc.php');   ?>
    <!--  <script type="text/javascript">
        $(document).ready(function(){
            
             // when user click the post button
            //$(document).on('click', '#logIn', function()
            // it will perform the same function with the same query above
            $('#logIn').on('click', function(){
                 
                  var kindofapartment = $('#kindofapartment').val();
                  var tiled = $('#tiled').val();
                  var present = $('#present').val();
                  var bathroom = $('#bathroom').val();
                  var other = $('#other').val();
                  var budget = $('#budget').val();
                  var dislike = $('#dislike').val();
                  // var pick = $('#pick').val();
                  
                  
                 
                  
                  $.ajax({
                    url: 'request-known.php',
                    type: 'POST',
                    data:{
                      // all the quotation strings are Variable,
                      //they can Change anytime
                        'user_login' : 1,
                          
                         'kindofapartment': kindofapartment,
                         'tiled': tiled,
                         'present': present,
                         'bathroom': bathroom,
                         'other': other,
                         'budget': budget,
                         'dislike': dislike, 
                         'pick' : pick
                         
                         
                         
                    }, // if  successful
                    success: function(response){
                        $("#response").html(response);
                         if(response.indexOf('success') >= 0){
                          setTimeout('window.location.href ="https://www.housemadeeasy.com.ng/index.php";', 500);
                        }
                        
                    },
                    dataType: 'text'
                   });
                 // End of else
              
        
         });
             });
    
///check cookie ajax
         
    </script>  -->
