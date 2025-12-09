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
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/flatmate.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Flatmate Finder</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="main.php">Home</a></li>
                        <li class="active">Flatmate Finder</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

<!--New property section start-->
    <div class="property-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">


            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <a class="active"><h4 style="font-size: 20px; font-weight: bolder;" >Houses that needs Flatmate <br></h4> </a>
                       
                    </div>
                </div>
            </div>
            <!--Section Title end-->
           
          
            
            <div class="row">
                  <?php 
                    $sql = "SELECT * FROM flatmate_finder_properties where house_label='hot' and status='no' order by id ASC";
                    if($query = $con->query($sql)){
                    while($row2 = $query->fetch_assoc()){

                         $house_img1=$row2['house_img1'];
                         $house_img2=$row2['house_img2'];
                    // $student_name=$row2['lastname'].", ".$row2['firstname'] ;

                      $house_label=$row2['house_label'];
                      $first_year_rent=$row2['first_year_rent'];
                     $location=$row2['location'];
                     $id=$row2['id'];
                     $status=$row2['status'];
                      $house_name=$row2['house_name'];
                      $house_name2=$row2['house_name'];
                      $house_location=$row2['house_location'];
                      $house_id1=$row2['house_id'];
                      $multiple_room=$row2['multiple_room'];
                      $bathroom2=$row2['bathroom'];
                      $kitchen2=$row2['kitchen'];
                       $distance2=$row2['distance'];
                      
                      $how_many_multiple_room=$row2['how_many_multiple_room'];
                    $house_name2=str_replace(" ", "-", $house_name2);
                     ?> 

                      <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM flatmate_finder_bookings WHERE house_id='$house_id1'"); 
                      $row3 = mysqli_fetch_assoc($query3);
                     $house_id11=$row3['house_id'];

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

                                 <a href="flat-mate-finder-details.php?id=<?php echo $id; ?>" >
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
                                 <a href="flat-mate-finder-details.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                               <img src="assets/images/notavailable/4new.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" > 
                                </span>
                                </a>
                            <?php }

                                elseif ($status=='yes') {
                                    // i will write a code in the admin end to update status to yes in properties and update house_id in booking to null
                                 ?>
                                 <a href="flat-mate-finder-details.php.php?id=<?php echo $id; ?>" >
                                <span class="label2">
                                <img src="assets/images/notavailable/unnew.png" style=" height: 150px; margin: 50px 0px 0px 30px; padding: 5px; text-align:center" >
                                </span>
                                </a> 
                               <?php }

                           }// end


                            if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>



                            <a href="flat-mate-finder-details.php?id=<?php echo $id; ?>" ><img src='assets/images/property/<?php echo $house_img2; ?>' alt=""></a>
                              <ul class="property-feature">
                                <li><!--- distance --->
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance2?></span>
                                </li>
                                
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom2?></span>
                                </li>
                                <li> <!--- Kitchen --->
                                    <span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen2?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="content">

                            <div class="left">
                                <h3 class="title"> <a href="flat-mate-finder-details.php?id=<?php echo $id; ?>">A flatmate is needed in a <?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo ucwords($house_location).', ' . $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                                   <a href="flat-mate-finder-details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                   
                                </div>
                            </div>
                             <?php 
                             if ($multiple_room=='yes') {?>
                                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?> Self Contained Room left</p>
                             <?php }else{
                                
                             }
                            
                            ?>
                        </div>
                 
                    </div>
                 
                </div>
                          <?php 
                }}else
                {
                  echo "<div style='text-align:center'>No House at the Moment </div>"; 
                } ?>
                <!--Property end-->
               
                
                
            </div>
            
        </div>
    </div>
    <!--New property section end-->

     <?php  include ('inc/footer.inc.php');   ?>