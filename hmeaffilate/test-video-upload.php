<?php
/**
 * Test script to debug video upload issues
 */
session_start();
include("../inc/connect.inc.php")');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Upload Debug Test</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Video Upload Debug Test</h1>
        
        <div class="alert alert-info">
            <h4>Instructions:</h4>
            <p>This page helps debug video upload issues. Select a video file and test the upload process.</p>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3>Video Upload Test</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="test_video">Select Video File:</label>
                    <input type="file" id="test_video" accept="video/*" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Upload Method:</label><br>
                    <button type="button" class="btn btn-primary" onclick="testNormalUpload()">Test Normal Upload</button>
                    <button type="button" class="btn btn-warning" onclick="testDebugUpload()">Test Debug Upload</button>
                    <button type="button" class="btn btn-info" onclick="checkServerInfo()">Check Server Info</button>
                </div>
                
                <div id="results" class="mt-3">
                    <h4>Results:</h4>
                    <div id="output" class="border p-3 bg-light" style="min-height: 200px; white-space: pre-wrap;"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function log(message) {
            $('#output').append(new Date().toLocaleTimeString() + ': ' + message + '\n');
        }
        
        function clearOutput() {
            $('#output').text('');
        }
        
        function testNormalUpload() {
            clearOutput();
            const videoFile = $('#test_video')[0].files[0];
            
            if (!videoFile) {
                log('Please select a video file first');
                return;
            }
            
            log('Testing normal upload...');
            log('File: ' + videoFile.name);
            log('Size: ' + videoFile.size + ' bytes');
            log('Type: ' + videoFile.type);
            
            const formData = new FormData();
            formData.append('video', videoFile);
            formData.append('action', 'upload_to_youtube');
            
            log('Sending request to callback.php...');
            
            $.ajax({
                url: 'callback.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    log('SUCCESS: Server response received');
                    log('Response type: ' + typeof response);
                    log('Response: ' + JSON.stringify(response, null, 2));
                    
                    try {
                        // jQuery automatically parses JSON, so response may already be an object
                        let result;
                        if (typeof response === 'string') {
                            result = JSON.parse(response);
                        } else {
                            result = response;
                        }
                        
                        if (result.success) {
                            log('✓ Upload successful!');
                            if (result.youtube_url) {
                                log('YouTube URL: ' + result.youtube_url);
                            }
                        } else {
                            log('✗ Upload failed: ' + result.error);
                        }
                    } catch (e) {
                        log('✗ Error parsing response: ' + e.message);
                        log('Raw response: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    log('✗ AJAX Error: ' + error);
                    log('Status: ' + status);
                    log('Response: ' + xhr.responseText);
                }
            });
        }
        
        function testDebugUpload() {
            clearOutput();
            const videoFile = $('#test_video')[0].files[0];
            
            if (!videoFile) {
                log('Please select a video file first');
                return;
            }
            
            log('Testing debug upload...');
            log('File: ' + videoFile.name);
            log('Size: ' + videoFile.size + ' bytes');
            
            const formData = new FormData();
            formData.append('video', videoFile);
            formData.append('action', 'debug_upload');
            
            $.ajax({
                url: 'callback.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    log('DEBUG RESPONSE:');
                    log(response);
                },
                error: function(xhr, status, error) {
                    log('✗ Debug AJAX Error: ' + error);
                    log('Response: ' + xhr.responseText);
                }
            });
        }
        
        function checkServerInfo() {
            clearOutput();
            log('Checking server information...');
            
            // This is a simple info request
            const formData = new FormData();
            formData.append('action', 'debug_upload');
            // Don't append a video file, just check server config
            
            $.ajax({
                url: 'callback.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    log('SERVER INFO:');
                    try {
                        const result = JSON.parse(response);
                        if (result.success && result.debug) {
                            log('Session Data:');
                            log(JSON.stringify(result.debug.session_data, null, 2));
                            log('\\nServer Config:');
                            log(JSON.stringify(result.debug.server_info, null, 2));
                        } else {
                            log(response);
                        }
                    } catch (e) {
                        log(response);
                    }
                },
                error: function(xhr, status, error) {
                    log('✗ Error: ' + error);
                }
            });
        }
        
        // Show file info when selected
        $('#test_video').on('change', function() {
            clearOutput();
            const videoFile = this.files[0];
            if (videoFile) {
                log('File selected: ' + videoFile.name);
                log('Size: ' + videoFile.size + ' bytes (' + (videoFile.size / 1024 / 1024).toFixed(2) + ' MB)');
                log('Type: ' + videoFile.type);
                
                // Check size (100MB limit)
                const maxSize = 100 * 1024 * 1024;
                if (videoFile.size > maxSize) {
                    log('⚠ WARNING: File exceeds 100MB limit');
                } else {
                    log('✓ File size is within limits');
                }
                
                // Check file type
                const allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/flv', 'video/webm'];
                if (allowedTypes.includes(videoFile.type)) {
                    log('✓ File type is allowed');
                } else {
                    log('⚠ WARNING: File type may not be supported');
                }
            }
        });
    </script>
</body>
</html>
