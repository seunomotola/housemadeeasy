-- Add Google OAuth token storage columns to hmeaffilate_user table
-- This will allow users to store their Google OAuth tokens so they don't need to authenticate every time

ALTER TABLE hmeaffilate_user 
ADD COLUMN google_access_token TEXT NULL,
ADD COLUMN google_refresh_token TEXT NULL,
ADD COLUMN google_token_expires_at DATETIME NULL,
ADD COLUMN google_token_scope TEXT NULL,
ADD COLUMN google_token_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- Create index on agentaffilate_id for faster lookups
-- Note: Using agentaffilate_id(50) to specify key length for TEXT column
CREATE INDEX idx_google_token_lookup ON hmeaffilate_user(agentaffilate_id(50));

-- Add comments for documentation
ALTER TABLE hmeaffilate_user 
MODIFY COLUMN google_access_token TEXT NULL COMMENT 'Google OAuth access token for API calls',
MODIFY COLUMN google_refresh_token TEXT NULL COMMENT 'Google OAuth refresh token for renewing access tokens',
MODIFY COLUMN google_token_expires_at DATETIME NULL COMMENT 'When the Google access token expires (UTC)',
MODIFY COLUMN google_token_scope TEXT NULL COMMENT 'Google OAuth scopes that were granted',
MODIFY COLUMN google_token_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'When the Google token was last updated';