<?php
session_start();
include("../inc/connect.inc.php");

function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = ucwords($data);
    return $data;
}
if (isset($_POST['user_login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $hashedpassword = md5($pass);
    $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'index.php';
    if (empty($email) || empty($pass)) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('<div style="color:red; text-align:center; font-size:15px;">E-mail must be Valid</div>');
    } else {
        $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'") or die(mysqli_error($con));
        $row2 = mysqli_fetch_assoc($query);
        if (!$row2) {
            exit('<div style="color:red; text-align:center; font-size:15px;">Incorrect Details</div>');
        }
        $user_id = $row2['user_id'];
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$hashedpassword' AND user_id = '$user_id'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $found_user = mysqli_fetch_array($result);
            $_SESSION['id'] = $found_user['id'];
            $_SESSION['email'] = $found_user['email'];
            $_SESSION['fname'] = $found_user['fname'];
            $_SESSION['lname'] = $found_user['lname'];
            $_SESSION['pno'] = $found_user['pno'];
            $_SESSION['user_id'] = $found_user['user_id'];
            // Set cookies to maintain the session
            setcookie('user_id', $found_user['user_id'], time() + (86400 * 30), "/");
            setcookie('user_email', $found_user['email'], time() + (86400 * 30), "/");
            setcookie('user_fname', $found_user['fname'], time() + (86400 * 30), "/");
            setcookie('user_lname', $found_user['lname'], time() + (86400 * 30), "/");
            // Move cart from session to database
            if (isset($_SESSION['cart']) && isset($_SESSION['house_id1'])) {
                $session_cart = $_SESSION['cart'];
                $addtocarthouseid = $_SESSION['house_id1'];
                foreach ($session_cart as $property_id) {
                    $check_cart_query = "SELECT * FROM cart WHERE user_id = '" . $found_user['id'] . "' AND property_id = '$property_id' AND house_id = '$addtocarthouseid'";
                    $check_cart_result = mysqli_query($con, $check_cart_query);
                    if (mysqli_num_rows($check_cart_result) == 0) {
                        date_default_timezone_set('Africa/Lagos');
                        $date_add_to_cart = date('Y-m-d h:i:s a', time());
                        $insert_cart_query = "INSERT INTO cart (user_id, property_id, house_id, added_on) VALUES ('" . $found_user['user_id'] . "', '$property_id', '$addtocarthouseid', '$date_add_to_cart')";
                        mysqli_query($con, $insert_cart_query);
                    }
                }
                unset($_SESSION['cart']); // Clear session cart after moving to database
            }
            echo "<script>
                alert('Login successful...please wait');
                window.location.href='$redirect_url';
            </script>";
            exit();
        } else {
            exit('<div style="color:red; text-align:center; font-size:15px;">Incorrect Details</div>');
        }
    }
} else {
    echo "<script>
        alert('Login first ...');
        window.location.href='index.php';
    </script>";
    exit();
}
?>
