/**
 * YouTube Upload Handler for HouseMadeEasy
 * Handles video upload to YouTube and integrates with the house upload form
 */

class YouTubeUploadHandler {
    constructor() {
        this.accessToken = null;
        this.isAuthenticated = false;
        this.init();
    }

    init() {
        // Check for existing authentication
        this.checkAuthentication();
        
        // Initialize event listeners
        this.initEventListeners();
        
        // Handle OAuth callback
        this.handleOAuthCallback();
    }

    initEventListeners() {
        // YouTube upload button
        $(document).on('click', '#upload-to-youtube', () => {
            this.handleVideoUpload();
        });

        // Google OAuth button (if added)
        $(document).on('click', '#google-auth-btn', () => {
            this.authenticateWithGoogle();
        });
    }

    checkAuthentication() {
        // Check if user is already authenticated with Google
        $.ajax({
            url: 'youtubeploaded.php',
            type: 'GET',
            data: { action: 'check_auth' },
            success: (response) => {
                try {
                    const result = JSON.parse(response);
                    if (result.success && result.authenticated) {
                        this.isAuthenticated = true;
                        this.accessToken = result.access_token;
                        this.showAuthenticatedState();
                    } else {
                        this.showUnauthenticatedState();
                    }
                } catch (e) {
                    console.error('Error checking authentication:', e);
                }
            },
            error: (xhr, status, error) => {
                console.error('Authentication check failed:', error);
            }
        });
    }

    authenticateWithGoogle() {
        // Simple redirect approach - no AJAX needed
        const redirectUrl = 'upload-house.php';
        window.location.href = `youtubeploaded.php?action=auth_url&redirect=${encodeURIComponent(redirectUrl)}`;
    }



    handleVideoUpload() {
        if (!this.isAuthenticated) {
            this.showError('Please authenticate with Google first');
            this.authenticateWithGoogle();
            return;
        }

        const videoFile = $('#house_video')[0].files[0];
        if (!videoFile) {
            this.showError('Please select a video file first');
            return;
        }

        // Validate file
        if (!this.validateVideoFile(videoFile)) {
            return;
        }

        // Show progress
        this.showProgress();

        // Check if we're in a multipart form context
        if ($('#upload-house-form').length > 0) {
            this.handleMultipartFormUpload(videoFile);
        } else {
            this.handleDirectVideoUpload(videoFile);
        }
    }

    validateVideoFile(file) {
        // Check file size (100MB limit)
        const maxSize = 100 * 1024 * 1024;
        if (file.size > maxSize) {
            this.showError('File too large. Maximum size is 100MB.');
            return false;
        }

        // Check file type
        const allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/flv', 'video/webm'];
        if (!allowedTypes.includes(file.type)) {
            this.showError('Invalid file type. Please upload a video file.');
            return false;
        }

        return true;
    }

    handleDirectVideoUpload(videoFile) {
        // Create form data for direct video upload
        const formData = new FormData();
        formData.append('video', videoFile);
        formData.append('action', 'upload_to_youtube');

        // Upload video directly
        $.ajax({
            url: 'callback.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: () => {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", (evt) => {
                    if (evt.lengthComputable) {
                        const percentComplete = (evt.loaded / evt.total) * 100;
                        this.updateProgress(percentComplete);
                    }
                }, false);
                return xhr;
            },
            success: (response) => {
                this.handleUploadResponse(response);
            },
            error: (xhr, status, error) => {
                this.handleUploadError('Upload failed: ' + error);
            }
        });
    }

    handleMultipartFormUpload(videoFile) {
        // Create hidden field for video file in the main form
        const videoInput = $('<input>')
            .attr('type', 'hidden')
            .attr('name', 'youtube_video_file')
            .attr('id', 'youtube_video_file');
        
        $('#upload-house-form').append(videoInput);

        // Create FormData for YouTube upload
        const formData = new FormData();
        formData.append('video', videoFile);
        formData.append('action', 'upload_to_youtube');
        formData.append('is_multipart', '1');

        // Upload video to YouTube
        $.ajax({
            url: 'callback.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: () => {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", (evt) => {
                    if (evt.lengthComputable) {
                        const percentComplete = (evt.loaded / evt.total) * 100;
                        this.updateProgress(percentComplete);
                    }
                }, false);
                return xhr;
            },
            success: (response) => {
                this.handleUploadResponse(response);
            },
            error: (xhr, status, error) => {
                this.handleUploadError('Upload failed: ' + error);
            }
        });
    }

    handleUploadResponse(response) {
        try {
            const result = JSON.parse(response);
            if (result.success) {
                this.handleUploadSuccess(result);
            } else {
                this.handleUploadError(result.error || result.message || 'Upload failed');
            }
        } catch (e) {
            this.handleUploadError('Error processing upload response');
        }
    }

    handleUploadSuccess(result) {
        this.hideProgress();
        
        // Build detailed success message
        let successMessage = '✅ Video uploaded successfully!';
        
        // Add database saving confirmation if available
        if (result.database_saved) {
            successMessage += '\n💾 Video information saved to database';
            
            if (result.database_record_id) {
                successMessage += `\n📊 Database Record ID: ${result.database_record_id}`;
            }
        }
        
        // Add YouTube URL if available
        if (result.youtube_url) {
            $('#youtube_link').val(result.youtube_url);
            $('#youtube-link-section').show();
            
            // Set hidden field for form submission
            if ($('#youtube_video_id').length === 0) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'youtube_video_id',
                    id: 'youtube_video_id',
                    value: result.video_id || ''
                }).appendTo('#upload-house-form');
            } else {
                $('#youtube_video_id').val(result.video_id || '');
            }
            
            successMessage += `\n🎥 YouTube URL: ${result.youtube_url}`;
            
            // If in a multipart form, update the submit button text
            if ($('#upload-house-form').length > 0) {
                const submitBtn = $('#upload-house-form button[type="submit"]');
                if (submitBtn.length > 0) {
                    submitBtn.text('Upload House with Video');
                }
            }
        } else {
            successMessage += '\n⏳ YouTube link will be available in a few minutes once processing is complete.';
            $('#youtube_link').val('');
            $('#youtube-link-section').hide();
        }
        
        // Add video details if available
        if (result.video_details && result.video_details.title) {
            successMessage += `\n📝 Video Title: ${result.video_details.title}`;
        }
        
        if (result.video_details && result.video_details.description) {
            successMessage += `\n📋 Description: ${result.video_details.description}`;
        }
        
        this.showSuccess(successMessage);

        // Optionally update video list
        this.refreshVideoList();
    }

    handleUploadError(error) {
        this.hideProgress();
        this.showError(error);
    }

    showProgress() {
        $('#upload-progress').show();
        $('#upload-to-youtube').prop('disabled', true);
        this.updateProgress(0);
    }

    hideProgress() {
        $('#upload-progress').hide();
        $('#upload-to-youtube').prop('disabled', false);
    }

    updateProgress(percent) {
        $('#progress-bar').css('width', percent + '%');
        $('#upload-status').text('Uploading... ' + Math.round(percent) + '%');
    }

    showAuthenticatedState() {
        // Update UI to show authenticated state
        $('#google-auth-btn').text('Google Connected').prop('disabled', true);
        $('#upload-to-youtube').show();
    }

    showUnauthenticatedState() {
        // Update UI to show unauthenticated state
        const authBtn = $('#google-auth-btn');
        if (authBtn.length > 0) {
            authBtn.text('Connect to Google').prop('disabled', false);
        }
        
        $('#upload-to-youtube').hide();
    }

    showSuccess(message) {
        this.showAlert(message, 'success');
    }

    showWarning(message) {
        this.showAlert(message, 'warning');
    }

    showError(message) {
        this.showAlert(message, 'danger');
    }

    showInfo(message) {
        this.showAlert(message, 'info');
    }

    showAlert(message, type) {
        // Remove existing alerts
        $('.youtube-alert').remove();
        
        // Create new alert
        const alert = $('<div>')
            .addClass(`alert alert-${type} youtube-alert`)
            .text(message)
            .css('margin-top', '10px');
        
        // Insert after video section
        $('#video-upload-section').after(alert);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            alert.fadeOut(() => alert.remove());
        }, 5000);
    }

    handleOAuthCallback() {
        // Handle OAuth callback if present in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('auth')) {
            const authStatus = urlParams.get('auth');
            
            if (authStatus === 'success') {
                this.showSuccess('Successfully connected to Google!');
                // Clean up URL parameters
                const cleanUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, cleanUrl);
                
                // Check authentication status
                this.checkAuthentication();
            } else if (authStatus === 'error') {
                this.showError('Failed to connect to Google. Please try again.');
                // Clean up URL parameters
                const cleanUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, cleanUrl);
            }
        }
    }

    refreshVideoList() {
        // Optionally refresh the list of uploaded videos
        $.ajax({
            url: 'youtubeploaded.php',
            type: 'GET',
            data: { action: 'list_my_videos' },
            success: (response) => {
                try {
                    const result = JSON.parse(response);
                    if (result.success) {
                        console.log('User has uploaded ' + result.videos.length + ' videos');
                    }
                } catch (e) {
                    console.error('Error refreshing video list:', e);
                }
            }
        });
    }

    // Public methods for external use
    isReady() {
        return this.isAuthenticated;
    }

    /**
     * Check detailed token status from database
     * @param {Function} callback - Callback function to handle response
     */
    checkTokenStatus(callback) {
        $.ajax({
            url: 'callback.php',
            type: 'POST',
            data: { action: 'check_token_status' },
            success: (response) => {
                try {
                    const result = JSON.parse(response);
                    callback(result);
                } catch (e) {
                    callback({ success: false, error: 'Error parsing response' });
                }
            },
            error: () => {
                callback({ success: false, error: 'Request failed' });
            }
        });
    }

    /**
     * Show detailed token status in the UI
     */
    showTokenStatus() {
        this.checkTokenStatus((result) => {
            if (result.success) {
                const status = result.status;
                let message = 'Token Status:\n\n';
                
                message += `Access Token: ${status.has_access_token ? '✓ Saved' : '✗ Not saved'}\n`;
                message += `Refresh Token: ${status.has_refresh_token ? '✓ Saved' : '⚠ Not available'}\n`;
                message += `Token Valid: ${status.token_valid ? '✓ Yes' : '✗ No'}\n`;
                
                if (status.expiry_formatted) {
                    message += `Expires: ${status.expiry_formatted}\n`;
                }
                
                if (status.token_updated_at) {
                    message += `Last Updated: ${status.token_updated_at}`;
                }
                
                alert(message);
            } else {
                this.showError('Failed to check token status: ' + (result.error || 'Unknown error'));
            }
        });
    }

    getVideoInfo(videoId, callback) {
        $.ajax({
            url: 'youtubeploaded.php',
            type: 'GET',
            data: { action: 'get_video_info', video_id: videoId },
            success: (response) => {
                try {
                    const result = JSON.parse(response);
                    callback(result);
                } catch (e) {
                    callback({ success: false, error: 'Error parsing response' });
                }
            },
            error: () => {
                callback({ success: false, error: 'Request failed' });
            }
        });
    }
}

// Initialize when document is ready
$(document).ready(() => {
    window.youtubeUploadHandler = new YouTubeUploadHandler();
});