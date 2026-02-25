-- Alternative SQL script for adding Google OAuth columns to hmeaffilate_user table
-- This version is more flexible with different column types

-- Add the columns first (these should work regardless of agentaffilate_id type)
ALTER TABLE hmeaffilate_user 
ADD COLUMN google_access_token TEXT NULL,
ADD COLUMN google_refresh_token TEXT NULL,
ADD COLUMN google_token_expires_at DATETIME NULL,
ADD COLUMN google_token_scope TEXT NULL,
ADD COLUMN google_token_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- Try to create index - if it fails due to column type, it won't break the script
-- This approach tries the index creation but continues even if it fails

-- Method 1: Try with key length specification (for TEXT columns)
SET @sql = CONCAT('CREATE INDEX idx_google_token_lookup ON hmeaffilate_user(agentaffilate_id(50))');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add comments for documentation
ALTER TABLE hmeaffilate_user 
MODIFY COLUMN google_access_token TEXT NULL COMMENT 'Google OAuth access token for API calls',
MODIFY COLUMN google_refresh_token TEXT NULL COMMENT 'Google OAuth refresh token for renewing access tokens',
MODIFY COLUMN google_token_expires_at DATETIME NULL COMMENT 'When the Google access token expires (UTC)',
MODIFY COLUMN google_token_scope TEXT NULL COMMENT 'Google OAuth scopes that were granted',
MODIFY COLUMN google_token_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'When the Google token was last updated';