<?php
// Load the database configuration file
$connect = mysqli_connect("localhost", "root", "", "housemadeeasy");
if(isset($_POST['submit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                
                 $lastname  = mysqli_real_escape_string($connect, $line[0]);
                 $firstname   = mysqli_real_escape_string($connect, $line[1]);
                 $other_name   = mysqli_real_escape_string($connect, $line[2]);
               
                $phonenumber  = mysqli_real_escape_string($connect, $line[3]);
                $email  = mysqli_real_escape_string($connect, $line[4]);
                $class  = mysqli_real_escape_string($connect, $line[5]);
                $other_contact  = mysqli_real_escape_string($connect, $line[6]);
                //$phone  = $line[2];
                //$status = $line[3];

             
                 $query = "INSERT into contact_all_student(lname, fname, other_name, pno, email, class, other_contact) values('$lastname', '$firstname', '$other_name', '$phonenumber','$email', '$class', '$other_contact')";
                mysqli_query($connect, $query);
                              
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
           echo "<script>alert('Import done');</script>";
        }else{
            die(mysqli_error($con));
        }
    }else{
        echo "<script>alert('Invalid File extension');</script>";
    }
}
//header('location: import-voters.php');

?> 
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="POST" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
 </body>  
</html>
