<?php
require 'inc/connect.inc.php';

// Get property images
$result = mysqli_query($con, 'SELECT id, house_name, house_img1 FROM properties ORDER BY id DESC LIMIT 6');

echo "<h2>Property Image Paths Test</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>House Name</th><th>Image Path</th><th>File Exists</th><th>Image Preview</th></tr>";

while ($property = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $property['id'] . "</td>";
    echo "<td>" . $property['house_name'] . "</td>";
    echo "<td>" . $property['house_img1'] . "</td>";
    
    $fileExists = file_exists($property['house_img1']) ? "Yes" : "No";
    echo "<td>" . $fileExists . "</td>";
    
    if ($fileExists == "Yes") {
        echo "<td><img src='" . $property['house_img1'] . "' width='100' height='100' alt='Property Image'></td>";
    } else {
        echo "<td><img src='assets/images/placeholder.jpg' width='100' height='100' alt='Placeholder'></td>";
    }
    
    echo "</tr>";
}

echo "</table>";
?>