<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b> 
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?admin_profile=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile 
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
               
                
                <li><!-- li begin -->
                    <a href="index.php?change_password=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-lock"></i> Change Password
                        
                        <!-- <span class="badge"><?php echo $count_p_categories; ?></span> -->
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->




    
           




             <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#market"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-shopping-cart"></i> Market-Place
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="market" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_item"> Insert Item </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_item"> View Item </a> 
                    </li><!-- li finish -->

                     <li><!-- li begin -->
                        <a href="index.php?view-booking-yard"> View booking </a>
                    </li><!-- li finish -->

                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->


             
            
          
            
       
            
           
            
          
            
          
            
            

             <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out 
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->


<?php } ?>