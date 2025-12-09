<?php 
session_start();
ob_start();
include ('./inc/connect.inc.php'); ?>

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Mamaluku</title>
  <link rel="icon" href="img/logo.png" type="image/png">

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="css/slick.css" />
  <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
 <script src="js/jquery-3.2.0.min.js"></script>
</head>

<body>
  <!-- HEADER -->
  <header>
    <!-- top Header -->
    <div id="top-header">
      <div class="container">
        <div class="pull-left">
          <span>Welcome to Mamaluku!</span>
        </div>
        <div class="pull-right">
          <ul class="header-top-links">
            <li><a href="products.php">Store</a></li>
            <li><a href="#newsletter">Newsletter</a></li>
            <li><a href="faq.php">FAQ</a></li>
           
          </ul>
        </div>
      </div>
    </div>
    <!-- /top Header -->


    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="pull-left">
          <!-- Logo -->
          <div class="header-logo">
            <a class="logo" href="index.php">
              <img src="./img/logo.png"  height="55" width="70" class="img-fluid" alt="">
            </a>
          </div>
          <!-- /Logo -->

          <!-- Search -->
          <div class="header-search">
            <form action="search_item.php" method="get">
              <input class="input search-input" type="text" id="auto" name="search" placeholder="Search...">
              
              <button class="search-btn" type="submit" value="Submit" name='submit'><i class="fa fa-search"></i></button>
              <div id="searches" style="margin-left: -5px; width: 230px;"> </div>
            </form>
          </div>
          <!-- /Search -->
        </div>
        <div class="pull-right">
          <ul class="header-btns">
            <!-- Account -->


                <?php
 if(isset($_SESSION["id"])){
  
  $user_id = $_SESSION["id"];

  $query = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$user_id' "); 
  $row = mysqli_fetch_assoc($query);
  $fname = $row['fname'];
  $lname = $row['lname'];
}

                ?>
            <li class="header-account dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-user-o"></i>
                </div>
                <?php if(isset($_SESSION["id"])) : ?>
                <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong><br>
                 <?php else : ?>
                 <a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join <i class="fa fa-caret-down"></i></a>
                 <?php endif; ?>
              </div>
            

             
              <ul class="dropdown-menu">
               
                <?php if(!isset($_SESSION["id"])) : ?>
                <li><a href="register.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                <li><a href="login.php"><i class="fa fa-unlock-alt"></i> Login</a></li>
                <?php else : ?>
                   <li><a href="dashboard.php"><i class="fa fa-user-o"></i> Welcome <spam style="color: #d21737"><?php echo ucfirst($lname).' '.ucfirst($fname); ?></spam></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
              <?php endif; ?>
              </ul>
            </li>
            <!-- /Account -->
       <?php
       $total_price = 0;
       if(isset($_SESSION["shopping_cart"]))
         {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
             $total_price = $total_price + ($values["product_qty"] * $values["product_price"]);
          }
         }
       ?>
            <!-- Cart -->
            <li class="header-cart">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <a href="cart.php">
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="qty"><?php  if(isset($_SESSION["shopping_cart"])) {echo count($_SESSION["shopping_cart"]); } else{ echo 0;} ?></span>
                </div>
                </a>
                <strong class="text-uppercase">My Cart:</strong>
                <br>
                <span><del>N</del><?php echo number_format($total_price, 2); ?></span>
              </a>
              <div class="custom-menu">
                <div id="shopping-cart">
                  <div class="shopping-cart-list">
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src="./img/thumb-product01.jpg" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                      </div>
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="product product-widget">
                      <div class="product-thumb">
                        <img src="./img/thumb-product01.jpg" alt="">
                      </div>
                      <div class="product-body">
                        <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                      </div>
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="shopping-cart-btns">
                    <button class="main-btn">View Cart</button>
                    <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                  </div>
                </div>
              </div>
            </li>
            <!-- /Cart -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
              <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
          </ul>
        </div>
      </div>
      <!-- header -->
    </div>
    <!-- container -->
  </header>
  <!-- /HEADER -->
 

  <!-- NAVIGATION -->
  <div id="navigation">
    <!-- container -->
    <div class="container">
      <div id="responsive-nav">
        <!-- category nav -->
        <?php if($page_title == 'Welcome to Mamaluku') : ?>
        <div class="category-nav">
        <?php else : ?>
        <div class="category-nav show-on-click">
        <?php endif; ?>
          <span class="category-header">Categories <i class="fa fa-list"></i></span>
          <ul class="category-list">

          	<li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Fashion<i class="fa fa-angle-right"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="products-category.php?cat=1&sub_cat=1">Women</a></li>
                      <li><a href="products-category.php?cat=1&sub_cat=2">Men</a></li>
                      <li><a href="products-category.php?cat=1&sub_cat=3">Kids</a></li>
                      <li><a href="products-category.php?cat=1&sub_cat=4">Jewelries and Watches</a></li>
                      <li><a href="products-category.php?cat=1&sub_cat=5">Shoes</a></li>
                    </ul>
                    <hr>
              
                    <hr class="hidden-md hidden-lg">
                  </div>
                  
                  <div class="col-md-4 hidden-sm hidden-xs">
                    <a class="banner banner-2" href="#">
                      <img src="./img/banner04.jpg" alt="">
                      <div class="banner-caption">
                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>


            <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Electronics<i class="fa fa-angle-right"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="products-category.php?cat=2&sub_cat=6">TV</a></li>
                      <li><a href="products-category.php?cat=2&sub_cat=7">Home Audio & Theater</a></li>
                      <li><a href="products-category.php?cat=2&sub_cat=8">Portable Audio</a></li>
                    </ul>
                    <hr>
              
                    <hr class="hidden-md hidden-lg">
                  </div>
                  
                  <div class="col-md-4 hidden-sm hidden-xs">
                    <a class="banner banner-2" href="#">
                      <img src="./img/banner04.jpg" alt="">
                      <div class="banner-caption">
                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>


             <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Phones<i class="fa fa-angle-right"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="products-category.php?cat=3&sub_cat=9">Mobile Phones</a></li>
                      <li><a href="products-category.php?cat=3&sub_cat=10">Tablet</a></li>
                      <li><a href="products-category.php?cat=3&sub_cat=11">Accessories</a></li>
                    </ul>
                    <hr>
              
                    <hr class="hidden-md hidden-lg">
                  </div>
                  
                  <div class="col-md-4 hidden-sm hidden-xs">
                    <a class="banner banner-2" href="#">
                      <img src="./img/banner04.jpg" alt="">
                      <div class="banner-caption">
                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>






            <li><a href="products-category.php?cat=4&sub_cat=12">Health & Beauty</a></li>
           
            <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Grocery<i class="fa fa-angle-right"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="products-category.php?cat=5&sub_cat=13">Food</a></li>
                      <li><a href="products-category.php?cat=5&sub_cat=14">Beverages</a></li>
                      <li><a href="products-category.php?cat=5&sub_cat=15">Beer, Wine, Spirit</a></li>
                      <li><a href="products-category.php?cat=5&sub_cat=16">Toiletries</a></li>
                    </ul>
                    <hr>
              
                    <hr class="hidden-md hidden-lg">
                  </div>
                  
                  <div class="col-md-4 hidden-sm hidden-xs">
                    <a class="banner banner-2" href="#">
                      <img src="./img/banner04.jpg" alt="">
                      <div class="banner-caption">
                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>


           
            <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Home, Furniture & Appliances<i class="fa fa-angle-right"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title">Categories</h3></li>
                      <li><a href="products-category.php?cat=6&sub_cat=17">Appliances</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=18">Kitchen Accessories</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=19">Bathroom Accessories</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=20">Bedding</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=21">Furniture</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=22">Lighting & Light Features</a></li>
                      <li><a href="products-category.php?cat=6&sub_cat=23">Floor Care</a></li>
                    </ul>
                    <hr>
              
                    <hr class="hidden-md hidden-lg">
                  </div>
                  
                  <div class="col-md-4 hidden-sm hidden-xs">
                    <a class="banner banner-2" href="#">
                      <img src="./img/banner04.jpg" alt="">
                      <div class="banner-caption">
                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
            
            <li><a href="products-category.php?cat=7&sub_cat=24">Baby Products</a></li>

            <li><a href="products-category.php?cat=8&sub_cat=25">Computers & Accessories</a></li>
            
            <li><a href="products.php">View All</a></li>
          </ul>
        </div>
        <!-- /category nav -->

        <!-- menu nav -->
        <div class="menu-nav">
          <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
          <ul class="menu-list">
            <li><a href="index.php">Home</a></li>
           
                        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Fashion <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <ul class="list-links">
                                                <li><h3 class="list-links-title">Categories</h3></li>
                                                <li><a href="products-category.php?cat=1&sub_cat=1">Women</a></li>
                                                <li><a href="products-category.php?cat=1&sub_cat=2">Men</a></li>
                                                <li><a href="products-category.php?cat=1&sub_cat=3">Kids</a></li>
                                                <li><a href="products-category.php?cat=1&sub_cat=4">Jewelries and Watches</a></li>
                                                <li><a href="products-category.php?cat=1&sub_cat=5">Shoes</a></li>
                                              </ul>
                                              <hr class="hidden-md hidden-lg">
                                            </div>
                                    </div>
                                </li>

                        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Electronics <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <ul class="list-links">
                                                <li><a href="products-category.php?cat=2&sub_cat=6">TV</a></li>
                                                <li><a href="products-category.php?cat=2&sub_cat=7">Home Audio & Theater</a></li>
                                                <li><a href="products-category.php?cat=2&sub_cat=8">Portable Audion</a></li>
                                              </ul>
                                              <hr class="hidden-md hidden-lg">
                                            </div>
                                    </div>
                                </li>

                       <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Phones <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <ul class="list-links">
                                                <li><a href="products-category.php?cat=3&sub_cat=9">Mobile Phones</a></li>
                                                <li><a href="products-category.php?cat=3&sub_cat=10">Tablet</a></li>
                                                <li><a href="products-category.php?cat=3&sub_cat=11">Accessories</a></li>
                                              </ul>
                                              <hr class="hidden-md hidden-lg">
                                            </div>
                                    </div>
                                </li>

          


            <li><a href="products-category.php?cat=4&sub_cat=12">Health & Beauty</a></li>


                          <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Grocery <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <ul class="list-links">
                                                <li><a href="products-category.php?cat=5&sub_cat=13">Food</a></li>
                                                <li><a href="products-category.php?cat=5&sub_cat=14">Beverages</a></li>
                                                <li><a href="products-category.php?cat=5&sub_cat=15">Beer, Wine, Spirit</a></li>
                                                <li><a href="products-category.php?cat=5&sub_cat=16">Toiletries</a></li>
                                              </ul>
                                              <hr class="hidden-md hidden-lg">
                                            </div>
                                    </div>
                                </li>



            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Home, Furniture & Appliances  <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <ul class="list-links">
                                                 <li><a href="products-category.php?cat=6&sub_cat=17">Appliances</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=18">Kitchen Accessories</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=19">Bathroom Accessories</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=20">Bedding</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=21">Furniture</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=22">Lighting & Light Features</a></li>
                                                  <li><a href="products-category.php?cat=6&sub_cat=23">Floor Care</a></li>
                                              </ul>
                                              <hr class="hidden-md hidden-lg">
                                            </div>
                                    </div>
                                </li>

            


            <li><a href="products-category.php?cat=7&sub_cat=24">Baby Products</a></li>

            <li><a href="products-category.php?cat=8&sub_cat=25">Computers & Accessories</a></li>
            
            <li><a href="products.php">View All</a></li>
            
          </ul>
        </div>
        <!-- menu nav -->
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /NAVIGATION -->
  <script>
function getCat() {
  var xmlhttp;
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
    } 
    else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
  var cat_id = document.getElementById('cat_id').value;
  

  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState==4){
      document.getElementById('subcat_list').innerHTML = xmlhttp.responseText;
      
      }
      
    }
    url="ajax/get_subcat.php?cat_id="+cat_id;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
  }
  
</script>     