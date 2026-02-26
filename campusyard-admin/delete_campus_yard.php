<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['delete_campus_yard'])){
        
        $delete_item = $_GET['delete_campus_yard'];
        
        $delete_item = "delete from market_place_properties_booking where id='$delete_item'";
        
        $run_delete_term = mysqli_query($con,$delete_item);
        
        if($run_delete_term){
            
            echo "<script>alert('One of Your Student Booking Item Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view-booking-yard','_self')</script>";
            
        }
        
    }
?>
<?php } ?>
