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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/flatmate.jpg);">  
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Flatmate Finder</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Flatmate Finder</li>
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
                        <p style=" font-weight: bolder; text-align: center;">Finding a Flatmate just got a whole lot easier with housemadeeasy!<br> Fill this form and make your request known to us.<br>  For any request  made, you will get a response within 24hours.</p>
                        
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="flatmate-finder-request-known.php" method="POST">
                                 <!-- <p id="response" style="font-weight:bolder;"></p> -->
                                <div class="row">
                                     <div class="col-12 mb-30">
                                        <input type="text" name="lname" class="form-control form-height-custom" required placeholder="Your Last name" >
                                        </div> 
 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="fname" class="form-control form-height-custom" required placeholder="Your First name">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="pno" class="form-control form-height-custom" required placeholder="Your Phone Number">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="email" name="email" class="form-control form-height-custom" required placeholder="Your E-mail">
                                        </div> 
                                        
                                        <div class="col-12 mb-30">
                                        <input type="text" name="dep" class="form-control form-height-custom" required placeholder="Your Department">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="level" class="form-control form-height-custom" required placeholder="Your level">
                                        </div> 
                                         
                                        <div class="col-12 mb-30">
                                          <select class="form-control" name="gender" required>
                                    <option value="" required>Your Gender </option>
                                  
                                     <option value="Male">Male</option>
                             <option value="Female">Female</option>
                                 
                                   
                                </select>
                            </div>
                                         <div class="col-12 mb-30">
                                        <input type="text" class="form-control form-height-custom" name="genderofflatmate" required placeholder="Gender of the person you want as a flatmate?">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="relofflatmate" class="form-control form-height-custom" required placeholder="Religion of the person you want as a flatmate?">
                                        </div>
                                        <div class="col-12 mb-30">
                                        <input type="text" name="depofflatmate" class="form-control form-height-custom" required placeholder="Which Department should the flatmate be?">
                                        </div> 
                                        <div class="col-12 mb-30">
                                        <input type="text" name="levelofflatmate" class="form-control form-height-custom" required placeholder="what level do you want the flatmate to be?">
                                        </div> 
                                         
                                    <div class="col-12 mb-30">
                                         
                                <select class="form-control" name="kindofapartment" required>
                                    <option value="" required>What kind of Apartment are you looking for Flatmate for?</option>
                                  
                                     <option value="Single Room">Single Room</option>
                                    <option value="Self Contained">Self Contained</option>
                                     <option value="2 Bedroom Flat">2 Bedroom Flat</option>
                             <option value="3 Bedroom Flat">3 Bedroom Flat</option>
                             <option value="4 Bedroom Flat">4 Bedroom Flat</option>
                             <option value="Room and palour self contain">Room and palour self contain</option>
                                    
                                   
                                </select>
                            
                                    </div> 
                                    <div class="col-12 mb-30">
                                        <input type="text" class="form-control form-height-custom" name="location" required placeholder="Location of the Apartment that you are looking for a flatmate for ?">
                                        </div>
                                        
                                        <!-- <div class="col-12 mb-30"><textarea name="featureofapartment" class="form-control form-height-custom" required placeholder="Can you describe or list all the feature of the apartment you want the flatmate to take ?"></textarea></div> -->
                                  <!--   <div class="col-12 mb-30">
                                         <select class="form-control" id="tiled" required>
                                    <option value="" required>Do you want the apartment to be tiled or not?</option>
                                    <option>Tiled </option>
                                    <option>Not Tiled</option>
                                                                       
                                </select>
                                    </div> 
                                     
                                    <div class="col-12 mb-30"><textarea id='bathroom' required placeholder="About the bathroom and toilet ? do you want it Personal or General ?"></textarea></div>
                                     <div class="col-12 mb-30"><textarea id="other" required placeholder="Tell us other things you would like your desired apartment to have ?"></textarea></div>
                                      <div class="col-12 mb-30"><textarea id="budget"  required placeholder="What is your budget for this apartment, you can give a range e.g 100-160k.?"></textarea></div>
                                       <div class="col-12 mb-30"><textarea id="dislike" required placeholder="What can make you to dislike the house e.g Landlord staying in the house or indigene staying in the house ?"   ></textarea></div>
                                       <div class="form-group has-feedback col-12 mb-30">
                                       <label class="form-group has-feedback" style="font-weight: bolder;">Pick a date on how soon you want the House</label>
                                       <input type="date" class="form-control" id="pick" placeholder="How soon do you want">
                                   </div>  -->
            
                                    
                                   
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
