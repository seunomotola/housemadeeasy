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
         <div class="hero-item" style="background-image: url(assets/images/slide/campusyard2.jpg);" class="img-responsive">
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
             <main  role="main"><div class="container content-space-1"><div class="row"><div class="col-md-4 mb-7 mb-md-0"><div class="d-flex">
            <div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-protected-card.png" alt="Variety of Products on Campus Marketplace" /></div>
            <div class="flex-grow-1 ms-4"><h4 class="mb-1">Variety of Products</h4><p class="small mb-0">Search through the 100+ products and find what you&#39;re looking for.</p></div></div></div>
            <div class="col-md-4 mb-7 mb-md-0"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-return.png" alt="Easy Navigation on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Easy Navigation</h4><p class="small mb-0">Simple and Easy to use interface for a smooth shopping experience.</p></div></div></div>
            <div class="col-md-4"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-truck.png" alt="Trusted Seller on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Trusted Sellers</h4><p class="small mb-0">Search for the perfect product from our 161+ trusted sellers.</p></div></div></div></div></div><div class="text-center"></div></main>
        <div class="container " >
            
            <div class="row ">
                <!--Agencies satrt--> 
             <!--    <div class="col-lg-3  col-md-4 col-sm-12 col-xs-12">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="search-made-easy.php"><img  src="assets/images/flatmate/house8.jpg" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="search-made-easy.php">Search your desire house easily</a></h4>
                             <span><a href="search-made-easy.php">Want to search your desired house quickly?</a></span>
                            <span> <a href="search-made-easy.php">Click here to find one easily!!</a></span> 
                            
                        </div>
                    </div>
                </div> -->
                <!--Agencies end-->
            
                 <!--Agencies satrt-->
                <div class="col-lg-4 col-md-6 col-sm-12  col-xs-12 ml-auto mr-auto">
                    <div class="agency" >
                        <div class="image">
                            <a class="img" href="marketyard.php"><img style="height:150px;  " src="assets/images/market/marketplace.jpg" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="marketyard.php">Market Yard</a></h4>
                            <span><a href="marketyard.php">looking for a student item to buy ? </a></span>
                            <span> <a href="marketyard.php"> Click here to see the one you want to buy easily!! </a></span>
                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->
                <!--Agencies satrt-->
                <div class="col-lg-4 col-md-6 col-sm-12  col-xs-12 ml-auto mr-auto">
                    <div class="agency">
                        <div class="image" >
                            <a class="img"   href="sell-item-marketplace.php"><img style="height:150px" src="assets/images/make_money_with_housemadeeasy/money.png"  alt="" ></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="sell-item-marketplace.php">Do you want to sell your used items? </a></h4>
                            
                            <span><a href="sell-item-marketplace.php">Click here to find a potential buyer easily!</a></span> 
                            
                        </div>
                    </div>
                </div>
                <!--Agencies end-->
               
               
                <!--Agencies satrt-->
               <!--  <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency" style="margin-top:15px">
                        <div class="image" >
                            <a class="img" href="agency-details.html"><img style="height:150px" src="home-repair/house_repair.jpg"alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="agency-details.html">Home Repair</a></h4>
                            <span>Do you want paint,clean your house?</span>
                            <span>Click here to find a painter, cleaner or electrician easily!!</span> 
                            
                        </div>
                    </div>
                </div> -->
                <!--Agencies end-->
                <!--Agencies satrt-->
               <!--  <div class="col-lg-3 col-md-4 col-sm-12  col-xs-12">
                    <div class="agency" style="margin-top:15px">
                        <div class="image">
                            <a class="img" href="agency-details.html"><img src="short-term-stay/short.png" alt=""></a>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="agency-details.html">Short term Stay</a></h4>
                            <span>Are you looking for a Flatmate?</span>
                            <span>Click here to find one easily!!</span> 
                            
                        </div>
                    </div>
                </div> -->
                <!--Agencies end-->
                
            </div>
            
            
            
        </div>
    </div>
    <!--Agency Section end-->
<!-- Group bar end -->
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
