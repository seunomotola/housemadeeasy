 <div class="modal-body"> 
    <?php
    include 'includes/db.php';
    $id = $_POST['id'];
  if($_POST['id']){
    $sql = mysqli_query($con, $sql = "SELECT * FROM hmeaffilate_user where id='$id' order by id ASC");
    while($row = mysqli_fetch_assoc($sql)){
      $picture=$row['picture'];
      
      
 
      
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>">
           <table class="table table-striped">
            <tr col-span="1" class="pull-right">
            <center style="margin: 10px">
                 <?php
             if($picture==''){
              echo "<a href='#edit_photo' data-toggle='modal' class=' photo' data-id='".$row['id']."'><span class='fa fa-edit' style='font-size:21px;'></span></a>";
              ?>
              <br>
           <img width='100' height='100' style="padding: 5px" class="img-fluid" src='../student/img/profile.png' >
           
             <?php
          }else{ 
          
            ?>
              <br>     
            <img  style="padding: 5px" src="../assets/images/hmeaffilate_img/<?php echo $row['picture']?>" class="img-fluid" width="200" height="200">
          <?php          
        }
            ?>
            </center>
          </tr>
         
          <tr>
            <td class="text-center">Agent last Name</td>
            <td><?php echo $row['lname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Agent first Name</td>
            <td><?php echo $row['fname'] ?></td>
          </tr>
           <tr>
            <td class="text-center">Agent Phone Number</td>
            <td><?php echo $row['pno'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Agent ID</td>
            <td><?php echo $row['agentaffilate_id'] ?></td>
          </tr>
           <tr>
            <td class="text-center">E-mail</td>
            <td><?php echo $row['email'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Bank Name</td>
            <td><?php echo $row['bankname'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Account Name</td>
            <td><?php echo $row['accountname'] ?></td>
          </tr>
          <tr>
            <td class="text-center">Account Number</td>
            <td><?php echo $row['accountno'] ?></td>
          </tr>
           
           
           
         
        
          
          
           
         
           
         </table>
    
         <div class="modal-footer">
           
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       
        
    <?php
    }
    } mysqli_close($con);
     ?>
 
