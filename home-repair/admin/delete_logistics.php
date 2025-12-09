<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_logistics'])){
        
        $delete_logistics = $_GET['delete_logistics'];
        
        $delete_user = "delete from logistics_booking where id='$delete_logistics'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('One of logistics booking has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view-booking-logistics','_self')</script>";
            
        }
        
    }

?>

<?php } ?>