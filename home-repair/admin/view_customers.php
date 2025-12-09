<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Customers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> First Name: </th>
                                <th> Last Name: </th>
                                <th> E-Mail: </th>
                                <th> Phone No: </th>
                                <!-- <th> Send SMS: </th> -->
                               
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from user";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['id'];
                                    
                                    $fname = $row_c['fname'];
                                    
                                    $lname = $row_c['lname'];
                                    
                                    $c_email = $row_c['email'];
                                    
                                    $pno = $row_c['pno'];
                                    
                                    $password = $row_c['password'];
                                    //$pass_new=md5($password);
                                    
                                
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $fname; ?> </td>
                                <td> <?php echo $lname; ?></td>
                                <td> <?php echo $c_email; ?> </td>
                                
                                <td> <?php echo $pno; ?> </td>
                              <!--   <td> 

                                       <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                 
                       
                    
                          
                          <input name="send" value="Send SMS to Client" type="submit" class="btn btn-primary form-control">
                          
                     
                       
                   
                   
               </form>

                                 </td> -->
                                
                                <td> 
                                     
                                     <a href="index.php?delete_customer=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php


if(isset($_POST['send'])){
    
    
    // $query = mysqli_query($con,"SELECT * FROM user"); 
    //     $row = mysqli_fetch_assoc($query);
    //     $pno = $row['pno'];



// $sql = "SELECT * FROM user ";
//         $result= mysqli_query($con, $sql);

//         if ($result->num_rows > 0) {        
//             $found_user= mysqli_fetch_array($result);
//             $pno = $found_user['pno'];
                
            include 'send-sms-to-all-client.php';
       echo "<script>alert('SMS sent sucessfully')</script>";
        





        //echo "<script>window.open('index.php?dashboard','_self')</script>";





    
}

?>



<?php } ?>