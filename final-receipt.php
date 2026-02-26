<?php 
include 'inc/session.php';
require('fpdf186/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
$key = $_GET['key']; 
$user_id = $_SESSION['user_id'];
$total_price = isset($_SESSION['total_price']) ? number_format($_SESSION['total_price']) : '';
// First, get the booking details for the specified house
$query = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$user_id' AND house_id='$key'"); 
if (!$query || mysqli_num_rows($query) == 0) {
    die("No bookings found for the specified house.");
}
$row = mysqli_fetch_assoc($query);
$date = $row['date'];
$timeslot = $row['timeslot'];
// Fetch all bookings by the user on the same date and time
$all_bookings_query = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$user_id' AND date='$date' AND timeslot='$timeslot'");
if (!$all_bookings_query) {
    die("Query failed: " . mysqli_error($con));
}
// Initialize a counter for numbering the houses
$house_number = 1;
// Prepare the PDF document
$pdf->AddPage();
$logo = 'assets/images/HouseMadeEasylogo.jpg';
$pdf->Image($logo, 5, 2, 25, 25);
$pdf->SetFont('Times', 'B', 20);
$pdf->cell(40, 6, "", 0, 0);
$pdf->cell(35, 6, "", 0, 0);
$pdf->cell(24, 2, "Housemadeeasy", 0, 0, 'C');
$pdf->SetFont('Times', 'B', 8);
$pdf->cell(40, 1, "", 0, 0);
$pdf->cell(50, 1, "", 0, 1);
$pdf->SetFont('Times', '', 10);
$pdf->cell(60, 5, "", 0, 0);
$pdf->cell(68, 12, "website: www.housemadeeasy.org", 0, 0);
$pdf->SetFont('Times', 'B', 8);
$pdf->cell(2, 5, "", 0, 0);
$pdf->cell(1, 7, "", 0, 1);
$pdf->SetFont('Times', 'I', 10);
$pdf->cell(55, 5, "", 0, 0);
$pdf->cell(5, 5, "Motto: Helping you to find your desire house", 0, 0);
$pdf->SetFont('Times', 'B', 8);
$pdf->cell(69, 5, "", 0, 0);
$pdf->cell(5, 2, "", 0, 0); 
$pdf->cell(78, 7, "", 0, 1);
$pdf->SetFont('Times', 'B', 8);
$pdf->cell(40, 6, "", 0, 0, 'C');
$pdf->cell(30, 6, "", 0, 0, 'C');
$pdf->cell(30, 9, "BELOW ARE THE DETAILS OF THE HOUSE AND AGENT IN CHARGE", 0, 1, 'C');
$pdf->SetFont('Times', 'B', 10);
$pdf->cell(40, 6, "", 0, 0, 'C');
$pdf->cell(30, 6, "", 0, 0, 'C');
$pdf->SetTextColor(255, 0, 0); // Set text color to red (RGB: 255, 0, 0)
$pdf->cell(30, 9, "DON'T FORGET TO CALL HOUSEMADEEASY CUSTOMER CARE SERVICES", 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0); // Set text color to red (RGB: 255, 0, 0)
$pdf->SetFont('Times', '', 12);
$pdf->cell(10, 7, "", 0, 0);
$pdf->cell(100, 8, "Agent Name: Housemadeeasy Customer Care", 0, 1);  
$pdf->SetFont('Times', '', 12);
$pdf->cell(10, 7, "", 0, 0);
$pdf->cell(100, 8, "Agent Phone Number: 07063826326, 08160852570", 0, 1);
$pdf->cell(10, 7, "", 0, 0);
$pdf->cell(100, 8, "Checking Fees: #$total_price", 0, 1);
$pdf->cell(10, 7, "", 0, 0);
$pdf->cell(100, 8, "Date Booked to check House: $date", 0, 1);
$pdf->cell(10, 7, "", 0, 0);
$pdf->cell(100, 8, "Time Booked to check the House: $timeslot", 0, 1);
// Iterate over all bookings and add details to the PDF
while ($row = mysqli_fetch_assoc($all_bookings_query)) {
    $fname = ucfirst($row['fname']);
    $lname = strtoupper($row['lname']);
    $house_name = $row['house_name'];
    $agent_name = $row['agent'];
    $agent_pno = $row['agent_pno'];
    $agent_email = $row['agent_email'];
    $House_name = $row['house_name'];
    $location_session = $row['location'];
    $house_exact_session = $row['house_location'];
    $first_year_rent = $row['first_year_rent'];
    $second_year_rent = $row['second_year_rent'];
    $pdf->cell(10, 15, "", 0, 0);
    $pdf->cell(100, 8, "$house_number. Type of House: $House_name", 0, 1);
    $pdf->cell(10, 7, "", 0, 0);
    $pdf->cell(100, 8, "Location of House: $house_exact_session, $location_session", 0, 1);
    $pdf->cell(10, 7, "", 0, 0);
    $pdf->cell(100, 8, "First Year Price: #$first_year_rent", 0, 1);
    $pdf->cell(10, 7, "", 0, 0);
    $pdf->cell(100, 8, "Subsequent Price: #$second_year_rent", 0, 1);
    $pdf->cell(1, 10, "", 0, 1);
    // Increment the house number
    $house_number++;
}
// Output the PDF directly to the browser
$filename = $fname . ' ' . $house_name . ' checking fees receipt.pdf';
$pdf->Output('I', $filename);
?>
