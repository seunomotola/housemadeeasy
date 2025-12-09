<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{ 

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View HMEAFFILATE House
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View HMEAFFILATE House 
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Product ID: </th>
                                <th> Agent: </th>
                                <th> House Name: </th>
                                <th> Location: </th>
                                <th> Type: </th>
                                <th> House Image: </th>
                              
                                <th> Tools: </th>
                                
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from hmeaffilate_properties";
                                
                                if($run_pro = mysqli_query($con,$get_pro)){
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $id = $row_pro['id'];

                                    $agent_fname = $row_pro['agent_fname'];
                                    $house_name = $row_pro['house_name'];
                                     $agent_lname = $row_pro['agent_lname'];
                                    
                                    $house_location = $row_pro['house_location'];

                                    $type = $row_pro['house_type'];
                                    
                                    $house_img1 = $row_pro['house_img1'];
                                    
                                    

                                     $house_id = $row_pro['house_id'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $agent_fname .''. $agent_lname; ?> </td>
                                <td> <?php echo $house_name; ?> </td>
                                <td> <?php echo $house_location; ?> </td>
                                <td> <?php echo $type; ?> </td>
                               
                                <td> <img src="../assets/images/hmeaffilate_upload_house/<?php echo $house_img1; ?>" width="60" height="60"></td>
                                
                                     
                                    
                                 <td> 
                                     
                                     <a href="index.php?delete-hmeaffilate-house=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a>  
                                     
                                     <a  class="btn btn-info btn-xs" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $id ?>" id="gethmeaffilate">View</a>
                                </td>
                                    
                                    
                               
                              
 
                                
                                
                               
                              
                            </tr><!-- tr finish -->
                            
                            <?php } } else{
                                echo "<div style='text-align:center'>No Uploaded House available right now</div>";
                            } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


 <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 style="text-align: center;" class="modal-title">
                     <i class=""></i> Uploaded House Detail's
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div> 

<?php } ?>