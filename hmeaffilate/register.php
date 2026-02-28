<?php   
include("../inc/connect.inc.php");
include("../inc/session.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMEAffilate || Register</title>
    <meta name="description" content="Create your HMEAffilate account to start uploading and managing properties.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-light: #9ca3af;
            --bg-primary: #ffffff;
            --bg-secondary: #f9fafb;
            --bg-accent: #eff6ff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-primary);
            background-color: var(--bg-secondary);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Header Styles */
        header {
            background: var(--bg-primary);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
        }
        
        .logo h1 {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }
        
        .nav-menu a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }
        
        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
        }
        
        .nav-menu a:hover {
            color: var(--primary-color);
        }
        
        .nav-menu a:hover::after {
            width: 100%;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            font-weight: 300;
        }
        
        /* Register Section */
        .register-section {
            max-width: 1280px;
            margin: -4rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .register-card {
            background: var(--bg-primary);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(10px);
        }
        
        /* Form Styles */
        .form-section {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
            background: var(--bg-primary);
            color: var(--text-primary);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--bg-accent);
        }
        
        .form-control::placeholder {
            color: var(--text-light);
        }
        
        /* Input Group with Icons */
        .input-group {
            position: relative;
        }
        
        .input-group .input-group-prepend {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 1;
        }
        
        .input-group .form-control {
            padding-left: 3rem;
        }
        
        /* File Input Styles */
        input[type="file"] {
            padding: 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
            background: var(--bg-primary);
            color: var(--text-primary);
            cursor: pointer;
        }
        
        input[type="file"]:hover {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--bg-accent);
        }
        
        /* Button Styles */
        .btn-primary {
            width: 100%;
            padding: 1.25rem 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-secondary {
            padding: 0.75rem 1.5rem;
            background: var(--bg-secondary);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .btn-secondary:hover {
            background: var(--bg-accent);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: #006622;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #003366;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: #660000;
        }
        
        /* Already Registered Section */
        .already-registered-section {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }
        
        .already-registered-section p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }
        
        .already-registered-section a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .already-registered-section a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
            gap: 0.75rem;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: var(--shadow-xl);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-radius: 20px 20px 0 0;
            border-bottom: none;
            padding: 1.5rem 2rem;
        }
        
        .modal-header .close {
            color: white;
            opacity: 0.8;
        }
        
        .modal-header .close:hover {
            opacity: 1;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        /* Footer */
        footer {
            background: var(--bg-primary);
            box-shadow: var(--shadow-sm);
            padding: 2rem 0;
            margin-top: 4rem;
        }
        
        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
            color: var(--text-secondary);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                padding: 1rem;
            }
            
            .nav-menu {
                gap: 1rem;
                font-size: 0.875rem;
            }
            
            .hero {
                padding: 3rem 1rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .register-section {
                padding: 0 1rem;
            }
            
            .register-card {
                padding: 2rem 1.5rem;
            }
            
            .footer-container {
                padding: 0 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .logo h1 {
                font-size: 1.25rem;
            }
            
            .nav-menu {
                display: none;
            }
            
            .hero h1 {
                font-size: 1.5rem;
            }
            
            .hero p {
                font-size: 0.875rem;
            }
            
            .register-card {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    
<div id="main-wrapper">
    
    <!--Header section start-->
    <header> 
        <div class="header-container">
            <!--Logo start-->
            <div class="logo">
                <img src="assets/images/HouseMadeEasylogo.jpg" alt="House Made Easy Logo">
                <h1>HMEAffilate</h1>
            </div>
            <!--Logo end-->
            
            <!--Menu start-->
            <nav class="nav-menu">
                <ul style="display: flex; gap: 2rem; list-style: none;">
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['agentaffilate_id'])): ?>
                        <li><a href="my-account.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="index.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <!--Menu end-->
            
            <!--User start--> 
            <div class="user-profile">
                <img src="assets/images/user.png" alt="User Profile">
            </div>
            <!--User end-->
        </div>
    </header>
    <!--Header section end-->
    
    <!--Hero Section start-->
    <div class="hero">
        <div class="hero-content">
            <h1>Join HMEAffilate</h1>
            <p>Create your account and start managing properties with ease</p>
        </div>
    </div>
    <!--Hero Section end-->
    
    <!--Register Section start-->
    <div class="register-section">
        <div class="register-card">
            <div class="form-section active">
                <form action="register-process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-user"></i>
                            </div>
                            <input required type="text" id="fname" placeholder="Enter your first name" name="fname" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-user"></i>
                            </div>
                            <input required type="text" id="lname" placeholder="Enter your last name" name="lname" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="picture">Profile Picture</label>
                        <input type="file" required class="form-control" id="picture" name="picture">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input required type="email" id="email" placeholder="Enter your email" name="email" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pno">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-phone"></i>
                            </div>
                            <input required type="text" id="pno" placeholder="Enter your phone number" name="pno" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input required type="password" id="pass" placeholder="Enter your password" name="pass" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confpass">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input required type="password" id="confpass" placeholder="Confirm your password" name="confpass" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="bankname">Bank Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-university"></i>
                            </div>
                            <input required type="text" id="bankname" placeholder="Enter your bank name" name="bankname" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="accountname">Account Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-user"></i>
                            </div>
                            <input required type="text" id="accountname" placeholder="Enter your account name" name="accountname" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="accountno">Account Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <input required type="text" id="accountno" placeholder="Enter your account number" name="accountno" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="already-registered-section">
                <p>Already have an account?</p>
                <a href="index.php">
                    <i class="fas fa-sign-in"></i>
                    Login Here
                </a>
            </div>
        </div>
    </div>
    <!--Register Section end-->
    
    <!-- Terms and Conditions Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Terms and Conditions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <ol>
                        <p style="font-weight:bolder; text-align: center;">Please note the following terms and condition of our services to you</p>
                        <hr>
                        <li>Please note that every houses and agent Information on this website are not counterfeit. They are simply the same house you would see hen you come for the checking of the House</li>
                        <li>Customer are not allowed to follow agent to check a House that is not available on the website</li>
                    </ol>
                    <ol>
                        <p style="font-weight:bolder; text-align: center; ">Refund Condition Policy</p>
                        <hr>
                        <li>If two(2) Customer booked a house for checking on the same day, the first(1<sup>st</sup>) customer choose a time range of 11am-11:30am while the second(2<sup>nd</sup>) Customer choose a time range of 12pm-12:30pm.<br>
                            The first(1<sup>st</sup>) Customer decide to go and check the house at the stipulated time and decided to pay Immediately for the House. <br>The second(2<sup>nd</sup>) Customer which choose the time range of 12pm-12:30pm for the same house that the first(1<sup>st</sup>) Customer had already paid for, the second(2<sup>nd</sup>) Customer can either choose whether he/she want  his/her checking fees to be refunded or book an appointment again without paying for the checking fees again due to the initial checking fee that he/she had already pay for.</li>
                        <li>Sequel to the above, if the second(2<sup>nd</sup>) Customer did not find his/her exact house of choice on the platform, the checking fee that he/she had already paid for we be refunded back to him/her within 24hrs that the complain(that he/she could not find his exact house of choice) was issued.</li>
                        <li> The only condition that checking fee paid by the customer will not be refunded is that if he/she  come late or fail to come at the exact date and time that he/she booked for on the website</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Footer section start-->
    <footer>
        <div class="footer-container">
            <p>&copy; <?php echo date('Y'); ?> HMEAffilate. All rights reserved.</p>
            <p style="margin-top: 0.5rem; font-size: 0.875rem;">Built with <i class="fas fa-heart" style="color: #e74c3c;"></i> for property management</p>
        </div>
    </footer>
    <!--Footer section end-->
    
    <?php include ('inc/footer.inc.php'); ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // Any additional JavaScript for register page
    });
</script>
</body>
</html>
