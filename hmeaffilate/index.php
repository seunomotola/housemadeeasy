<?php 
session_start();
include("../inc/connect.inc.php");     
if(isset($_SESSION['agentaffilate_id'])){
    header("location:upload-house.php ");
    
  }
  
  ?>     
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMEAffilate || Login</title>
    <meta name="description" content="Login to your HMEAffilate account to upload and manage your properties.">
    
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
        
        /* Login Section */
        .login-section {
            max-width: 1280px;
            margin: -4rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .login-card {
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
        
        /* Links */
        .forgot-password {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .forgot-password a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .forgot-password a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
            gap: 0.75rem;
        }
        
        /* New User Section */
        .new-user-section {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }
        
        .new-user-section p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }
        
        .new-user-section a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .new-user-section a:hover {
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
            
            .login-section {
                padding: 0 1rem;
            }
            
            .login-card {
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
            
            .login-card {
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
                        <li><a href="register.php">Register</a></li>
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
            <h1>Welcome Back</h1>
            <p>Login to your account to manage your properties and access all features</p>
        </div>
    </div>
    <!--Hero Section end-->
    
    <!--Login Section start-->
    <div class="login-section">
        <div class="login-card">
            <div class="form-section active">
                <form action="index.php" method="POST">
                    <div id="response" class="alert" style="display: none;"></div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="text" id="email" placeholder="Enter your email" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" id="pass" placeholder="Enter your password" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="logIn">
                            <i class="fas fa-sign-in"></i>
                            Login to Account
                        </button>
                    </div>
                    
                    <div class="forgot-password">
                        <a href="#myModal" data-toggle="modal">
                            <i class="fas fa-key"></i>
                            Forgot Password?
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="new-user-section">
                <p>New to HMEAffilate?</p>
                <a href="register.php">
                    <i class="fas fa-user-plus"></i>
                    Create an Account
                </a>
            </div>
        </div>
    </div>
    <!--Login Section end-->
    
    <!-- Forgot Password Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Forgot Password?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="response2" class="alert" style="display: none;"></p>
                    <p>Enter your e-mail address below to reset your password.</p>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" placeholder="Email" autocomplete="off" class="email form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="button" id="forgotpassword">Submit</button>
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
        // Login functionality
        $('#logIn').on('click', function(){
            var email = $('#email').val();
            var pass = $('#pass').val();
            
            $.ajax({
                url: 'login-process.php',
                type: 'POST',
                data: {
                    'user_login' : 1,
                    'email': email,
                    'pass': pass
                },
                success: function(response){
                    var $response = $("#response");
                    $response.html(response);
                    $response.show();
                    
                    if(response.indexOf('success') >= 0){ 
                        $response.removeClass('alert-danger').addClass('alert-success');
                        setTimeout('window.location.href ="my-account.php";', 1000);
                    } else {
                        $response.removeClass('alert-success').addClass('alert-danger');
                    }
                },
                dataType: 'text'
            });
        });
        
        // Forgot password functionality
        $('#forgotpassword').on('click', function(){
            var email = $('.email').val();           
            
            $.ajax({
                url: 'forgot_password_verify.php',
                type: 'POST',
                data: {
                    'resetpassword' : 1,
                    'email' : email
                },
                success: function(response2){
                    var $response2 = $("#response2");
                    $response2.html(response2);
                    $response2.show();
                    
                    if(response2.indexOf('success') >= 0){
                        $response2.removeClass('alert-danger').addClass('alert-success');
                        setTimeout('window.location.href ="https://www.housemadeeasy.org/index.php";', 1500);
                    } else {
                        $response2.removeClass('alert-success').addClass('alert-danger');
                    }
                },
                dataType: 'text'
            });
        });
    });
</script>
</body>
</html>
