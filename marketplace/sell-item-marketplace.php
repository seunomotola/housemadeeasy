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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/campusyard2.jpg);"> 
        <div class="container">
            <div class="row"> 
                <div class="col">
                    <h1 class="page-banner-title">Sell your used Items</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Sell your  used Items</li> 
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
                        <li><a class="active" href="#login-tab" data-toggle="tab">Find a buyer!</a></li><br><br>
                         <p style=" font-weight: bolder; text-align: center;">Finding a buyer for your used student items just got a whole lot easy!<br> For any request made, We'll get back to you within 24hours.</p>
                         
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="sell-item-marketplace-process.php" method="POST" enctype="multipart/form-data">
                                 <p id="response" style="font-weight:bolder;"></p> 
                                <div class="row">


                                     <div class="col-12 mb-30">
                                        <input type="text" name="lname" class="form-control form-height-custom" required placeholder="Your Last name" >
                                        </div> 


                                        <div class="col-12 mb-30">
                                        <input type="text" name="fname" class="form-control form-height-custom" required placeholder="Your First name">
                                        </div> 


                                        <div class="col-12 mb-30">
                                        <input type="text" name="pno"  class="form-control form-height-custom" required placeholder="Your Phone Number">
                                        </div> 


                                        <div class="col-12 mb-30">
                                        <input type="email" name="email" class="form-control form-height-custom" required placeholder="Your E-mail">
                                        </div> 

                                        <div class="col-12 mb-30">
                                        <input type="text" name="kindofitem" class="form-control form-height-custom" required placeholder="What kind of student item do you want to sell ?">
                                        </div> 

                                        <div class="col-12 mb-30">
                                            <span>Upload the image of the item 1</span>
                                        

                                         <input name="photo" type="file" required class="form-control form-height-custom">

                                         <!-- <input type="file" name="photo[]" class="form-control form-height-custom" multiple> -->
                                        </div> 


                                        <div class="col-12 mb-30">
                                            <span>Upload the image of the item 2</span>
                                        

                                         <input name="photo2" type="file" class="form-control form-height-custom">

                                         <!-- <input type="file" name="photo[]" class="form-control form-height-custom" multiple> -->
                                        </div> 

                                         <div class="col-12 mb-30">
                                            <span>Upload the image of the item 3</span>
                                        

                                         <input name="photo3" type="file" class="form-control form-height-custom">

                                         <!-- <input type="file" name="photo[]" class="form-control form-height-custom" multiple> -->
                                        </div> 

                                       

                                        <div class="col-12 mb-30">
                                            
                                        <input type="text" name="howmuch" required placeholder="How much do you want to sell it ?">
                                        </div> 


                                <!--     <div class="col-12 mb-30">

                                         
                                <select class="form-control" id="kindofapartment" required>
                                    <option value="" required>What kind of Apartment are you looking for ?</option>
                                    <option>2 Bedroom Flat</option>
                                    <option>3 Bedroom Flat</option>
                                    
                                    <option>Room and palour self contain</option>
                                    <option>self contain</option>
                                    <option>single room</option>
                                   
                                </select>
                            

                                    </div> 

                                    <div class="col-12 mb-30">

                                         <select class="form-control" id="tiled" required>
                                    <option value="" required>Do you want the apartment to be tiled or not?</option>
                                    <option>Tiled </option>
                                    <option>Not Tiled</option>
                                                                       
                                </select>

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

     