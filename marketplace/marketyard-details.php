<?php  
include ('inc/session.php');  
//include("../inc/connect.inc.php");
$basename= basename($_SERVER['PHP_SELF']);
$domain= str_replace("$basename", "", $_SERVER['PHP_SELF']); 
    ?>
<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/khonike/khonike/single-properties-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 20:26:05 GMT -->
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
         $id = $_GET['id'];
        // $house_name2=str_replace("-", " ", $house_name2);
        $sql ="SELECT * FROM market_place_properties WHERE id='$id' ";
$result = mysqli_query($con,$sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($posts as $post):
           
           
             $_SESSION['item_img1']=$post['item_img1']; 
                $_SESSION['item_label']=$post['item_label'];
                      $_SESSION['item_price']=$post['item_price'];
                     $_SESSION['item_location']=$post['item_location'];
                     $_SESSION['item_name']=$post['item_name'];
                      
                         
                     $_SESSION['item_img2']=$post['item_img2'];
                     $_SESSION['item_img3']=$post['item_img3'];
                    $_SESSION['item_img4']=$post['item_img4'];
                    $_SESSION['item_desc']=$post['item_desc'];
                   
                    $_SESSION['item_label']=$post['item_label'];
                     $_SESSION['item_cat']=$post['item_cat'];
                    // $_SESSION['second_year_rent']=$post['second_year_rent'];
                    $_SESSION['item_id']=$post['item_id'];
                 
                   
                    
                      $id=$post['id'];
                      $item_id1=$post['item_id'];
                      $item_status=$post['item_status'];
                        
                     $query3 = mysqli_query($con,"SELECT * FROM market_place_properties_booking WHERE item_id='$item_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $item_id_renew=$row3['item_id'];
                    
                      //exit();
           ?>
    <title><?php echo $post['item_name'] ?> | Housemadeeasy - Helping you to find your desire house easily</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="<?php  echo $domain; ?>assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/iconfont.min.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/plugins.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/helper.css">
    <link rel="stylesheet" href="<?php  echo $domain; ?>assets/css/style.css">   
    
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <base href="<?php  echo $domain; ?>">
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
                                <li ><a href="index.php" style="text-decoration: none;">Home</a>
                                   
                                </li>
                                
                                <li ><a href="../make-money-with-housemadeeasy.php" style="text-decoration: none;">Make Money</a>
                                   
                                </li>
                                
                                <li ><a href="../home-repair/index.php" style="text-decoration: none;">Home Repair</a>
                                   
                                </li>
                                 <li class="active"><a href="../marketplace/index.php" style="text-decoration: none;">Campus Yard</a>
                                   
                                </li> 
                                <li ><a href="index.php" style="text-decoration: none;">Flatmate Finder</a>
                                   
                                </li> 
                               <li ><a href="../short-term-stay.php" style="text-decoration: none;">Short term Rentals</a>
                                   
                                </li> 
                                <li ><a href="../housemadeeasy-logistics.php" style="text-decoration: none;">Logistics</a>
                                   
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
        //if (isset($_SESSION['user_id'])){?> 
                                <!--  <li ><a href="../my-account.php" style="text-decoration: none;">Dashboard</a> </li>
                                <li ><a href="../logout.php" style="text-decoration: none;">logout</a>   </li> --> 
                                  <?php 
                                   
                                   //}else{?>
                                     <!--         <li ><a href="../login.php" style="text-decoration: none;">Login</a> </li>
                                 <li ><a href="../register.php" style="text-decoration: none;">Register</a>   </li>  -->
                                   <?php //} ?>
                               
                                
                                  
                              
                            </ul> 
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--User start-->
                   <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                           <!-- <img class="img-fluid img-circle user-toggle" src="assets/images/user.png" alt="Image">  -->
                           
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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/campusyard2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title"><?php echo ucwords($post['item_name']). ' for sale' ; ?></h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><?php echo ucwords($post['item_name']); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            
            <!--display Property start-->
                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">
                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                               
                                <div class="head">
                                    <div class="left">
                                        <h1 class="title"><?php echo ucwords($post['item_name']). ' for sale'; ?></h1>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($post['item_location']); ?></span>
                             
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">#<?php echo ucwords($post['item_price']); ?></span>
                                            
                                            <span class="type"><?php echo ucwords($post['item_label']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="image mb-30"> 
                                                <?php 
                                     
                        //begin of not multiple room
                        
                            if ($item_id1==$item_id_renew) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 
                                <span class="label4">
                               <img src="assets/images/notavailable/4new.png" class="img-responsive" style="  margin: 50px 20px 50px 140px; width: 50%; height: 50%; " > 
                                </span>
                                
                            <?php }
                                elseif ($item_status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 
                                <span class="label4">
                                <img src="assets/images/notavailable/unnew.png" style="   margin: 50px 20px 50px 140px; width: 50%; height: 50%;  " >
                                </span>
                               
                               <?php }
                           
                               ?>
                                    <div class="single-property-gallery">
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img4']; ?>" alt=""></div>
                                    </div>
                                    <div class="single-property-thumb">
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img1']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img2']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img3']; ?>" alt=""></div>
                                        <div class="item"><img src="assets/images/market_place_sell_item/<?php echo $post['item_img4']; ?>" alt=""></div>
                                    </div>
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p><?php echo $post['item_desc']; ?>.</p>
                                  
                                    
                                    <div class="row mt-30 mb-30">
                                        
                                        
                                        
                                  
                                        
                                    </div>
                                    
                                   <!-- <div class="row">
                                        <div class="col-12 mb-30"> 
                                            <h3>Video</h3>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8CbvItGX7Vk"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h3>Location</h3>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <div id="single-property-map" class="embed-responsive-item google-map" data-lat="40.740178" data-Long="-74.190194"></div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!-- Breakdown of House Rent begin--->
                                    
                                 
                                             <h4>Cost of Item</h4>
                                    <hr>
                                       <ol >
                                                
                                                <li style="font-weight: bolder;">Price: # <?php echo $post['item_price'];?> </li>
                                               
                                               
                                               
                                                 
                                                
                                            </ol>
                                             <br>
                                                
                                            </span>
                                           <span style="text-align: center; font-weight:bolder; color: red">N.B : <a href="<?php echo ucwords($post['youtube_link']); ?>" >Click me to watch video</a> </span>
                                    <!-- Breakdown of House Rent end--->
                                        <br>
                                        <br>
                               
                                       
                                              <div>
                                                 <?php 
                                                
                        
                            if ($item_id1==$item_id_renew || $item_status=='yes') {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now  
                               ?>
                                <a style="pointer-events: none;" class="btn btn-primary btn-flat " style="text-align: center; color: white;"><i class="fa fa-calendar"></i> Click to inspect and buy this Item </a>
                                 
                                
                            <?php }else{?>
                                <?php if(isset($_SESSION['email']) ) { ?>
                                    <a  class="btn btn-primary btn-flat click" style="text-align: center; color: white;" onclick="alertconfirmation()" ><i class="fa fa-calendar"></i> Click to inspect and buy this Item</a>
                                 <script src="https://js.paystack.co/v1/inline.js"></script>
                               <?php  }else{ ?> 
                                    <a  class="btn btn-primary btn-flat center btn-lg" style="text-align: center; color: white;" onclick="notyetloginin()" ><i class="fa fa-calendar"></i> Click to inspect and buy this Item</a>
                                <?php }
                                  
                               
                               
      
                                    
                                                 
                                 
                                  }//end
                         
                            ?>
          
                            </div>
                                    <!-- end of booking an apartment--->
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                        ?>
                        
                    </div>
                </div> <!--display house end-->
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Search Student Item Easily!!!</span><span class="shape"></span></h4>
                        
                    
                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">
                        <form action="search-item-quickly.php" method="POST" >
                            
                       
                            <div class="form-group">
                                <input type="text"  class="form-control" name="item_name" required placeholder="Search your desired student item easily ?">
                               <!--  <select class="form-control" name="item_name" required>
                                    <option value="" required>Select the item you are looking for</option>
                                             <?php 
                              /*
                              $get_cat = "select * from market_place_properties";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  //$cat_id = $row_cat['cat_id'];
                                  $item_name = $row_cat['item_name'];
                                  
                                  echo "
                                  
                                  <option> $item_name </option>
                                  
                                  ";
                                  
                              }
                              */
                              
                              
                              ?>
                                   
                                </select> -->
                            </div>
                           <!---- <div class="form-group">
                                <select class="form-control" name="price" required>
                                    <option value="" required>Price</option>
                                    <?php 
                              /*
                              $get_cat = "select * from properties";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  //$cat_id = $row_cat['cat_id'];
                                  $house_price = $row_cat['house_price'];
                                  
                                  echo "
                                  
                                  <option> $house_price </option>
                                  
                                  ";
                                  
                              }
                              */
                              
                              ?>
                                </select>
                            </div>
                          
                            <div>
                                <div id="search-price-range"></div>
                            </div>--->
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-flat" name="search-item-quickly"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                        </div>
                        <!--Property Search end-->
                        
                    </div>
                    <!--Sidebar end-->
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Similar Students Item</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                            <?php 
                            $defined=$post['item_name']; 
                              $sql = "SELECT * FROM market_place_properties where item_name LIKE '%$defined%' and  item_status='no' order by id ASC";
                    $query = $con->query($sql);
                     if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                        $item_img1=$row2['item_img1'];
                    
                      $item_label=$row2['item_label'];
                      $item_price=$row2['item_price'];
                    
                     $id=$row2['id'];
                      $item_name=ucwords($row2['item_name']);
                      
                      $item_id1=$row2['item_id'];
                      $item_status=$row2['item_status'];
                      $item_location=$row2['item_location'];
                            ?>
                              <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM market_place_properties_booking WHERE item_id='$item_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $item_id_renew=$row3['item_id'];
                    ?>
                            <div class="sidebar-property">
                                <div class="image">
                                     <?php 
                            if ($item_id1==$item_id_renew) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style="  padding: 20px;" > 
                                </span> 
                                </a>
                            <?php }
                                elseif ($item_status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px ;  " >
                                </span>
                                </a> 
                               <?php }
                                        if(!empty($item_label)){?>
                                <span class="type"><?php echo $item_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="marketyard-details.php?id=<?php echo $id; ?>"><img src='assets/images/market_place_sell_item/<?php echo $item_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="marketyard-details.php?id=<?php echo $id; ?>"><?php echo $item_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $item_location; ?></span>
                                    <span class="price">#<?php echo $item_price?> </span>
                                </div>
                            </div>
                            
                          
                            <?php } } else{
                                 echo " Similar Students Item  was not found";
                            } ?>
                            
                            
                        </div>
                        <!--Sidebar Property end-->
                        
                    </div>
                    
                   <!--Sidebar popular start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular Students Item for Sale</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                              <?php 
                            $defined=$post['item_name'];
                              $sql = "SELECT * FROM market_place_properties where item_status='no' order by rand() LIMIT 0,3";
                    $query = $con->query($sql);
                    if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $item_img1=$row2['item_img1'];
                    
                      $item_label=$row2['item_label'];
                      $item_price=$row2['item_price'];
                    
                     $id=$row2['id'];
                      $item_name=ucwords($row2['item_name']);
                      
                      $item_id1=$row2['item_id'];
                      $item_status=$row2['item_status'];
                      $item_location=$row2['item_location'];
                            ?>
                                   <?php 
                       $query3 = mysqli_query($con,"SELECT * FROM market_place_properties_booking WHERE item_id='$item_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $item_id_renew=$row3['item_id'];
                    ?>
                             <div class="sidebar-property">
                                <div class="image">
                                     <?php 
                            if ($item_id1==$item_id_renew) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                               <img src="assets/images/notavailable/4new.png" style="  padding: 20px;" > 
                                </span> 
                                </a>
                            <?php }
                                elseif ($item_status=='yes') {
                                    // i will write a code in the admin end to update status to yes and update house_id in booking to null
                                 ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label3">
                                <img src="assets/images/notavailable/unnew.png" style="padding: 20px ;  " >
                                </span>
                                </a> 
                               <?php }
                                        if(!empty($item_label)){?>
                                <span class="type"><?php echo $item_label?></span>
                            <?php }else{
                            }
                                ?>
                                    <a href="marketyard-details.php?id=<?php echo $id; ?>"><img src='assets/images/market_place_sell_item/<?php echo $item_img1; ?>' alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="marketyard-details.php?id=<?php echo $id; ?>"><?php echo $item_name;?></a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $item_location; ?></span>
                                    <span class="price">#<?php echo $item_price?> </span>
                                </div>
                            </div>
                            
                           
                            <?php } }else{
                                 echo " Popular Students Item  was not found";
                            } ?>
                            
                            
                        </div>
                        <!--Sidebar Property end-->
                        
                    </div>
                    <?php 
                     $query2 = mysqli_query($con,"SELECT * FROM amount_to_pay"); 
                      $row = mysqli_fetch_assoc($query2);
                      $_SESSION['amount']=$row['amount'];
                      $amount2=$_SESSION['amount'];
                    ?>
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular Tags</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Tags start-->
                        <div class="sidebar-tags">
                            <a href="#">Houses</a>
                            <a href="#">Real Home</a>
                            <a href="#">Baths</a>
                            <a href="#">Beds</a>
                            <a href="#">Garages</a>
                            <a href="#">Family</a>
                            <a href="#">Real Estates</a>
                            <a href="#">Properties</a>
                            <a href="#">Location</a>
                            <a href="#">Price</a>
                        </div>
                        <!--Sidebar Tags end-->
                    
                    </div>
            
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->
    <!--whatapp chat icon-->
   
      <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+Drop+your+Complain+here+and+we+would+respond+to+them+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    <?php  include ('inc/footer.inc.php');   ?>
    <script type="text/javascript">
        function notyetloginin(){
alert('Login/Register first before you can book an appointment with the seller of this item ...');
                                         window.location.href='../login.php';
         }
    </script>
<script type="text/javascript">
    window.addEventListener('load', function(){
      });
    function alertconfirmation(){
       swal({
  title: "Kindly pay attention and consciously read this?",
  text: "You have clicked to buy this item and  you will need to book an appointment with the seller of this item  by picking a time that is convience for you to come and check this item. If you agree with this kindly click on 'I Agree' else if not click on 'Cancel'",
  buttons: [true, "I Agree!"],
  dangerMode: true,
})
.then((willDelete) => { 
  if (willDelete) {
    window.location.href='book.php?item_id1=<?php echo $item_id1; ?>'; 
  } else {
    //swal("Your imaginary file is safe!");
  }
});
    
    }
</script> 
    <script>
// function payWithPaystack(e) {
//   let handler = PaystackPop.setup({
//     key: 'pk_test_ac9ec15d0168a4feddced75826c3ea5488056c46', // Replace with your public key 
//     email: '<?php  echo $email2;?>',
//     amount: '<?php echo $amount2; ?>' * 100,
//     firstname: '<?php echo $fname ; ?>',
//     lastname: '<?php echo $lname; ?>',
//     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
//     // firstname: '<?php //echo $firstname ; ?>',
//       //lastname: "<?php //echo $lastname; ?>",
//     // label: "Optional string that replaces customer email" 
//     /*
//          metadata: {
//          custom_fields: [
//             {
//                 display_name: "<?php //echo $firstname?>",
//                 variable_name: "<?php //echo $lastname?>",
//                 value: "<?php //echo $email; ?>"
//             }
//          ]
//       },*/ 
      
//     onClose: function(){
//       alert('Transaction Cancelled.');
//     },
//     callback: function(response){
//       //const referenced = response.reference;
//      // $referenced2=$_SESSION['referenced'];
      
//       window.location="print-receipt.php?reference=" + response.reference;
//     }
//   });
//   handler.openIframe();
// }
</script>
