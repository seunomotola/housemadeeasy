<?php
include('inc/connect.inc.php');

// Test script to check YouTube links in properties
echo "<h2>YouTube Link Verification</h2>";

// Get properties with YouTube links
$query = "SELECT id, house_name, youtube_link FROM properties WHERE youtube_link IS NOT NULL AND youtube_link != '' LIMIT 10";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    echo "<h3>Properties with YouTube links:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'><th>Property ID</th><th>Property Name</th><th>YouTube Link</th><th>Link Length</th></tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['house_name'];
        $link = $row['youtube_link'];
        $length = strlen($link);
        
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td><a href='$link' target='_blank'>$link</a></td>";
        echo "<td>$length</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No properties with YouTube links found in the first 10 records.</p>";
}

// Show all properties to check if any have YouTube links
echo "<h3>All Properties (first 20):</h3>";
$query = "SELECT id, house_name, youtube_link FROM properties LIMIT 20";
$result = mysqli_query($con, $query);

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f2f2f2;'><th>Property ID</th><th>Property Name</th><th>YouTube Link</th><th>Link Length</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['house_name'];
    $link = $row['youtube_link'];
    $length = strlen($link);
    
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td><a href='$link' target='_blank'>$link</a></td>";
    echo "<td>$length</td>";
    echo "</tr>";
}
echo "</table>";
?>