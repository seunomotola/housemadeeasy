<?php
session_start();
include("../inc/connect.inc.php")');
function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); 
    return $data;
}
if (isset($_POST['user_register'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $confpass = mysqli_real_escape_string($con, $_POST['confpass']);
    $pno = mysqli_real_escape_string($con, $_POST['pno']);
    $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'index.php';
    $hashedpassword = md5($pass);
    $sql_l = "SELECT * FROM user WHERE email='$email'";
    $re_l = mysqli_query($con, $sql_l);
    $sql_p = "SELECT * FROM user WHERE password='$hashedpassword'";
    $re_p = mysqli_query($con, $sql_p);
    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($confpass) || empty($pno)) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Fill in all Fields</div>');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Email must be valid</div>');
    } elseif (mysqli_num_rows($re_l) > 0) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Email not Available...</div>');
    } elseif (mysqli_num_rows($re_p) > 0) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Password not Available.. please try another Password</div>');
    } elseif ($pass !== $confpass) {
        exit('<div style="color:red; text-align:center; font-size:15px;">Passwords do not match</div>');
    } else {
        $count_my_page = ("userid.txt");
        $hits = file($count_my_page);
        $hits[0]++;
        $fp = fopen($count_my_page, "w");
        fputs($fp, "$hits[0]");
        fclose($fp);
        $user_id = $hits[0];
        $sql = "INSERT INTO user (fname, lname, email, password, pno, token, user_id) VALUES ('$fname', '$lname', '$email', '$hashedpassword', '$pno', '', '$user_id')";
        mysqli_query($con, $sql);
        $sql_login = "SELECT * FROM user WHERE email = '$email' AND password='$hashedpassword' AND user_id='$user_id'";
        $result_login = mysqli_query($con, $sql_login);
        if ($result_login->num_rows > 0) {
            $found_user = mysqli_fetch_array($result_login); 
            $_SESSION['id'] = $found_user['id'];
            $_SESSION['email'] = $found_user['email'];
            $_SESSION['fname'] = $found_user['fname'];
            $_SESSION['lname'] = $found_user['lname'];
            $_SESSION['pno'] = $found_user['pno'];
            $_SESSION['user_id'] = $found_user['user_id'];
                   // If there are cart items in the session, move them to the database
        if (isset($_SESSION['cart']) && $_SESSION['house_id1']) {
            $session_cart = $_SESSION['cart'];
            $addtocarthouseid=$_SESSION['house_id1'];
            foreach ($session_cart as $property_id) {
                $check_cart_query = "SELECT * FROM cart WHERE user_id = '" . $found_user['id'] . "' AND property_id = '$property_id' AND house_id = '$addtocarthouseid'";
                $check_cart_result = mysqli_query($con, $check_cart_query);
                if (mysqli_num_rows($check_cart_result) == 0) {
                    date_default_timezone_set('Africa/Lagos');
                    $date_add_to_cart=date('Y-m-d h:i:s a', time());
                    $insert_cart_query = "INSERT INTO cart (user_id, property_id, house_id, added_on) VALUES ('" . $found_user['user_id'] . "', '$property_id', '$addtocarthouseid', '$date_add_to_cart')";
                    mysqli_query($con, $insert_cart_query);
                }
            }
            unset($_SESSION['cart']); // Clear session cart after moving to database
        }
            echo "<script>
                alert('Registration successful...logging you In...'); 
                window.location.href='$redirect_url';
            </script>";
        } else {
            echo "<script>
                alert('Registration not successful...Try again...');
                window.location.href='register.php';
            </script>";
        }
    }
} else {
    echo "<script>
        alert('Register first...');
        window.location.href='index.php';
    </script>";
}
?>
