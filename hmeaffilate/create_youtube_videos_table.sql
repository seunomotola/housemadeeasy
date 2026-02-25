u
-- Create table for video-property associations
CREATE TABLE IF NOT EXISTS property_videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    video_id INT NOT NULL,
    video_order INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (video_id) REFERENCES youtube_videos(id) ON DELETE CASCADE,
    INDEX idx_property_id (property_id),
    INDEX idx_video_id (video_id)
);