<?php
include('inc/connect.inc.php');

$sql = "SELECT house_img1, house_img2, house_img3, house_img4 FROM properties LIMIT 5";
$result = mysqli_query($con, $sql);

echo "<h3>Image Paths from Database:</h3>";
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr><th>ID</th><th>house_img1</th><th>house_img2</th><th>house_img3</th><th>house_img4</th></tr>";

$i = 1;
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    foreach($row as $key => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";

echo "<h3>Files in assets/images/property directory:</h3>";
echo "<ul>";
$files = scandir('assets/images/property');
foreach($files as $file) {
    if($file != '.' && $file != '..') {
        echo "<li>" . $file . "</li>";
    }
}
echo "</ul>";

// Check if image files exist
echo "<h3>Image File Existence Check:</h3>";
$sql = "SELECT house_img1, house_img2, house_img3, house_img4 FROM properties LIMIT 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

foreach($row as $key => $value) {
    $fullPath = 'assets/images/property/' . $value;
    $exists = file_exists($fullPath);
    $status = $exists ? "<span style='color: green;'>✓ Exists</span>" : "<span style='color: red;'>✗ Not Found</span>";
    echo "<p><strong>" . $key . ":</strong> " . $value . " - " . $status . "</p>";
    if(!$exists && !empty($value)) {
        // Check for possible extension issues
        $fileNameWithoutExt = pathinfo($value, PATHINFO_FILENAME);
        $possibleExtensions = array('.jpg', '.jpeg', '.png', '.gif');
        foreach($possibleExtensions as $ext) {
            $alternatePath = 'assets/images/property/' . $fileNameWithoutExt . $ext;
            if(file_exists($alternatePath)) {
                echo "<p style='margin-left: 20px;'><strong>Alternate extension found:</strong> " . $fileNameWithoutExt . $ext . "</p>";
            }
        }
    }
}
?>