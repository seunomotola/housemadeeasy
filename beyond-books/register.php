<?php include 'inc/header.inc.php'; ?>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
<div class="col-md-9 ftco-animate pb-5">
<h1 class="mb-3 bread">Registration</h1>
<p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Registration <i class="ion-ios-arrow-forward"></i></span></p>
</div>
</div>
</div>
</section>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5">
<div class="col-md-12 text-center heading-section ftco-animate">
<h2 class="mb-1">Register for Workshop</h2>
</div>
</div>
<div class="row">
 
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mt-0 mt-md-12" style="margin: auto;" >
<form action="register_process.php" class="request-form ftco-animate" method="POST">
<h2></h2>
<div class="form-group">
<input type="text" class="form-control" name="lname" placeholder="Enter your Last Name">
</div>
<div class="form-group">
<input type="text" class="form-control" name="fname" placeholder="Enter your First Name">
</div>
<div class="form-group">
<input type="text" class="form-control" name="email" placeholder="Enter your Email">
</div>
<div class="form-group">
<input type="text" class="form-control" name="pno" placeholder="Enter your Phone Number(Calling Number)">
</div>
 <div class="form-group"><!-- form-group Begin -->
                       
                      
                     
                          
                           <select name="gender" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select Your Gender </option>
                              
                             <option value="Female">Female</option>
                             <option value="Male">Male</option>
                            
                              
                          </select><!-- form-control Finish -->
                          
                     
                        
                   </div><!-- form-group Finish -->
<div class="form-group"><!-- form-group Begin -->
                       
                      
                     
                          
                           <select name="dep" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select Your Department </option>
                              
                             <option value="Medicine">Medicine</option>
                             <option value="pharmacy">pharmacy</option>
                             <option value="Pharmacology">Pharmacology</option>
                             <option value="Physiology">Physiology</option>
                             <option value="Biochemistry">Biochemistry</option>
                             <option value="Anatomy">Anatomy</option>
                             <option value="Nursing">Nursing</option>
                            
                              
                          </select><!-- form-control Finish -->
                          
                     
                        
                   </div><!-- form-group Finish -->
<div class="form-group"><!-- form-group Begin -->
                       
                      
                     
                          
                           <select name="level" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select Your Level </option>
                              
                             <option value="200">200</option>
                             <option value="300">300</option>
                             <option value="400">400</option>
                             <option value="500">500</option>
                             <option value="600">600</option>
                            
                            
                              
                          </select><!-- form-control Finish -->
                          
                     
                        
                   </div><!-- form-group Finish -->
<div class="form-group">
<input type="submit" value="Register Now" name="submit" class="btn btn-primary py-3 px-4">
</div>
</form>
</div>
</div>
</div>
</section>
<?php include 'inc/footer.inc.php';?>
