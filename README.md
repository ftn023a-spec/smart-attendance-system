# Smart Attendance System Using QR Codes and RFID Authentication

## Overview
A comprehensive attendance management system designed for Ghanaian tertiary institutions, combining QR codes and RFID technology for secure, efficient attendance recording.

## Features
- 🔐 QR Code-based attendance with time-bound validity
- 📱 RFID card integration for instant attendance
- 🔄 Offline attendance caching with automatic synchronization
- 📊 Real-time dashboard with attendance analytics
- 👥 Role-based access control (Student, Lecturer, Admin)
- 📧 Automated absence notifications
- 📈 Comprehensive attendance reports (CSV export)
- 📱 Mobile-responsive Bootstrap interface

## Tech Stack
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP 8
- **Database**: MySQL
- **Server**: Apache (XAMPP)
- **Charts**: Chart.js
- **Offline Storage**: IndexedDB
- **Authentication**: Session-based with role-based access control

## Project Structure
```
smart-attendance-system/
├── config/                 # Configuration files
├── database/              # Database schema and migrations
├── controllers/           # Business logic controllers
├── models/               # Database models
├── views/                # UI templates
├── assets/               # CSS, JS, images
├── qr/                   # QR code generation and validation
├── rfid/                 # RFID integration
├── api/                  # REST API endpoints
├── offline/              # IndexedDB offline sync
├── reports/              # Report generation
├── notifications/        # Notification system
├── dashboard/            # Dashboard logic
└── public/               # Public accessible files
```

## Installation

### Prerequisites
- PHP 8.0+
- MySQL 5.7+
- Apache with mod_rewrite
- XAMPP (Recommended)

### Setup Steps

1. **Clone Repository**
```bash
git clone https://github.com/ftn023a-spec/smart-attendance-system.git
cd smart-attendance-system
```

2. **Create Database**
```bash
mysql -u root -p < database/schema.sql
```

3. **Configure Database Connection**
Edit `config/database.php` with your credentials:
```php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'your_password';
$db_name = 'smart_attendance';
```

4. **Configure Application**
Update `config/config.php` with system settings

5. **Load Test Data** (Optional)
```bash
mysql -u root -p smart_attendance < database/sample_data.sql
```

6. **Set Permissions**
```bash
chmod -R 755 public/
chmod -R 755 assets/
```

7. **Access System**
- Navigate to: `http://localhost/smart-attendance-system`
- Default credentials will be in sample_data.sql

## User Roles & Access

### Student
- Login to personal dashboard
- Scan QR codes for attendance
- Use RFID card for check-in
- View attendance history and percentage
- Receive absence notifications

### Lecturer
- Create lecture sessions
- Generate time-bound QR codes
- View real-time attendance
- Identify absent students
- Download attendance reports

### Administrator
- Manage users (create, edit, delete)
- Manage courses and lecturers
- Monitor system-wide attendance
- View real-time dashboard
- Export comprehensive reports
- Send notifications
- Access system logs

## Configuration

### QR Code Expiry
Edit in `config/config.php`:
```php
$qr_validity_minutes = 15; // QR code valid for 15 minutes
```

### Notification Threshold
```php
$absence_threshold = 80; // Notify if attendance < 80%
```

## Security Features
- Password hashing (bcrypt)
- Role-based access control (RBAC)
- Session management with timeout
- Input validation and sanitization
- SQL injection prevention (Prepared statements)
- HTTPS-ready architecture
- CSRF token protection

## Offline Functionality
- IndexedDB local storage
- Automatic sync when online
- Duplicate prevention
- Queue management

## License
MIT License

## Version
1.0.0
