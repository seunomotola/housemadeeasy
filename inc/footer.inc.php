    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="assets/images/HouseMadeEasylogo.jpg" alt="House Made Easy Logo">
                    </div>
                    <p class="footer-description">
                        House Made Easy is your trusted partner in finding the perfect home and housing solutions.
                        We simplify your housing journey with innovative technology and comprehensive services.
                    </p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/102107102565299/posts/102119325897410/?sfnsn=scwspmo" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.twitter.com/housemadeeasy" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="index.php#features">Features</a></li>
                        <li><a href="index.php#testimonials">Testimonials</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-links">
                        <li><a href="search-made-easy.php">Apartment Provision</a></li>
                        <li><a href="flatmate-finder/index.php">Flatmate Finder</a></li>
                        <li><a href="marketplace/index.php">Campus Yard</a></li>
                        <li><a href="make-money-with-housemadeeasy.php">Make Money</a></li>
                        <li><a href="housemadeeasy-logistics.php">Logistics</a></li>
                        <li><a href="home-repair/index.php">Home Repair</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-links">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Olabisi Onabanjo University, Sagamu Campus, Ogun State, Nigeria</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+234 7063 826 326</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>support@housemadeeasy.com.ng</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    &copy; <?php echo date('Y'); ?> House Made Easy. All rights reserved.
                </div>
                <div class="footer-links">
                    <a href="privacypolicy.php">Privacy Policy</a>
                    <a href="termsofservice.php">Terms of Service</a>
                    <a href="mailto:support@housemadeeasy.com.ng">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- All jquery file included here -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/map-place.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

    <style>
        /* Footer Styles */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 2rem 2rem;
            margin-top: 4rem;
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
        }

        .footer-logo img {
            width: 150px;
            height: auto;
            margin-bottom: 1.5rem;
            border-radius: 8px;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--gradient);
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: start;
            gap: 0.5rem;
        }

        .footer-links li i {
            color: var(--primary);
            margin-top: 0.25rem;
            width: 20px;
            text-align: center;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .footer-copyright {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .footer-bottom .footer-links {
            display: flex;
            gap: 2rem;
            justify-content: center;
        }

        .footer-bottom .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-bottom .footer-links a:hover {
            color: var(--primary);
        }

        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
            }

            .footer-bottom .footer-links {
                flex-direction: column;
                gap: 0.75rem;
            }
        }
    </style>
</body>
</html>
