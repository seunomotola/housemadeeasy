<div class="row"> 
                 <?php 
                    $sql = "SELECT * FROM market_place_properties where item_status='no' and item_name='Chair'"; 
                    $query = $con->query($sql);
                     if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $item_img1=$row2['item_img1'];
                    
                      $item_label=$row2['item_label'];
                      $item_price=$row2['item_price'];
                    
                     $id=$row2['id'];
                      $item_name=ucwords($row2['item_name']);
                      
                      $item_id1=$row2['item_id'];
                      $item_status=$row2['item_status'];
                      $item_location=$row2['item_location'];
                       
                   
                     ?>  
                <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM market_place_properties_booking WHERE item_id='$item_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $item_id_renew=$row3['item_id'];
                    ?>
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40"> 
                    <div class="property-inner">
                        <div class="image">
                             <?php 
                      
                            if ($item_id1==$item_id_renew) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }
                              elseif ($item_status=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="marketyard-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }
                          
                               /// working for label
                             if(!empty($item_label)){?>
                                <span class="label"><?php echo $item_label?></span>
                            <?php }else{
                            }
                                ?>
                             <a href="marketyard-details.php?id=<?php echo $id; ?>"><img src='assets/images/market_place_sell_item/<?php echo $item_img1; ?>' alt=""></a>
                           <!--  <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance6?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom6?></span>
                                </li>
                                <li> 
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen6?></span>
                                </li>
                            </ul> -->
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"> <a href="marketyard-details.php?id=<?php echo $id; ?>"><?php echo $item_name;?> for sale</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $item_location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $item_price?></span>
                                    <a href="marketyard-details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                <!--Property end-->
               
               <?php } }else{
                echo "<div style='text-align:center; font-weight:bolder'>Chair are not available at the Moment</div>";
               }?>
                
            </div>
