<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>YouTube OAuth Test</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .btn { padding: 10px 20px; margin: 10px; cursor: pointer; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        #status { margin: 20px 0; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>YouTube OAuth Authentication Test</h1>
    
    <div id="status">
        <h3>Status:</h3>
        <div id="auth-status">Not authenticated</div>
    </div>
    
    <button id="test-auth" class="btn btn-primary">Test Google Authentication</button>
    <button id="check-auth" class="btn btn-secondary">Check Authentication Status</button>
    
    <script>
    $(document).ready(function() {
        function updateStatus(message, type) {
            $('#auth-status').removeClass('success error info').addClass(type).text(message);
        }
        
        function checkAuth() {
            $.ajax({
                url: 'youtubeploaded.php',
                type: 'GET',
                data: { action: 'check_auth' },
                success: function(response) {
                    try {
                        const result = JSON.parse(response);
                        if (result.success && result.authenticated) {
                            updateStatus('✅ Authenticated with Google', 'success');
                        } else {
                            updateStatus('❌ Not authenticated', 'error');
                        }
                    } catch (e) {
                        updateStatus('Error checking authentication: ' + e.message, 'error');
                    }
                },
                error: function() {
                    updateStatus('Failed to check authentication status', 'error');
                }
            });
        }
        
        $('#test-auth').click(function() {
            updateStatus('Getting authentication URL...', 'info');
            
            $.ajax({
                url: 'youtubeploaded.php',
                type: 'GET',
                data: { action: 'auth_url', redirect: 'test-auth.php' },
                success: function(response) {
                    try {
                        const result = JSON.parse(response);
                        if (result.success && result.auth_url) {
                            updateStatus('Redirecting to Google...', 'info');
                            window.location.href = result.auth_url;
                        } else {
                            updateStatus('Failed to get auth URL', 'error');
                        }
                    } catch (e) {
                        updateStatus('Error: ' + e.message, 'error');
                    }
                },
                error: function() {
                    updateStatus('Failed to get authentication URL', 'error');
                }
            });
        });
        
        $('#check-auth').click(checkAuth);
        
        // Handle OAuth callback
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('auth')) {
            const authStatus = urlParams.get('auth');
            if (authStatus === 'success') {
                updateStatus('✅ Successfully connected to Google!', 'success');
                setTimeout(checkAuth, 1000); // Check auth status after a delay
            } else if (authStatus === 'error') {
                updateStatus('❌ Failed to connect to Google', 'error');
            }
            
            // Clean up URL
            const cleanUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, cleanUrl);
        } else {
            checkAuth(); // Initial check
        }
    });
    </script>
</body>
</html>