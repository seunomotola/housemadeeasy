  <?php  
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
}
// if(!isset($_SESSION['email'])){
//      echo  "<script>
//     alert('Login/Register first ...');
//     window.location.href='index.php';
//     </script>";
//   }
 include ('inc/header.inc.php');   ?>
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">All Apartment</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">All Apartment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <div class="row">
                 <?php 
                    //$sql = "SELECT * FROM properties where status='no'";"
       $sql="SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
     
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";
                    $query = $con->query($sql);
                     if ($query->num_rows > 0) {
                    while($row2 = $query->fetch_assoc()){
                         $house_img1=$row2['house_img1'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;
                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                      $house_name=ucwords($row2['house_name']);
                      $house_name2=$row2['house_name'];
                      $house_id1=$row2['house_id'];
                      $status=$row2['status'];
                       $multiple_room=$row2['multiple_room'];
                       $negotiable=$row2['negotiable'];
                       $bathroom6=$row2['bathroom'];
                      $kitchen6=$row2['kitchen'];
                       $distance6=$row2['distance'];
                       $how_many_multiple_room=$row2['how_many_multiple_room'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?> 
                <?php 
                  // Check if the house is booked
                    $query3 = mysqli_query($con, "SELECT house_id FROM bookings WHERE house_id='$house_id1' UNION SELECT house_id FROM bookings_urgent WHERE house_id='$house_id1'"); 
                    if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                    $row3 = mysqli_fetch_assoc($query3);
                    $house_id11 = $row3['house_id'] ?? null;
                    ?>
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40"> 
                    <div class="property-inner">
                        <div class="image">
                             <?php 
                               if ($multiple_room=='yes') {
                                // code...
                            
                                if ($how_many_multiple_room==0) {
                                    //it will display an image of allbooked
                                    ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                           <?php }
                            
                        }//end of multiple room
                         //begin of not multiple room
                        elseif ($multiple_room=='no'){
                            if ($house_id1==$house_id11) {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now
                               ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }
                              elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }
                           }// end
                               /// working for label
                             if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                             <a href="details.php?id=<?php echo $id; ?>"><img src='assets/images/property/<?php echo $house_img1; ?>' alt=""></a>
                            <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance6?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom6?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen6?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"> <a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                    <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                                  <?php
                                     if ($negotiable=='yes') { ?>
                                     <a href="details.php?id=<?php echo $id; ?>"> <span class="type" style=""><?php echo strtoupper("negotiable"); ?></span></a>
                               
                                
                                <?php }else{ 
                                }
                                    ?>
                                </div>
                            </div>
                               <?php 
                             if ($multiple_room=='yes' &&$how_many_multiple_room!=0) {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?>  Room left</p>
                             <?php }elseif ($multiple_room=='yes' && $how_many_multiple_room==0) {
                                 // code...
                             }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <!--Property end-->
               
               <?php } }?>
                
            </div>
            
             
           
            
        </div>
    </div>
    <!--New property section end-->
       <!--whatapp chat icon-->
       <span class="sticky_whatsapp" style=" background-color: rgba(200, 200, 200, 0.6); border-radius: 20px; text-align: center;padding: 5px; "><img src="whatsapp2.png" height="20" width="20" style=""> <a href="https://wa.me/+2348160852570?text=Welcome+to+Housemadeeasy+Customer+Care,+I+need+the+Video+of+this+House+as+soon+as+Possible..." style="color: #183153"><b>Need help?</b></a> </span>
      <!--whatapp chat icon end-->
    
    <?php  include ('inc/footer.inc.php');   ?> 
