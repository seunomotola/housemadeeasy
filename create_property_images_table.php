<?php
include 'inc/connect.inc.php';

// Create property_images table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS property_images (
    id INT(11) NOT NULL AUTO_INCREMENT,
    property_id INT(11) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (mysqli_query($con, $sql)) {
    echo "property_images table created successfully (or already exists)\n";
    
    // Make existing images in properties table optional
    $alterSql1 = "ALTER TABLE properties MODIFY house_img1 VARCHAR(255) NULL;";
    $alterSql2 = "ALTER TABLE properties MODIFY house_img2 VARCHAR(255) NULL;";
    $alterSql3 = "ALTER TABLE properties MODIFY house_img3 VARCHAR(255) NULL;";
    $alterSql4 = "ALTER TABLE properties MODIFY house_img4 VARCHAR(255) NULL;";
    
    if (mysqli_query($con, $alterSql1) && mysqli_query($con, $alterSql2) && mysqli_query($con, $alterSql3) && mysqli_query($con, $alterSql4)) {
        echo "Existing image columns made optional successfully\n";
    } else {
        echo "Error modifying existing image columns: " . mysqli_error($con) . "\n";
    }
    
    // Add index for faster queries
    $indexSql = "CREATE INDEX IF NOT EXISTS idx_property_id ON property_images(property_id);";
    if (mysqli_query($con, $indexSql)) {
        echo "Index created successfully\n";
    } else {
        echo "Error creating index: " . mysqli_error($con) . "\n";
    }
    
} else {
    echo "Error creating property_images table: " . mysqli_error($con) . "\n";
}

mysqli_close($con);
?>