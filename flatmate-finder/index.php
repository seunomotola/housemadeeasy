
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

// if(!isset($_SESSION['email'])){
//      echo  "<script>
//     alert('Login/Register first ...');
//     window.location.href='index.php';
//     </script>";
//   }
 include ('inc/header.inc.php');   ?> 
  

<?php
    $connection = mysqli_connect("localhost", "root", "", "housemadeeasy"); 
    $sql = "SELECT * FROM house_taken WHERE id=2";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_object($result);
?>
    <!--Hero Section start-->
    <div class="hero-section section position-relative">
       
        <!--Hero Slider start-->
        <div class="hero-slider section">

            <!--Hero Item start-->
           
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1" ></li>
<li data-target="#carousel-example-generic" data-slide-to="2" ></li>
<li data-target="#carousel-example-generic" data-slide-to="3" ></li>


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

       <div class="carousel-item ">
         <div class="hero-item" style="background-image: url(assets/images/slide/flatmate.jpg);" class="img-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                      

                        </div>
                    </div>
                </div>
            </div>
    </div>



  <?php  
                    $sql = "SELECT * FROM slide order by id desc LIMIT 0,1";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];
                      $distance=$row2['distance'];

                      $bathroom=$row2['bathroom'];

                      $kitchen=$row2['kitchen'];
                      
                      
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?>
     <div class="carousel-item">
         <div class="hero-item" style="background-image: url(assets/images/slide/<?php echo $house_img1; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">

                                <h1 class="title"> <a href="slide-image.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h1>
                                <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> <?php echo $location; ?></span>
  


                                <div class="type-wrap">
                                    <a href="slide-image.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    <span class="price" >#<?php echo $house_price?><span >Yr</span></span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <img src="assets/images/icons/hero-area.png" alt=""><span> <?php echo $distance?></span>
                                    </li>
                                    <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen1.png" alt="" style="height: 24px; width: 25px; background-color: white;"><?php echo $kitchen?> Kitchen</span>
                                </li>
                                    <li>
                                        <img src="assets/images/icons/hero-bath.png" alt=""><span><?php echo $bathroom?> Bathroom</span>
                                    </li>
                                    
                                </ul>
                                

                            </div>
                            <!--Hero Content end-->

                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } ?>



  <?php 
                    $sql = "SELECT * FROM slide order by id desc LIMIT 1,3";
                    $query = $con->query($sql);
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $house_price=$row2['house_price'];
                     $location=$row2['location'];
                      $house_name=$row2['house_name'];
                      $id=$row2['id'];

                      $kitchen=$row2['kitchen'];

                      $bathroom=$row2['bathroom'];
                      
                      $house_name2=$row2['house_name'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?>
    <div class="carousel-item">
       
        <div class="hero-item" style="background-image: url(assets/images/slide/<?php echo $house_img1; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">

                                <h1 class="title"><a href="slide-image.php?id=<?php echo $id; ?>"><?php echo $house_name; ?></a></h1>
                                <span class="location"><img src="assets/images/icons/hero-marker.png" alt=""> <?php echo $location; ?></span>
 


                                <div class="type-wrap">
                                    <a href="slide-image.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                    <span class="price" >#<?php echo $house_price?><span >Yr</span></span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <img src="assets/images/icons/hero-area.png" alt=""><span> <?php echo $distance?></span>
                                    </li>
                                   

                                    <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen1.png" alt="" style="height: 24px;  background-color: white;"><?php echo $kitchen?> Kitchen</span>
                                </li>

                                    <li>
                                        <img src="assets/images/icons/hero-bath.png" alt=""><span><?php echo $bathroom?> Bathroom</span>
                                    </li>
                                    
                                </ul>
                                

                            </div>
                            <!--Hero Content end-->
 
                        </div>
                    </div>
                </div>
            </div>
    </div>

<?php } ?>
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



  <!--Agency Section start-->
    <div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">



        <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Our Services</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            

        <div class="container " >
            
            <div class="row ">
 
            


            


                 <!--Agencies satrt-->
                <div class="col-lg-4 col-md-12 col-sm-12  col-xs-12 ml-auto mr-auto">
                    <div class="agency" >
                        <div class="image">
                            <a class="img" href="flatmate-finder-send-request.php"><img style="height:120px;  " src="assets/images/flatmate/eye_lens.png" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="flatmate-finder-send-request.php">Flatmate Finder</a></h4>
                            <span><a href="flatmate-finder-send-request.php">Do you have an apartment and you need a Flatmate? </a></span>
                            <span> <a href="flatmate-finder-send-request.php">Click here to get a flatmate within 24hours </a></span>
                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

                <!--Agencies satrt-->
                <div class="col-lg-4 col-md-6 col-sm-12  col-xs-12 ml-auto mr-auto">
                    <div class="agency">
                        <div class="image" >
                            <a class="img"   href="flat-mate-house.php"><img style="height:120px" src="assets/images/flatmate/eye_lens.png"  alt="" ></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="flat-mate-house.php">Need Houses that requires having a Flatmate? </a></h4>
                            
                            <span><a href="flat-mate-house.php">Click here to see the available apartment options!</a></span> 

                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->

               

               

              
                
            </div>
            
            
            
        </div>
    </div>
    <!--Agency Section end-->







    

     <!--Download apps section start-->
    <div class="download-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50" style="background-image: url(assets/images/bg/download-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!--Download Content start-->
                    <div class="download-content">
                        <h1 style="font-size: 20px;">Coming Soon.... <br> <span>HouseMadeeasy</span> App </h1>
                        <div class="buttons">
                            <a href="#">
                                <i class="fa fa-apple"></i>
                                <span class="text">
                                    <span>Available on the</span>
                                    Apple Store
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-android"></i>
                                <span class="text">
                                    <span>Get it on</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-windows"></i>
                                <span class="text">
                                    <span>Download from</span>
                                    Windows Store
                                </span>
                            </a>
                        </div>
                        <div class="image"><img src="assets/images/others/app4.png" alt=""></div>
                    </div>
                    <!--Download Content end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->



   


    
    <!--Brand section start-->
    <div class="brand-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <br><br>
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 style="font-size: 20px;">Proudly Supported by</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                
                <!--Brand Slider start-->
                <div class="brand-carousel section">
                    
                   
                    <div class="brand col"><img src="assets/images/brands/nunsa1.jpg" style="width: 150px; height:120px" alt=""></div>
                     <div class="brand col"><img src="assets/images/brands/PANSlogo.png" style="width: 150px; height:120px" alt=""></div>

                      <div class="brand col"><img src="assets/images/brands/RoyalJoyLogo.png" style="width: 160px; height:160px" alt=""></div>
                   
                    <div class="brand col"><img src="assets/images/brands/Picture1.png" style="width: 150px; height:150px" alt=""></div>
                    
                    
                </div>
                <!--Brand Slider end-->
                
            </div>
            
        </div>
    </div>
    <!--Brand section end-->
   
    
    <?php  include ('inc/footer.inc.php');   ?>
