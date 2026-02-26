<?php 
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
   
<?php 
    if(isset($_GET['user_profile'])){
        
        $edit_user = $_GET['user_profile'];
        
        $get_user = "select * from agent where id='$edit_user'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_users = mysqli_fetch_array($run_user);
        
        $id = $row_users['id'];
        
         $fname = $row_users['fname'];
                                    
        $lname = $row_users['lname'];
                    
        $username = $row_users['username'];
                                    
        $agent_email = $row_users['agent_email'];
                                    
        $agent_no = $row_users['agent_no'];
                                    
        $img = $row_users['img'];
        
    }
?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit User
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit User
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> First Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="fname" type="text" class="form-control" required value="<?php echo $fname  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Last Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="lname" type="text" class="form-control" required value="<?php echo $lname  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Username </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="user" type="text" class="form-control" required value="<?php echo $username  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="agent_email" type="text" class="form-control" required value="<?php echo $agent_email  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   
                 
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Agent No </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="agent_no" type="text" class="form-control" required value="<?php echo $agent_no  ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Image </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="agent_img" type="file" class="form-control" >
                          
                          <img src="agent/<?php echo $img; ?>" alt="<?php echo $img; ?>" width="70" height="70">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                 
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Agent" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
<?php 
if(isset($_POST['update'])){
    
      $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user'];
    $agent_no = $_POST['agent_no'];
    $agent_email = $_POST['agent_email'];
    
    
    $agent_img = $_FILES['agent_img']['name'];
    $temp_admin_image = $_FILES['agent_img']['tmp_name'];
    
    if(is_uploaded_file($_FILES['agent_img']['tmp_name'])){
    move_uploaded_file($temp_admin_image,"agent/$agent_img");
    
    $update_user = "update agent set fname='$fname',lname='$lname',username='$user',img='$agent_img',agent_no='$agent_no',agent_email='$agent_email' where id='$id'";
    
    $run_user = mysqli_query($con,$update_user);
    
    if($run_user){
        
        echo "<script>alert('Agent details has been updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
        
        
        
    }
}
// when no image was updated
else{
     $update_user = "update agent set fname='$fname',lname='$lname',username='$user',agent_no='$agent_no',agent_email='$agent_email' where id='$id'";
    
    $run_user = mysqli_query($con,$update_user);
    
    if($run_user){
        
        echo "<script>alert('Agent details has been updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
        
        
        
    }
}
    
}
?>
<?php } ?>
