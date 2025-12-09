 <div class="modal-body"> 

    <?php
    include 'includes/db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($con, $sql = "SELECT * FROM bookings where id='$id' order by id ASC");
    while($row = mysqli_fetch_assoc($sql)){
      $agent_img=$row['agent_img'];
      $house_img1=$row['house_img1'];
      $house_img2=$row['house_img2'];
      $house_img3=$row['house_img3'];
      $house_img4=$row['house_img4'];
      //$class=$row['class'];

      
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>">

           <table class="table table-striped">
          <tr col-span="1" class="pull-right">
            <center style="margin: 10px">

                 <?php
             if($agent_img==''){
            ?>
           <img width='100' height='100' style="padding: 5px" class="img-fluid" src='../student/img/profile.png' >
             <?php
          }else{   
             echo "<a href='#edit_photo' data-toggle='modal' class=' photo' data-id='".$row['id']."'><span class='fa fa-edit' style='font-size:21px;'></span></a>"; 
            ?>
               <br>    
            <img  style="padding: 5px" src="../assets/images/agent_img/<?php echo $agent_img; ?>" class="img-fluid" width="100" height="100">
          <?php          
          }
            ?>
            </center>
          </tr>

          <tr>
            <td class="text-center">Agent Name</td>
            <td><?php echo $row['agent'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Agent Pno</td>
            <td><?php echo $row['agent_pno'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Agent E-mail</td>
            <td><?php echo $row['agent_email'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Location</td>
            <td><?php echo $row['location'] ?></td>
          </tr>


           <tr>
            <td class="text-center">House Location</td>
            <td><?php echo $row['house_location'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Customer Name</td>
            <td><?php echo $row['lname']  . $row['fname'] ?></td>
          </tr>

           <tr>
            <td class="text-center">TimeSlot</td>
            <td><?php echo $row['timeslot'] ?></td>
          </tr>

           <tr>
            <td class="text-center">E-mail</td>
            <td><?php echo $row['email'] ?></td>
          </tr>


           <tr>
            <td class="text-center">Date</td>
            <td><?php echo $row['date'] ?></td>
          </tr>


           <tr>
            <td class="text-center">Customer Number</td>
            <td><?php echo $row['pno'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Type</td>
            <td><?php echo $row['type'] ?></td>
          </tr>


           <tr>
            <td class="text-center">House Name</td>
            <td><?php echo $row['house_name'] ?></td>
          </tr>


           <tr>
            <td class="text-center">House Img1</td>
            <td><img  style="padding: 5px" src="../assets/images/property/<?php echo $house_img1; ?>" class="img-fluid" width="100" height="100"></td>
          </tr>


           <tr>
            <td class="text-center">House Img2</td>
            <td><img  style="padding: 5px" src="../assets/images/property/<?php echo $house_img2; ?>" class="img-fluid" width="100" height="100"></td>
          </tr>

           <tr>
            <td class="text-center">House Img3</td>
            <td><img  style="padding: 5px" src="../assets/images/property/<?php echo $house_img3; ?>" class="img-fluid" width="100" height="100"></td>
          </tr>


           <tr>
            <td class="text-center">House Img4</td>
            <td><img  style="padding: 5px" src="../assets/images/property/<?php echo $house_img4; ?>" class="img-fluid" width="100" height="100"></td>
          </tr>


           <tr>
            <td class="text-center">Price</td>
            <td><?php echo $row['house_price'] ?></td>
          </tr>

           <tr>
            <td class="text-center">House Desc</td>
            <td><?php echo $row['house_desc'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Amenities</td>
            <td><?php echo $row['amenities'] ?></td>
          </tr>


           <tr>
            <td class="text-center">House label</td>
            <td><?php echo $row['house_label'] ?></td>
          </tr>


           <tr>
            <td class="text-center">Distance</td>
            <td><?php echo $row['distance'] ?></td>
          </tr>


           <tr>
            <td class="text-center">Kitchen</td>
            <td><?php echo $row['kitchen'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Bathroom</td>
            <td><?php echo $row['bathroom'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Door</td>
            <td><?php echo $row['door'] ?></td>
          </tr>

           <tr>
            <td class="text-center">Fence</td>
            <td><?php echo $row['fence'] ?></td>
          </tr>

           <tr>
            <td class="text-center">water Source</td>
            <td><?php echo $row['water_source'] ?></td>
          </tr>

           

         
           
         </table>



    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       

        

    <?php
    }
    } mysqli_close($con);
     ?>



 