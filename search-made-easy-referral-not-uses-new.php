<?php include ('inc/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Dream Home - HouseMadeEasy</title>
    <meta name="description" content="Search for your dream house easily in Sagamu campus of Olabisi Onabanjo University with HouseMadeEasy. Find affordable accommodations with no stress.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
        
        .cart-icon {
            position: relative;
            cursor: pointer;
        }
        
        .cart-icon i {
            font-size: 1.5rem;
            color: var(--text-secondary);
            transition: var(--transition);
        }
        
        .cart-icon:hover i {
            color: var(--primary-color);
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            min-width: 20px;
        }
        
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-primary);
            cursor: pointer;
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
        
        /* Search Section */
        .search-section {
            max-width: 1280px;
            margin: -4rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .search-card {
            background: var(--bg-primary);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(10px);
        }
        
        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .form-group {
            position: relative;
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
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
            cursor: pointer;
        }
        
        .search-button {
            grid-column: 1 / -1;
            margin-top: 1rem;
        }
        
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
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Properties Section */
        .properties-section {
            max-width: 1280px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }
        
        .section-header p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }
        
        .property-card {
            background: var(--bg-primary);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            cursor: pointer;
        }
        
        .property-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .property-image {
            position: relative;
            width: 100%;
            height: 240px;
            overflow: hidden;
        }
        
        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .property-card:hover .property-image img {
            transform: scale(1.1);
        }
        
        .property-label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .property-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        .property-content {
            padding: 1.5rem;
        }
        
        .property-features {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .feature {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        .feature i {
            color: var(--primary-color);
        }
        
        .property-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            line-height: 1.3;
        }
        
        .property-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .property-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }
        
        .property-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-color);
        }
        
        .property-price span {
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-weight: 400;
        }
        
        .btn-view {
            padding: 0.625rem 1.25rem;
            background: var(--bg-secondary);
            color: var(--primary-color);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .btn-view:hover {
            background: var(--primary-color);
            color: white;
            transform: translateX(4px);
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }
        
        .cta-content {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            z-index: 1;
        }
        
        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .cta-content p {
            font-size: 1.125rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .btn-secondary {
            padding: 1rem 2rem;
            background: white;
            color: var(--primary-color);
            border: none;
            border-radius: 12px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        /* Features Section */
        .features-section {
            max-width: 1280px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: var(--bg-primary);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--bg-accent), var(--primary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: var(--transition);
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature-icon i {
            font-size: 2rem;
            color: var(--primary-color);
        }
        
        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }
        
        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.6;
        }
        
        /* Footer */
        footer {
            background: var(--text-primary);
            color: white;
            padding: 3rem 2rem 1.5rem;
        }
        
        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section ul li a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-section ul li a:hover {
            color: white;
            padding-left: 0.5rem;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-4px);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--bg-primary);
                flex-direction: column;
                padding: 1rem 2rem;
                box-shadow: var(--shadow-md);
                gap: 1rem;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .search-card {
                padding: 1.5rem;
            }
            
            .search-form {
                grid-template-columns: 1fr;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .properties-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-content h2 {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
        
        /* Animations */
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
        
        .animate-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .property-card:nth-child(1) { animation-delay: 0.1s; opacity: 0; }
        .property-card:nth-child(2) { animation-delay: 0.2s; opacity: 0; }
        .property-card:nth-child(3) { animation-delay: 0.3s; opacity: 0; }
        .property-card:nth-child(4) { animation-delay: 0.4s; opacity: 0; }
        .property-card:nth-child(5) { animation-delay: 0.5s; opacity: 0; }
        .property-card:nth-child(6) { animation-delay: 0.6s; opacity: 0; }
        
        /* Loading Spinner */
        .spinner {
            display: none;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .btn-primary.loading .spinner {
            display: block;
        }
        
        .btn-primary.loading .text {
            opacity: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="assets/images/HouseMadeEasylogo.jpg" alt="HouseMadeEasy Logo">
                <h1>HouseMadeEasy</h1>
            </div>
            
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.php">Home</a></li>
                <li><a href="make-money-with-housemadeeasy.php">Make Money</a></li>
                <li><a href="../home-repair/index.php">Home Repair</a></li>
                <li><a href="../marketplace/index.php">Campus Yard</a></li>
                <li><a href="../flatmate-finder/index.php">Flatmate Finder</a></li>
                <li><a href="short-term-stay.php">Short term Rentals</a></li>
                <li><a href="housemadeeasy-logistics.php">Logistics</a></li>
            </ul>
            
            <div class="cart-icon">
                <a href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">
                        <?php echo isset($_SESSION['user_id']) ? $cart_count : '0'; ?>
                    </span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Dream Home</h1>
            <p>Searching for affordable accommodations made easy. Find the perfect place to call home in Sagamu campus.</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="search-card">
            <form action="search.php" method="POST" class="search-form" id="searchForm">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select class="form-control" id="location" name="location" required>
                        <option value="">Select Location</option>
                        <option value="Sagamu">Sagamu</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="type">Property Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="">Select Type</option>
                        <option>Single Room</option>
                        <option>Self Contain</option>
                        <option>1 Bedroom Flat</option>
                        <option>2 Bedroom Flat</option>
                        <option>3 Bedroom Flat</option>
                        <option>4 Bedroom Flat</option>
                    </select>
                </div>
                
                <div class="search-button">
                    <button type="submit" class="btn-primary" id="searchBtn">
                        <span class="text">
                            <i class="fas fa-search"></i> Search Properties
                        </span>
                        <span class="spinner"></span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="section-header">
            <h2>Why Choose HouseMadeEasy</h2>
            <p>Discover the benefits of finding your perfect home with our platform</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Prime Locations</h3>
                <p>Discover properties in the most sought-after locations near the campus</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Verified Properties</h3>
                <p>All properties are thoroughly verified for safety and quality</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Affordable Prices</h3>
                <p>Find competitive prices with flexible payment options</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Get assistance anytime with our dedicated support team</p>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="properties-section">
        <div class="section-header">
            <h2>Latest Properties</h2>
            <p>Check out the newest properties available on our platform</p>
        </div>
        
        <div class="properties-grid" id="propertiesGrid">
            <?php 
                $sql="SELECT p.*, 
                    CASE 
                        WHEN bu.house_id IS NOT NULL OR b.house_id IS NOT NULL THEN 1 
                        ELSE 0 
                    END AS booked 
                FROM properties p
                LEFT JOIN bookings b ON p.house_id = b.house_id
                LEFT JOIN bookings_urgent bu ON p.house_id = bu.house_id
                where p.house_label='hot'
                ORDER BY 
                    CASE WHEN p.status = 'no' THEN 1 ELSE 0 END DESC,
                    CASE WHEN bu.house_id IS NULL AND b.house_id IS NULL THEN 0 ELSE 1 END ASC
            ";
            $query = $con->query($sql);
            while($row2 = $query->fetch_assoc()){ 
                $house_img1 = $row2['house_img1'];
                $house_img2 = $row2['house_img2'];
                $house_label = $row2['house_label'];
                $first_year_rent = $row2['first_year_rent'];
                $second_year_rent = $row2['second_year_rent'];
                $location = $row2['location'];
                $id = $row2['id'];
                $status = $row2['status'];
                $house_name = $row2['house_name'];
                $house_location = $row2['house_location'];
                $house_id1 = $row2['house_id'];
                $multiple_room = $row2['multiple_room'];
                $bathroom2 = $row2['bathroom'];
                $kitchen2 = $row2['kitchen'];
                $distance2 = $row2['distance'];
                $negotiable = $row2['negotiable'];
                $how_many_multiple_room = $row2['how_many_multiple_room'];
                
                // Check if house is booked
                $query3 = mysqli_query($con, "SELECT house_id FROM bookings WHERE house_id='$house_id1' UNION SELECT house_id FROM bookings_urgent WHERE house_id='$house_id1'"); 
                $row3 = mysqli_fetch_assoc($query3);
                $house_id11 = $row3['house_id'] ?? null;
            ?>
            <div class="property-card animate-in">
                <div class="property-image">
                    <?php if (!empty($house_label)) { ?>
                        <span class="property-label"><?php echo $house_label; ?></span>
                    <?php } ?>
                    
                    <?php if (($multiple_room == 'yes' && $how_many_multiple_room == 0) || ($multiple_room == 'no' && $house_id1 == $house_id11) || $status == 'yes') { ?>
                        <span class="property-status">
                            <?php echo ($status == 'yes') ? 'Unavailable' : 'Booked'; ?>
                        </span>
                    <?php } ?>
                    
                    <img src="assets/images/property/<?php echo $house_img2; ?>" alt="<?php echo $house_name; ?>">
                </div>
                
                <div class="property-content">
                    <div class="property-features">
                        <div class="feature">
                            <i class="fas fa-route"></i>
                            <span><?php echo $distance2; ?></span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bath"></i>
                            <span><?php echo $bathroom2; ?></span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-utensils"></i>
                            <span><?php echo $kitchen2; ?></span>
                        </div>
                    </div>
                    
                    <h3 class="property-title"><?php echo $house_name; ?></h3>
                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo ucwords($house_location) . ', ' . $location; ?></span>
                    </div>
                    
                    <div class="property-footer">
                        <div class="property-price">
                            #<?php echo number_format($first_year_rent); ?>
                            <span>/year</span>
                        </div>
                        <a href="details.php?id=<?php echo $id; ?>" class="btn-view">
                            View Details
                        </a>
                    </div>
                    
                    <?php if ($multiple_room == 'yes') { ?>
                        <div class="property-status-info">
                            <?php if ($how_many_multiple_room > 0) { ?>
                                <p style="margin-top: 1rem; color: var(--secondary-color); font-weight: 600;">
                                    <i class="fas fa-door-open"></i> <?php echo $how_many_multiple_room; ?> Rooms Left
                                </p>
                            <?php } else { ?>
                                <p style="margin-top: 1rem; color: var(--accent-color); font-weight: 600;">
                                    <i class="fas fa-door-closed"></i> Fully Booked
                                </p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    
                    <?php if ($negotiable == 'yes') { ?>
                        <div class="negotiable-badge">
                            <span style="display: inline-block; margin-top: 0.5rem; padding: 0.25rem 0.75rem; background: var(--bg-accent); color: var(--primary-color); border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-tag"></i> Negotiable
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Can't Find Your Dream Home?</h2>
            <p>Let us help you find exactly what you're looking for. Send us your requirements and we'll do the searching for you.</p>
            <a href="book-a-request-house.php" class="btn-secondary">
                <i class="fas fa-hand-holding-heart"></i> Make a Request
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <img src="assets/images/HouseMadeEasylogo.jpg" alt="HouseMadeEasy Logo">
                        <h3>HouseMadeEasy</h3>
                    </div>
                    <p style="margin-top: 1rem; opacity: 0.8;">Helping students find their perfect accommodation with ease.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="how-it-works.php">How It Works</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <li><a href="termsofservice.php">Terms of Service</a></li>
                        <li><a href="privacypolicy.php">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Sagamu Campus, Ogun State</li>
                        <li><i class="fas fa-phone"></i> +234 800 123 4567</li>
                        <li><i class="fas fa-envelope"></i> info@housemadeeasy.com.ng</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> HouseMadeEasy. All rights reserved.</p>
                <div class="social-links">
                    <a href="https://facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navMenu = document.getElementById('navMenu');
        
        mobileMenuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuToggle.querySelector('i');
            icon.className = navMenu.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
        });
        
        // Search form animation
        const searchForm = document.getElementById('searchForm');
        const searchBtn = document.getElementById('searchBtn');
        
        searchForm.addEventListener('submit', (e) => {
            searchBtn.classList.add('loading');
        });
        
        // Smooth scroll for anchor links
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
        
        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe property cards
        document.querySelectorAll('.property-card').forEach(card => {
            observer.observe(card);
        });
        
        // Observe feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });
        
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>
</body>
</html>
