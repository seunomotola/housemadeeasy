<?php
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
    <title>Cart</title>
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
        
        /*.table thead th {
            white-space: nowrap;
        }*/
        .btn-flat {
            border-radius: 50px;
            padding: 20px;
            text-align: center;
            color: white;
            text-transform: lowercase;
        }

               /* Responsive table styles */
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
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
                                <li><a href="../housemadeeasy/home-repair/index.php" style="text-decoration: none;">Home Repair</a></li>
                                <li><a href="../housemadeeasy/marketplace/index.php" style="text-decoration: none;">Campus Yard</a></li>
                                <li><a href="../housemadeeasy/flatmate-finder/index.php" style="text-decoration: none;">Flatmate Finder</a></li>
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



    <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/single-property-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Your Cart</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end--> 

    <div class="container" style="padding:380px 0px 20px 0px;">
        <h1>Your Cart</h1>
        <div id="message"></div>
        <div class="table-responsive">
        <?php if (empty($cart_items)): ?>
            <div class="alert alert-warning">Your cart is empty.</div>
            <a href="search-made-easy.php" class="btn btn-primary col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15" style="border-radius:50px; text-align:center;">Start Searching House</a>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>House Type</th>

                        <th>First year price</th>

                        <th>Subsquent price</th>
                        
                        <th>Location</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <?php
                        $price = floatval($item['first_year_rent']);
                        $first_year_rent = $item['first_year_rent'];
                        $second_year_rent = $item['second_year_rent'];
                        $quantity = intval($item['quantity']);
                        $location = $item['location'];
                        $item_total_price = $price * $quantity;
                        $total_price += $item_total_price;  
                        ?>
                        <tr> 
                             <td data-label="House Type"><?php echo htmlspecialchars($item['house_name']); ?></td>

                             <td data-label="First year Price">#<?php echo $first_year_rent; ?></td>

                             <td data-label="Subsquent Price">#<?php echo $second_year_rent; ?></td>
                            <td data-label="Location"><?php echo $location; ?></td>
                            
                            <td data-label="Action">
                                <button class="btn btn-danger remove-from-cart" style="border-radius:50px; padding:20px;" data-property-id="<?php echo $item['id']; ?>">Remove</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
               <!--  <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th colspan="2">#<?php //echo number_format($total_price, 2); ?></th>
                    </tr>
                </tfoot> -->
            </table>
        <?php endif; ?>
    </div>

    <?php if (!empty($cart_items)){ ?>
            <button class="btn btn-primary " id="checkout-button" style="border-radius:50px; margin-top:20px; text-transform: lowercase;" onclick="location.href='check-out-page-today.php' ">Click to check the house today</button><br><br>
             <button class="btn btn-primary " id="checkout-button2" style="border-radius:50px; text-transform: lowercase;" onclick="location.href='check-out-page-tomorrow.php'">Click to check the house tomorrow</button>
        <?php }else{} ?>
    </div>


   <!-- Confirm Delete Modal --> 
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove this item from the cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Remove</button>
                </div>
            </div>
        </div>
    </div>



    

     <?php 
                     $query2 = mysqli_query($con,"SELECT * FROM amount_to_pay"); 
                      $row = mysqli_fetch_assoc($query2);
                      $_SESSION['amount']=$row['amount'];
                      $amount2=$_SESSION['amount'];

                    ?>

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

    <script type="text/javascript">
        function notalreadyloginIn() {
            swal({
                title: "Not Logged In",
                text: "Login/Register first before you can book an appointment with the agent ...",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willLogin) => {
                if (willLogin) {
                    window.location.href = 'login.php';
                }
            });
        }

        function urgentnotalreadyloginIn() {
            swal({
                title: "Not Logged In",
                text: "Login/Register first before you can make an urgent booking with the agent ...",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willLogin) => {
                if (willLogin) {
                    window.location.href = 'login.php';
                }
            });
        }
    </script>

    <script type="text/javascript">
        window.addEventListener('load', function() {});

        function alreadyloginIn() {
            swal({
                title: "Kindly pay attention and consciously read this?",
                text: "You have clicked to book an appointment with the agent of this house.You would be paying an unredeemable sum of one thousand five hundred naira(#500) after clicking the I Agree icon. After Paying, you would be giving a time(tomorrow) to come and check the house. Note that you must make yourself available this time that you have picked otherwise, you may have to pay another (#500) to book another appointment. After picking the time, call the agent, introduce yourself and inform him that you will be coming by (the time you chose) to check the house.",
                buttons: [true, "I Agree!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    payWithPaystack();
                } else {
                    // swal("Your imaginary file is safe!");
                }
            });
        }
    </script> 

    <script>
        function payWithPaystack(e) {
            let handler = PaystackPop.setup({
                key: 'pk_test_ac9ec15d0168a4feddced75826c3ea5488056c46', // Replace with your public key 
                email: '<?php echo $email2;?>',
                amount: '<?php echo $amount2; ?>' * 100,
                firstname: '<?php echo $fname; ?>',
                lastname: '<?php echo $lname; ?>',
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                onClose: function() {
                    alert('Transaction Cancelled.');
                },
                callback: function(response) {
                    window.location = "print-receipt.php?reference=" + response.reference;
                }
            });
            handler.openIframe();
        }
    </script>

    <script type="text/javascript">
        window.addEventListener('load', function() {});

        function urgentalreadyloginIn() {
            swal({
                title: "Kindly pay attention and consciously read this?",
                text: "You have clicked to make an urgent appointment with the agent of this house.You would be paying an unredeemable sum of three thousand naira(#1,000) after clicking the I Agree icon. After Paying, you would be giving that day you book to come and check the house. Note that you must make yourself available this time that you have picked otherwise, you may have to pay another (#1,000) to book another appointment. After picking the time, call the agent, introduce yourself and inform him that you will be coming by the time you choose to check the house.",
                buttons: [true, "I Agree!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    urgentpayWithPaystack();
                } else {
                    // swal("Your imaginary file is safe!");
                }
            });
        }
    </script>

    <script>
        function urgentpayWithPaystack(e) {
            let handler = PaystackPop.setup({
                key: 'pk_live_35ecea41b75d6d6fb58e872fb071404f79718dbc', // Replace with your public key 
                email: '<?php echo $email2;?>',
                amount: '1000' * 100,
                firstname: '<?php echo $fname; ?>',
                lastname: '<?php echo $lname; ?>',
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                onClose: function() {
                    alert('Transaction Cancelled.');
                },
                callback: function(response) {
                    window.location = "print-receipt-urgent.php?reference=" + response.reference;
                }
            });
            handler.openIframe();
        }
    </script>

</body>
</html>
