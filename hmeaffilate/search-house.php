<?php
include('inc/connect.inc.php');

if (isset($_POST['house_type'])) { 
    $house_type = $_POST['house_type'];

   $stmt = $con->prepare("SELECT * FROM properties WHERE type = ? AND status = 'no' LIMIT 1000");
$stmt->bind_param("s", $house_type);
$stmt->execute();
$result = $stmt->get_result();


    if (mysqli_num_rows($result) > 0) {
        echo '<div class="list-group">';
        while ($row = mysqli_fetch_assoc($result)) {

             $first_year_rent = (int)str_replace(',', '', $row['first_year_rent']); 
      $agent_fees = (int)str_replace(',', '', $row['agent_fees']);



$initial_payment2 = $first_year_rent - $agent_fees;

$initial_payment=number_format($initial_payment2);

            $house_link="https://www.housemadeeasy.com.ng/details.php?id=" . $row['id'];
            echo '<div class="list-group-item">';
            echo '<h5>' . htmlspecialchars($row['house_name']) . '</h5>';
            echo '<p><strong>Location:</strong> ' . htmlspecialchars($row['house_location']) . '</p>';
            echo '<p class="house-video-link"><strong>House Video:</strong> ' . htmlspecialchars($row['youtube_link']) . '</p>';
            echo '<p class="first-year-rent"><strong>Total Payment:</strong> ₦' . $row['first_year_rent'] . '</p>';
            echo '<p class="second-year-rent"><strong>Initial Payment:</strong> ₦' . $initial_payment . '</p>';
            echo '<p class="house-link"><strong>House link:</strong> ' . $house_link . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No available houses found for this type.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>
