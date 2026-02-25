# Google OAuth Token Storage Setup

## Overview
This update adds persistent Google OAuth token storage to the YouTube upload functionality. Users will no longer need to authenticate with Google every time they want to upload a video.

## Files Created/Modified

### 1. Database Schema Files
- **`add_google_oauth_columns.sql`** - SQL script to add new columns to the `hmeaffilate_user` table
- **`update_database_schema.php`** - PHP script to execute the database alterations

### 2. Updated Callback Handler
- **`callback_updated.php`** - Enhanced version of callback.php with token storage and retrieval

## Database Changes

### New Columns Added to `hmeaffilate_user` Table:
```sql
google_access_token TEXT NULL          -- Google OAuth access token
google_refresh_token TEXT NULL         -- Google OAuth refresh token  
google_token_expires_at DATETIME NULL  -- When the token expires
google_token_scope TEXT NULL           -- Granted permissions/scopes
google_token_updated_at TIMESTAMP      -- Last update timestamp
```

### Index Created:
```sql
CREATE INDEX idx_google_token_lookup ON hmeaffilate_user(agentaffilate_id(50));
```

**Note:** The index uses `agentaffilate_id(50)` to specify a key length because the column may be a TEXT type. If you encounter MySQL error #1170, the system will automatically try an alternative SQL file that uses prepared statements for safer index creation.

## Setup Instructions

### Step 1: Update Database Schema
1. Navigate to `https://housemadeeasy.com.ng/hmeaffilate/update_database_schema.php`
2. This will execute the ALTER TABLE statement and add the new columns
3. You should see a success message confirming the schema update

### Step 2: Replace callback.php
1. **Backup your current callback.php file first!**
2. Replace the contents of `callback.php` with the contents of `callback_updated.php`
3. Or rename `callback_updated.php` to `callback.php`

### Step 3: Test the Integration
1. Log in to your HouseMadeEasy account
2. Try to upload a video to YouTube
3. You should be prompted to authenticate with Google (first time only)
4. After authentication, your tokens will be stored in the database
5. Next time you try to upload, you should be automatically authenticated

## How It Works

### Token Storage Process:
1. User clicks "Connect to Google" 
2. OAuth flow completes successfully
3. Callback handler receives authorization code
4. Code is exchanged for access/refresh tokens
5. Tokens are stored in both session AND database
6. User is redirected back to the upload page

### Token Retrieval Process:
1. User tries to upload a video
2. System first checks session for tokens
3. If not in session, checks database for stored tokens
4. Validates token expiration (with 5-minute buffer)
5. If valid, uses stored tokens; if expired, prompts re-authentication

### Token Refresh (Future Enhancement):
- The system includes a `refreshAccessToken()` function
- This can be used to get new access tokens using refresh tokens
- Currently not implemented but ready for use

## Security Features

### Token Validation:
- Checks token expiration before use
- 5-minute buffer before actual expiry
- Automatic session refresh when using valid stored tokens

### Database Security:
- Uses prepared statements to prevent SQL injection
- Only stores tokens for authenticated users
- Tokens are updated automatically when refreshed

### Session Management:
- Tokens stored in both session and database
- Session tokens for immediate access
- Database tokens for persistence across sessions

## Benefits

1. **Better User Experience**: Users authenticate only once
2. **Persistent Sessions**: Login state survives browser restarts
3. **Automatic Token Management**: Handles token expiration gracefully
4. **Security**: Validates tokens before use
5. **Fallback System**: Session → Database → Re-authentication flow

## Troubleshooting

### If authentication still happens every time:
1. Check that the database schema was updated successfully
2. Verify the new callback.php is in place
3. Confirm the user is properly logged in (check `$_SESSION['agentaffilate_id']`)
4. Check browser console for JavaScript errors

### If database errors occur:
1. Verify database connection in `inc/connect.inc.php`
2. Check that the ALTER TABLE statement executed successfully
3. Ensure the `hmeaffilate_user` table exists and is accessible

### MySQL Error #1170 (BLOB/TEXT column without key length):
If you encounter this error, the system will automatically try an alternative SQL file. The error occurs when trying to create an index on a TEXT column without specifying a key length. The solution is to specify a length like `agentaffilate_id(50)` or use prepared statements.

### Manual SQL execution (if scripts fail):
If the PHP scripts fail, you can execute this SQL directly in your database:
```sql
ALTER TABLE hmeaffilate_user 
ADD COLUMN google_access_token TEXT NULL,
ADD COLUMN google_refresh_token TEXT NULL,
ADD COLUMN google_token_expires_at DATETIME NULL,
ADD COLUMN google_token_scope TEXT NULL,
ADD COLUMN google_token_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

CREATE INDEX idx_google_token_lookup ON hmeaffilate_user(agentaffilate_id(50));
```

### To clear stored tokens (for testing):
```sql
UPDATE hmeaffilate_user SET 
google_access_token = NULL, 
google_refresh_token = NULL, 
google_token_expires_at = NULL, 
google_token_scope = NULL 
WHERE agentaffilate_id = 'YOUR_USER_ID';
```

## Future Enhancements

1. **Automatic Token Refresh**: Implement background token refresh using refresh tokens
2. **Token Cleanup**: Remove expired tokens periodically
3. **Multi-Account Support**: Allow users to connect multiple Google accounts
4. **Token Analytics**: Track usage and storage statistics

## Support

If you encounter any issues:
1. Check the PHP error logs
2. Verify database schema updates
3. Test the OAuth flow manually
4. Check browser developer console for JavaScript errors

---

**Note**: Remember to keep your Google OAuth credentials secure and never expose them in client-side code.