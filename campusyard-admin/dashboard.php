<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 

<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->
   
   
   

   
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red"><!-- panel panel-red begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $count_bookings; ?> </div>
                           
                        <div> Booking </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view-booking-yard"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Booking 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-red finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
</div><!-- row no: 2 finish -->

<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-8"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> New Orders
                    
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                            <tr><!-- th begin -->
                           
                                 <th> No: </th>
                                <th> Name: </th>
                                  <th> Date Booked: </th>
                                
                                <th> Phone Number: </th>

                                <th> Location: </th>
                                
                                <th> Tool: </th>
                               
                            
                            </tr><!-- th finish -->
                            
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                          
                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from market_place_properties_booking order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($con,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
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
                               
                                <td> <?php echo $id; ?> </td>
                                  
                               <td> <?php echo $lname . $fname; ?> </td>
                                <td> <?php echo $date; ?></td>
                                <td> <?php echo $pno; ?> </td>
                                <td> <?php echo $item_location; ?></td>
                             
                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="index.php?view_orders"><!-- a href begin -->
                        
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->
    
    <div class="col-md-4"><!-- col-md-4 begin -->
        <div class="panel"><!-- panel begin -->
            <div class="panel-body"><!-- panel-body begin -->
                <div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->

                    <img src="admin_images/HouseMadeEasylogo.jpg" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">
                    
                    <div class="thumb-info-title"><!-- thumb-info-title begin -->
                       
                        <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                        <!-- <span class="thumb-info-type"> <?php //echo $admin_job; ?> </span> -->
                        
                    </div><!-- thumb-info-title finish -->

                </div><!-- mb-md thumb-info finish -->
                
                <div class="mb-md"><!-- mb-md begin -->
                    <div class="widget-content-expanded"><!-- widget-content-expanded begin -->
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?> <br/>
                        
                        <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_contact; ?> <br/>
                    </div><!-- widget-content-expanded finish -->
                    
                    <hr class="dotted short">
                    
                    <!-- <h5 class="text-muted"> About Me </h5> -->
                    
                    <p><!-- p begin -->
                        
                        <?php //echo $admin_about; ?>
                        
                    </p><!-- p finish -->
                    
                </div><!-- mb-md finish -->
                
            </div><!-- panel-body finish -->
        </div><!-- panel finish -->
    </div><!-- col-md-4 finish -->
    
</div><!-- row no: 3 finish -->


<?php } ?>