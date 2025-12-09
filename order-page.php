<?php
 if (isset($_COOKIE['referral_code'])) {
      // code...
  
// Expire the cookie
 setcookie('referral_code', '', time() - 3600, "/");

// Check if the cookie is still set 
if (isset($_COOKIE['referral_code'])) {
    echo "The cookie 'referral_code' was not successfully deleted.";
} else {
    echo "The cookie 'referral_code' has been successfully deleted.";
}
}else{
    
}
include('inc/session.php');
//session_start();

$is_logged_in = isset($_SESSION['user_id']);
$cart_items = [];

if ($is_logged_in) {
    $user_id = $_SESSION['user_id'];

    // Fetch the cart items for the logged-in user
    $cart_query = "SELECT properties.*, cart.quantity 
                   FROM cart 
                   JOIN properties ON cart.property_id = properties.id 
                   WHERE cart.user_id = '$user_id'";
    $cart_result = mysqli_query($con, $cart_query);

    while ($item = mysqli_fetch_assoc($cart_result)) {
        $cart_items[] = $item;
    }
} else {
    // Fetch cart items from the session for non-logged-in users
    if (isset($_SESSION['cart'])) {
        $session_cart = $_SESSION['cart'];
        foreach ($session_cart as $property_id) {
            $cart_query = "SELECT * FROM properties WHERE id = '$property_id'";
            $cart_result = mysqli_query($con, $cart_query);

            while ($item = mysqli_fetch_assoc($cart_result)) {
                $item['quantity'] = 1; // Default quantity for session items
                $cart_items[] = $item;
            }
        }
    }
}

$total_price = 0;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt Page</title>
    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/easy.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/iconfont.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">  
    <script src="https://js.paystack.co/v1/inline.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <style>
        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }
        .modal-content {
            margin: auto;
        }
        .cart-icon {
            position: relative;
            display: inline-block;
        }
        .cart-icon img {
            width: 24px;
            height: 25px;
        }
        #cart-count {
            position: absolute; 
            top: -8px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
        .modal-footer .btn {
            padding: 5px 10px;
            font-size: 14px;
        }
        .header-bottom .logo img {
            width: 90px;
            height: 80px;
        }
        
        .table thead th {
            white-space: nowrap;
        }
        .btn-flat {
            border-radius: 50px;
            padding: 20px;
            text-align: center;
            color: white;
            text-transform: lowercase;
        }

    </style>

    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!--Header section start-->
    <header class="header header-sticky"> 
        <div class="header-bottom menu-center">
            <div class="container">
                <div class="row justify-content-between">
                    <!--Logo start-->
                    <div class="col mt-10 mb-10">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/HouseMadeEasylogo.jpg" alt="HouseMadeEasy Logo"></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    <!--Menu start-->
                    <div class="col d-none d-lg-flex">
                        <nav class="main-menu">
                            <ul>
                                <li class="active"><a href="index.php" style="text-decoration: none;">Home</a></li>
                                <li><a href="make-money-with-housemadeeasy.php" style="text-decoration: none;">Make Money</a></li>
                                <li><a href="../home-repair/index.php" style="text-decoration: none;">Home Repair</a></li>
                                <li><a href="../marketplace/index.php" style="text-decoration: none;">Campus Yard</a></li>
                                <li><a href="../flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a></li>
                                <li><a href="short-term-stay.php" style="text-decoration: none;">Short term Rentals</a></li>
                                <li><a href="housemadeeasy-logistics.php" style="text-decoration: none;">Logistics</a></li>
                            </ul> 
                        </nav>
                    </div>
                    <!--Menu end-->
                    <!--User start-->
                    <div class="col mr-sm-50 mr-xs-50">
                        <div class="header-user">
                            <div class="cart-icon">
                                <a href="cart.php">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart">
                                    <span id="cart-count">0</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--User end-->
                </div>
                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->
            </div>
        </div>
    </header>
    <!--Header section end-->

<?php
$house_id = $_GET['key'];
isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';
    
?>

    <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/single-property-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Print Your Receipt</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Print Your Receipt</li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end--> 

    <div class="container" style="padding:380px 20px 20px 20px;">
        
        <div id="message"></div>


        <h1 style="margin-top:20px">House book Successfully!</h1>
        <span style="color: red; font-weight: bolder;">Don't forget to call housemadeeasy customer care service after you click on Print Receipt</span>
    <p>Click the button below to print out your receipt.</p>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const houseId = "<?php echo $house_id; ?>";
        const finalReceiptUrl = `final-receipt.php?key=${houseId}`;
        document.getElementById('printReceipt').addEventListener('click', function (event) {
            event.preventDefault();
            window.open(finalReceiptUrl, "_blank");
        });
    });
</script> 


     <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const houseId = "<?php echo $house_id; ?>";
            const finalReceiptUrl = `final-receipt.php?key=${houseId}`;
            document.getElementById('printReceipt').addEventListener('click', function () {
                window.open(finalReceiptUrl, "_blank");
            });
        });
    </script> -->


       <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const houseId = "<?php echo $house_id; ?>";
            const finalReceiptUrl = `final-receipt.php?key=${houseId}`;
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

            document.getElementById('printReceipt').addEventListener('click', function () {
                if (isMobile) {
                    window.open(finalReceiptUrl, "_blank");
                } else {
                    const newWindow = window.open(finalReceiptUrl, "_blank");
                    newWindow.onload = function () {
                        newWindow.print();
                    };
                }
            });
        });
    </script> -->
    <?php //echo isset($_SESSION['total_price']) ? $_SESSION['total_price'] : '';?>
    <a href="#" id="printReceipt" style="padding: 10px 20px; background-color: #3498db; color: white; text-decoration: none; border-radius: 5px;">Print Receipt</a>
    
    </div>






    



    <?php include ('inc/footer.inc.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

       <script>
    $(document).ready(function() {
        function updateCartCount() {
            $.ajax({
                url: 'get_cart_count.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#cart-count').text(response.cart_count);
                    } else {
                        console.error('Failed to update cart count:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }

        function updateCartDisplay() {
            $.ajax({
                url: 'get_cart_items.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.cart_empty) {
                            $('#message').html('<div class="alert alert-warning">Your cart is now empty.</div>');
                            $('table').remove();
                            $('#checkout-button').remove();
                            $('#checkout-button2').remove();
                            $('<a href="search-made-easy.php" class="btn btn-primary col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15" style="border-radius:50px;">Start Searching for Items</a>').insertAfter('#message');
                        } else {
                            location.reload();
                        }
                    } else {
                        console.error('Failed to update cart display:', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }

        var propertyIdToRemove;

        $('.remove-from-cart').click(function() {
            propertyIdToRemove = $(this).data('property-id');
            $('#confirmDeleteModal').modal('show');
        });

        $('#confirmDelete').click(function() {
            $.ajax({
                url: 'remove-from-cart.php',
                method: 'POST',
                data: { property_id: propertyIdToRemove }, 
                dataType: 'json',
                success: function(response) {
                    $('#confirmDeleteModal').modal('hide');
                    if (response.success) {
                        $('#message').html('<div class="alert alert-success">Item removed successfully!</div>');
                        updateCartCount();
                        updateCartDisplay();
                        setTimeout(function() {
                            $('.alert-success').fadeOut('slow');
                        }, 2000); // Remove success message after 2 seconds
                    } else {
                        console.error(response.message);
                        alert('Failed to remove from cart: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    alert('Failed to remove from cart.');
                }
            });
        });

        // Update cart count on page load
        updateCartCount();
    });
    </script>

    
</body>
</html>
