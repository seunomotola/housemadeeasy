<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple YouTube OAuth Test</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .btn { padding: 15px 30px; margin: 10px; cursor: pointer; font-size: 16px; border: none; border-radius: 5px; }
        .btn-primary { background: #4285f4; color: white; }
        .btn-success { background: #34a853; color: white; }
        .btn-info { background: #ea4335; color: white; }
        .status { margin: 20px 0; padding: 15px; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
    </style>
</head>
<body>
    <h1>🚀 Simple YouTube OAuth Authentication</h1>
    
    <div class="status info">
        <h3>✨ This is the SIMPLE approach:</h3>
        <ul>
            <li>❌ <strong>No AJAX calls</strong></li>
            <li>❌ <strong>No JSON responses</strong></li>
            <li>❌ <strong>No complex JavaScript</strong></li>
            <li>✅ <strong>Direct PHP redirect</strong></li>
            <li>✅ <strong>One click authentication</strong></li>
        </ul>
    </div>
    
    <div id="auth-status" class="status">
        <h3>Authentication Status:</h3>
        <div id="status-message">Not authenticated</div>
    </div>
    
    <button id="simple-auth" class="btn btn-primary">🔗 Simple Google Auth</button>
    <button id="check-status" class="btn btn-success">🔍 Check Status</button>
    
    <div class="status info">
        <h3>🔗 Direct URLs you can test:</h3>
        <p><strong>Basic Auth:</strong> <a href="youtubeploaded.php?action=auth_url" target="_blank">youtubeploaded.php?action=auth_url</a></p>
        <p><strong>With Redirect:</strong> <a href="youtubeploaded.php?action=auth_url&redirect=simple-auth-test.php" target="_blank">youtubeploaded.php?action=auth_url&redirect=simple-auth-test.php</a></p>
    </div>
    
    <script>
    $(document).ready(function() {
        function updateStatus(message, type) {
            $('#status-message').text(message);
            $('#auth-status').removeClass('success error info').addClass(type);
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
                            updateStatus('✅ Authenticated with Google!', 'success');
                        } else {
                            updateStatus('❌ Not authenticated', 'error');
                        }
                    } catch (e) {
                        updateStatus('Error: ' + e.message, 'error');
                    }
                },
                error: function() {
                    updateStatus('Failed to check status', 'error');
                }
            });
        }
        
        // Simple direct redirect approach
        $('#simple-auth').click(function() {
            updateStatus('Redirecting to Google...', 'info');
            window.location.href = 'youtubeploaded.php?action=auth_url&redirect=simple-auth-test.php';
        });
        
        $('#check-status').click(checkAuth);
        
        // Handle OAuth callback
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('auth')) {
            const authStatus = urlParams.get('auth');
            if (authStatus === 'success') {
                updateStatus('🎉 Successfully connected to Google!', 'success');
                setTimeout(checkAuth, 1000);
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