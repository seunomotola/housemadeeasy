<?php
session_start();
include ('inc/connect.inc.php');

// Check if user is logged in
if (!isset($_SESSION['agentaffilate_id'])) {
    die('<h2>Access Denied</h2><p>You must be logged in to check token status.</p>');
}

$userId = $_SESSION['agentaffilate_id'];

function formatTimeRemaining($seconds) {
    if ($seconds <= 0) return 'Expired';
    
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    
    if ($hours > 0) {
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ' . $minutes . ' minute' . ($minutes != 1 ? 's' : '');
    } else {
        return $minutes . ' minute' . ($minutes != 1 ? 's' : '');
    }
}

function getTokenStatus() {
    global $con, $userId;
    
    $sql = "SELECT 
                google_access_token, 
                google_refresh_token, 
                google_token_expires_at, 
                google_token_scope,
                google_token_updated_at
            FROM hmeaffilate_user 
            WHERE agentaffilate_id = ?";
    
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        return array('error' => 'Database prepare failed: ' . mysqli_error($con));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $userId);
    $executeResult = mysqli_stmt_execute($stmt);
    
    if (!$executeResult) {
        mysqli_stmt_close($stmt);
        return array('error' => 'Database execute failed: ' . mysqli_error($con));
    }
    
    $result = mysqli_stmt_get_result($stmt);
    $tokens = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    if (!$tokens) {
        return array('error' => 'User not found in database');
    }
    
    // Analyze token status
    $status = array(
        'user_exists' => true,
        'has_access_token' => !empty($tokens['google_access_token']),
        'has_refresh_token' => !empty($tokens['google_refresh_token']),
        'token_expires_at' => $tokens['google_token_expires_at'],
        'token_scope' => $tokens['google_token_scope'],
        'token_updated_at' => $tokens['google_token_updated_at'],
        'token_valid' => false,
        'time_until_expiry' => null,
        'expiry_formatted' => null
    );
    
    if ($tokens['google_token_expires_at']) {
        $currentTime = time();
        $tokenExpiry = strtotime($tokens['google_token_expires_at']);
        $status['token_valid'] = ($tokenExpiry > ($currentTime + 300)); // 5 minute buffer
        $status['time_until_expiry'] = $tokenExpiry - $currentTime;
        $status['expiry_formatted'] = formatTimeRemaining($status['time_until_expiry']);
    }
    
    return $status;
}

$tokenStatus = getTokenStatus();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google OAuth Token Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #4285f4;
            padding-bottom: 10px;
        }
        .status-item {
            margin: 15px 0;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #ddd;
        }
        .success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .warning {
            background-color: #fff3cd;
            border-color: #ffc107;
            color: #856404;
        }
        .error {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        .info {
            background-color: #d1ecf1;
            border-color: #17a2b8;
            color: #0c5460;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            min-width: 150px;
        }
        .value {
            color: #666;
        }
        .token-preview {
            font-family: monospace;
            background-color: #f8f9fa;
            padding: 5px;
            border-radius: 3px;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4285f4;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
        }
        .button:hover {
            background-color: #3367d6;
        }
        .button.danger {
            background-color: #dc3545;
        }
        .button.danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Google OAuth Token Status</h1>
        
        <div class="status-item info">
            <strong>User ID:</strong> <?php echo htmlspecialchars($userId); ?>
        </div>

        <?php if (isset($tokenStatus['error'])): ?>
            <div class="status-item error">
                <strong>Error:</strong> <?php echo htmlspecialchars($tokenStatus['error']); ?>
            </div>
        <?php else: ?>
            
            <div class="status-item <?php echo $tokenStatus['has_access_token'] ? 'success' : 'error'; ?>">
                <span class="label">Access Token:</span>
                <span class="value">
                    <?php if ($tokenStatus['has_access_token']): ?>
                        ✓ Saved (<?php echo strlen($tokenStatus['token_updated_at'] ?? ''); ?> characters)
                    <?php else: ?>
                        ✗ Not saved
                    <?php endif; ?>
                </span>
            </div>

            <div class="status-item <?php echo $tokenStatus['has_refresh_token'] ? 'success' : 'warning'; ?>">
                <span class="label">Refresh Token:</span>
                <span class="value">
                    <?php if ($tokenStatus['has_refresh_token']): ?>
                        ✓ Saved
                    <?php else: ?>
                        ⚠ Not available (one-time grant)
                    <?php endif; ?>
                </span>
            </div>

            <div class="status-item <?php echo $tokenStatus['token_valid'] ? 'success' : 'warning'; ?>">
                <span class="label">Token Validity:</span>
                <span class="value">
                    <?php if ($tokenStatus['token_valid']): ?>
                        ✓ Valid (expires in <?php echo $tokenStatus['expiry_formatted']; ?>)
                    <?php else: ?>
                        <?php if ($tokenStatus['time_until_expiry'] === null): ?>
                            ⚠ No expiry information
                        <?php elseif ($tokenStatus['time_until_expiry'] <= 0): ?>
                            ✗ Expired
                        <?php else: ?>
                            ⚠ Expires in <?php echo $tokenStatus['expiry_formatted']; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </span>
            </div>

            <?php if ($tokenStatus['token_expires_at']): ?>
            <div class="status-item info">
                <span class="label">Expiry Date:</span>
                <span class="value"><?php echo htmlspecialchars($tokenStatus['token_expires_at']); ?></span>
            </div>
            <?php endif; ?>

            <?php if ($tokenStatus['token_updated_at']): ?>
            <div class="status-item info">
                <span class="label">Last Updated:</span>
                <span class="value"><?php echo htmlspecialchars($tokenStatus['token_updated_at']); ?></span>
            </div>
            <?php endif; ?>

            <?php if ($tokenStatus['token_scope']): ?>
            <div class="status-item info">
                <span class="label">Token Scope:</span>
                <span class="value"><?php echo htmlspecialchars($tokenStatus['token_scope']); ?></span>
            </div>
            <?php endif; ?>

            <div class="status-item <?php echo $tokenStatus['token_valid'] ? 'success' : 'error'; ?>">
                <span class="label">Overall Status:</span>
                <span class="value">
                    <?php if ($tokenStatus['has_access_token'] && $tokenStatus['token_valid']): ?>
                        ✓ Ready for YouTube uploads
                    <?php elseif ($tokenStatus['has_access_token']): ?>
                        ⚠ Token may need refreshing
                    <?php else: ?>
                        ✗ Not authenticated with Google
                    <?php endif; ?>
                </span>
            </div>

        <?php endif; ?>

        <div style="margin-top: 30px; text-align: center;">
            <a href="callback.php?auth=logout" class="button danger" onclick="return confirm('Are you sure you want to disconnect Google OAuth?')">
                Disconnect Google Account
            </a>
            <a href="upload-house.php" class="button">
                Back to Upload Page
            </a>
        </div>

        <div style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;">
            <h3>Debug Information:</h3>
            <p><strong>Session Status:</strong> <?php echo session_status() === PHP_SESSION_ACTIVE ? 'Active' : 'Inactive'; ?></p>
            <p><strong>User Logged In:</strong> <?php echo isset($_SESSION['agentaffilate_id']) ? 'Yes' : 'No'; ?></p>
            <p><strong>Has Google Access Token in Session:</strong> <?php echo isset($_SESSION['google_access_token']) ? 'Yes' : 'No'; ?></p>
            <p><strong>Has Google Refresh Token in Session:</strong> <?php echo isset($_SESSION['google_refresh_token']) ? 'Yes' : 'No'; ?></p>
        </div>
    </div>
</body>
</html>