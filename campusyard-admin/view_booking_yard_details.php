 <div class="modal-body"> 
    <?php
    include 'includes/db.php';
    $id = $_POST['id'];
  if($_POST['id']){
    $sql = mysqli_query($con, $sql = "SELECT * FROM market_place_properties_booking where id='$id' order by id ASC");
    while($row = mysqli_fetch_assoc($sql)){
      $item_img1=$row['item_img1'];
      $item_img2=$row['item_img2'];
      $item_img3=$row['item_img3'];
      $item_img4=$row['item_img4'];
        
      
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>">
           <table class="table table-striped">
         
          <tr>
            <td class="text-center">Last Name</td>
            <td><?php echo $row['lname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">First Name</td>
            <td><?php echo $row['fname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Phone Number</td>
            <td><?php echo $row['pno'] ?></td>
          </tr>
           <tr>
            <td class="text-center">E-mail</td>
            <td><?php echo $row['email'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Date Given</td>
            <td><?php echo $row['date_given'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Time Coming</td>
            <td><?php echo $row['timeslot'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Item Name</td>
            <td><?php echo $row['item_name'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Item lcoation</td>
            <td><?php echo $row['item_location'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Item Price</td>
            <td><?php echo $row['item_price'] ?></td>
          </tr>
          
           
          <tr>
             <td class="text-center">Picture 1</td>
            <td><img  style="padding: 5px" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img1; ?>" class="img-fluid" width="200" height="200"></td>
          </tr>
           <tr>
             <td class="text-center">Picture 2</td>
            <td><img  style="padding: 5px" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img2; ?>" class="img-fluid" width="200" height="200"></td>
          </tr>
           <tr>
             <td class="text-center">Picture 3</td>
            <td><img  style="padding: 5px" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img3; ?>" class="img-fluid" width="200" height="200"></td>
          </tr>
           <tr>
             <td class="text-center">Picture 4</td>
            <td><img  style="padding: 5px" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img4; ?>" class="img-fluid" width="200" height="200"></td>
          </tr>
        
          
          
           
         
           
         </table>
    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       
        
    <?php
    }
    } mysqli_close($con);
     ?>
 
