<?php 
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
   
<?php 
$oldpass='';
$newpass='';
$confpass='';
    if(isset($_GET['change_password'])){
        
        $change_password = $_GET['change_password'];
        
        $get_user = "select * from admins where admin_id='$change_password'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_users = mysqli_fetch_array($run_user);
        
        $admin_id = $row_users['admin_id'];
        
         $admin_pass = $row_users['admin_pass'];
                                    
      
                                    
       
        
    }
?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin Password
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Admin Password
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Old Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="oldpass" type="text" class="form-control" required value="<?php echo $oldpass  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
             
                 
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> New Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="newpass" type="text" class="form-control" required value="<?php echo $newpass  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   
                 
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Confirm Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="confpass" type="text" class="form-control" required value="<?php echo $confpass  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                 
                   
                 
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Admin Password" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
<?php 
if(isset($_POST['update'])){ 
    
      $oldpass = mysqli_real_escape_string($con,$_POST['oldpass']);
        $old_renew=md5($oldpass);
    $newpass = mysqli_real_escape_string($con,$_POST['newpass']);
    $confpass = mysqli_real_escape_string($con,$_POST['confpass']);
    $hashedpassword=md5($newpass);
    $_SESSION['admin_email']=$admin_email;
    $query = mysqli_query($con,"SELECT admin_pass FROM admins WHERE admin_id = '$admin_id'"); 
        $row = mysqli_fetch_assoc($query);
        $admin_pass = $row['admin_pass'];
        if (empty($oldpass && $newpass && $confpass)) {
            echo "<script>alert('Fill in all Fields')</script>";
            
            echo "<script>window.open('index.php?change_password','_self')</script>";
            
        }
        if ($old_renew!==$admin_pass) { 
            echo "<script>alert('Old Password not Correct')</script>";
            
            echo "<script>window.open('index.php?change_password','_self')</script>";
            
        }
        if ($newpass!==$confpass) {
            echo "<script>alert('Confirm Password is not correct')</script>";
            
            echo "<script>window.open('index.php?change_password','_self')</script>";
            
        }
        else{
        $sql = "update admins set admin_pass='$hashedpassword' where admin_id='$admin_id'";
        $result= mysqli_query($con, $sql);
          echo "<script>alert('Password Successfully Changed...')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
    
    
    
}
?>
<?php } ?>
