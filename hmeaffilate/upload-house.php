<?php 
// ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
include ("../inc/connect.inc.php");
include ("../inc/session.php"); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload House - HMEAffiliate</title>
    <meta name="description" content="Upload your property details easily to reach potential tenants on HouseMadeEasy platform.">
    
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
        
        /* Upload Section */
        .upload-section {
            max-width: 1280px;
            margin: -4rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .upload-card {
            background: var(--bg-primary);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(10px);
        }
        
        /* Stepper Navigation */
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .stepper::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--border-color);
            z-index: 0;
        }
        
        .stepper-progress {
            position: absolute;
            top: 20px;
            left: 0;
            height: 2px;
            background: var(--primary-color);
            z-index: 1;
            transition: width 0.3s ease;
        }
        
        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
        }
        
        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--bg-primary);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            font-weight: 600;
            color: var(--text-secondary);
            transition: var(--transition);
        }
        
        .step.active .step-circle {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .step.completed .step-circle {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .step-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: var(--transition);
        }
        
        .step.active .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        /* Form Styles */
        .form-section {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }
        
        .form-section.active {
            display: block;
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
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
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
        
        /* Image Preview */
        .image-preview {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 10px;
            border: 2px dashed #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .image-preview:hover {
            border-color: #667eea;
            transform: scale(1.02);
        }
        
        /* Video Upload Section */
        .video-upload-section {
            text-align: center;
            padding: 2rem;
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            margin: 1.5rem 0;
            transition: var(--transition);
        }
        
        .video-upload-section:hover {
            border-color: var(--primary-color);
            background: var(--bg-accent);
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
        
        /* Progress Bar */
        .progress {
            height: 8px;
            border-radius: 4px;
            background: var(--border-color);
            overflow: hidden;
            margin: 1rem 0;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
            transition: width 0.3s ease;
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
        
        /* Navigation Buttons */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .stepper {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            
            .stepper::before,
            .stepper-progress {
                display: none;
            }
            
            .step {
                width: 100%;
                display: flex;
                align-items: center;
                text-align: left;
            }
            
            .step-circle {
                margin: 0 1rem 0 0;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
        }
        
        /* Loading Animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 0.8s linear infinite;
            margin-right: 10px;
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
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="my-account.php">Home</a></li>
                    <li><a href="upload-house.php" class="active">Upload House</a></li>
                    <?php if (isset($_SESSION['agentaffilate_id'])): ?>
                        <li><a href="my-account.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            
            <div class="user-profile">
                <?php if (isset($_SESSION['agentaffilate_id'])): ?>
                    <?php
                    $query2 = mysqli_query($con,"SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");  
                    $row2 = mysqli_fetch_assoc($query2);
                    $prof = (!empty($row2['picture'])) ? 'assets/images/hmeaffilate_img/'.$row2['picture'] : 'assets/images/user.png';  
                    ?>
                    <img src="<?php echo $prof?>" alt="User Profile">
                <?php endif; ?>
            </div>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>🏠 Upload Your Property</h1>
            <p>Fill in the details below to showcase your property to potential tenants</p>
        </div>
    </section>
    
    <!-- Upload Section -->
    <section class="upload-section">
        <div class="upload-card">
            <!-- Stepper Navigation -->
            <div class="stepper">
                <div class="stepper-progress" id="stepper-progress" style="width: 0%"></div>
                <div class="step active" data-step="1">
                    <div class="step-circle">1</div>
                    <div class="step-label">Basic Details</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-circle">2</div>
                    <div class="step-label">Property Images</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-circle">3</div>
                    <div class="step-label">Amenities</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-circle">4</div>
                    <div class="step-label">Pricing & Terms</div>
                </div>
                <div class="step" data-step="5">
                    <div class="step-circle">5</div>
                    <div class="step-label">Video Tour</div>
                </div>
                <div class="step" data-step="6">
                    <div class="step-circle">6</div>
                    <div class="step-label">Review & Submit</div>
                </div>
            </div>
            
            <!-- Upload Form -->
            <form method="POST" action="upload-house.php" id="upload-house-form" class="form-horizontal" enctype="multipart/form-data">
                <!-- Step 1: Basic Details -->
                <div class="form-section active" data-step="1">
                    <h3 class="mb-4">Basic Property Details</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>WhatsApp Number</label>
                            <input name="whatapp" type="text" class="form-control" placeholder="Enter your active WhatsApp Number" required>
                        </div>
                        
                        <div class="form-group">
                            <label>House Type</label>
                            <select name="house_type" id="class_school" required class="form-control">
                                <option selected disabled>Select House Type</option>
                                <option value="Single Room">Single Room</option>
                                <option value="Self contain">Self contain</option>
                                <option value="1 Bedroom Flat">1 Bedroom Flat</option>
                                <option value="2 Bedroom Flat">2 Bedroom Flat</option>
                                <option value="3 Bedroom Flat">3 Bedroom Flat</option>
                                <option value="4 Bedroom Flat">4 Bedroom Flat</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>House Name</label>
                            <select id="subject" name="house_name" class="form-control" required>
                                <option value="">Select House Name</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Location</label>
                            <select name="location" class="form-control" required>
                                <option selected disabled>Select a Location</option>
                                <option value="Sagamu">Sagamu</option>
                                <option value="Ago-Iwoye">Ago-Iwoye</option>
                                <option value="Ibogun">Ibogun</option>
                                <option value="Ayetoro">Ayetoro</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>House Location</label>
                            <input name="house_location" required type="text" placeholder="Where is the house located at in Sagamu ?" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>House Description</label>
                            <textarea name="house_desc"  cols="100" rows="4" placeholder="Describe a little bit about the house" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2: Property Images -->
                <div class="form-section" data-step="2">
                    <h3 class="mb-4">Property Images</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>House Image 1</label>
                            <input name="house_img1" type="file" class="form-control" required onchange="previewImage(this, 'preview1')">
                            <img id="preview1" class="image-preview" src="" alt="Preview" style="display: none;">
                        </div>
                        
                        <div class="form-group">
                            <label>House Image 2</label>
                            <input name="house_img2" type="file" class="form-control" required onchange="previewImage(this, 'preview2')">
                            <img id="preview2" class="image-preview" src="" alt="Preview" style="display: none;">
                        </div>
                        
                        <div class="form-group">
                            <label>House Image 3</label>
                            <input name="house_img3" type="file" class="form-control" required onchange="previewImage(this, 'preview3')">
                            <img id="preview3" class="image-preview" src="" alt="Preview" style="display: none;">
                        </div>
                        
                        <div class="form-group">
                            <label>House Image 4</label>
                            <input name="house_img4" type="file" class="form-control" required onchange="previewImage(this, 'preview4')">
                            <img id="preview4" class="image-preview" src="" alt="Preview" style="display: none;">
                        </div>
                    </div>
                </div>
                
                <!-- Step 3: Amenities -->
                <div class="form-section" data-step="3">
                    <h3 class="mb-4">Property Amenities</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Type of Toilet</label>
                            <select name="amenities" class="form-control" required>
                                <option selected disabled>Choose an option</option>
                                <option value="Water Closet">Water Closet</option>
                                <option value="Pit latrine">Pit latrine</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>House Label</label>
                            <select name="house_label" class="form-control" required>
                                <option selected disabled>Select a Label Product</option>
                                <option value="Hot">Hot</option>
                                <option value="New">New</option>
                                <option value="Old">Old</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Distance to School</label>
                            <select name="distance" class="form-control" required>
                                <option selected disabled>Choose an option</option>
                                <option value="Treakable">Treakable</option>
                                <option value="Not Treakable">Not Treakable</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Number of Kitchens</label>
                            <input name="kitchen" type="text" class="form-control" placeholder="how many kitchen is in there" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Number of Bathrooms</label>
                            <input name="bathroom" type="text" class="form-control" placeholder="how many bathroom does the house has" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Is the house Tiled</label>
                            <select name="door" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Is the house Fenced</label>
                            <select name="fence" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Electricity</label>
                            <select name="electricity" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="Prepaid">Prepaid</option>
                                <option value="Postpaid">Postpaid</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Is the house Gated</label>
                            <select name="gated" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="Gated">Gated</option>
                                <option value="Not Gated">Not Gated</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Gender Required</label>
                            <select name="gender" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="All Gender">All Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Is Roommate Allowed</label>
                            <select name="roommate" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="Allowed">Allowed</option>
                                <option value="Not Allowed">Not Allowed</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Water-Source</label>
                            <select name="water_source" class="form-control" required>
                                <option selected disabled>Choose an option</option>
                                <option value="Running Water">Running Water</option>
                                <option value="Well">Well</option>
                                <option value="Running Water & Well">Running Water & Well</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Is the house a Multiple Room</label>
                            <select name="multiple_room" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>How many Multiple Room</label>
                            <input name="how_many_multiple_room" type="text" placeholder="How many Multiple room (in number)" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Does Landlord reside in the house</label>
                            <select name="landlord_reside" required class="form-control">
                                <option selected disabled>Choose an option</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Step 4: Pricing & Terms -->
                <div class="form-section" data-step="4">
                    <h3 class="mb-4">Pricing & Terms</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>House Rent</label>
                            <input name="house_rent" required placeholder="Enter the house rent" type="text" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Agreement & Commission</label>
                            <input name="agreement" placeholder="Enter the Agreement & Commission" type="text" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>NEPA Bills</label>
                            <input name="nepa" type="text" class="form-control" placeholder="Enter the NEPA bills">
                        </div>
                        
                        <div class="form-group">
                            <label>Cleaning Fees</label>
                            <input name="clean" type="text" class="form-control" placeholder="Enter the Cleaning Fees">
                        </div>
                        
                        <div class="form-group">
                            <label>Damage Fees</label>
                            <input name="damage" type="text" class="form-control" placeholder="Enter the Damage Fees">
                        </div>
                        
                        <div class="form-group">
                            <label>Security Fees</label>
                            <input name="security" type="text" class="form-control" placeholder="Enter the Security Fees">
                        </div>
                        
                        <div class="form-group">
                            <label>Second Year Rent</label>
                            <input name="second" type="text" class="form-control" placeholder="Enter the Subsequent Year Rent" required>
                        </div>
                    </div>
                </div>
                
                <!-- Step 5: Video Tour -->
                <div class="form-section" data-step="5">
                    <h3 class="mb-4">Video Tour</h3>
                    
                    <div id="video-upload-section" class="video-upload-section">
                        <!-- Google Authentication Button -->
                        <div id="google-auth-section" class="mb-3">
                            <button type="button" id="google-auth-btn" class="btn btn-danger" style="margin-bottom: 10px;" onclick="startGoogleOAuth()">
                               <i class="fa-brands fa-google"></i> Connect to Google
                            </button>
                            <div id="auth-status" class="alert alert-info" style="display: none; margin-bottom: 10px;"></div>
                        </div>
                        
                        <input type="file" id="house_video" name="house_video" accept="video/*" class="form-control" style="margin-bottom: 10px;" disabled>
                        <button type="button" id="upload-to-youtube" class="btn btn-secondary" style="margin-bottom: 10px; display: none;">Upload to YouTube</button>
                        <div id="upload-progress" style="display: none;">
                            <div class="progress" style="margin-bottom: 10px;">
                                <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <span id="upload-status">Uploading...</span>
                        </div>
                        <div id="youtube-link-section" style="display: block;">
                            <input type="text" id="youtube_link" name="youtube" class="form-control" placeholder="Paste the video link for this house " readonly>
                        </div>
                    </div>
                </div>
                
                <!-- Step 6: Review & Submit -->
                <div class="form-section" data-step="6">
                    <h3 class="mb-4">Review & Submit</h3>
                    
                    <div class="alert alert-info">
                        <strong>Please review your property details before submitting</strong>
                    </div>
                    
                    <div id="review-content" class="mb-4">
                        <!-- Review content will be dynamically generated -->
                    </div>
                </div>
                
                <!-- Form Navigation -->
                <div class="form-navigation">
                    <button type="button" id="prev-btn" class="btn btn-secondary" style="display: none;">
                        <i class="fas fa-arrow-left"></i> Previous
                    </button>
                    <button type="button" id="next-btn" class="btn btn-primary">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                    <input name="submit" id="submit-btn" value="Upload House" type="submit" class="btn btn-primary" style="display: none;">
                </div>
            </form>
        </div>
    </section>
    
    <?php include ('inc/footer.inc.php'); ?>
    
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Current step
        let currentStep = 1;
        const totalSteps = 6;
        
        // Initialize the form
        $(document).ready(function() {
            // Handle OAuth callback parameters
            const urlParams = new URLSearchParams(window.location.search);
            
            // Check for OAuth success
            if (urlParams.get('oauth') === 'success') {
                console.log('OAuth successful, updating UI...');
                
                // Hide the Google auth section
                $('#google-auth-section').hide();
                
                // Enable video upload
                $('#house_video').prop('disabled', false);
                
                // Show success message
                const successMsg = '<div class="alert alert-success" style="margin-bottom: 10px;"><i class="fab fa-google"></i> Google connected successfully! You can now upload videos.</div>';
                $('#google-auth-section').after(successMsg);
                
                // Clean up URL parameters
                const cleanUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, cleanUrl);
            }
            
            // Check for OAuth error
            if (urlParams.get('oauth') === 'failed') {
                const errorMsg = '<div class="alert alert-danger" style="margin-bottom: 10px;">Google connection failed. Please try again.</div>';
                $('#google-auth-section').after(errorMsg);
                
                // Clean up URL parameters
                const cleanUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, cleanUrl);
            }
            
            // Listen for changes on the "Is the house a Multiple Room" dropdown
            $('select[name="multiple_room"]').on('change', function() {
                var value = $(this).val();
                var howManyField = $('input[name="how_many_multiple_room"]');
                if (value === "no") {
                    howManyField.val(0);
                    howManyField.attr('readonly', true);
                } else {
                    howManyField.val('');
                    howManyField.removeAttr('readonly');
                }
            });
            
            // Video upload handling
            $('#house_video').on('change', function() {
                if (this.files.length > 0) {
                    $('#upload-to-youtube').show();
                } else {
                    $('#upload-to-youtube').hide();
                    $('#youtube-link-section').hide();
                    $('#upload-progress').hide();
                }
            });
            
            // YouTube upload handling
            $('#upload-to-youtube').on('click', function() {
                const videoFile = $('#house_video')[0].files[0];
                if (!videoFile) {
                    alert('Please select a video file first.');
                    return;
                }
                
                const maxSize = 100 * 1024 * 1024;
                if (videoFile.size > maxSize) {
                    alert('File too large. Maximum size is 100MB.');
                    return;
                }
                
                const allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/flv', 'video/webm'];
                if (!allowedTypes.includes(videoFile.type)) {
                    alert('Invalid file type. Please upload a video file.');
                    return;
                }
                
                $('#upload-progress').show();
                $('#upload-to-youtube').prop('disabled', true);
                $('#upload-status').text('Preparing upload...');
                
                const formData = new FormData();
                formData.append('video', videoFile);
                formData.append('action', 'upload_to_youtube');
                
                $.ajax({
                    url: 'callback.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                const percentComplete = evt.loaded / evt.total * 100;
                                $('#progress-bar').css('width', percentComplete + '%');
                                $('#upload-status').text('Uploading... ' + Math.round(percentComplete) + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        console.log('Upload response:', response);
                        
                        let result;
                        try {
                            if (typeof response === 'string') {
                                result = JSON.parse(response);
                            } else {
                                result = response;
                            }
                            
                            if (result.success) {
                                $('#youtube_link').val(result.youtube_url);
                                $('#youtube-link-section').show();
                                $('#upload-status').text('Upload completed successfully!');
                                $('#progress-bar').css('width', '100%');
                                
                                setTimeout(function() {
                                    $('#upload-progress').hide();
                                }, 2000);
                            } else {
                                alert('Upload failed: ' + (result.error || 'Unknown error'));
                                $('#upload-progress').hide();
                            }
                        } catch (e) {
                            console.error('Response processing error:', e);
                            console.log('Raw response:', response);
                            alert('Error processing upload response: ' + e.message);
                            $('#upload-progress').hide();
                        }
                        $('#upload-to-youtube').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', {xhr, status, error});
                        let errorMsg = 'Upload failed: ' + error;
                        if (xhr.responseText) {
                            console.log('Error response:', xhr.responseText);
                            errorMsg += '\nServer response: ' + xhr.responseText.substring(0, 200);
                        }
                        alert(errorMsg);
                        $('#upload-progress').hide();
                        $('#upload-to-youtube').prop('disabled', false);
                    }
                });
            });
            
            // Next button click
            $('#next-btn').click(function() {
                if (currentStep < totalSteps) {
                    // Validate current step
                    if (validateStep(currentStep)) {
                        goToStep(currentStep + 1);
                    }
                }
            });
            
            // Previous button click
            $('#prev-btn').click(function() {
                if (currentStep > 1) {
                    goToStep(currentStep - 1);
                }
            });
            
            // Generate review content when on step 6
            $('#upload-house-form').on('stepChange', function(event, step) {
                if (step === 6) {
                    generateReviewContent();
                }
            });
        });
        
        // Function to go to specific step
        function goToStep(step) {
            // Hide current section
            $('.form-section.active').removeClass('active');
            
            // Show new section
            $('.form-section[data-step="' + step + '"]').addClass('active');
            
            // Update stepper
            $('.step').removeClass('active').removeClass('completed');
            $('.step[data-step="' + step + '"]').addClass('active');
            for (let i = 1; i < step; i++) {
                $('.step[data-step="' + i + '"]').addClass('completed');
            }
            
            // Update progress bar
            const progress = ((step - 1) / (totalSteps - 1)) * 100;
            $('#stepper-progress').css('width', progress + '%');
            
            // Update navigation buttons
            $('#prev-btn').toggle(step > 1);
            $('#next-btn').toggle(step < totalSteps);
            $('#submit-btn').toggle(step === totalSteps);
            
            // Update current step
            currentStep = step;
            
            // Trigger step change event
            $('#upload-house-form').trigger('stepChange', step);
        }
        
        // Function to validate current step
        function validateStep(step) {
            const fields = $('.form-section[data-step="' + step + '"]').find('[required]');
            let isValid = true;
            
            fields.each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).focus();
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
            
            if (!isValid) {
                alert('Please fill in all required fields before proceeding.');
            }
            
            return isValid;
        }
        
        // Function to generate review content
        function generateReviewContent() {
            const reviewContent = $('#review-content');
            reviewContent.empty();
            
            // Collect form data
            const formData = {};
            $('#upload-house-form').serializeArray().forEach(function(field) {
                formData[field.name] = field.value;
            });
            
            // Generate review HTML
            const reviewHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <h4>Basic Details</h4>
                        <p><strong>WhatsApp:</strong> ${formData.whatapp}</p>
                        <p><strong>House Type:</strong> ${formData.house_type}</p>
                        <p><strong>House Name:</strong> ${formData.house_name}</p>
                        <p><strong>Location:</strong> ${formData.location}</p>
                        <p><strong>House Location:</strong> ${formData.house_location}</p>
                        <p><strong>Description:</strong> ${formData.house_desc}</p>
                    </div>
                    <div class="col-md-6">
                        <h4>Pricing</h4>
                        <p><strong>House Rent:</strong> ${formData.house_rent}</p>
                        <p><strong>Agreement & Commission:</strong> ${formData.agreement}</p>
                        <p><strong>NEPA Bills:</strong> ${formData.nepa}</p>
                        <p><strong>Cleaning Fees:</strong> ${formData.clean}</p>
                        <p><strong>Damage Fees:</strong> ${formData.damage}</p>
                        <p><strong>Security Fees:</strong> ${formData.security}</p>
                        <p><strong>Second Year Rent:</strong> ${formData.second}</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4>Additional Details</h4>
                        <p><strong>Toilet Type:</strong> ${formData.amenities}</p>
                        <p><strong>House Label:</strong> ${formData.house_label}</p>
                        <p><strong>Distance to School:</strong> ${formData.distance}</p>
                        <p><strong>Number of Kitchens:</strong> ${formData.kitchen}</p>
                        <p><strong>Number of Bathrooms:</strong> ${formData.bathroom}</p>
                        <p><strong>Tiled:</strong> ${formData.door}</p>
                        <p><strong>Fenced:</strong> ${formData.fence}</p>
                        <p><strong>Electricity:</strong> ${formData.electricity}</p>
                        <p><strong>Gated:</strong> ${formData.gated}</p>
                        <p><strong>Gender Required:</strong> ${formData.gender}</p>
                        <p><strong>Roommate Allowed:</strong> ${formData.roommate}</p>
                        <p><strong>Water Source:</strong> ${formData.water_source}</p>
                        <p><strong>Multiple Rooms:</strong> ${formData.multiple_room}</p>
                        <p><strong>Number of Multiple Rooms:</strong> ${formData.how_many_multiple_room}</p>
                        <p><strong>Landlord Resides:</strong> ${formData.landlord_reside}</p>
                    </div>
                </div>
            `;
            
            reviewContent.html(reviewHTML);
        }
        
        // Function to start Google OAuth
        window.startGoogleOAuth = function() {
            const state = 'upload-house.php';
            const scope = 'https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube.force-ssl';
            
            const googleAuthUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' +
                'client_id=488890072316-a367l4n2ns3l17o0unoab7jp9t4mgd52.apps.googleusercontent.com&' +
                'redirect_uri=' + encodeURIComponent('https://housemadeeasy.com.ng/hmeaffilate/callback.php') + '&' +
                'response_type=code&' +
                'scope=' + encodeURIComponent(scope) + '&' +
                'access_type=offline&' +
                'prompt=consent&' +
                'state=' + encodeURIComponent(state);
            
            window.location.href = googleAuthUrl;
        };
        
        // Image preview function
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
        
        // Function to update subjects based on class selection
        function updateSubjectOptions() {
            var classValue = $('#class_school').val();
            var subjectDropdown = $('#subject');
            subjectDropdown.empty();
            var singleroom = ['Single room with shared toilet and bathroom', 'Single room in a flat with shared toilet and bathroom', 'Single room with personal toilet and bathroom', 'Single room and palour with shared toilet and bathroom'];
            var selfcontain = ['Self contain'];
            var onebedroomflat = ['One bedroom flat'];
            var twobedroomflat = ['Two bedroom flat with shared toilet and bathroom', 'Two bedroom flat with personal toilet in each room'];
            var threebedroomflat = ['Three bedroom flat with one bathroom and toilet', 'Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet', 'Three bedroom flat with personal toilet and bathroom each'];
            var fourbedroomflat = ['Four bedroom flat with one bathroom and toilet', 'Four bedroom flat with a master bedroom(having personal toilet and bathroom) and the three rooms sharing one bathroom and toilet', 'Four bedroom flat with personal toilet and bathroom each', 'Four bedroom flat with two toilet and bathroom'];
            
            if (classValue === 'Single Room') {
                singleroom.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            } else if (classValue === 'Self contain') {
                selfcontain.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            } else if (classValue === '1 Bedroom Flat') {
                onebedroomflat.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            } else if (classValue === '2 Bedroom Flat') {
                twobedroomflat.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            } else if (classValue === '3 Bedroom Flat') {
                threebedroomflat.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            } else if (classValue === '4 Bedroom Flat') {
                fourbedroomflat.forEach(function(subject) {
                    subjectDropdown.append(new Option(subject, subject));
                });
            }
        }
        
        // Listen for changes in the class dropdown and update subjects accordingly
        $('#class_school').on('change', function() {
            updateSubjectOptions();
        });
    </script>
    
    <?php
    function val($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data =strip_tags($data);
        return $data;
    }
    
    if(isset($_POST['submit'])){
        if(isset($_SESSION['agentaffilate_id'])) {
            $query2 = mysqli_query($con,"SELECT * FROM hmeaffilate_user WHERE agentaffilate_id = '".$_SESSION['agentaffilate_id']."'");  
            $row2 = mysqli_fetch_assoc($query2);
            $agent_fname= $row2['fname'];
            $agent_lname= $row2['lname'];
            $agent_email = $row2['email'];   
            $agent_pno = $row2['pno'];
            $agentaffilate_id=$row2['agentaffilate_id'];
        }
        
        $location = $_POST['location'];
        $house_location = $_POST['house_location'];
        $house_type = $_POST['house_type'];
        $multiple_room = $_POST['multiple_room'];
        $how_many_multiple_room = $_POST['how_many_multiple_room'];
        $house_desc = $_POST['house_desc'];
        $amenities = $_POST['amenities'];
        $house_label = $_POST['house_label'];
        $gated = $_POST['gated'];
        $electricity = $_POST['electricity'];
        $gender = $_POST['gender'];
        $roommate = $_POST['roommate'];
        $distance = $_POST['distance'];
        $kitchen = $_POST['kitchen'];
        $bathroom = $_POST['bathroom'];
        $door = $_POST['door'];
        $fence = $_POST['fence'];
        $water_source = $_POST['water_source'];
        $whatapp = $_POST['whatapp'];
        $second = $_POST['second'];
        $agreement = $_POST['agreement'];
        $nepa = $_POST['nepa'];
        $clean = $_POST['clean'];
        $damage = $_POST['damage'];
        $security = $_POST['security'];
        $house_rent = $_POST['house_rent'];
        $landlord_reside=$_POST['landlord_reside'];
        $house_name = $_POST['house_name'];
        $youtube = $_POST['youtube'];
        
        $house_agent_fname_session=$_SESSION['fname'];
        $house_agent_lname_session=$_SESSION['lname'];
        $house_agent_pno_session=$_SESSION['pno'];
        $house_agent_email_session=$_SESSION['email'];
        $house_agent_user_id_session=$_SESSION['agentaffilate_id'];
        
        if ($house_name == 'Single room with shared toilet and bathroom') {
            $agent_fees = 10000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 20000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Single room in a flat with shared toilet and bathroom') {
            $agent_fees = 10000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Single room with personal toilet and bathroom') {
            $agent_fees = 20000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Single room and palour with shared toilet and bathroom') {
            $agent_fees = 20000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 30000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Self contain') {
            $agent_fees = 30000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 40000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'One bedroom flat') {
            $agent_fees = 30000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 50000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Two bedroom flat with shared toilet and bathroom') {
            $agent_fees = 40000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 50000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Two bedroom flat with personal toilet in each room') {
            $agent_fees = 40000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 70000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Three bedroom flat with one bathroom and toilet') {
            $agent_fees = 60000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 70000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Three bedroom flat with a master bedroom(having personal toilet and bathroom) and the two rooms sharing one bathroom and toilet') {
            $agent_fees = 60000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 90000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Three bedroom flat with personal toilet and bathroom each') {
            $agent_fees = 70000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 100000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Four bedroom flat with personal toilet and bathroom each') {
            $agent_fees = 80000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 120000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Four bedroom flat with two bathroom and toilet') {
            $agent_fees = 50000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 90000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        } elseif ($house_name == 'Four bedroom flat with one bathroom and toilet') {
            $agent_fees = 40000;
            $agreement_new = number_format((int)str_replace(',', '', $agreement) + 80000);
            $first_new = number_format((int)str_replace(',', '', $house_rent) + (int)str_replace(',', '', $nepa) +(int)str_replace(',', '', $clean) +(int)str_replace(',', '', $damage)+ (int)str_replace(',', '', $security) + $agent_fees + (int)str_replace(',', '', $agreement_new));
        }
        
        $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp', 'image/bmp', 'image/svg+xml'];
        function isValidImage($tmp_name, $allowedMimeTypes) {
            if (!file_exists($tmp_name)) return false;
            $mime = mime_content_type($tmp_name);
            return in_array($mime, $allowedMimeTypes);
        }
        
        $uploadDir = "../assets/images/property/";
        $shortTermDir = "../assets/images/short-term-stay/";
        $imageFiles = [
            'house_img1',
            'house_img2',
            'house_img3',
            'house_img4'
        ];
        $uploadedImages = [];
        
        foreach ($imageFiles as $key) {
            $tmpName = $_FILES[$key]['tmp_name'];
            $originalName = $_FILES[$key]['name'];
            if (!empty($tmpName)) {
                if (!isValidImage($tmpName, $allowedMimeTypes)) {
                    die("Error: The file uploaded for $key is not a valid image format.");
                }
                
                $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                $uniqueName = uniqid('img_', true) . '.' . $extension;
                $destinationPath = $uploadDir . $uniqueName;
                $shortTermPath = $shortTermDir . $uniqueName;
                
                if (move_uploaded_file($tmpName, $destinationPath)) {
                    copy($destinationPath, $shortTermPath);
                    $uploadedImages[$key] = $uniqueName;
                } else {
                    die("Failed to upload $key.");
                }
            }
        }
        
        $house_img1 = $uploadedImages['house_img1'] ?? '';
        $house_img2 = $uploadedImages['house_img2'] ?? '';
        $house_img3 = $uploadedImages['house_img3'] ?? '';
        $house_img4 = $uploadedImages['house_img4'] ?? '';
        
        $house_id= bin2hex(random_bytes(4));
        $house_id_short= bin2hex(random_bytes(4));
        
        $insert_product = "INSERT into properties (agent, agent_img, agent_pno, agent_email, location, house_location, type, date, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, status,date_due, first_year_rent, second_year_rent, house_id,multiple_room,how_many_multiple_room, house_owner, youtube_link, negotiable, agentaffilate_id, how_many_multiple_room_new, electricity, gated, gender, roommate, agree_com, agent_fees,nepa_bills, clean_fees, damage_fees, security_fees,house_rent) values ('$agent_fname', '', '$whatapp','$agent_email', '$location', '$house_location', '$house_type', NOW(),'$house_name','$house_img1','$house_img2','$house_img3','$house_img4','$house_desc','$amenities','$house_label','$distance', '$kitchen', '$bathroom', '$door', '$fence', '$water_source', 'no', '', '$first_new', '$second', '$house_id', '$multiple_room', '$how_many_multiple_room', '$landlord_reside', '$youtube', '', '$agentaffilate_id', '$how_many_multiple_room', '$electricity', '$gated', '$gender', '$roommate', '$agreement_new', '$agent_fees', '$nepa', '$clean', '$damage', '$security', '$house_rent')";
        
        $run_product1 = mysqli_query($con,$insert_product);
        $insert_product2 = "INSERT into short_term_rentals_properties (agent, agent_img, agent_pno, agent_email, location, house_location, type, date, house_name, house_img1, house_img2, house_img3, house_img4, house_desc, amenities, house_label, distance, kitchen, bathroom, door, fence, water_source, status,date_due, house_id,multiple_room,how_many_multiple_room, house_owner, youtube_link) values ('$agent_fname', '', '$whatapp','$agent_email', '$location', '$house_location', '$house_type', NOW(),'$house_name','$house_img1','$house_img2','$house_img3','$house_img4','$house_desc','$amenities','$house_label','$distance', '$kitchen', '$bathroom', '$door', '$fence', '$water_source', 'no', '', '$house_id_short', '$multiple_room', '$how_many_multiple_room', '$landlord_reside', '$youtube')";
         
        $run_product2 = mysqli_query($con,$insert_product2);
        
        if ($run_product1 && $run_product2) {
            if (!empty($youtube)) {
                $accessToken = null;
                if (isset($_SESSION['google_access_token'])) {
                    $accessToken = $_SESSION['google_access_token'];
                } elseif (isset($_SESSION['agentaffilate_id'])) {
                    $tokens = getGoogleTokens($_SESSION['agentaffilate_id']);
                    if ($tokens && isTokenValid($tokens['google_token_expires_at'])) {
                        $accessToken = $tokens['google_access_token'];
                    }
                }
                
                if ($accessToken) {
                    $url = $youtube;
                    $query = [];
                    parse_str(parse_url($url, PHP_URL_QUERY), $query);
                    $video_id = $query['v'] ?? '';
                    
                    if (!empty($video_id)) {
                        $title = $house_label . ' ' . $house_type . ' in ' . $house_location . ', ' . $location . ' - ₦' . number_format($house_rent) . ' per year';
                        $description = "🏠 Discover this amazing " . $house_type . " located in " . $house_location . ", " . $location . ".\n\n";
                        $description .= "📝 Description: " . $house_desc . "\n\n";
                        $description .= "✨ Key Features:\n";
                        $description .= "• Toilet Type: " . $amenities . "\n";
                        $description .= "• Kitchen: " . $kitchen . " kitchen(s)\n";
                        $description .= "• Bathroom: " . $bathroom . " bathroom(s)\n";
                        $description .= "• Tiled: " . ($door == 'yes' ? 'Yes' : 'No') . "\n";
                        $description .= "• Fenced: " . ($fence == 'yes' ? 'Yes' : 'No') . "\n";
                        $description .= "• Electricity: " . $electricity . "\n";
                        $description .= "• Gated: " . $gated . "\n";
                        $description .= "• Gender Requirement: " . $gender . "\n";
                        $description .= "• Roommate Allowed: " . $roommate . "\n";
                        $description .= "• Water Source: " . $water_source . "\n";
                        $description .= "• Landlord Resides: " . $landlord_reside . "\n";
                        $description .= "• Distance to School: " . $distance . "\n";
                        $description .= "• Multiple Rooms: " . $multiple_room;
                        if ($multiple_room == 'yes') {
                            $description .= " (" . $how_many_multiple_room . " rooms)";
                        }
                        $description .= "\n\n";
                        $description .= "💰 Pricing Details:\n";
                        $description .= "• Annual Rent: ₦" . number_format($house_rent) . "\n";
                        $description .= "• Agreement & Commission: ₦" . number_format($agreement_new) . "\n";
                        $description .= "• NEPA Bills: ₦" . number_format($nepa) . "\n";
                        $description .= "• Cleaning Fees: ₦" . number_format($clean) . "\n";
                        $description .= "• Damage Fees: ₦" . number_format($damage) . "\n";
                        $description .= "• Security Fees: ₦" . number_format($security) . "\n";
                        $description .= "• Second Year Rent: ₦" . number_format($second) . "\n\n";
                        $description .= "📞 Contact Information:\n";
                        $description .= "WhatsApp: " . $whatapp . "\n\n";
                        $description .= "🔗 View full details and book this house: https://housemadeeasy.com.ng/details.php?id=" . $house_id . "\n\n";
                        $description .= "#HouseMadeEasy #HouseForRent #" . str_replace(' ', '', $location) . " #" . str_replace(' ', '', $house_type) . " #StudentHousing #OlabisiOnabanjoUniversity";
                        
                        $updateResult = updateVideoMetadata($accessToken, $video_id, $title, $description);
                        if ($updateResult) {
                            error_log("Successfully updated YouTube video metadata for video ID: " . $video_id);
                        } else {
                            error_log("Failed to update YouTube video metadata for video ID: " . $video_id);
                        }
                    }
                }
            }
            echo "<script>alert('Your House has been uploaded Successfully')</script>";
            echo "<script>window.open('my-account.php')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
    ?>
</body>
</html>
