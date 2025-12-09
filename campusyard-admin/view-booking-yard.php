<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Campus Yard booking
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Campus Yard booking
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Name: </th>
                                  <th> Date Booked: </th>
                                
                                <th> Phone Number: </th>

                                <th> Location: </th>
                                
                                <th> Tool: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish --> 
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from market_place_properties_booking";
                                
                                $run_orders = mysqli_query($con,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                       
                                    $id = $row_order['id'];
                                    
                                    $item_name = $row_order['item_name'];

                                    $item_location = $row_order['item_location'];
                                    
                                    $date = $row_order['date_booked'];

                                     $item_price = $row_order['item_price'];
                                    
                                    
                                    
                                    $item_location = $row_order['item_location'];
                                    
                                    $pno = $row_order['pno'];

                                    $fname = $row_order['fname'];

                                    $lname = $row_order['lname'];
                                    
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                             <td> <?php echo $lname . $fname; ?> </td>
                                <td> <?php echo $date; ?></td>
                                <td> <?php echo $pno; ?> </td>
                                <td> <?php echo $item_location; ?></td>
                                
                               
                                <td> 
                                     
                                     <a href="index.php?delete_campus_yard=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a>  
                                     
                                     <a  class="btn btn-info btn-xs" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $id ?>" id="getyard">View</a>
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


  <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 style="text-align: center;" class="modal-title">
                     <i class=""></i> Booking Detail's for Campus Yard
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div> 


<?php } ?>

