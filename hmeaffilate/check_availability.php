<?php
require_once("inc/session.php");
if (!empty($_POST["contactid"]) || !empty($_POST["contactid2"])) {
    $contactid = $_POST["contactid"];
    $contactid2 = $_POST["contactid2"];
    $sql = "SELECT * FROM hmeaffilate_properties WHERE cont_land='$contactid' OR cont_land='$contactid2'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<span style='color:red; text-align: center; font-weight:bolder; font-size:15px'>This house you want to upload has already been uploaded.</span>";
        echo "<script>$('#hidebutton').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green; text-align: center; font-weight: bolder; font-size: 15px'>This house has not been uploaded.</span>";
        echo "<script>$('#hidebutton').prop('disabled', false);</script>";
    }
}
?>
