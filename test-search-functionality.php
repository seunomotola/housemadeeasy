<?php
// Test script to verify search functionality
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include('inc/session.php');
include('inc/connect.inc.php');

echo "<h2>Search Functionality Test</h2>";

// Test 1: Search for Single Room properties in Sagamu
echo "<h3>Test 1: Searching for Single Room in Sagamu</h3>";
$_GET['location'] = 'Sagamu';
$_GET['type'] = 'Single Room';

// Run search logic
$sql = "SELECT * FROM properties WHERE 1=1";
if(!empty($_GET['location'])){
    $sql .= " AND location = '{$_GET['location']}'";
}
if(!empty($_GET['type'])){
    $sql .= " AND type = '{$_GET['type']}'";
}

$result = mysqli_query($con, $sql);
echo "<p>Query: " . $sql . "</p>";
echo "<p>Found " . mysqli_num_rows($result) . " properties</p>";

if(mysqli_num_rows($result) > 0){
    $properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<div style='max-width: 800px; margin: 20px auto;'>";
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background: #f2f2f2;'><th>Property</th><th>Location</th><th>Price</th></tr>";
    foreach($properties as $property){
        echo "<tr style='border: 1px solid #ddd;'><td>" . $property['house_name'] . "</td><td>" . $property['location'] . ", " . $property['house_location'] . "</td><td>#" . number_format($property['first_year_rent']) . "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}

// Test 2: Search for 2 Bedroom Flat properties in Sagamu
echo "<hr>";
echo "<h3>Test 2: Searching for 2 Bedroom Flat in Sagamu</h3>";
$_GET['location'] = 'Sagamu';
$_GET['type'] = '2 Bedroom Flat';

$sql = "SELECT * FROM properties WHERE 1=1";
if(!empty($_GET['location'])){
    $sql .= " AND location = '{$_GET['location']}'";
}
if(!empty($_GET['type'])){
    $sql .= " AND type = '{$_GET['type']}'";
}

$result = mysqli_query($con, $sql);
echo "<p>Query: " . $sql . "</p>";
echo "<p>Found " . mysqli_num_rows($result) . " properties</p>";

if(mysqli_num_rows($result) > 0){
    $properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<div style='max-width: 800px; margin: 20px auto;'>";
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background: #f2f2f2;'><th>Property</th><th>Location</th><th>Price</th></tr>";
    foreach($properties as $property){
        echo "<tr style='border: 1px solid #ddd;'><td>" . $property['house_name'] . "</td><td>" . $property['location'] . ", " . $property['house_location'] . "</td><td>#" . number_format($property['first_year_rent']) . "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}

// Test 3: Empty search (should show hot properties)
echo "<hr>";
echo "<h3>Test 3: Empty search (should show hot properties)</h3>";
$_GET['location'] = '';
$_GET['type'] = '';

$sql = "SELECT p.*, 
        CASE 
            WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
            ELSE 0 
        END AS booked 
    FROM properties p
    LEFT JOIN bookings b ON p.house_id = b.house_id
    LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
    where p.house_label='hot'
    ORDER BY 
        CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
        CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";

$result = mysqli_query($con, $sql);
echo "<p>Query: " . $sql . "</p>";
echo "<p>Found " . mysqli_num_rows($result) . " hot properties</p>";

if(mysqli_num_rows($result) > 0){
    $properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<div style='max-width: 800px; margin: 20px auto;'>";
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background: #f2f2f2;'><th>Property</th><th>Location</th><th>Price</th></tr>";
    foreach($properties as $property){
        echo "<tr style='border: 1px solid #ddd;'><td>" . $property['house_name'] . "</td><td>" . $property['location'] . ", " . $property['house_location'] . "</td><td>#" . number_format($property['first_year_rent']) . "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}

echo "<hr>";
echo "<h3>Database Connection Status</h3>";
if($con){
    echo "<p>✅ Connection successful</p>";
} else {
    echo "<p>❌ Connection failed</p>";
}

echo "<h3>Session Variables</h3>";
echo "<p>Search Location: " . (isset($_SESSION['search_location']) ? $_SESSION['search_location'] : 'Not set') . "</p>";
echo "<p>Search Type: " . (isset($_SESSION['search_type']) ? $_SESSION['search_type'] : 'Not set') . "</p>";
if(isset($_SESSION['search_results'])){
    echo "<p>Search Results: " . count($_SESSION['search_results']) . " properties</p>";
} else {
    echo "<p>Search Results: Not set</p>";
}
?>