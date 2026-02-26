<?php 
require_once("inc/session.php");
// code user email availablity
if(!empty($_POST["contactid"])) {
	$contactid2= $_POST["contactid2"];
	
		$sql ="SELECT * FROM hmeaffilate_properties";
$result = mysqli_query($con, $sql);
// $cont_land=$result['cont_land'];
//  $cont_land2=$result['cont_land2'];
if (mysqli_num_rows($result) > 0) {
echo "<span style='color:red; text-align: center; font-weight:bolder; font-size:15px'>This house you want to upload has already been uploaded.</span>";
 echo "<script>$('#hidebutton').prop('disabled',true);</script>";
}
else{
	
	echo "<span style='color:green; text-align: center; font-weight: bolder; font-size: 15px'> This house has not been uploaded.</span>";
 echo "<script>$('#hidebutton').prop('disabled',false);</script>";
}
}
?>
