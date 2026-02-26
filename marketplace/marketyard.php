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
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/campusyard2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Market Yard</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">Market Yard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
         <main  role="main"><div class="container content-space-1"><div class="row"><div class="col-md-4 mb-7 mb-md-0"><div class="d-flex">
            <div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-protected-card.png" alt="Variety of Products on Campus Marketplace" /></div>
            <div class="flex-grow-1 ms-4"><h4 class="mb-1">Variety of Products</h4><p class="small mb-0">Search through the 100+ products and find what you&#39;re looking for.</p></div></div></div>
            <div class="col-md-4 mb-7 mb-md-0"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-return.png" alt="Easy Navigation on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Easy Navigation</h4><p class="small mb-0">Simple and Easy to use interface for a smooth shopping experience.</p></div></div></div>
            <div class="col-md-4"><div class="d-flex"><div class="flex-shrink-0"><img class="avatar avatar-4x3" src="assets/images/svg/oc-truck.png" alt="Trusted Seller on Campus Marketplace" /></div><div class="flex-grow-1 ms-4"><h4 class="mb-1">Trusted Sellers</h4><p class="small mb-0">Search for the perfect product from our 161+ trusted sellers.</p></div></div></div></div></div><div class="text-center"></div></main>
        <div class="container">
            <div class="row">
                
                    
                    <!--Property Search start-->
                    <div class="property-search">
                        <center>
                        <form action="search-item-quickly.php" method="POST" > 
                            
                            <div class="col-sm-2">
                     </div>
                       <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12 mb-30 ml-auto mr-auto">
                                        <input type="text"  class="form-control" name="item_name" required placeholder="Search for your desired items easily">
                                        </div>
                                         <div class="col-lg-4 col-md-6 col-sm-12  col-xs-12 mb-30 ml-auto mr-auto">
                            
                                 <button type="submit" class="btn btn-primary btn-flat" name="search-item-quickly"><i class="fa fa-search"></i> Search</button>
                           </div>
                        </form>
                    </center>
                    </div>
                    <!--Property Search end--> 
                     <ul class="nav nav-tabs center" style="margin-bottom: 30px; ">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Wardrobe">Wardrobes & Shelves</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Table-Chair">Tables & Chairs</a></li>
    
     <li class="nav-item"><a class="nav-link"data-toggle="tab" href="#Bedding">Beddings</a></li>
      
       <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Books">Books</a></li>
       <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Appliances">Appliances</a></li>
       <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bathing">Bathing Needs</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Cooking">Cooking Utensils</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Floor">Floor Decorations</a></li>
       
  </ul>
   <div class="tab-content" >
  
  <!-- Begin of Wardrobe Section -->
    <div id="Wardrobe" class="tab-pane container fade in active">
     
<?php include 'wardrobe-section.php';?>
           
    </div>
    <!-- End of Wardrobe section -->
    
    <div id="Table-Chair" class="tab-pane container fade">
      <?php include 'table-chair-section.php';?>
    </div>
    <!-- Table section -->
    
    
<!-- cooking begin -->
     <div id="Cooking" class="tab-pane container fade">
      <?php include 'cooking-section.php';?>
      
    </div>
<!-- cooking end -->
     
<!-- floor begin -->
     <div id="Floor" class="tab-pane container fade">
      <?php include 'floor-material-section.php';?>
      
    </div>
    <!-- floor end -->
    
    <!-- Bed section Begin -->
    <div id="Bedding" class="tab-pane container fade">
      <?php include 'bedding-section.php';?>
      
    </div>
    <!-- Bed section end -->
 
  <div id="bathing" class="tab-pane container fade">
      <?php include 'bathing-section.php';?>
      
    </div>
  <!-- books section begin -->
     <div id="Books" class="tab-pane container  fade">
      <?php include 'books-section.php';?>
    </div>
    <!-- books section end -->
<!-- Appliances begin -->
 <div id="Appliances" class="tab-pane container fade">
      <?php include 'appliances-section.php';?>
      
    </div>
<!-- Appliances end -->
   
  </div> 
                    
                
            </div> 
            <!-- row end -->
            
            
            
              
            
        </div>
    </div>
    <!--New property section end-->
       <!--whatapp chat icon-->
       <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+I+need+the+Video+of+this+House+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    
    <?php  include ('inc/footer.inc.php');   ?> 
