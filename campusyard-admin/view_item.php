<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{ 

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Market Item
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Market Item 
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Product ID: </th>
                               
                                <th> Item Name: </th>
                                <th> Item Location: </th>
                                
                                <th> Item Image: </th>
                                <th> Item Price: </th>
                                <th> Tools: </th>
                                <th> Item Status: </th> 
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from market_place_properties";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $id = $row_pro['id'];
                                    
                                    $item_location = $row_pro['item_location'];

                                    
                                    
                                    $item_img1 = $row_pro['item_img1'];
                                    
                                    $item_price = $row_pro['item_price'];
                                    
                                    $item_name = $row_pro['item_name'];
                                    
                                    $item_status = $row_pro['item_status'];

                                     $item_id = $row_pro['item_id'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $item_name; ?> </td>
                                <td> <?php echo $item_location; ?> </td>
                                
                               
                                <td> <img src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img1; ?>" width="60" height="60"></td>
                                <td> # <?php echo $item_price; ?> </td>
                               
                                 <td> 
                                     
                                     <a href="index.php?edit_item=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 

                                     <a href="index.php?delete_item=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a>

                                     <!-- <a href="index.php?market-place-sell-item-sms=<?php //echo $id; ?>">
                                     
                                        <i class="fa fa-envelope-o"></i> Send SMS 
                                    
                                     </a> -->
                                    
                                </td> 
                              
                                                                            <?php if($item_status=='yes'){?>
 <td><a class='btn btn-success btn-xs' href='item-status.php?publish=no&p_id=<?php echo $row_pro['item_id'];?>' title='click to set the Item to Not taken ' onclick='return confirm("Do you want to set the Item to Not taken ?")'><span class='fa fa-remove'></span> Yes</a></td>
<?php 
}
else{
  ?>
   <td><a class='btn btn-primary btn-xs' href='item-status.php?publish=yes&p_id=<?php echo $row_pro['item_id'];?>' title='click to set the Item to  taken' onclick='return confirm(" Do you want to set the Item to  taken ?")'><span class='fa fa-remove'></span> No</a></td>
   <?php
}?>
                                
                                
                               
                              
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>