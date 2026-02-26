<?php 
ob_start(); // Start output buffering
include ('inc/session.php'); 
include ('inc/header.inc.php');   
if (isset($_POST['add'])) {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $_SESSION['type'] = $type;
    $_SESSION['location'] = $location;
    // Redirect to the same page with GET method
    header("Location: search.php?type=" . urlencode($type) . "&location=" . urlencode($location));
    exit();
}
if (isset($_GET['type']) && isset($_GET['location'])) {
    $type = $_GET['type'];
    $location = $_GET['location'];
    $postTitle = "<div style='font-size:20px'>You searched For '" . htmlspecialchars($type) . "' in '" . htmlspecialchars($location) . "'</div>";
    // Debugging: Echo the SQL query to verify its structure
    $sql = "
        SELECT p.*, 
               CASE 
                   WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                   ELSE 0 
               END AS booked 
        FROM properties p
        LEFT JOIN bookings b ON p.house_id = b.house_id
        LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
        WHERE p.type LIKE '%$type%'
        ORDER BY 
            CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
            CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
    ";
    
    // Execute the SQL query
    $result = mysqli_query($con, $sql);
    // Check if query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
}
?>
<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container"> 
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title"><?php echo $postTitle; ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Properties</li>
                </ul>
            </div>
        </div> 
    </div>
</div>
<!--Page Banner Section end-->
<style type="text/css">
       .blinking-text {
        animation: blinkTextOnly 1.5s infinite; /* Adjust speed as needed */
        color: green; /* Initial text color */
        font-weight: bold; /* Optional: Add emphasis */
    }
    @keyframes blinkTextOnly {
        0% { color: green; }
        50% { color: transparent; } /* Makes the text disappear */
        100% { color: green; }
    }
      .blinking-text2 {
        animation: blinkTextOnly2 1.5s infinite; /* Adjust speed as needed */
        color: red; /* Initial text color */
        font-weight: bold; /* Optional: Add emphasis */
    }
    @keyframes blinkTextOnly2 {
        0% { color: red; }
        50% { color: transparent; } /* Makes the text disappear */
        100% { color: red; }
    }
</style>
<!-- Scroll Buttons -->
<button id="scroll-up" class="scroll-button">↑</button>
<button id="scroll-down" class="scroll-button">↓</button>
<!--New property section start-->
<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <?php
            if (isset($result) && mysqli_num_rows($result) > 0) {
                while ($row2 = mysqli_fetch_array($result)) {
                    $house_img1 = $row2['house_img1'];
                    $house_label = $row2['house_label'];
                    $first_year_rent = $row2['first_year_rent'];
                    $second_year_rent = $row2['second_year_rent'];
                    // $second_year_rent=$row2=['second_year_rent'];
                    $location = $row2['location'];
                    $id = $row2['id'];
                    $status = $row2['status'];
                    $house_id1 = $row2['house_id'];
                    $house_name = $row2['house_name'];
                    $house_name2 = $row2['house_name'];
                    $agentaffilate_id = $row2['agentaffilate_id'];
                    $house_name2 = str_replace(" ", "-", $house_name2);
                    $bathroom2 = $row2['bathroom'];
                    $negotiable = $row2['negotiable'];
                    $kitchen2 = $row2['kitchen'];
                    $distance2 = $row2['distance'];
                    $multiple_room = $row2['multiple_room'];
                    $how_many_multiple_room = $row2['how_many_multiple_room'];
                    // Check if the house is booked
                    $query3 = mysqli_query($con, "SELECT house_id FROM bookings WHERE house_id='$house_id1' UNION SELECT house_id FROM bookings_urgent WHERE house_id='$house_id1'"); 
                    if (!$query3) {
                        die("Query failed: " . mysqli_error($con));
                    }
                    $row3 = mysqli_fetch_assoc($query3);
                    $house_id11 = $row3['house_id'] ?? null;
                       // Get the YouTube link from the database
    $youtubeLink = $row2['youtube_link'];
    // if (strpos($youtubeLink, '/shorts/') !== false) {
    //     // Convert Shorts link to standard embed format
    //     $videoId = explode('/shorts/', $youtubeLink)[1];
    //     $videoId = strtok($videoId, '?'); // Remove any query parameters
    //     $embedUrl = "https://www.youtube.com/embed/$videoId";
    // } elseif (strpos($youtubeLink, 'youtu.be/') !== false) {
    //     // Handle shortened YouTube links
    //     $videoId = explode('youtu.be/', $youtubeLink)[1];
    //     $videoId = strtok($videoId, '?'); // Remove any query parameters
    //     $embedUrl = "https://www.youtube.com/embed/$videoId";
    // } else {
    //     // For regular YouTube links, convert to embed format
    //     $embedUrl = str_replace('watch?v=', 'embed/', $youtubeLink);
    //     $embedUrl = strtok($embedUrl, '&'); // Remove additional query parameters 
    // }
    $embedUrl = $row2['youtube_link'];
    // Clean input values
$first_year_rent = (int)str_replace(',', '', $row2['first_year_rent']);
 $agent_fees = (int)str_replace(',', '', $row2['agent_fees']);
$initial_payment2 = $first_year_rent - $agent_fees;
$initial_payment=number_format($initial_payment2);
                // Predefine messages for each house type
 // Predefine messages for each house type
$houseMessages = [
    "Single room with shared toilet and bathroom" => "
    Hello,
A Single room in a cool student hall, available now
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
    "Single room in a flat with shared toilet and bathroom" => "
    Hello,
A Single room in a flat with shared toilet and bathroom is available now
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
     "Single room with personal toilet and bathroom" => "
Hello,
Single room with a private bathroom and toilet is available now 
 {{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
     ",
    "Self contain" => "
    Hello,
A single room self-contained unit just landed on Housemadeeasy, and it's perfect for you!
No sharing a kitchen or bathroom!
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
     "One bedroom flat" => "
  Be Your Own Boss! One bedroom flat Available Now!
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
 
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
   
    "Two bedroom flat with shared toilet and bathroom" => "
    Hello, 
A brand new 2-bedroom flat is now available on Housemadeeasy, perfect for you and your bestie (or study buddy)!  
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
    "Two bedroom flat with personal toilet in each room" => "
    
Hello, 
A brand new 2-bedroom flat just landed on Housemadeeasy, and guess what?  *Each room has its own private bathroom!*   
This is perfect for you and your bestie (or study buddy!).  
{{embedUrl}} 
 
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
    "Three bedroom flat with one bathroom and toilet" => "
   Hello,
We have a 3-bedroom flat perfect for you and your roommates with 1 shared bathroom and toilet.
 {{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
  
    "Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet" => "
    Hello,
We've got a brand new 3-bedroom flat with a master suite (bathroom included!) and a shared bathroom for the other two rooms!
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
    "Three bedroom flat with personal toilet and bathroom each" => "
    A three-bedroom flat with personal bathrooms for every room is available  now
{{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
 "Four bedroom flat with personal toilet and bathroom each" => "
 A  four-bedroom flat with personal bathrooms for every room!
  {{embedUrl}}
Total Payment: {{first_year_rent}}
Initial Payment: {{initial_payment}}
Kindly note: after inspection of house and Total payment has been made.
The Total payment is not refundable
 DO NOT WASTE TIME , FOR MORE INFORMATION, CLICK THE LINK BELOW
https://housemadeeasy.com.ng/details.php?id={{id}}
See you soon,
The Housemadeeasy Team
    ",
 
];
 
            
                    ?>
            <!--Property start-->
   <!-- Property start -->
<div class="property-item col-lg-4 col-md-6 col-12 mb-40">
    <div class="property-inner">
        <div class="image">
            <?php  
            if ($multiple_room == 'yes' && $how_many_multiple_room == 0) {
            ?>
            <a href="details.php?id=<?php echo $id; ?>">
                <span class="label2 blinking-text2" style="font-weight:bolder; color:red; font-size:20px">Unavailable</span>
            </a>
            <?php 
            } elseif ($multiple_room == 'no' && $house_id1 == $house_id11) {
            ?>
            <a href="details.php?id=<?php echo $id; ?>">
                <span class="label2 blinking-text2" style="font-weight:bolder; color:red; font-size:20px">Unavailable</span>
            </a>
            <?php 
            } elseif ($status == 'yes') {
            ?>
            <a href="details.php?id=<?php echo $id; ?>">
                <span class="label2 blinking-text2" style="font-weight:bolder; color:red; font-size:20px">Unavailable</span>
            </a> 
            <?php 
            } else {
                echo '<span class="label2 blinking-text" style="font-weight:bolder;">Available</span>';
            } 
            if (!empty($house_label)) {
            ?>
            <span class="label" style="font-weight:bolder;"><?php echo $house_label?></span>
            <?php } ?>
            <a href="details.php?id=<?php echo $id; ?>">
                <img src="assets/images/property/<?php echo $house_img1; ?>" alt="">
            </a>
            <ul class="property-feature">
                <li><span class="area"><img src="assets/images/icons/area.png" alt=""><?php echo $distance2?></span></li>
                <li><span class="bath"><img src="assets/images/icons/bath.png" alt=""><?php echo $bathroom2?></span></li>
                <li><span class="parking"><img src="assets/images/icons/kitchen2.png" alt="" style="height: 24px;"><?php echo $kitchen2?></span></li>
            </ul>
        </div>
        <div class="content">
            <div class="left">
                <h3 class="title"><a href="details.php?id=<?php echo $id; ?>"><?php echo $house_name;?></a></h3>
                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?php echo $location; ?></span>
            </div>
            <div class="right">
                <div class="type-wrap">
                    <span class="price" style="font-size: 15px;">#<?php echo $first_year_rent?></span>
                    <a href="details.php?id=<?php echo $id; ?>"><span class="type" style="margin-bottom:5px">View</span></a>
            <?php
// Check if there's a predefined message for this house type
$house_message_template = $houseMessages[$house_name] ?? null;
if ($house_message_template) {
    // Replace placeholders with actual values
    $house_message = str_replace(
        ['{{first_year_rent}}', '{{initial_payment}}',  '{{embedUrl}}',  '{{id}}'],
        [number_format($first_year_rent), $initial_payment, $embedUrl, $id],
        $house_message_template
    );
    // Encode message for WhatsApp sharing
    $whatsapp_message = urlencode($house_message);
    $whatsapp_link = "https://wa.me/?text=$whatsapp_message";
?>
    
    <!-- WhatsApp Share Button -->
    <span class="type">
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    </span>
<?php
} else {
    // Default share message if house type is not predefined
    $default_message = "Check out this property: $house_name located at $location. Price: #$first_year_rent. $embedUrl View more details: https://housemadeeasy.com.ng/details.php?id=$id";
    $whatsapp_link = "https://wa.me/?text=" . urlencode($default_message);
?>
    
    <!-- WhatsApp Share Button -->
    <span class="type">
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" style="display: flex; align-items: center; text-decoration: none; color: whitesmoke; font-weight: bolder;">
            <img src="whatsapp2.png" alt="WhatsApp" style="width: 15px; height: 15px; margin-right: 5px;">
            Share
        </a>
    </span>
<?php } ?>
           
                   
               
                </div>
            </div>
            <?php if ($multiple_room == 'yes' && $how_many_multiple_room != 0) { ?>
                <p class="text-center" style="font-weight:bolder;"><?php echo $how_many_multiple_room ?> Room left</p>
            <?php } ?>
           
            
        </div>
    </div>
</div>
<!-- Property end -->
            <!--Property end-->
            <?php 
                } 
            } else {
                $type = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : 'Unknown';
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : 'Unknown';
echo "<div style='font-size:20px; color: red; font-weight:bolder; text-align:center'>
        <center>No Apartment available for '$type' in '$location' at the Moment</center>
      </div>";
            }
            ?> 
        </div>
    </div>
</div>
<!--New property section end-->
<?php include ('inc/footer.inc.php'); ?>
<!-- Scroll Button Styles -->
<style>
.scroll-button {
    position: fixed;
    right: 20px;
    background-color: darkblue;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 24px;
    z-index: 1000;
    cursor: pointer;
}
#scroll-up {
    bottom: 80px;
}
#scroll-down {
    bottom: 20px;
}
</style>
<script>
document.getElementById('scroll-up').addEventListener('click', function() {
    window.scrollBy({
        top: -window.innerHeight,
        behavior: 'smooth'
    });
});
document.getElementById('scroll-down').addEventListener('click', function() {
    window.scrollBy({
        top: window.innerHeight,
        behavior: 'smooth'
    }); 
});
</script>
<!-- Scroll Button Script -->
<script>
let scrollInterval;
const startScrolling = (direction) => {
    const scrollAmount = direction === 'up' ? -50 : 50;
    scrollInterval = setInterval(() => {
        window.scrollBy(0, scrollAmount);
    }, 30);
};
const stopScrolling = () => {
    clearInterval(scrollInterval);
};
document.getElementById('scroll-up').addEventListener('mousedown', () => startScrolling('up'));
document.getElementById('scroll-up').addEventListener('mouseup', stopScrolling);
document.getElementById('scroll-up').addEventListener('mouseleave', stopScrolling);
document.getElementById('scroll-up').addEventListener('touchstart', () => startScrolling('up'));
document.getElementById('scroll-up').addEventListener('touchend', stopScrolling);
document.getElementById('scroll-down').addEventListener('mousedown', () => startScrolling('down'));
document.getElementById('scroll-down').addEventListener('mouseup', stopScrolling);
document.getElementById('scroll-down').addEventListener('mouseleave', stopScrolling);
document.getElementById('scroll-down').addEventListener('touchstart', () => startScrolling('down'));
document.getElementById('scroll-down').addEventListener('touchend', stopScrolling);
</script>
