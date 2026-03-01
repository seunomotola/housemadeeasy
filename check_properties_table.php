<?php
require 'inc/connect.inc.php';

echo "Checking properties table structure:<br><br>";

// Check if properties table exists
$result = mysqli_query($con, "SHOW TABLES LIKE 'properties'");
if (mysqli_num_rows($result) > 0) {
    echo "Properties table exists.<br><br>";
    
    // Describe table structure
    $describeResult = mysqli_query($con, "DESCRIBE properties");
    if ($describeResult) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = mysqli_fetch_assoc($describeResult)) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br><br>";
    }
    
    // Check if there are any properties
    $countResult = mysqli_query($con, "SELECT COUNT(*) as count FROM properties");
    $countRow = mysqli_fetch_assoc($countResult);
    echo "Number of properties in table: " . $countRow['count'] . "<br><br>";
    
    // Get sample properties
    $sampleResult = mysqli_query($con, "SELECT * FROM properties ORDER BY id DESC LIMIT 5");
    if (mysqli_num_rows($sampleResult) > 0) {
        echo "Sample properties:<br><br>";
        while ($property = mysqli_fetch_assoc($sampleResult)) {
            echo "ID: " . $property['id'] . "<br>";
            echo "House Name: " . $property['house_name'] . "<br>";
            echo "Address: " . $property['house_address'] . "<br>";
            echo "City: " . $property['city'] . "<br>";
            echo "Price: " . $property['price'] . "<br>";
            echo "Bedrooms: " . $property['bedrooms'] . "<br>";
            echo "Bathrooms: " . $property['bathrooms'] . "<br>";
            echo "---<br>";
        }
    } else {
        echo "No properties found in the table.<br>";
    }
} else {
    echo "Properties table does not exist.<br>";
}

mysqli_close($con);
?>