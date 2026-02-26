<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['delete_home_repair'])){
        
        $delete_home_repair = $_GET['delete_home_repair'];
        
        $delete_user = "delete from home_repair_booking where id='$delete_home_repair'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Home repair booking has been Deleted Successfully')</script>";
            
            echo "<script>window.open('index.php?view-booking-home-repair','_self')</script>";
            
        }
        
    }
?>
<?php } ?>
