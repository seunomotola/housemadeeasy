 <?php 

    session_start();
    include("includes/db.php"); 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        $admin_type = $row_admin['admin_type'];
        
        

        $admin_contact = $row_admin['admin_contact'];
        
       
        
        $get_products = "select * from home_repair_booking";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_bookings = mysqli_num_rows($run_products);



         $get_products = "select * from logistics_booking";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_logistics_bookings = mysqli_num_rows($run_products);
        
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Admin Area || Housemadeeasy</title>
     <link href="../assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }    if(isset($_GET['view-booking-home-repair'])){
                        
                        include("view-booking-home-repair.php");
                        
                } 

                 if(isset($_GET['admin_profile'])){
                        
                        include("admin_profile.php"); 
                        
                } 

                 if(isset($_GET['change_password'])){
                        
                        include("change_password.php");
                        
                }  

                 if(isset($_GET['delete_home_repair'])){
                        
                        include("delete_home_repair.php"); 
                        
                } 

                 if(isset($_GET['delete_logistics'])){
                        
                        include("delete_logistics.php");
                        
                }   if(isset($_GET['view-booking-logistics'])){
                        
                        include("view-booking-logistics.php");
                        
                } 


        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>   

   <script>
    $(document).ready(function(){

    $(document).on('click', '#getlogistics', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_booking_logistics_details.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>



     <script>
    $(document).ready(function(){

    $(document).on('click', '#getrepair', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_booking_home_repair_details.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>



</body>
</html>


<?php } ?>