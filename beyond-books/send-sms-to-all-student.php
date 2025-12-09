  

<?php
    $db_host = 'localhost';
  $db_user = 'housxjjr_housxjjr';
  $db_pass = 'housemadeeasy';
  $db_name = 'housxjjr_housemadeeasy';
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('no connection to the MYSL server');
if(mysqli_connect_errno()){
  echo 'Failed to connect to the MYSQL: '.mysqli_connect_error();
  }

  $get_c = "select * from beyondbooks";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['id'];
                                    
                                    $fname = $row_c['fname'];
                                    
                                    $lname = $row_c['lname'];
                                    $email = $row_c['email'];
                                    
                                   
                                    
                                    $pno = $row_c['pno'];
                                    
                                  
                                  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://my.kudisms.net/api/sms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('token' => 'bCSnXjYpRZHQE9v5gusm4ThtV3dDwlM70oGKIzOF6kaU8PNceyf2qxLJiWr1AB','senderID' => 'HouseMadeE','recipients' => "$pno",'message' => "

Dear $lname

Today is the D-day for housemadeeasyworkshop 1.0.....
come and learn how to make money with housemadeeasy....
Beyond Books: Building wealth through Housemadeeasy.
Holding at Adebola Adegunwa Audio Visual Hall Nursing Department OOUTH on 9th of February, 2024 by 10am.
Lot of freebies to be won..


Thank You

    ",'gateway' => '1'), 
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
                                       //echo "<script>window.open('index.php?view_house','_self')</script>";
       
                                
                                    }


