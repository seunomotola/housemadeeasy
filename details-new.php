<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include ('inc/session.php');  
include("inc/connect.inc.php");

$basename= basename($_SERVER['PHP_SELF']);
$domain= str_replace("$basename", "", $_SERVER['PHP_SELF']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        $id = $_GET['id'];
        $sql ="SELECT * FROM properties WHERE id='$id' ";
        $result = mysqli_query($con,$sql);
        $post = mysqli_fetch_assoc($result);
        echo $post['house_name'] . " | HouseMadeEasy";
    ?></title>
    <meta name="description" content="View details of <?php echo $post['house_name']; ?> on HouseMadeEasy. Find your dream accommodation in Sagamu campus of Olabisi Onabanjo University.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
            max-width: 1400px;
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
        
        /* Property Gallery Section */
        .gallery-section {
            max-width: 1400px;
            margin: -4rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .gallery-container {
            background: var(--bg-primary);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            padding: 2rem;
        }
        
        .main-image {
            position: relative;
            height: 500px;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-accent));
        }
        
        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .main-image:hover img {
            transform: scale(1.1);
        }
        
        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            padding: 2rem;
            color: white;
        }
        
        .image-overlay h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        
        .image-overlay p {
            font-size: 1.125rem;
            opacity: 0.9;
        }
        
        .thumbnail-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 1rem;
        }
        
        .thumbnail {
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
        }
        
        .thumbnail:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        
        .thumbnail.active {
            border-color: var(--primary-color);
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Property Details Section */
        .property-details {
            max-width: 1400px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }
        
        .details-container {
            background: var(--bg-primary);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            padding: 3rem;
        }
        
        .property-header {
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .property-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-primary);
            line-height: 1.2;
        }
        
        .property-meta {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
        }
        
        .meta-item i {
            color: var(--primary-color);
        }
        
        .property-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .price-details {
            color: var(--text-secondary);
            font-size: 1.125rem;
        }
        
        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 2rem;
            background: var(--bg-secondary);
            border-radius: 16px;
            transition: var(--transition);
        }
        
        .feature-item:hover {
            background: var(--bg-accent);
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .feature-icon i {
            font-size: 1.5rem;
            color: white;
        }
        
        .feature-content h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }
        
        .feature-content p {
            color: var(--text-secondary);
            line-height: 1.6;
        }
        
        /* Description Section */
        .description-section {
            margin: 3rem 0;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .section-title i {
            color: var(--primary-color);
        }
        
        .property-description {
            line-height: 1.8;
            color: var(--text-secondary);
            font-size: 1.125rem;
        }
        
        /* Amenities Section */
        .amenities-section {
            margin: 3rem 0;
        }
        
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .amenity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--bg-secondary);
            border-radius: 12px;
            transition: var(--transition);
        }
        
        .amenity-item:hover {
            background: var(--bg-accent);
            transform: translateX(4px);
            box-shadow: var(--shadow-sm);
        }
        
        .amenity-item i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }
        
        .amenity-item span {
            font-weight: 500;
            color: var(--text-primary);
        }
        
        /* Agent Information */
        .agent-section {
            margin: 3rem 0;
            padding: 2rem;
            background: linear-gradient(135deg, var(--bg-accent), var(--bg-secondary));
            border-radius: 16px;
        }
        
        .agent-card {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .agent-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid var(--primary-color);
            box-shadow: var(--shadow-lg);
        }
        
        .agent-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .agent-info {
            flex: 1;
        }
        
        .agent-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }
        
        .agent-contact {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
        }
        
        .contact-item i {
            color: var(--primary-color);
        }
        
        .contact-item a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .contact-item a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
        
        /* Booking Section */
        .booking-section {
            margin: 3rem 0;
            padding: 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 16px;
            color: white;
            text-align: center;
        }
        
        .booking-section h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .booking-section p {
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .booking-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: var(--primary-color);
            border: none;
            border-radius: 12px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-lg);
            text-decoration: none;
        }
        
        .booking-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
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
            
            .gallery-container {
                padding: 1.5rem;
            }
            
            .main-image {
                height: 300px;
            }
            
            .details-container {
                padding: 2rem;
            }
            
            .property-title {
                font-size: 2rem;
            }
            
            .property-price {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .amenities-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
            
            .agent-card {
                text-align: center;
                justify-content: center;
            }
            
            .agent-info {
                text-align: center;
            }
            
            .agent-contact {
                justify-content: center;
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
        
        .feature-item:nth-child(1) { animation-delay: 0.1s; opacity: 0; }
        .feature-item:nth-child(2) { animation-delay: 0.2s; opacity: 0; }
        .feature-item:nth-child(3) { animation-delay: 0.3s; opacity: 0; }
        .feature-item:nth-child(4) { animation-delay: 0.4s; opacity: 0; }
        
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
        
        /* Utility Classes */
        .text-center {
            text-align: center;
        }
        
        .mt-1 { margin-top: 1rem; }
        .mt-2 { margin-top: 2rem; }
        .mt-3 { margin-top: 3rem; }
        
        .mb-1 { margin-bottom: 1rem; }
        .mb-2 { margin-bottom: 2rem; }
        .mb-3 { margin-bottom: 3rem; }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="/assets/images/HouseMadeEasylogo.jpg" alt="HouseMadeEasy Logo">
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
                    <span class="cart-count" id="cartCount">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1><?php echo $post['house_name']; ?></h1>
            <p><?php echo ucwords($post['type']); ?> in <?php echo ucwords($post['house_location']); ?>, <?php echo $post['location']; ?></p>
        </div>
    </section>

    <!-- Property Gallery -->
    <section class="gallery-section">
        <div class="gallery-container">
            <div class="main-image">
                <img src="/assets/images/property/<?php echo $post['house_img2']; ?>" alt="<?php echo $post['house_name']; ?>" id="mainImage">
                <div class="image-overlay">
                    <h3><?php echo $post['house_name']; ?></h3>
                    <p><?php echo $post['house_label']; ?></p>
                </div>
            </div>
            
            <div class="thumbnail-gallery">
                <?php
                $images = array();
                if (!empty($post['house_img2'])) $images[] = $post['house_img2'];
                if (!empty($post['house_img3'])) $images[] = $post['house_img3'];
                if (!empty($post['house_img4'])) $images[] = $post['house_img4'];
                if (!empty($post['house_img1'])) $images[] = $post['house_img1'];
                
                foreach ($images as $index => $img) {
                    echo '<div class="thumbnail ' . ($index == 0 ? 'active' : '') . '" data-img="' . $img . '">';
                    echo '<img src="/assets/images/property/' . $img . '" alt="Property Image ' . ($index + 1) . '">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Property Details -->
    <section class="property-details">
        <div class="details-container">
            <!-- Property Header -->
            <div class="property-header">
                <h2 class="property-title"><?php echo $post['house_name']; ?></h2>
                
                <div class="property-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo ucwords($post['house_location']); ?>, <?php echo $post['location']; ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-home"></i>
                        <span><?php echo ucwords($post['type']); ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <span><?php echo $post['house_label']; ?></span>
                    </div>
                </div>
                
                <div class="property-price">
                    #<?php echo number_format((float)$post['first_year_rent']); ?>
                </div>
                
                <div class="price-details">
                    First year rent: #<?php echo number_format((float)$post['first_year_rent']); ?><br>
                    Subsequent years: #<?php echo number_format((float)$post['second_year_rent']); ?>
                </div>
                
                <?php if ($post['negotiable'] == 'yes') { ?>
                    <div class="price-details mt-1">
                        <i class="fas fa-tag"></i> Negotiable
                    </div>
                <?php } ?>
            </div>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-route"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Distance</h4>
                        <p><?php echo $post['distance']; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-bath"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Bathrooms</h4>
                        <p><?php echo $post['bathroom']; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Kitchens</h4>
                        <p><?php echo $post['kitchen']; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Doors</h4>
                        <p><?php echo $post['door']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="description-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Description
                </h3>
                <div class="property-description">
                    <?php echo nl2br($post['house_desc']); ?>
                </div>
            </div>

            <!-- Amenities Section -->
            <div class="amenities-section">
                <h3 class="section-title">
                    <i class="fas fa-star"></i> Amenities
                </h3>
                
                <div class="amenities-grid">
                    <?php
                    $amenities = explode(',', $post['amenities']);
                    $amenityIcons = array(
                        'water' => 'fas fa-tint',
                        'electricity' => 'fas fa-bolt',
                        'security' => 'fas fa-shield-alt',
                        'parking' => 'fas fa-parking',
                        'garden' => 'fas fa-leaf',
                        'balcony' => 'fas fa-door-open',
                        'wifi' => 'fas fa-wifi',
                        'air' => 'fas fa-wind',
                        'heating' => 'fas fa-fire',
                        'elevator' => 'fas fa-building',
                        'gym' => 'fas fa-dumbbell'
                    );
                    
                    foreach ($amenities as $amenity) {
                        $amenity = trim(strtolower($amenity));
                        if (!empty($amenity)) {
                            $icon = $amenityIcons[$amenity] ?? 'fas fa-check-circle';
                            echo '<div class="amenity-item">';
                            echo '<i class="' . $icon . '"></i>';
                            echo '<span>' . ucwords($amenity) . '</span>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Property Details -->
            <div class="description-section">
                <h3 class="section-title">
                    <i class="fas fa-list"></i> Property Details
                </h3>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Water Source</h4>
                            <p><?php echo $post['water_source']; ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="feature-content">
                            <h4>House Owner</h4>
                            <p><?php echo $post['house_owner']; ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Fence</h4>
                            <p><?php echo $post['fence']; ?></p>
                        </div>
                    </div>
                    
                    <?php if ($post['multiple_room'] == 'yes') { ?>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-door-closed"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Rooms Left</h4>
                                <p><?php echo $post['how_many_multiple_room']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Agent Information -->
            <div class="agent-section">
                <h3 class="section-title">
                    <i class="fas fa-user-tie"></i> Agent Information
                </h3>
                
                <div class="agent-card">
                    <div class="agent-avatar">
                        <img src="/assets/images/agent/<?php echo $post['agent_img']; ?>" alt="<?php echo $post['agent']; ?>">
                    </div>
                    
                    <div class="agent-info">
                        <h4 class="agent-name"><?php echo $post['agent']; ?></h4>
                        <div class="agent-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:<?php echo $post['agent_pno']; ?>"><?php echo $post['agent_pno']; ?></a>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?php echo $post['agent_email']; ?>"><?php echo $post['agent_email']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Section -->
            <div class="booking-section">
                <h3>Ready to Book?</h3>
                <p>Don't miss out on this amazing property. Book now before it's too late!</p>
                <a href="book.php?id=<?php echo $id; ?>" class="booking-button">
                    <i class="fas fa-calendar-check"></i> Book Now
                </a>
            </div>
        </div>
    </section>

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
        
        // Gallery functionality
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainImage');
        
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                // Remove active class from all thumbnails
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                
                // Add active class to clicked thumbnail
                thumbnail.classList.add('active');
                
                // Change main image
                const imagePath = thumbnail.getAttribute('data-img');
                mainImage.src = 'assets/images/property/' + imagePath;
            });
        });
        
        // Update cart count
        function updateCartCount() {
            fetch('get_cart_count.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cartCount').textContent = data.cart_count;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        
        // Update cart count on page load
        window.addEventListener('load', updateCartCount);
        
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
        
        // Observe feature items
        document.querySelectorAll('.feature-item').forEach(item => {
            observer.observe(item);
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
    </script>
</body>
</html>
