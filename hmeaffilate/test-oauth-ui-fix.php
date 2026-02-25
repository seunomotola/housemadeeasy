<?php
/**
 * Test script to verify the OAuth UI fix works correctly
 * This simulates the OAuth callback scenario
 */

session_start();
$_SESSION['agentaffilate_id'] = 'test_user_123'; // Simulate logged-in user

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OAuth UI Fix Test</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>OAuth UI Fix Test</h1>
        
        <div class="alert alert-info">
            <h4>Test Instructions:</h4>
            <p>This page simulates the OAuth callback scenario. Click the buttons below to test different scenarios:</p>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Test Scenarios</h3>
                <button class="btn btn-success mb-2" onclick="testOAuthSuccess()">
                    <i class="fab fa-google"></i> Test OAuth Success
                </button>
                <button class="btn btn-danger mb-2" onclick="testOAuthFailure()">
                    <i class="fab fa-google"></i> Test OAuth Failure
                </button>
                <button class="btn btn-secondary mb-2" onclick="clearUrl()">
                    Clear URL Parameters
                </button>
            </div>
            
            <div class="col-md-6">
                <h3>Current URL Status</h3>
                <div id="url-status" class="alert alert-secondary">
                    <strong>URL:</strong> <span id="current-url"></span><br>
                    <strong>oauth parameter:</strong> <span id="oauth-param">None</span><br>
                    <strong>db_save parameter:</strong> <span id="db-save-param">None</span>
                </div>
            </div>
        </div>
        
        <hr>
        
        <h3>Simulated Upload Form Section</h3>
        <div id="google-auth-section" class="mb-3">
            <button type="button" id="google-auth-btn" class="btn btn-danger" style="margin-bottom: 10px;" onclick="startGoogleOAuth()">
                <i class="fab fa-google"></i> Connect to Google
            </button>
            <div id="auth-status" class="alert alert-info" style="display: none; margin-bottom: 10px;"></div>
        </div>
        
        <div class="mb-3">
            <label for="house_video">House Video Upload</label>
            <input type="file" id="house_video" name="house_video" accept="video/*" class="form-control" style="margin-bottom: 10px;" disabled>
            <button type="button" id="upload-to-youtube" class="btn btn-secondary" style="margin-bottom: 10px; display: none;">Upload to YouTube</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            updateUrlStatus();
            handleOAuthCallback();
        });

        function updateUrlStatus() {
            $('#current-url').text(window.location.href);
            const urlParams = new URLSearchParams(window.location.search);
            $('#oauth-param').text(urlParams.get('oauth') || 'None');
            $('#db-save-param').text(urlParams.get('db_save') || 'None');
        }

        function testOAuthSuccess() {
            const url = new URL(window.location.href);
            url.searchParams.set('oauth', 'success');
            url.searchParams.set('db_save', 'success');
            url.searchParams.set('timestamp', Date.now());
            window.history.pushState({}, '', url);
            updateUrlStatus();
            handleOAuthCallback();
        }

        function testOAuthFailure() {
            const url = new URL(window.location.href);
            url.searchParams.set('oauth', 'failed');
            url.searchParams.set('db_save', 'failed');
            url.searchParams.set('timestamp', Date.now());
            window.history.pushState({}, '', url);
            updateUrlStatus();
            handleOAuthCallback();
        }

        function clearUrl() {
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.pushState({}, '', cleanUrl);
            updateUrlStatus();
            // Reset UI to initial state
            $('#google-auth-section').show();
            $('#house_video').prop('disabled', true);
            $('#upload-to-youtube').hide();
            $('.alert-success, .alert-danger').remove();
        }

        function handleOAuthCallback() {
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
                
                // Clean up URL parameters after a delay
                setTimeout(() => {
                    const cleanUrl = window.location.origin + window.location.pathname;
                    window.history.replaceState({}, document.title, cleanUrl);
                    updateUrlStatus();
                }, 3000);
            }
            
            // Check for OAuth error
            if (urlParams.get('oauth') === 'failed') {
                const errorMsg = '<div class="alert alert-danger" style="margin-bottom: 10px;">Google connection failed. Please try again.</div>';
                $('#google-auth-section').after(errorMsg);
                
                // Clean up URL parameters after a delay
                setTimeout(() => {
                    const cleanUrl = window.location.origin + window.location.pathname;
                    window.history.replaceState({}, document.title, cleanUrl);
                    updateUrlStatus();
                }, 3000);
            }
        }

        // Function to start Google OAuth
        window.startGoogleOAuth = function() {
            alert('This would redirect to Google OAuth in the real application.');
        };

        // Video upload handling
        $('#house_video').on('change', function() {
            if (this.files.length > 0) {
                $('#upload-to-youtube').show();
            } else {
                $('#upload-to-youtube').hide();
            }
        });
    </script>
</body>
</html>