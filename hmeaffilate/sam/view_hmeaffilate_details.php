 <div class="modal-body"> 
    <?php
    include 'includes/db.php';
    $id = $_POST['id'];
  if($_POST['id']){
    $sql = mysqli_query($con, $sql = "SELECT * FROM hmeaffilate_properties where id='$id' order by id ASC");
    while($row = mysqli_fetch_assoc($sql)){
      $house_img1=$row['house_img1'];
      
      
 
      
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>">
           <table class="table table-striped">
         
          <tr>
            <td class="text-center">Agent last Name</td>
            <td><?php echo $row['agent_lname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Agent first Name</td>
            <td><?php echo $row['agent_fname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Agent Phone Number</td>
            <td><?php echo $row['agent_pno'] ?></td>
          </tr>
           <tr>
            <td class="text-center">E-mail</td>
            <td><?php echo $row['agent_email'] ?></td>
          </tr>
          <tr>
            <td class="text-center">House Name</td>
            <td><?php echo $row['house_name'] ?></td>
          </tr>
          <tr>
            <td class="text-center">House Type</td>
            <td><?php echo $row['house_type'] ?></td> 
          </tr>
           <tr>
            <td class="text-center">House Price(First Year)</td>
            <td><?php echo $row['firstpayment'] ?></td>
          </tr>
           <tr>
            <td class="text-center">House Price(Subsquently)</td>
            <td><?php echo $row['secondpayment'] ?></td>
          </tr>
          <tr>
            <td class="text-center">House Location</td>
            <td><?php echo $row['house_location'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Currently Vacant</td>
            <td><?php echo $row['currentvacant'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Month it will be vacant(If no to the above)</td>
            <td><?php echo $row['monthvacant'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Contact of landlord 1</td>
            <td><?php echo $row['cont_land'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Contact of landlord 2</td>
            <td><?php echo $row['cont_land2'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Description of the House from OOUTH</td>
            <td><?php echo $row['house_desc'] ?></td>
          </tr>
           
           
            <tr>
            <td class="text-center">Front Picture of House</td>
            <td><img  style="padding: 5px" src="../assets/images/hmeaffilate_upload_house/<?php echo $house_img1; ?>" class="img-fluid" width="200" height="200"></td>
          </tr>
         
        
          
          
           
         
           
         </table>
    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       
        
    <?php
    }
    } mysqli_close($con);
     ?>
 
