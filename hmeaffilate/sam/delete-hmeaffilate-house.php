<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['delete-hmeaffilate-house'])){
        
        $delete_hmeaffilate_house = $_GET['delete-hmeaffilate-house'];
        
        $delete_user = "delete from hmeaffilate_properties where id='$delete_hmeaffilate_house'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('One of Uploaded House by HME Agent has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view-uploaded-house','_self')</script>";
            
        }
        
    }
?>
<?php } ?>
