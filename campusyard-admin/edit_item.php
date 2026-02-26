 <?php 
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['edit_item'])){
        
        $edit_id = $_GET['edit_item'];
        
        $get_p = "select * from market_place_properties where id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $id = $row_edit['id'];
     
    $item_name = $row_edit['item_name'];
    $item_img1 = $row_edit['item_img1'];
    $item_img2 = $row_edit['item_img2'];
    $item_img3 = $row_edit['item_img3'];
    $item_img4 = $row_edit['item_img4'];
    $youtube_link = $row_edit['youtube_link'];
    $item_location = $row_edit['item_location'];
   
     //$house_price = $row_edit['house_price'];
    $item_desc = $row_edit['item_desc'];
    $item_label = $row_edit['item_label'];
    $status = $row_edit['item_status'];
      $item_price = $row_edit['item_price'];
    
        
    }
        
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Market Item </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Market Item
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Update Market Item 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                    
                    
  <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="item_name" class="form-control"><!-- form-control Begin -->
                              
                              <option  disabled> Select an Item </option>
                              
                             <option  value="<?php echo $item_name; ?>"> <?php echo $item_name; ?> </option>
                             <option value="Wardrobe">Wardrobe</option>
                              <option value="Chair">Chair</option>
                             <option value="Bed">Bed</option>
                             <option value="Bed Frame">Bed Frame</option>
                             <option value="Books">Books</option>
                             <option value="Wall Hanger">Wall Hanger</option>
                             <option value="Bed">Bed</option>
                             <option value="Bed">Bed</option>
                             <option value="Bed">Bed</option>
                             <option value="Bed">Bed</option>
                             <option value="Bed">Bed</option>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                  
                   
                   
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item_location </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_location" type="text" class="form-control" required value="<?php echo $item_location?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img1 ?>" alt="<?php echo $item_img1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img2 ?>" alt="<?php echo $item_img2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img3 ?>" alt="<?php echo $item_img3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 4 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img4" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="../marketplace/assets/images/market_place_sell_item/<?php echo $item_img4 ?>" alt="<?php echo $item_img4; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                  
                   
                 
                    
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="item_desc" cols="19" rows="6" class="form-control" value="">
                              <?php echo $item_desc?>
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                  </div><!-- form-group Finish -->
                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Label </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="item_label" class="form-control"><!-- form-control Begin -->
                              
                              <option  disabled> Select a Label Product </option>
                              
                             <option  value="<?php echo $item_label; ?>"> <?php echo $item_label; ?> </option>
                             <option value="Hot">Hot</option>
                              <option value="New">New</option>
                             <option value="Old">Old</option>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> As the Item being paid for </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                           <select name="status2" class="form-control"><!-- form-control Begin -->
                              
                              <option  disabled > Select Status </option>
                              
                             <option  value="<?php echo $status; ?>"> <?php echo $status; ?> </option>
                             <option value="yes">yes</option>
                              <option value="no">no</option>
                            
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_price" type="text" class="form-control" required value="<?php echo $item_price?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
               
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Youtube link for item video  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="youtube" type="text" class="form-control" required value="<?php echo $youtube_link?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
           
                   
                  
               
                   
              
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Item" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>
<?php 
if(isset($_POST['update'])){
           $item_name2 = $_POST['item_name'];
   
    $item_location2 = $_POST['item_location'];
   
    
    $item_img1 = $_FILES['item_img1']['name'];
    $item_img2 = $_FILES['item_img2']['name'];
    $item_img3 = $_FILES['item_img3']['name'];
    $item_img4 = $_FILES['item_img4']['name'];
    
    $youtube2 = $_POST['youtube'];
     $item_price2 = $_POST['item_price'];
    $item_desc2 = $_POST['item_desc'];
    $item_label2 = $_POST['item_label'];
      $status2 = $_POST['status2'];
       
  
     
  // valid image extensions
   //$valid_extensions = array('house_img1', 'house_img2', 'house_img3', 'house_img4'); // valid extensions
//$all=$house_img1 '.' $house_img2 '.' $house_img3 '.' $house_img4;
 //$student_name=$row2['lastname'].", ".$row2['firstname'] ;
  if(is_uploaded_file($_FILES['item_img1']['tmp_name'])){
            // work for upload / update image
        // when you are updating the image, you don't update one and leave the rest but you update all
       $item_img1 = $_FILES['item_img1']['name'];
   
        
           $temp_name1 = $_FILES['item_img1']['tmp_name'];
   
    
    move_uploaded_file($temp_name1,"../marketplace/assets/images/market_place_sell_item/$item_img1");
        
        $update_product = "update market_place_properties set item_name='$item_name2',item_img1='$item_img1', item_price='$item_price2', item_location='$item_location2', item_label='$item_label2', item_status='$status2',item_desc='$item_desc2', youtube_link='$youtube2' where id='$id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            //die(mysqli_error($con));
        echo "<script>alert('Your Item has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_item','_self')</script>"; 
            
        }
        
    }
     elseif(is_uploaded_file($_FILES['item_img2']['tmp_name'])){
            // work for upload / update image
        // when you are updating the image, you don't update one and leave the rest but you update all
      
    $item_img2 = $_FILES['item_img2']['name'];
   
        
          // $temp_name1 = $_FILES['house_img1']['tmp_name'];
    $temp_name2 = $_FILES['item_img2']['tmp_name'];
   
    
 
    move_uploaded_file($temp_name2,"../marketplace/assets/images/market_place_sell_item/$item_img2");
  
        
       $update_product = "update market_place_properties set item_name='$item_name2',item_img2='$item_img2', item_price='$item_price2', item_location='$item_location2', item_label='$item_label2', item_status='$status2',item_desc='$item_desc2', youtube_link='$youtube2' where id='$id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            //die(mysqli_error($con));
        echo "<script>alert('Your Item has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_item','_self')</script>"; 
            
        }
        
    }
     elseif(is_uploaded_file($_FILES['item_img3']['tmp_name'])){
            // work for upload / update image
        // when you are updating the image, you don't update one and leave the rest but you update all
   
    $item_img3 = $_FILES['item_img3']['name'];
   
    $temp_name3 = $_FILES['item_img3']['tmp_name'];
   
    
   
    move_uploaded_file($temp_name3,"../marketplace/assets/images/market_place_sell_item/$item_img3");
   
        
       $update_product = "update market_place_properties set item_name='$item_name2',item_img3='$item_img3', item_price='$item_price2', item_location='$item_location2', item_label='$item_label2', item_status='$status2',item_desc='$item_desc2', youtube_link='$youtube2' where id='$id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            //die(mysqli_error($con));
        echo "<script>alert('Your Item has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_item','_self')</script>"; 
            
        }
        
    }
     elseif(is_uploaded_file($_FILES['item_img4']['tmp_name'])){
            // work for upload / update image
        // when you are updating the image, you don't update one and leave the rest but you update all
  
    $item_img4 = $_FILES['item_img4']['name'];
        
         
    $temp_name4 = $_FILES['item_img4']['tmp_name'];
    
 
    move_uploaded_file($temp_name4,"../marketplace/assets/images/market_place_sell_item/$item_img4");
        
        $update_product = "update market_place_properties set item_name='$item_name2',item_img4='$item_img4', item_price='$item_price2', item_location='$item_location2', item_label='$item_label2', item_status='$status2',item_desc='$item_desc2', youtube_link='$youtube2' where id='$id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            //die(mysqli_error($con));
        echo "<script>alert('Your Item has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_item','_self')</script>"; 
            
        }
        
    }
    else{
        // work when no update image
        
        $update_product = "update market_place_properties set item_name='$item_name2', item_price='$item_price2', item_location='$item_location2', item_label='$item_label2', item_status='$status2',item_desc='$item_desc2', youtube_link='$youtube2' where id='$id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            //die(mysqli_error($con));
        echo "<script>alert('Your Item has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_item','_self')</script>"; 
            
        }
        
       
    }
    
}
?>
<?php } ?>
