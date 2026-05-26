<?php

require_once __DIR__ . '/../vendor/autoload.php';

if (!function_exists('hme_property_load_env')) {
    function hme_property_load_env()
    {
        static $loaded = false;

        if ($loaded) {
            return;
        }

        $envPath = dirname(__DIR__);
        if (file_exists($envPath . '/.env')) {
            $dotenv = Dotenv\Dotenv::createImmutable($envPath);
            $dotenv->safeLoad();
        }

        $loaded = true;
    }

    function hme_property_db_connection()
    {
        static $connection = null;
        static $attempted = false;

        if ($attempted) {
            return $connection;
        }

        $attempted = true;
        hme_property_load_env();

        $host = $_ENV['PROPERTY_DB_HOST'] ?? $_ENV['DB_HOST'] ?? 'localhost';
        $user = $_ENV['PROPERTY_DB_USER'] ?? $_ENV['DB_USER'] ?? '';
        $pass = $_ENV['PROPERTY_DB_PASS'] ?? $_ENV['DB_PASS'] ?? '';
        $name = $_ENV['PROPERTY_DB_NAME'] ?? $_ENV['DB_NAME'] ?? '';

        try {
            $connection = @mysqli_connect($host, $user, $pass, $name);
            if ($connection) {
                mysqli_set_charset($connection, 'utf8mb4');
            }
        } catch (Throwable $error) {
            error_log('[property-data] Database connection failed: ' . $error->getMessage());
            $connection = null;
        }

        if (!$connection) {
            error_log('[property-data] Database connection failed for property datasource.');
        }

        return $connection;
    }

    function hme_property_table_name($logicalName)
    {
        static $tables = null;

        $connection = hme_property_db_connection();
        if (!$connection) {
            return $logicalName;
        }

        if ($tables === null) {
            $tables = [];
            $result = mysqli_query($connection, 'SHOW TABLES');
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    if (!empty($row[0])) {
                        $tables[strtolower($row[0])] = $row[0];
                    }
                }
                mysqli_free_result($result);
            }
        }

        $lookup = strtolower($logicalName);
        return $tables[$lookup] ?? $logicalName;
    }

    function hme_property_has_value($value)
    {
        return $value !== null && $value !== '' && $value !== false;
    }

    function hme_property_is_truthy($value)
    {
        if (is_bool($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return (float) $value > 0;
        }

        $normalized = strtolower(trim((string) $value));
        return in_array($normalized, ['1', 'true', 'yes', 'open'], true);
    }

    function hme_property_humanize($value, $fallback = 'Not specified')
    {
        $text = trim((string) $value);
        if ($text === '') {
            return $fallback;
        }

        return ucwords(str_replace(['_', '-'], ' ', $text));
    }

    function hme_property_format_money($value, $fallback = 'Price on request')
    {
        if (!hme_property_has_value($value) || !is_numeric((string) $value)) {
            return $fallback;
        }

        return 'NGN ' . number_format((float) $value);
    }

    function hme_property_type_label($type)
    {
        $normalized = strtolower(trim((string) $type));

        if ($normalized === 'lease') {
            return 'For Lease';
        }

        if ($normalized === 'outright sale') {
            return 'For Sale';
        }

        return hme_property_humanize($type, 'Property');
    }

    function hme_property_size_display(array $property)
    {
        $parts = [];

        if (hme_property_has_value($property['size_in_sqm'] ?? null) && is_numeric((string) $property['size_in_sqm'])) {
            $parts[] = number_format((float) $property['size_in_sqm']) . ' sqm';
        }

        if (hme_property_has_value($property['land_unit_count'] ?? null) || hme_property_has_value($property['land_unit_type'] ?? null)) {
            $count = trim((string) ($property['land_unit_count'] ?? ''));
            $type = trim((string) ($property['land_unit_type'] ?? ''));
            $parts[] = trim($count . ' ' . $type);
        }

        return !empty($parts) ? implode(' / ', $parts) : 'Size not specified';
    }

    function hme_property_display_title(array $property)
    {
        $unitType = trim((string) ($property['unit_type'] ?? ''));
        $locationName = trim((string) ($property['location_name'] ?? ''));
        $address = trim((string) ($property['full_address'] ?? ''));

        if ($unitType !== '' && $locationName !== '') {
            return $unitType . ' in ' . $locationName;
        }

        if ($unitType !== '') {
            return $unitType;
        }

        if ($address !== '') {
            $segments = array_values(array_filter(array_map('trim', explode(',', $address))));
            return $segments[0] ?? $address;
        }

        return 'Property #' . ($property['id'] ?? '');
    }

    function hme_property_encode_path($path)
    {
        $normalized = trim(str_replace('\\', '/', (string) $path));
        if ($normalized === '') {
            return '';
        }

        $segments = array_map('rawurlencode', array_filter(explode('/', trim($normalized, '/')), 'strlen'));
        return '/' . implode('/', $segments);
    }

    function hme_property_placeholder_image()
    {
        return '/assets/images/flatmate/house8.jpg';
    }

    function hme_property_uploads_base_url()
    {
        hme_property_load_env();

        $baseUrl = trim((string) ($_ENV['PROPERTY_UPLOADS_BASE_URL'] ?? 'https://api.housemadeeasy.com.ng'));
        return rtrim($baseUrl, '/');
    }

    function hme_property_media_url($filePath = '', $fileName = '')
    {
        $candidate = trim((string) ($filePath ?: $fileName));
        if ($candidate === '') {
            return hme_property_placeholder_image();
        }

        $candidate = str_replace('\\', '/', $candidate);
        if (preg_match('#^https?://#i', $candidate)) {
            $path = (string) parse_url($candidate, PHP_URL_PATH);
            if ($path !== '' && strpos($path, '/uploads/') === 0) {
                return hme_property_uploads_base_url() . hme_property_encode_path($path);
            }
            return $candidate;
        }

        if (strpos($candidate, 'uploads/') === 0 || strpos($candidate, '/uploads/') === 0) {
            return hme_property_uploads_base_url() . hme_property_encode_path($candidate);
        }

        if (strpos($candidate, 'assets/') === 0 || strpos($candidate, '/assets/') === 0) {
            return hme_property_encode_path($candidate);
        }

        $rootPath = dirname(__DIR__) . '/' . ltrim($candidate, '/');
        if (file_exists($rootPath)) {
            return hme_property_encode_path($candidate);
        }

        $basename = basename($fileName ?: $candidate);
        return hme_property_uploads_base_url() . hme_property_encode_path('uploads/' . $basename);
    }

    function hme_property_media_is_image(array $mediaRow)
    {
        $fileType = strtolower(trim((string) ($mediaRow['file_type'] ?? '')));
        if ($fileType !== '' && strpos($fileType, 'image/') === 0) {
            return true;
        }

        $target = strtolower((string) ($mediaRow['file_path'] ?? $mediaRow['file_name'] ?? ''));
        return (bool) preg_match('/\.(jpg|jpeg|png|gif|webp|bmp|svg)$/', $target);
    }

    function hme_property_parse_other_fees($rawValue)
    {
        $decoded = json_decode((string) $rawValue, true);
        if (!is_array($decoded)) {
            $text = trim((string) $rawValue);
            return $text !== '' ? [['name' => $text, 'amount_display' => '']] : [];
        }

        $fees = [];
        foreach ($decoded as $fee) {
            if (is_array($fee)) {
                $name = trim((string) ($fee['name'] ?? $fee['label'] ?? 'Other fee'));
                $amount = $fee['amount'] ?? $fee['value'] ?? null;
                $fees[] = [
                    'name' => $name !== '' ? $name : 'Other fee',
                    'amount_display' => hme_property_format_money($amount, '')
                ];
            }
        }

        return $fees;
    }

    function hme_property_format_distance($meters)
    {
        if (!hme_property_has_value($meters) || !is_numeric((string) $meters)) {
            return 'Distance not specified';
        }

        $value = (float) $meters;
        if ($value >= 1000) {
            return number_format($value / 1000, 1) . ' km away';
        }

        return number_format($value) . ' m away';
    }

    function hme_property_enrich_row(array $row)
    {
        $creatorName = trim((string) ($row['agent_name'] ?? ''));
        if ($creatorName === '') {
            $creatorName = trim((string) ($row['admin_name'] ?? ''));
        }
        if ($creatorName === '') {
            $creatorName = 'HouseMadeEasy';
        }

        $row['display_title'] = hme_property_display_title($row);
        $row['type_label'] = hme_property_type_label($row['type'] ?? '');
        $row['status_label'] = hme_property_humanize($row['status'] ?? 'available', 'Available');
        $row['availability_label'] = hme_property_humanize($row['availability'] ?? 'open', 'Open');
        $row['unit_type_display'] = trim((string) ($row['unit_type'] ?? '')) ?: 'Property';
        $row['size_display'] = hme_property_size_display($row);
        $row['price_display'] = hme_property_format_money($row['total_package_price'] ?? $row['price'] ?? null);
        $row['base_price_display'] = hme_property_format_money($row['price'] ?? null, 'Not specified');
        $row['total_package_display'] = hme_property_format_money($row['total_package_price'] ?? null, 'Not specified');
        $row['subsequent_rent_display'] = hme_property_format_money($row['subsequent_rent'] ?? null, 'Not specified');
        $row['agreement_price_display'] = hme_property_format_money($row['agreement_price'] ?? null, 'Not specified');
        $row['agent_commission_display'] = hme_property_format_money($row['agent_commission'] ?? null, 'Not specified');
        $row['landlord_commission_display'] = hme_property_format_money($row['landlord_commission'] ?? null, 'Not specified');
        $row['caution_display'] = hme_property_format_money($row['caution'] ?? null, 'Not specified');
        $row['cleaning_fee_display'] = hme_property_format_money($row['cleaning_fee'] ?? null, 'Not specified');
        $row['service_fee_display'] = hme_property_format_money($row['service_fee'] ?? null, 'Not specified');
        $row['electricity_bill_display'] = hme_property_format_money($row['electricity_bill'] ?? null, 'Not specified');
        $row['creator_name'] = $creatorName;
        $row['creator_phone'] = trim((string) ($row['agent_phone'] ?? ''));
        $row['luxury_label'] = hme_property_is_truthy($row['luxury'] ?? 0) ? 'Yes' : 'No';
        $row['open_to_bargain_label'] = hme_property_is_truthy($row['open_to_bargain'] ?? 0) ? 'Yes' : 'No';
        $row['other_fees_list'] = hme_property_parse_other_fees($row['other_fees'] ?? '');
        $row['primary_image_url'] = hme_property_placeholder_image();

        return $row;
    }

    function hme_fetch_property_media($propertyId)
    {
        $connection = hme_property_db_connection();
        if (!$connection) {
            return [];
        }

        $mediaTable = hme_property_table_name('media_files');
        $sql = "SELECT id, file_name, file_path, file_type
                FROM `$mediaTable`
                WHERE entity_id = ?
                  AND entity_type IN ('property', 'property_image', 'property_video', 'property_music', 'property_audio')
                ORDER BY id ASC";

        $stmt = mysqli_prepare($connection, $sql);
        if (!$stmt) {
            return [];
        }

        mysqli_stmt_bind_param($stmt, 'i', $propertyId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $images = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (!hme_property_media_is_image($row)) {
                    continue;
                }

                $images[] = [
                    'url' => hme_property_media_url($row['file_path'] ?? '', $row['file_name'] ?? ''),
                    'name' => $row['file_name'] ?? ''
                ];
            }
            mysqli_free_result($result);
        }

        mysqli_stmt_close($stmt);
        return $images;
    }

    function hme_fetch_property_utilities($propertyId)
    {
        $connection = hme_property_db_connection();
        if (!$connection) {
            return [];
        }

        $junctionTable = hme_property_table_name('PropertyUtilities');
        $utilitiesTable = hme_property_table_name('utilities');
        $sql = "SELECT u.name
                FROM `$junctionTable` pu
                INNER JOIN `$utilitiesTable` u ON u.id = pu.utility_id
                WHERE pu.property_id = ?
                ORDER BY u.name ASC";

        $stmt = mysqli_prepare($connection, $sql);
        if (!$stmt) {
            return [];
        }

        mysqli_stmt_bind_param($stmt, 'i', $propertyId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $utilities = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = trim((string) ($row['name'] ?? ''));
                if ($name !== '') {
                    $utilities[] = $name;
                }
            }
            mysqli_free_result($result);
        }

        mysqli_stmt_close($stmt);
        return $utilities;
    }

    function hme_fetch_property_landmarks($propertyId)
    {
        $connection = hme_property_db_connection();
        if (!$connection) {
            return [];
        }

        $junctionTable = hme_property_table_name('PropertyLandmarks');
        $landmarksTable = hme_property_table_name('landmarks');
        $sql = "SELECT l.name, COALESCE(pl.distance_in_meters, l.distance_in_meters) AS distance_in_meters
                FROM `$junctionTable` pl
                INNER JOIN `$landmarksTable` l ON l.id = pl.landmark_id
                WHERE pl.property_id = ?
                ORDER BY COALESCE(pl.distance_in_meters, l.distance_in_meters) ASC, l.name ASC";

        $stmt = mysqli_prepare($connection, $sql);
        if (!$stmt) {
            return [];
        }

        mysqli_stmt_bind_param($stmt, 'i', $propertyId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $landmarks = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = trim((string) ($row['name'] ?? ''));
                if ($name === '') {
                    continue;
                }

                $landmarks[] = [
                    'name' => $name,
                    'distance_in_meters' => $row['distance_in_meters'] ?? null,
                    'distance_display' => hme_property_format_distance($row['distance_in_meters'] ?? null)
                ];
            }
            mysqli_free_result($result);
        }

        mysqli_stmt_close($stmt);
        return $landmarks;
    }

    function hme_fetch_featured_properties($limit = 6)
    {
        $connection = hme_property_db_connection();
        if (!$connection) {
            return [];
        }

        $limit = max(1, (int) $limit);
        $propertiesTable = hme_property_table_name('properties');
        $locationsTable = hme_property_table_name('locations');
        $agentsTable = hme_property_table_name('agents');
        $adminsTable = hme_property_table_name('admins');

        $queries = [
            "SELECT p.*, l.name AS location_name, a.name AS agent_name, a.phone_number AS agent_phone, ad.name AS admin_name
             FROM `$propertiesTable` p
             LEFT JOIN `$locationsTable` l ON l.id = p.location
             LEFT JOIN `$agentsTable` a ON a.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'agent'
             LEFT JOIN `$adminsTable` ad ON ad.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'admin'
             WHERE COALESCE(p.availability, 'open') = 'open'
               AND COALESCE(p.status, 'available') = 'available'
             ORDER BY p.created_at DESC, p.id DESC
             LIMIT $limit",
            "SELECT p.*, l.name AS location_name, a.name AS agent_name, a.phone_number AS agent_phone, ad.name AS admin_name
             FROM `$propertiesTable` p
             LEFT JOIN `$locationsTable` l ON l.id = p.location
             LEFT JOIN `$agentsTable` a ON a.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'agent'
             LEFT JOIN `$adminsTable` ad ON ad.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'admin'
             ORDER BY p.created_at DESC, p.id DESC
             LIMIT $limit"
        ];

        foreach ($queries as $sql) {
            $result = mysqli_query($connection, $sql);
            if (!$result) {
                continue;
            }

            $properties = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $property = hme_property_enrich_row($row);
                $media = hme_fetch_property_media((int) $property['id']);
                if (!empty($media)) {
                    $property['primary_image_url'] = $media[0]['url'];
                }
                $properties[] = $property;
            }
            mysqli_free_result($result);

            if (!empty($properties)) {
                return $properties;
            }
        }

        return [];
    }

    function hme_fetch_property_by_id($propertyId)
    {
        $connection = hme_property_db_connection();
        if (!$connection) {
            return null;
        }

        $propertiesTable = hme_property_table_name('properties');
        $locationsTable = hme_property_table_name('locations');
        $agentsTable = hme_property_table_name('agents');
        $adminsTable = hme_property_table_name('admins');

        $sql = "SELECT p.*, l.name AS location_name, a.name AS agent_name, a.phone_number AS agent_phone, ad.name AS admin_name
                FROM `$propertiesTable` p
                LEFT JOIN `$locationsTable` l ON l.id = p.location
                LEFT JOIN `$agentsTable` a ON a.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'agent'
                LEFT JOIN `$adminsTable` ad ON ad.id = p.created_by AND LOWER(COALESCE(p.created_by_type, 'agent')) = 'admin'
                WHERE p.id = ?
                LIMIT 1";

        $stmt = mysqli_prepare($connection, $sql);
        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param($stmt, 'i', $propertyId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = $result ? mysqli_fetch_assoc($result) : null;

        if ($result) {
            mysqli_free_result($result);
        }
        mysqli_stmt_close($stmt);

        if (!$row) {
            return null;
        }

        $property = hme_property_enrich_row($row);
        $property['media_images'] = hme_fetch_property_media((int) $property['id']);
        if (!empty($property['media_images'])) {
            $property['primary_image_url'] = $property['media_images'][0]['url'];
        }
        $property['utilities'] = hme_fetch_property_utilities((int) $property['id']);
        $property['landmarks'] = hme_fetch_property_landmarks((int) $property['id']);

        return $property;
    }
}
