<?php
/**
 * Smart Attendance System - Main Configuration File
 * 
 * This file contains all system configuration settings
 */

// Application Settings
define('APP_NAME', 'Smart Attendance System');
define('APP_VERSION', '1.0.0');
define('APP_ENV', 'development'); // development or production
define('APP_DEBUG', true);
define('APP_TIMEZONE', 'Africa/Accra');

// Set Timezone
date_default_timezone_set(APP_TIMEZONE);

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'smart_attendance');
define('DB_PORT', 3306);

// Session Settings
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds
define('SESSION_NAME', 'SMART_ATTENDANCE');

// QR Code Settings
define('QR_VALIDITY_MINUTES', 15); // QR code valid for 15 minutes
define('QR_SIZE', 300); // QR code size in pixels
define('QR_ERROR_CORRECTION', 'H'); // H = 30% correction

// RFID Settings
define('RFID_ENABLED', true);
define('RFID_PORT', '/dev/ttyUSB0'); // Serial port for RFID reader
define('RFID_BAUD_RATE', 9600);

// Offline Storage Settings
define('INDEXEDDB_STORE_NAME', 'attendance_records');
define('SYNC_INTERVAL_SECONDS', 300); // Check for sync every 5 minutes

// Notification Settings
define('ABSENCE_THRESHOLD_PERCENT', 80); // Notify if attendance < 80%
define('ENABLE_EMAIL_NOTIFICATIONS', false);
define('ENABLE_SMS_NOTIFICATIONS', false);

// Email Configuration (if enabled)
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', 'your-email@gmail.com');
define('MAIL_PASSWORD', 'your-password');
define('MAIL_FROM', 'noreply@attendance.edu.gh');

// File Upload Settings
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx']);
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('REPORTS_DIR', __DIR__ . '/../reports/exports/');

// Security Settings
define('PASSWORD_MIN_LENGTH', 8);
define('PASSWORD_REQUIRE_UPPERCASE', true);
define('PASSWORD_REQUIRE_NUMBERS', true);
define('PASSWORD_REQUIRE_SPECIAL', true);
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOCKOUT_DURATION_MINUTES', 15);

// API Settings
define('API_RATE_LIMIT', 100); // requests per hour
define('API_KEY_LENGTH', 32);

// Role-based Access Control
define('ROLES', [
    'admin' => 1,
    'lecturer' => 2,
    'student' => 3
]);

// Pagination
define('RECORDS_PER_PAGE', 20);

// Application Paths
define('BASE_URL', 'http://localhost/smart-attendance-system');
define('ROOT_PATH', __DIR__ . '/../');
define('PUBLIC_PATH', ROOT_PATH . 'public/');
define('VIEWS_PATH', ROOT_PATH . 'views/');
define('MODELS_PATH', ROOT_PATH . 'models/');
define('CONTROLLERS_PATH', ROOT_PATH . 'controllers/');
define('API_PATH', ROOT_PATH . 'api/');

// Error Handling
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

?>
