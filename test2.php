     <?php
		$db_host = 'localhost';
	$db_user = 'housema2_housema2';
	$db_pass = 'housemadeeasy';
	$db_name = 'housema2_housemadeeasy';
	$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
	echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
	}

	
?>
     <form method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group"><!-- form-group Begin -->

                                            <label class="col-md-3 control-label"> House Type </label> 

                                            <div class="col-md-6"> 
                                             <select name="house_type" required class="form-control" ><!-- form-control Begin -->
                              
                              <option selected disabled> Select House Type </option>

                              <option value="Single Room">Single Room</option>

                              <option value="Self contain">Self contain</option>

                              <option value="1 Bedroom Flat">1 Bedroom Flat</option>

                             
                              
                             <option value="2 Bedroom Flat">2 Bedroom Flat</option>

                             <option value="3 Bedroom Flat">3 Bedroom Flat</option>

                             <option value="4 Bedroom Flat">4 Bedroom Flat</option>

                             
                              
                          </select><!-- form-control Finish -->
                                        </div>

                                    </div>

                                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                                </form>
<?php 
ob_start(); // Start output buffering
 

 if(isset($_POST['submit'])){
$house_type = $_POST['house_type'];

  $update_product = "update properties set house_name='One bedroom flat' where type='$house_type'";
        
     mysqli_query($con,$update_product);

 }

