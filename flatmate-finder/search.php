 <?php 
session_start();
  include ('inc/header.inc.php');   ?> 
   

      <?php 
      
              if (isset($_POST['add'])) {
                  //$search=mysqli_real_escape_string($con,$_POST['search']);
            //$search=preg_replace("#[^0-9a-z]#i", "", $search);
            $location=$_POST['location'];
            $type=$_POST['type'];
            $price=$_POST['price'];
            $_SESSION['type']=$_POST['type']; 
            $_SESSION['location']=$_POST['location']; 
             //$_SESSION['price']=$_POST['price'];
           

     $postTitle = "<div style='font-size:20px'>You searched For '" . $_POST['type'] . "' in '". $_POST['location']."'</div>" ;
     //$session=$postTitle;
    
     
         $sql ="SELECT  * from properties WHERE location='$location' AND type='$type'   order by id desc  limit 3";
$result = mysqli_query($con,$sql);
              }

              ?> 
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title"><?php echo $postTitle; ?></h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Properties</li>
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
if (mysqli_num_rows($result) > 0){
      while($row2 = mysqli_fetch_array($result)) {
         $house_img1=$row2['house_img1'];
           $house_label=$row2['house_label'];
           $house_price=$row2['house_price'];
           $location=$row2['location'];
           $id=$row2['id'];
           $status=$row2['status'];
            $house_id1=$row2['house_id'];
           $house_name=$row2['house_name'];
           $house_name2=$row2['house_name'];
           $house_name2=str_replace(" ", "-", $house_name2);
            $bathroom2=$row2['bathroom'];
                      $kitchen2=$row2['kitchen'];
                       $distance2=$row2['distance'];
                        $multiple_room=$row2['multiple_room'];
                        $how_many_multiple_room=$row2['how_many_multiple_room'];
             ?>

              <?php 
                     $query3 = mysqli_query($con,"SELECT * FROM bookings WHERE house_id='$house_id1'"); 
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


                           }//end

                             if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                            <a href="details.php?id=<?php echo $id; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
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
                                <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $house_price?></span>
                                   <a href="details.php?id=<?php echo $id; ?>"> <span class="type">View</span> </a>
                                   
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
                <!--Property end-->
                <?php 
            } }else
            {
                echo "<center>No Result Found</center>";
            }
               
              ?> 
                
            </div>

            
                <?php


  if(isset($_GET["page"])) {
                                            $page = $_GET["page"];
                                             }
                                             else{
                                              $page = 1;
                                             }
                                             $num_per_page = 03;
                                            $start_from = ($page-1)*$num_per_page;
     $sql ="SELECT  * from properties WHERE location='$location' AND type='$type' AND status='no'   order by id desc LIMIT $start_from, $num_per_page ";
$result = mysqli_query($con,$sql);


                                
                                     $sql_total = "SELECT * FROM properties where status='no' ";
                                    $records = mysqli_query($con,$sql_total);           
                                 $total_record = mysqli_num_rows($records);
                                
                                    
                                     $total_pages = ceil($total_record/$num_per_page);
                                     $previous= $page - 1;
                                     $Next=$page + 1;
                                     ?>

            <div class="row mt-20">
                <div class="col">
                    <ul class="page-pagination">
                       <?php
                         if($page>1){ ?>
                                    <li><a href="search-new.php?page=<?php echo $previous; ?>&price=<?php echo $house_price ;?>&type=<?php echo $type; ?>&location=<?php echo $location;?>"><i class="fa fa-angle-left"></i> Prev</a></li>
                               <?php }
                        for($i=1; $i <$total_pages; $i++){
                            if($i == $page){
                            $class_name = "active";
                        }else{
                        $class_name = "";
                            }?>
                            <li class='<?php echo $class_name ?>'><a  href='search-new.php?page=<?php echo $i; ?>&price=<?php echo $house_price ;?>&type=<?php echo $type; ?>&location=<?php echo $location;?>' class='btn btn-primary'><?php echo $i ?></a></li>
                       
                  <?php  }
                        if($i>$page) {?>  
                                
                                    <li><a href="search-new.php?page=<?php echo $Next; ?>&price=<?php echo $house_price ;?>&type=<?php echo $type; ?>&location=<?php echo $location;?>"><i class="fa fa-angle-right"></i> Next</a></li>
                               <?php }


                       ?>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    <!--New property section end-->
 
    
    <?php  include ('inc/footer.inc.php');   ?>