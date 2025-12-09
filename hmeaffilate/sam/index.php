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
        
        

        $admin_contact = $row_admin['admin_contact']; 
        
       
        
        $get_products = "select * from bookings";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_bookings = mysqli_num_rows($run_products);
        
        $get_customers = "select * from hmeaffilate_properties";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_hmeaffilate_properties = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from payment_history";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_payment_history = mysqli_num_rows($run_p_categories); 
        
        $get_pending_orders = "select * from hmeaffilate_user";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_agent = mysqli_num_rows($run_pending_orders);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Student-Agent-Manager|| Housemadeeasy</title>
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
                        
                }    if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }     if(isset($_GET['admin_profile'])){
                        
                        include("admin_profile.php");
                        
                }
                  if(isset($_GET['change_password'])){
                        
                        include("change_password.php");
                        
                } 
               

                

                if(isset($_GET['delete-hmeaffilate-house'])){
                        
                        include("delete-hmeaffilate-house.php");
                        
                }   if(isset($_GET['view-uploaded-house'])){
                        
                        include("view-uploaded-house.php");
                        
                } 

                  if(isset($_GET['view-hmeaffilate-agent'])){
                        
                        include("view-hmeaffilate-agent.php");
                        
                } 

                if(isset($_GET['delete_hmeaffilateagent'])){
                        
                        include("delete_hmeaffilateagent.php");
                        
                } 
               


        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>   

   <script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_booking.php',
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


  <script>
    $(document).ready(function(){

    $(document).on('click', '#getyard', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_booking_yard_details.php',
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

    $(document).on('click', '#gethmeaffilate', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_hmeaffilate_details.php',
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

    $(document).on('click', '#gethmeaffilateagent', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_hmeaffilate_details_agent.php',
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