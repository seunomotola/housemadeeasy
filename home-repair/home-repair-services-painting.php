<?php 

if(isset($_GET['paint'])){ 
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
} 


include ('inc/header.inc.php');   ?>
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/homerepair.jpg);"> 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Painting Services</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Painting Services</li>
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
                        <li><a class="active" href="#login-tab" data-toggle="tab">Painting Made Easy!</a></li><br><br>
                         <p style=" font-weight: bolder; text-align: center;">With housemadeeasy painting services, you don't need to bother about  painting your house by yourself. Just make your request and we'll get you a painter based on your budget!!<br> For any request  made, We'll get back to you within 24hours.</p>
                         
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="home-repair-services-painting-process.php" method="POST" enctype="multipart/form-data">
                                  
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

                                         
                                <select class="form-control" name="kindofapartment" required>
                                    <option value="" required>What type of Apartment do you want to paint ?</option>
                                  

                                    <option value="Single Room">Single Room</option>
                                    <option value="Self Contained">Self Contained</option>
                                     <option value="2 Bedroom Flat">2 Bedroom Flat</option>

                             <option value="3 Bedroom Flat">3 Bedroom Flat</option>

                             <option value="4 Bedroom Flat">4 Bedroom Flat</option>

                             <option value="Room and palour self contain">Room and palour self contain</option>
                                    
                                   
                                </select>
                            

                                    </div> 

                                     <div class="col-12 mb-30">
                                        <input type="text" name="location" class="form-control form-height-custom" required placeholder="location of the Apartment in Sagamu?">
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
    
  <!--whatapp chat icon-->
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+I+need+the+Video+of+this+House+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    
    <?php  include ('inc/footer.inc.php');

    }else{
        header('location:index.php');
    }   ?>

     