<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_hmeaffilateagent'])){
        
        $delete_hmeaffilateagent = $_GET['delete_hmeaffilateagent'];
        
        $delete_user = "delete from hmeaffilate_user where id='$delete_hmeaffilateagent'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('One of your HMEAffilate Agent  has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view-hmeaffilate-agent','_self')</script>";
            
        }
        
    }

?>

<?php } ?>