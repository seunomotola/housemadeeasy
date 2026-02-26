 <?php 
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Market Item </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Market Item
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Market Item 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                  
                 <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                 <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="item_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select an Item </option> 
                              
                             <option value="Wardrobe">Wardrobe&Shelves</option>
                              <option value="Table&Chair">Table&Chair</option>
                             <option value="Cooking">Cooking Utensils</option>
                             <option value="Bedding">Bedding</option>
                             <option value="Books">Books</option>
                             <option value="Appliances">Appliances</option>
                             <option value="bathing">Bathing Needs</option>
                              <option value="Floor">Floor Material</option>
                            
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                 
                   
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 1 </label>  
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img2" type="file" class="form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                  
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img3" type="file" class="form-control form-height-custom">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Image 4 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_img4" type="file" class="form-control form-height-custom">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item_location </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_location" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="item_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                    
                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Label </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="item_label" class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Select a Label Product </option>
                              
                             <option value="Hot">Hot</option>
                              <option value="New">New</option>
                             <option value="Old">Old</option>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
  
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Item Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="item_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                     
          
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> As the Item being paid for  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                         
                           <select name="status" required class="form-control"><!-- form-control Begin -->
                              
                              <option selected disabled> Choose an option </option>
                              
                            
                              <option value="no">no</option>
                             
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish --> 
                       
                   </div><!-- form-group Finish -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Youtube link for Item video  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="youtube" type="text" class="form-control" required placeholder="Paste the video link for this item ">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               
    
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insert Item" type="submit" class="btn btn-primary form-control">
                          
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
if(isset($_POST['submit'])){
    
    $item_name = $_POST['item_name'];
      $item_cat = $_POST['item_cat'];
   
    $item_location = $_POST['item_location'];
   
    
    $item_img1 = $_FILES['item_img1']['name'];
    $item_img2 = $_FILES['item_img2']['name'];
    $item_img3 = $_FILES['item_img3']['name'];
    $item_img4 = $_FILES['item_img4']['name'];
    
    $youtube = $_POST['youtube'];
     $item_price = $_POST['item_price'];
    $item_desc = $_POST['item_desc'];
    $item_label = $_POST['item_label'];
      $status = $_POST['status'];
      
        
    
   
    
    $temp_name1 = $_FILES['item_img1']['tmp_name'];
    $temp_name2 = $_FILES['item_img2']['tmp_name'];  
    $temp_name3 = $_FILES['item_img3']['tmp_name'];
    $temp_name4 = $_FILES['item_img4']['tmp_name'];
    
    
    move_uploaded_file($temp_name1,"../marketplace/assets/images/market_place_sell_item/$item_img1");
    move_uploaded_file($temp_name2,"../marketplace/assets/images/market_place_sell_item/$item_img2");
    move_uploaded_file($temp_name3,"../marketplace/assets/images/market_place_sell_item/$item_img3");
    move_uploaded_file($temp_name4,"../marketplace/assets/images/market_place_sell_item/$item_img4");
   
    //give house an id, which is unique to it
    $item_id = "0123456789qwertzuioplkjhgfdsayxcvbnmABCDEFGHIKLMNOPQRSTUVZ";
      $item_id = str_shuffle($item_id);
      $item_id = substr($item_id, 0, 10);
    
    $insert_product = "INSERT into market_place_properties (item_name, item_cat, item_img1, item_img2, item_img3, item_img4, item_price, item_location, item_label, item_id, item_status, item_desc, youtube_link) values ('$item_name', '$item_cat', '$item_img1','$item_img2','$item_img3','$item_img4','$item_price', '$item_location', '$item_label', '$item_id', '$status', '$item_desc', '$youtube')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){?>
         <script>
             alert('Student Item has been inserted sucessfully...');
             window.location.href='market-place-sell-item-sms.php?item_id=<?php echo $item_id; ?>';  
    </script>;
        
        
  <?php   }else{
        ///echo "<script>alert('House not inserted sucessfully')</script>";
        die(mysqli_error($con));
    }
    
}
?>
<?php } ?>
