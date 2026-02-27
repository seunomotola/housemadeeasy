<?php
// Error reporting configuration
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/errors.log');

// Ensure logs directory exists
if (!file_exists(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Error: [$errno] $errstr - $errfile:$errline" . PHP_EOL;
    error_log($errorMessage);
    
    if (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE']) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Error:</strong> ' . htmlspecialchars($errstr) . ' in ' . htmlspecialchars($errfile) . ' on line ' . $errline;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
}

// Custom exception handler
function customExceptionHandler($exception) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Exception: " . $exception->getMessage() . " - " . $exception->getFile() . ":" . $exception->getLine() . PHP_EOL;
    error_log($errorMessage);
    
    if (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE']) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Exception:</strong> ' . htmlspecialchars($exception->getMessage()) . ' in ' . htmlspecialchars($exception->getFile()) . ' on line ' . $exception->getLine();
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
}

// Set error handlers
set_error_handler("customErrorHandler");
set_exception_handler("customExceptionHandler");

// Function to display user-friendly error messages
function showError($message, $details = '') {
    $errorHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    $errorHtml .= '<strong>Error:</strong> ' . htmlspecialchars($message);
    
    if (!empty($details) && (isset($_SERVER['DEBUG_MODE']) && $_SERVER['DEBUG_MODE'])) {
        $errorHtml .= '<br><small class="text-muted">' . htmlspecialchars($details) . '</small>';
    }
    
    $errorHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $errorHtml .= '<span aria-hidden="true">&times;</span>';
    $errorHtml .= '</button>';
    $errorHtml .= '</div>';
    
    echo $errorHtml;
}

// Function to display success messages
function showSuccess($message) {
    $successHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    $successHtml .= '<strong>Success:</strong> ' . htmlspecialchars($message);
    $successHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $successHtml .= '<span aria-hidden="true">&times;</span>';
    $successHtml .= '</button>';
    $successHtml .= '</div>';
    
    echo $successHtml;
}

ob_start();
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    session_start();
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['email'] = $_COOKIE['user_email'];
    $_SESSION['fname'] = $_COOKIE['user_fname'];
    $_SESSION['lname'] = $_COOKIE['user_lname'];
} else {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Made Easy - Find Your Perfect Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --accent: #f093fb;
            --success: #48bb78;
            --warning: #ed8936;
            --danger: #f56565;
            --light: #f7fafc;
            --dark: #2d3748;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
            background: var(--light);
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--dark);
        }

        .logo img {
            height: 80px;
            width: auto;
            border-radius: 8px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: var(--gradient);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 8rem 2rem 4rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="100" fill="none"/><path d="M0,50 Q25,0 50,50 T100,50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/><path d="M50,0 Q75,50 100,0" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></svg>');
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            100% { transform: translateY(-100px); }
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            animation: slideInLeft 1s ease;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            animation: slideInLeft 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            animation: slideInLeft 1s ease 0.4s both;
        }

        .hero-image {
            animation: slideInRight 1s ease 0.6s both;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Features Section */
        .features {
            padding: 8rem 2rem;
            background: var(--light);
            position: relative;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.1rem;
            color: #718096;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(102, 126, 234, 0.2);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: #718096;
            line-height: 1.7;
        }

        /* Services Section */
        .services {
            padding: 8rem 2rem;
            background: linear-gradient(135deg, #f6f8fb 0%, #ffffff 100%);
        }

        .services-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .service-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.2);
        }

        .service-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 2rem;
        }

        .service-content h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .service-content p {
            color: #718096;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .service-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .service-link:hover {
            gap: 1rem;
        }

        /* Stats Section */
        .stats {
            padding: 6rem 2rem;
            background: var(--gradient);
            color: white;
            text-align: center;
        }

        .stats-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
        }

        .stat-item {
            animation: fadeInUp 0.8s ease;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* CTA Section */
        .cta {
            padding: 8rem 2rem;
            background: white;
            position: relative;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 4rem 2rem;
            background: var(--gradient-2);
            border-radius: 30px;
            color: white;
            box-shadow: 0 30px 80px rgba(245, 87, 108, 0.3);
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Footer */
        .footer {
            padding: 4rem 2rem 2rem;
            background: var(--dark);
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column h4 {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .nav-menu {
                display: none;
            }

            .section-header h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 640px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .cta-content h2 {
                font-size: 2rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Search Bar */
        .search-section {
            position: relative;
            padding: 4rem 2rem;
            background: white;
        }

        .search-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .search-input {
            padding: 1rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-button {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        /* Testimonials */
        .testimonials {
            padding: 8rem 2rem;
            background: var(--light);
        }

        .testimonials-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--primary);
        }

        .testimonial-text {
            font-style: italic;
            color: #4a5568;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .author-info h4 {
            color: var(--dark);
            font-weight: 700;
        }

        .author-info p {
            color: #718096;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="assets/images/HouseMadeEasylogo.jpg" alt="House Made Easy Logo">
                <!-- <span>House Made Easy</span> -->
            </div>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#features" class="nav-link">Features</a></li>
                <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>

            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Find Your Perfect Home, Effortlessly</h1>
                <p>Discover your dream apartment, find compatible flatmates, and access premium housing services all in one place. House Made Easy simplifies your housing journey.</p>
                <div class="hero-buttons">
                    <a href="#search" class="btn btn-primary">Search Properties</a>
                    <a href="#services" class="btn btn-secondary">Explore Services</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="assets/images/heroimage.png" alt="Modern Apartment">
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section" id="search">
        <div class="search-container">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h2 style="font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 0.5rem;">Search Properties</h2>
                <p style="color: #718096;">Find your ideal home with our advanced search</p>
            </div>
            <form class="search-form" action="search-made-easy.php" method="get">
                <input type="text" class="search-input" placeholder="Location" name="location">
                <input type="text" class="search-input" placeholder="Price Range" name="price">
                <input type="text" class="search-input" placeholder="Property Type" name="type">
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="section-header">
            <h2>Our Premium Services</h2>
            <p>Comprehensive housing solutions designed to make your life easier</p>
        </div>
        <div class="services-grid">
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="assets/images/flatmate/house8.jpg" alt="Apartment Provision">
                </div>
                <div class="service-content">
                    <h3>Apartment Provision</h3>
                    <p>Find your perfect home sweet home away from home with our extensive property listings.</p>
                    <a href="search-made-easy.php" class="service-link">
                        Explore Properties <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="assets/images/flatmate/eye_lens.png" alt="Flatmate Finder">
                </div>
                <div class="service-content">
                    <h3>Flatmate Finder</h3>
                    <p>Say hello to your new roomie! Connect with compatible flatmates based on preferences.</p>
                    <a href="flatmate-finder/index.php" class="service-link">
                        Find Flatmates <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="marketplace/assets/images/market/marketplace.jpg" alt="Campus Yard">
                </div>
                <div class="service-content">
                    <h3>Campus Yard</h3>
                    <p>Your one-stop spot for all things campus-related. Buy, sell, and connect.</p>
                    <a href="marketplace/index.php" class="service-link">
                        Explore Marketplace <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="assets/images/make_money_with_housemadeeasy/money.png" alt="Make Money">
                </div>
                <div class="service-content">
                    <h3>Make Money</h3>
                    <p>Because who says housing can't pay? Earn money by referring properties.</p>
                    <a href="make-money-with-housemadeeasy.php" class="service-link">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="assets/images/housemadeeasy-logistics/logistics4.jpeg" alt="Logistics">
                </div>
                <div class="service-content">
                    <h3>Logistics</h3>
                    <p>Streamline your moving process with ease. Professional logistics services.</p>
                    <a href="housemadeeasy-logistics.php" class="service-link">
                        Book Services <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in">
                <div class="service-image">
                    <img src="home-repair/assets/images/home-repair/house_repair.jpg" alt="Home Repair">
                </div>
                <div class="service-content">
                    <h3>Home Repair</h3>
                    <p>Need a fixer-upper? We've got you covered with professional home repair services.</p>
                    <a href="home-repair/index.php" class="service-link">
                        Request Service <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="section-header">
            <h2>Why Choose Us</h2>
            <p>Experience the difference with our innovative housing platform</p>
        </div>
        <div class="features-grid">
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Fast & Efficient</h3>
                <p>Quick property searches, instant flatmate matches, and rapid service delivery.</p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Secure & Verified</h3>
                <p>All listings and profiles are verified for your safety and peace of mind.</p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>User Friendly</h3>
                <p>Intuitive interface designed for effortless navigation and smooth experience.</p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Dedicated customer support available round the clock to assist you.</p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Affordable</h3>
                <p>Competitive prices and flexible payment options for all services.</p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Friendly</h3>
                <p>Seamless experience across all devices, anytime, anywhere.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-target="5000">0</div>
                <div class="stat-label">Happy Customers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="2000">0</div>
                <div class="stat-label">Properties Listed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="1500">0</div>
                <div class="stat-label">Flatmate Matches</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">Satisfaction %</div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="section-header">
            <h2>What Our Customers Say</h2>
            <p>Real experiences from people who found their perfect housing solutions</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card fade-in">
                <p class="testimonial-text">"House Made Easy helped me find the perfect apartment within days! The process was smooth and the listings were genuine."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">AM</div>
                    <div class="author-info">
                        <h4>Amaka Michael</h4>
                        <p>Student, Sagamu</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-in">
                <p class="testimonial-text">"The flatmate finder feature is incredible! Found my best friend and roommate through this platform. Highly recommend!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">JO</div>
                    <div class="author-info">
                        <h4>John Okafor</h4>
                        <p>Student, Sagamu</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-in">
                <p class="testimonial-text">"Exceptional service and amazing support. The logistics team made my move stress-free. 5-star experience!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">SN</div>
                    <div class="author-info">
                        <h4>Sarah Nwankwo</h4>
                        <p>Entrepreneur, Port Harcourt</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta" id="contact">
        <div class="cta-content">
            <h2>Ready to Find Your Perfect Home?</h2>
            <p>Join thousands of happy customers who have found their dream homes through House Made Easy. Start your journey today!</p>
            <div class="cta-buttons">
                <a href="#search" class="btn btn-primary">Get Started Now</a>
                <a href="contact-us.php" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-column">
                <h4>House Made Easy</h4>
                <p style="margin-bottom: 1.5rem;">Your trusted partner in finding the perfect housing solutions. Making home finding easy, fast, and reliable.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul class="footer-links">

                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                    <li><a href="privacypolicy.php">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Contact Info</h4>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> Isale-Oko, Sagamu</li>
                    <li><i class="fas fa-phone"></i> +234 805</li>
                    <li><i class="fas fa-envelope"></i> info@housemadeeasy.com.ng</li>
                    <li> <i class="fas fa-whatsapp"> +2349151294786 </li>
                    <li><i class="fas fa-clock"></i> Mon - Sat: 9AM - 6PM</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> House Made Easy. All rights reserved. | Designed with <i class="fas fa-heart"></i> by House Made Easy Team</p>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        function animateCounter(element, target) {
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + (element.dataset.target.length > 3 ? '+' : '');
            }, 16);
        }

        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.target);
                    animateCounter(counter, target);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stat-number').forEach(el => {
            counterObserver.observe(el);
        });

        // Search form validation
        const searchForm = document.querySelector('.search-form');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                const inputs = this.querySelectorAll('.search-input');
                let hasContent = false;
                
                inputs.forEach(input => {
                    if (input.value.trim()) {
                        hasContent = true;
                    }
                });

                if (!hasContent) {
                    e.preventDefault();
                    alert('Please enter at least one search parameter');
                }
            });
        }
    </script>
</body>
</html>

