<?php 

   $con = mysqli_connect("localhost","root","","housemadeeasy");

?> 

<?php 

    if(isset($_GET['house_id'])){ 
        
        $house_id = $_GET['house_id'];
        
        $get_p = "select * from properties where house_id='$house_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $id = $row_edit['id'];
     $house_id = $row_edit['house_id'];
     $first_year_rent = $row_edit['first_year_rent'];  
     $house_name = $row_edit['house_name'];
     $house_link="https://www.housemadeeasy.org/details.php?id=$id;";
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
                                    
                                  
                                      include 'send-properties-sms-to-all-client.php';
                                      include 'send-properties-mail-to-all-client.php';
                                       echo "<script>window.open('index.php?view_products','_self')</script>";
       
                                
                                    }
                       







