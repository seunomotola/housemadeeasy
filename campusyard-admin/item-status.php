<?php include("includes/db.php"); ?>

<?php
if(isset($_GET['publish']) && isset($_GET['p_id'])){

	$publish = $_GET['publish'];
	$p_id= $_GET['p_id'];


	mysqli_query($con, "UPDATE market_place_properties set  item_status='$publish' where item_id='$p_id'");
	mysqli_query($con,"UPDATE market_place_properties_bookings SET item_id = '' WHERE item_id = '$p_id' " );
	

	//if (mysqli_query($con, $sql)) { 
		if ($publish=='yes') {
			  echo "<script>alert('Student Item set to taken  ...')</script>";
        echo "<script>window.open('index.php?view_item','_self')</script>";
			      
		}else{
			

    echo "<script>alert(Student Item not set to taken...')</script>";
        echo "<script>window.open('index.php?view_item','_self')</script>";
		}

   

//}else{
  //die(mysqli_error($con));
//}

}