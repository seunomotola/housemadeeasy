   <?php 
              if (isset($_POST['add'])) {
                  $search=mysqli_real_escape_string($con,$_POST['search']);
            $search=preg_replace("#[^0-9a-z]#i", "", $search);
            $location=$_POST['location'];
            $type=$_POST['type'];
            $price=$_POST['price'];
           
     $postTitle = "You searched For '" . $_POST['type'] . "' in '". $_POST['location']."'" ;
         $sql ="SELECT  * from properties WHERE house_price='$price'  order by id desc";
$result = mysqli_query($con,$sql);
              }
              ?> 
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
           $house_name=$row2['house_name'];
           $house_name2=$row2['house_name'];
           $house_name2=str_replace(" ", "-", $house_name2);
             ?>
                <!--Property start-->
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                             <?php if(!empty($house_label)){?>
                                <span class="label"><?php echo $house_label?></span>
                            <?php }else{
                            }
                                ?>
                            <a href="details/<?php echo $house_name2; ?>"><img src="assets/images/property/<?php echo $house_img1; ?>" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="details/<?php echo $house_name2; ?>"><?php echo $house_name;?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price" style="font-size: 15px;">#<?php echo $house_price?><span style="font-size: 12px;">Yr</span></span>
                                   <a href="details/<?php echo $house_name2?>"> <span class="type">View</span> </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->
                <?php 
            } }
                ?>
               
               
                
            </div>
            
            <div class="row mt-20">
                <div class="col">
                    <ul class="page-pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i> Prev</a></li>
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#">05</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Next</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
