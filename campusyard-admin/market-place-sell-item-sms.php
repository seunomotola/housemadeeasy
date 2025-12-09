

<?php 

$con = mysqli_connect("localhost","root","","housemadeeasy");

    if(isset($_GET['item_id'])){
        
        $item_id = $_GET['item_id'];
        
        $get_p = "select * from market_place_properties where item_id='$item_id'"; 
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $id = $row_edit['id'];
     $item_id = $row_edit['item_id'];
     $item_price = $row_edit['item_price'];  
     $item_name = $row_edit['item_name'];
     $item_link="https://www.housemadeeasy.org/marketyard-details.php?id=$id;";
    // $house_location = $row_edit['house_location']; 
    // $house_type = $row_edit['type'];
    // $house_name = $row_edit['house_name'];
    // $agent_img = $row_edit['agent_img'];
    // $house_img1 = $row_edit['house_img1'];
    // $house_img2 = $row_edit['house_img2'];
    // $house_img3 = $row_edit['house_img3'];
   
        
    }
        

                               
                            
                                $get_c = "select * from user";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['id'];
                                    
                                    $fname = $row_c['fname'];
                                    
                                    $lname = $row_c['lname'];
                                    $email = $row_c['email'];
                                    
                                   
                                    
                                    $pno = $row_c['pno'];
                                    
                                  
                                      include 'send-market-place-sms-to-all-client.php';
                                      include 'send-market-place-mail-to-all-client.php';
                                      //echo "<script>alert('SMS sent sucessfully')</script>";
                                      //echo "<script>alert('House has been inserted sucessfully')</script>";
       echo "<script>window.open('index.php?view_item','_self')</script>";
                                
                                    }
                       




    


