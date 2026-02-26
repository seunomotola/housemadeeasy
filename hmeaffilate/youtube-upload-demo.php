<?php
session_start();
include('inc/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Upload Demo - HouseMadeEasy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .upload-area {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            margin: 20px 0;
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            border-color: #0056b3;
            background-color: #f8f9fa;
        }
        .upload-area.dragover {
            border-color: #28a745;
            background-color: #e8f5e8;
        }
        .progress {
            height: 25px;
            margin: 15px 0;
        }
        .video-preview {
            max-width: 300px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .feature-card {
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .status-badge {
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1><i class="fab fa-youtube text-danger"></i> YouTube Upload Demo</h1>
                    <p class="lead">Learn how to upload house videos directly to YouTube from HouseMadeEasy</p>
                </div>
            </div>
        </div>
        <!-- Demo Features -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                        <h5>Direct Upload</h5>
                        <p>Upload videos directly from the house upload form to your YouTube channel</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-link fa-3x text-success mb-3"></i>
                        <h5>Auto Integration</h5>
                        <p>YouTube links are automatically added to your house listings</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                        <h5>Secure & Private</h5>
                        <p>Videos are uploaded privately and can be made public when ready</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Upload Demo -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-video"></i> Video Upload Demo</h4>
                    </div>
                    <div class="card-body">
                        <div id="upload-section">
                            <div class="upload-area" id="upload-area">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <h5>Drag & Drop your video here</h5>
                                <p>or click to browse files</p>
                                <input type="file" id="video-file" accept="video/*" style="display: none;">
                                <button class="btn btn-primary" onclick="$('#video-file').click()">
                                    <i class="fas fa-folder-open"></i> Browse Files
                                </button>
                            </div>
                            <div id="video-preview" style="display: none;">
                                <h6>Selected Video:</h6>
                                <video id="preview-video" class="video-preview" controls></video>
                                <div id="video-info" class="mb-3"></div>
                            </div>
                            <div id="upload-controls" style="display: none;">
                                <button class="btn btn-success btn-lg" id="upload-to-youtube">
                                    <i class="fab fa-youtube"></i> Upload to YouTube
                                </button>
                                <button class="btn btn-secondary" id="clear-selection">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                            <div id="upload-progress" style="display: none;">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                         role="progressbar" style="width: 0%"></div>
                                </div>
                                <div class="text-center">
                                    <span id="progress-text">Uploading...</span>
                                </div>
                            </div>
                            <div id="youtube-link-section" style="display: none;">
                                <div class="alert alert-success">
                                    <h6><i class="fab fa-youtube"></i> Upload Successful!</h6>
                                    <p>Your video has been uploaded to YouTube. You can view it at:</p>
                                    <a href="#" id="youtube-link" target="_blank" class="btn btn-outline-success">
                                        <i class="fas fa-external-link-alt"></i> View on YouTube
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="auth-section" class="mt-4">
                            <div class="alert alert-info">
                                <h6><i class="fab fa-google"></i> Google Authentication Required</h6>
                                <p>To upload videos, you need to authenticate with your Google account:</p>
                                <button class="btn btn-outline-danger" id="auth-google">
                                    <i class="fab fa-google"></i> Connect Google Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instructions -->
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-info-circle"></i> How to Use</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>For House Upload:</h6>
                                <ol>
                                    <li>Go to <a href="upload-house.php">Upload House</a></li>
                                    <li>Scroll to "House Video Upload" section</li>
                                    <li>Select your video file</li>
                                    <li>Click "Upload to YouTube"</li>
                                    <li>Authenticate with Google when prompted</li>
                                    <li>Wait for upload to complete</li>
                                    <li>YouTube link will be automatically added to your listing</li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <h6>Video Requirements:</h6>
                                <ul>
                                    <li>Maximum file size: 100MB</li>
                                    <li>Supported formats: MP4, AVI, MOV, WMV, FLV, WebM</li>
                                    <li>Duration: No limit specified</li>
                                    <li>Resolution: Any supported by YouTube</li>
                                </ul>
                                <h6>Features:</h6>
                                <ul>
                                    <li>Private upload by default</li>
                                    <li>Progress tracking</li>
                                    <li>Automatic YouTube integration</li>
                                    <li>Error handling and validation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/youtube-upload.js"></script>
    <script>
        $(document).ready(function() {
            // File selection handling
            $('#video-file').on('change', function() {
                const file = this.files[0];
                if (file) {
                    showVideoPreview(file);
                }
            });
            // Drag and drop handling
            const uploadArea = $('#upload-area');
            
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('dragover');
            });
            uploadArea.on('dragleave', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
            });
            uploadArea.on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
                
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    $('#video-file')[0].files = files;
                    showVideoPreview(files[0]);
                }
            });
            // Click to browse
            uploadArea.on('click', function() {
                $('#video-file').click();
            });
            // Upload handling
            $('#upload-to-youtube').on('click', function() {
                if (window.youtubeUploadHandler && window.youtubeUploadHandler.isReady()) {
                    // Use the existing handler
                    window.youtubeUploadHandler.handleVideoUpload();
                } else {
                    // Fallback demo upload
                    demoUpload();
                }
            });
            // Clear selection
            $('#clear-selection').on('click', function() {
                $('#video-file').val('');
                $('#video-preview').hide();
                $('#upload-controls').hide();
                $('#youtube-link-section').hide();
            });
            // Google authentication
            $('#auth-google').on('click', function() {
                if (window.youtubeUploadHandler) {
                    window.youtubeUploadHandler.authenticateWithGoogle();
                } else {
                    // Fallback demo authentication
                    simulateAuth();
                }
            });
            function showVideoPreview(file) {
                const video = document.getElementById('preview-video');
                const url = URL.createObjectURL(file);
                video.src = url;
                $('#video-info').html(`
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Name:</strong> ${file.name}<br>
                            <strong>Size:</strong> ${(file.size / 1024 / 1024).toFixed(2)} MB<br>
                            <strong>Type:</strong> ${file.type}
                        </div>
                        <div class="col-sm-6">
                            <strong>Last Modified:</strong> ${new Date(file.lastModified).toLocaleString()}
                        </div>
                    </div>
                `);
                $('#video-preview').show();
                $('#upload-controls').show();
                $('#youtube-link-section').hide();
            }
            function demoUpload() {
                const file = $('#video-file')[0].files[0];
                if (!file) return;
                $('#upload-progress').show();
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.random() * 15;
                    if (progress > 100) progress = 100;
                    $('.progress-bar').css('width', progress + '%');
                    $('#progress-text').text(`Uploading... ${Math.round(progress)}%`);
                    if (progress >= 100) {
                        clearInterval(interval);
                        setTimeout(() => {
                            $('#upload-progress').hide();
                            $('#youtube-link-section').show();
                            
                            // Generate a demo YouTube URL
                            const videoId = generateRandomVideoId();
                            const youtubeUrl = `https://www.youtube.com/watch?v=${videoId}`;
                            $('#youtube-link').attr('href', youtubeUrl);
                            
                            $('.alert-success').append(`
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle"></i> 
                                        This is a demo. In the real version, your video would be uploaded to your YouTube channel.
                                    </small>
                                </div>
                            `);
                        }, 500);
                    }
                }, 200);
            }
            function simulateAuth() {
                $('#auth-section .alert').removeClass('alert-info').addClass('alert-success');
                $('#auth-google').text('Google Connected').prop('disabled', true);
                
                setTimeout(() => {
                    $('#auth-section .alert').html(`
                        <h6><i class="fab fa-google text-success"></i> Google Connected!</h6>
                        <p>You are now authenticated and can upload videos to YouTube.</p>
                    `);
                }, 1000);
            }
            function generateRandomVideoId() {
                const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 11; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }
        });
    </script>
</body>
</html>
