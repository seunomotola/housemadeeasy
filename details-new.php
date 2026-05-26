<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

include ('inc/session.php');  
require_once __DIR__ . '/inc/property-data.inc.php';

$basename= basename($_SERVER['PHP_SELF']);
$domain= str_replace("$basename", "", $_SERVER['PHP_SELF']); 

// Check if ID parameter exists
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: 404.php");
    exit;
}

$id = (int) $_GET['id'];
$property = hme_fetch_property_by_id($id);

// Check if property exists
if (!$property) {
    header("Location: 404.php");
    exit;
}

$houseName = htmlspecialchars($property['display_title']);
$houseLocation = htmlspecialchars($property['location_name'] ?: 'Location not specified');
$location = htmlspecialchars($property['full_address'] ?: ($property['location_name'] ?: 'Location not specified'));
$propertyType = htmlspecialchars($property['type_label']);
$houseLabel = htmlspecialchars($property['status_label']);
$priceDisplay = $property['price_display'];
$basePriceDisplay = $property['base_price_display'];
$totalPackageDisplay = $property['total_package_display'];
$subsequentRentDisplay = $property['subsequent_rent_display'];
$agreementPriceDisplay = $property['agreement_price_display'];
$agentCommissionDisplay = $property['agent_commission_display'];
$landlordCommissionDisplay = $property['landlord_commission_display'];
$cautionDisplay = $property['caution_display'];
$cleaningFeeDisplay = $property['cleaning_fee_display'];
$serviceFeeDisplay = $property['service_fee_display'];
$electricityBillDisplay = $property['electricity_bill_display'];
$negotiable = hme_property_is_truthy($property['open_to_bargain'] ?? 0) ? 'yes' : 'no';
$sizeDisplay = htmlspecialchars($property['size_display']);
$availabilityDisplay = htmlspecialchars($property['availability_label']);
$statusDisplay = htmlspecialchars($property['status_label']);
$luxuryDisplay = htmlspecialchars($property['luxury_label']);
$houseDesc = !empty($property['description']) ? $property['description'] : 'No description available yet.';
$amenitiesArray = $property['utilities'] ?? [];
$landmarks = $property['landmarks'] ?? [];
$otherFees = $property['other_fees_list'] ?? [];
$agent = htmlspecialchars($property['creator_name']);
$agentPno = $property['creator_phone'] ?? '';
$galleryImages = !empty($property['media_images'])
    ? $property['media_images']
    : [['url' => hme_property_placeholder_image(), 'name' => $property['display_title']]];
$primaryLandmark = !empty($landmarks)
    ? $landmarks[0]['name'] . ' (' . $landmarks[0]['distance_display'] . ')'
    : 'Not specified';
$pageDescription = htmlspecialchars(
    $property['display_title'] . ' on HouseMadeEasy. View pricing, location, amenities, and listing details.'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $houseName; ?> | HouseMadeEasy</title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    
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
        
        .youtube-container {
            position: relative;
            width: 100%;
            height: 500px; /* Match image height */
            background: #000;
        }
        
        @media (max-width: 768px) {
            .youtube-container {
                height: 300px; /* Match mobile image height */
            }
        }
        
        .youtube-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
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
        
        /* Carousel Styles */
        .carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }
        
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .carousel-slide {
            min-width: 100%;
            position: relative;
            cursor: pointer;
        }
        
        .carousel-slide img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .carousel-slide img {
                height: 300px;
            }
            
            .carousel-nav {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .carousel-indicator {
                width: 10px;
                height: 10px;
            }
        }
        
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--text-primary);
            transition: var(--transition);
            z-index: 10;
            box-shadow: var(--shadow-md);
        }
        
        .carousel-nav:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .carousel-nav.prev {
            left: 1rem;
        }
        
        .carousel-nav.next {
            right: 1rem;
        }
        
        .carousel-indicators {
            position: absolute;
            bottom: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 10;
        }
        
        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .carousel-indicator.active {
            background: white;
            transform: scale(1.2);
        }
        
        /* Fullscreen Gallery Modal */
        .gallery-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        
        .gallery-modal.active {
            display: flex;
        }
        
        .gallery-modal-content {
            position: relative;
            width: 90%;
            height: 90%;
            max-width: 1200px;
        }
        
        .gallery-modal-slide {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .gallery-modal-slide img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .gallery-modal-slide iframe {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .gallery-modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--text-primary);
            transition: var(--transition);
            z-index: 10;
            box-shadow: var(--shadow-md);
        }
        
        .gallery-modal-nav:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .gallery-modal-nav.prev {
            left: -25px;
        }
        
        .gallery-modal-nav.next {
            right: -25px;
        }
        
        .gallery-modal-close {
            position: absolute;
            top: -40px;
            right: 0;
            background: none;
            border: none;
            font-size: 2rem;
            color: white;
            cursor: pointer;
            transition: var(--transition);
            z-index: 10;
        }
        
        .gallery-modal-close:hover {
            color: var(--primary-color);
        }
        
        /* Swipe gestures for mobile */
        .gallery-modal-content {
            touch-action: pan-y;
        }
        
        .swipe-indicator {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 0.875rem;
            text-align: center;
            opacity: 0.7;
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
        
        .whatsapp-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin: 1rem 0;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
        
        .whatsapp-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }
        
        .customer-care {
            margin-top: 1rem;
            font-size: 1rem;
            color: var(--text-secondary);
        }
        
        .hotline {
            color: #DC2626;
            font-weight: 700;
            font-size: 1.1rem;
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
            <h1><?php echo $houseName; ?></h1>
            <p><?php echo $propertyType; ?> in <?php echo $houseLocation; ?>, <?php echo $location; ?></p>
        </div>
    </section>

    <!-- Property Gallery -->
    <section class="gallery-section">
        <div class="gallery-container">
            <div class="carousel-container" id="imageCarousel">
                <?php
                $images = $galleryImages;
                if (count($images) > 0) {
                ?>
                    <div class="carousel-track">
                        <?php foreach ($images as $index => $img) { ?>
                            <div class="carousel-slide">
                                <img src="<?php echo htmlspecialchars($img['url']); ?>" alt="<?php echo $houseName; ?> image <?php echo $index + 1; ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-nav prev" onclick="changeSlide(-1)"><i class="fas fa-chevron-left"></i></button>
                    <button class="carousel-nav next" onclick="changeSlide(1)"><i class="fas fa-chevron-right"></i></button>
                    <div class="carousel-indicators">
                        <?php foreach ($images as $index => $img) { ?>
                            <button class="carousel-indicator <?php echo $index === 0 ? 'active' : ''; ?>" onclick="goToSlide(<?php echo $index; ?>)"></button>
                        <?php } ?>
                    </div>
                <?php
                } else {
                    echo '<img src="' . htmlspecialchars(hme_property_placeholder_image()) . '" alt="' . $houseName . '">';
                }
                ?>
                <div class="image-overlay">
                    <h3><?php echo $houseName; ?></h3>
                    <p><?php echo $houseLabel; ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Fullscreen Gallery Modal -->
    <div class="gallery-modal" id="galleryModal">
        <div class="gallery-modal-content">
            <button class="gallery-modal-close" onclick="closeGalleryModal()">
                <i class="fas fa-times"></i>
            </button>
            <button class="gallery-modal-nav prev" onclick="changeModalSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="gallery-modal-nav next" onclick="changeModalSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="gallery-modal-slide" id="modalSlideContainer"></div>
            <div class="swipe-indicator">Swipe left/right to navigate</div>
        </div>
    </div>

    <!-- Property Details -->
    <section class="property-details">
        <div class="details-container">
            <!-- Property Header -->
            <div class="property-header">
                <h2 class="property-title"><?php echo $houseName; ?></h2>
                
                <div class="property-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo $houseLocation; ?>, <?php echo $location; ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-home"></i>
                        <span><?php echo $propertyType; ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <span><?php echo $houseLabel; ?></span>
                    </div>
                </div>
                
                <?php if (false) { ?>
                <div class="property-price">
                    ₦<?php echo number_format((float)str_replace(',', '', $firstYearRent)); ?>
                </div>
                
                <div class="price-details">
                    First year rent: ₦<?php echo number_format((float)str_replace(',', '', $firstYearRent)); ?><br>
                    Subsequent years: ₦<?php echo number_format((float)str_replace(',', '', $secondYearRent)); ?>
                </div>
                
                <?php if ($negotiable == 'yes') { ?>
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
                        <p><?php echo $distance; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-bath"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Bathrooms</h4>
                        <p><?php echo $bathroom; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Kitchens</h4>
                        <p><?php echo $kitchen; ?></p>
                    </div>
                </div>
                
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Doors</h4>
                        <p><?php echo $door; ?></p>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="description-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Description
                </h3>
                <div class="property-description">
                    <?php echo nl2br($houseDesc); ?>
                </div>
            </div>

            <!-- Amenities Section -->
            <div class="amenities-section">
                <h3 class="section-title">
                    <i class="fas fa-star"></i> Amenities
                </h3>
                
                <div class="amenities-grid">
                    <?php
                    $amenitiesArray = !empty($amenities) ? explode(',', $amenities) : array();
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
                    
                    foreach ($amenitiesArray as $amenity) {
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
                            <p><?php echo $waterSource; ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="feature-content">
                            <h4>House Owner</h4>
                            <p><?php echo $houseOwner; ?></p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Fence</h4>
                            <p><?php echo $fence; ?></p>
                        </div>
                    </div>
                    
                    <?php if ($multipleRoom == 'yes') { ?>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-door-closed"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Rooms Left</h4>
                                <p><?php echo $roomsLeft; ?></p>
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
                    <div class="agent-info">
                        <!-- <h4 class="agent-name"><?php echo $agent; ?></h4> -->
                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $agentPno); ?>?text=Hi%20<?php echo urlencode($agent); ?>,%20I%20need%20to%20check%20out%20<?php echo urlencode($houseName); ?>%20in%20<?php echo urlencode($location); ?>.%20Here%20is%20the%20property%20link:%20https://housemadeeasy.com.ng/details-new.php?id=<?php echo $id; ?>.%20When%20can%20we%20meet?%20Thanks.." 
                           class="whatsapp-button" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> Message Agent on WhatsApp
                        </a>
                        <div class="customer-care">
                            If Agent is Unavailable, Please call/whatsapp our Customer Care Hotline: <span class="hotline">08160852570</span>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            <div class="property-price">
                <?php echo htmlspecialchars($priceDisplay); ?>
            </div>

            <div class="price-details">
                Base price: <?php echo htmlspecialchars($basePriceDisplay); ?><br>
                Total package: <?php echo htmlspecialchars($totalPackageDisplay); ?>
                <?php if ($subsequentRentDisplay !== 'Not specified') { ?><br>Subsequent rent: <?php echo htmlspecialchars($subsequentRentDisplay); ?><?php } ?>
            </div>

            <?php if ($negotiable == 'yes') { ?>
                <div class="price-details mt-1">
                    <i class="fas fa-tag"></i> Open to bargain
                </div>
            <?php } ?>
            </div>

            <div class="features-grid">
                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-route"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Nearest Landmark</h4>
                        <p><?php echo htmlspecialchars($primaryLandmark); ?></p>
                    </div>
                </div>

                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-ruler-combined"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Size</h4>
                        <p><?php echo $sizeDisplay; ?></p>
                    </div>
                </div>

                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Availability</h4>
                        <p><?php echo $availabilityDisplay; ?></p>
                    </div>
                </div>

                <div class="feature-item animate-in">
                    <div class="feature-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Luxury Listing</h4>
                        <p><?php echo $luxuryDisplay; ?></p>
                    </div>
                </div>
            </div>

            <div class="description-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Description
                </h3>
                <div class="property-description">
                    <?php echo nl2br(htmlspecialchars($houseDesc)); ?>
                </div>
            </div>

            <div class="amenities-section">
                <h3 class="section-title">
                    <i class="fas fa-star"></i> Amenities
                </h3>

                <div class="amenities-grid">
                    <?php
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

                    if (empty($amenitiesArray)) {
                        echo '<div class="amenity-item"><i class="fas fa-circle-info"></i><span>Utilities not specified yet</span></div>';
                    }

                    foreach ($amenitiesArray as $amenity) {
                        $normalizedAmenity = trim(strtolower((string) $amenity));
                        if ($normalizedAmenity === '') {
                            continue;
                        }

                        $icon = $amenityIcons[$normalizedAmenity] ?? 'fas fa-check-circle';
                        echo '<div class="amenity-item">';
                        echo '<i class="' . $icon . '"></i>';
                        echo '<span>' . htmlspecialchars(ucwords((string) $amenity)) . '</span>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="description-section">
                <h3 class="section-title">
                    <i class="fas fa-list"></i> Property Details
                </h3>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Base Price</h4>
                            <p><?php echo htmlspecialchars($basePriceDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Total Package</h4>
                            <p><?php echo htmlspecialchars($totalPackageDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Agreement Price</h4>
                            <p><?php echo htmlspecialchars($agreementPriceDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-repeat"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Subsequent Rent</h4>
                            <p><?php echo htmlspecialchars($subsequentRentDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Agent Commission</h4>
                            <p><?php echo htmlspecialchars($agentCommissionDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-building-user"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Landlord Commission</h4>
                            <p><?php echo htmlspecialchars($landlordCommissionDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-triangle-exclamation"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Caution</h4>
                            <p><?php echo htmlspecialchars($cautionDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-screwdriver-wrench"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Service Fee</h4>
                            <p><?php echo htmlspecialchars($serviceFeeDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-broom"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Cleaning Fee</h4>
                            <p><?php echo htmlspecialchars($cleaningFeeDisplay); ?></p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Electricity Bill</h4>
                            <p><?php echo htmlspecialchars($electricityBillDisplay); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($otherFees)) { ?>
                <div class="description-section">
                    <h3 class="section-title">
                        <i class="fas fa-receipt"></i> Other Fees
                    </h3>
                    <div class="amenities-grid">
                        <?php foreach ($otherFees as $fee) { ?>
                            <div class="amenity-item">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>
                                    <?php echo htmlspecialchars($fee['name']); ?>
                                    <?php if (!empty($fee['amount_display'])) { ?>
                                        - <?php echo htmlspecialchars($fee['amount_display']); ?>
                                    <?php } ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($landmarks)) { ?>
                <div class="description-section">
                    <h3 class="section-title">
                        <i class="fas fa-location-dot"></i> Nearby Landmarks
                    </h3>
                    <div class="amenities-grid">
                        <?php foreach ($landmarks as $landmark) { ?>
                            <div class="amenity-item">
                                <i class="fas fa-map-pin"></i>
                                <span><?php echo htmlspecialchars($landmark['name'] . ' - ' . $landmark['distance_display']); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="agent-section">
                <h3 class="section-title">
                    <i class="fas fa-user-tie"></i> Listing Contact
                </h3>

                <?php
                $agentWhatsappUrl = '';
                if (!empty($agentPno)) {
                    $agentWhatsappUrl = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $agentPno)
                        . '?text=' . rawurlencode(
                            'Hi ' . htmlspecialchars_decode($agent)
                            . ', I need to check out ' . htmlspecialchars_decode($houseName)
                            . ' at ' . htmlspecialchars_decode($location)
                            . '. Here is the property link: https://housemadeeasy.com.ng/details-new.php?id=' . $id
                            . '. When can we meet? Thanks.'
                        );
                }
                ?>
                <div class="agent-card">
                    <div class="agent-info">
                        <h4 class="agent-name"><?php echo $agent; ?></h4>
                        <?php if ($agentWhatsappUrl !== ''): ?>
                            <a href="<?php echo htmlspecialchars($agentWhatsappUrl); ?>" class="whatsapp-button" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp"></i> Message Agent on WhatsApp
                            </a>
                        <?php else: ?>
                            <div class="customer-care">
                                Direct agent phone is not available yet. Please use our customer care hotline below.
                            </div>
                        <?php endif; ?>
                        <div class="customer-care">
                            If Agent is unavailable, please call or WhatsApp our customer care hotline: <span class="hotline">08160852570</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Section -->
            <div class="booking-section" style="display:none">
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
        
        // Gallery data storage
        let galleryData = [];
        
        // Initialize gallery data based on current slides
        function initializeGalleryData() {
            const slides = document.querySelectorAll('.carousel-slide');
            slides.forEach(slide => {
                const youtubeContainer = slide.querySelector('.youtube-container');
                if (youtubeContainer) {
                    const iframe = slide.querySelector('iframe');
                    const src = iframe ? iframe.src : '';
                    galleryData.push({ type: 'youtube', src: src });
                } else {
                    const img = slide.querySelector('img');
                    if (img) {
                        galleryData.push({ type: 'image', src: img.src });
                    }
                }
            });
        }
        
        // Carousel functionality
        let currentSlide = 0;
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let autoSlideInterval;
        
        if (track && slides.length > 0) {
            initializeGalleryData();
            
            const totalSlides = slides.length;
            
            // Check if first slide contains YouTube video
            const hasYouTubeVideo = slides.length > 0 && slides[0].querySelector('.youtube-container');
            
            function updateCarousel() {
                track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentSlide);
                });
            }
            
            function changeSlide(direction) {
                currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
                updateCarousel();
                resetAutoSlide();
            }
            
            function goToSlide(index) {
                currentSlide = index;
                updateCarousel();
                resetAutoSlide();
            }
            
            function startAutoSlide() {
                // Only start auto-slide if there are multiple slides and first slide is NOT YouTube
                if (totalSlides > 1 && !hasYouTubeVideo) {
                    autoSlideInterval = setInterval(() => {
                        changeSlide(1);
                    }, 4000); // Change slide every 4 seconds
                }
            }
            
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }
            
            // Start auto-sliding
            startAutoSlide();
            
            // Make functions global for button clicks
            window.changeSlide = changeSlide;
            window.goToSlide = goToSlide;
        }
        
        // Fullscreen Gallery Modal Functionality
        let modalCurrentSlide = 0;
        let startX = 0;
        let endX = 0;
        
        function openGalleryModal() {
            const modal = document.getElementById('galleryModal');
            const container = document.getElementById('modalSlideContainer');
            modal.classList.add('active');
            modalCurrentSlide = currentSlide;
            updateModalSlide();
        }
        
        function closeGalleryModal() {
            const modal = document.getElementById('galleryModal');
            modal.classList.remove('active');
        }
        
        function updateModalSlide() {
            const container = document.getElementById('modalSlideContainer');
            const slideData = galleryData[modalCurrentSlide];
            
            if (slideData.type === 'youtube') {
                container.innerHTML = `
                    <iframe src="${slideData.src}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                `;
            } else {
                container.innerHTML = `
                    <img src="${slideData.src}" alt="Property Image">
                `;
            }
        }
        
        function changeModalSlide(direction) {
            modalCurrentSlide = (modalCurrentSlide + direction + galleryData.length) % galleryData.length;
            updateModalSlide();
        }
        
        // Swipe gesture functionality
        const modalContent = document.querySelector('.gallery-modal-content');
        modalContent.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        modalContent.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = startX - endX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next slide
                    changeModalSlide(1);
                } else {
                    // Swipe right - previous slide
                    changeModalSlide(-1);
                }
            }
        }
        
        // Close modal with Esc key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeGalleryModal();
            }
        });
        
        // Open modal when clicking on carousel slides
        document.querySelectorAll('.carousel-slide').forEach((slide, index) => {
            slide.addEventListener('click', () => {
                modalCurrentSlide = index;
                openGalleryModal();
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
