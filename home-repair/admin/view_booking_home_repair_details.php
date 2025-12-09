 <div class="modal-body"> 

    <?php
    include 'includes/db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($con, $sql = "SELECT * FROM home_repair_booking where id='$id' order by id ASC");
    while($row = mysqli_fetch_assoc($sql)){
      $photo1=$row['photo1'];
       $photo2=$row['photo2'];
      $photo3=$row['photo3'];
      $photo4=$row['photo4'];
      

      
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
            <td class="text-center">Location</td>
            <td><?php echo $row['location'] ?></td>
          </tr>


           <tr>
            <td class="text-center">Description</td>
            <td><?php echo $row['description'] ?></td>
          </tr>

           
            <tr>
            <td class="text-center">Type of Apartment</td>
            <td><?php echo $row['kindofapartment'] ?></td>
          </tr>


            <tr>
             <td class="text-center">Picture 1</td>
            <td><img  style="padding: 5px" src="../assets/images/home-repair-customer-image/<?php echo $photo1; ?>" class="img-fluid" width="200" height="200"></td>

          </tr>

           <tr>
             <td class="text-center">Picture 2</td>
            <td><img  style="padding: 5px" src="../assets/images/home-repair-customer-image/<?php echo $photo2; ?>" class="img-fluid" width="200" height="200"></td>

          </tr>

           <tr>
             <td class="text-center">Picture 3</td>
            <td><img  style="padding: 5px" src="../assets/images/home-repair-customer-image/<?php echo $photo3; ?>" class="img-fluid" width="200" height="200"></td>

          </tr>

           <tr>
             <td class="text-center">Picture 4</td>
            <td><img  style="padding: 5px" src="../assets/images/home-repair-customer-image/<?php echo $photo4; ?>" class="img-fluid" width="200" height="200"></td>

          </tr>



           <tr>
            <td class="text-center">Date Booked</td>
            <td><?php echo $row['date_booked'] ?></td>
          </tr>



        



          


          

           

         
           
         </table>



    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       

        

    <?php
    }
    } mysqli_close($con);
     ?>



 