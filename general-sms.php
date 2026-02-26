<?php
  $get_c = "select * from user";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['id'];
                                    
                                    $fname = $row_c['fname'];
                                    
                                    $lname = $row_c['lname'];
                                    $email = $row_c['email'];
                                    
                                   
                                    
                                    $pno = $row_c['pno'];
                                    
                                  
                                      include 'send-properties-sms-to-all-client.php';
                                       include 'send-properties-whatapp-to-all-client.php'; 
                                      include 'send-properties-mail-to-all-client.php'; 
                                      // begin
                                      $get_c = "select * from contact_all_student";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['id'];
                                    
                                    $fname = $row_c['fname'];
                                    
                                    $lname = $row_c['lname'];
                                    $email = $row_c['email'];
                                    
                                   
                                    
                                    $pno = $row_c['pno'];
                                    
                                  
                                      include 'send-properties-sms-to-all-client.php';
                                       include 'send-properties-whatapp-to-all-client.php'; 
                                      include 'send-properties-mail-to-all-client.php'; 
                                       echo "<script>window.open('index.php?view_products','_self')</script>";
       
                                
                                    }
                                      // end
                                       //echo "<script>window.open('index.php?view_products','_self')</script>";
       
                                
                                    }
                       
