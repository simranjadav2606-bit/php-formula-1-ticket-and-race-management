# PHP Formula 1 Ticket and Race Management System

## Project Overview
The PHP Formula 1 Ticket and Race Management System is a web-based application developed to manage Formula 1 race information, ticket booking, user management, and administrative operations.

This project is developed as part of a college academic project using PHP and MySQL.

---

## Objectives
- Manage Formula 1 race schedules and results
- Provide online ticket booking functionality
- Allow admin to manage users, races, feedback, and merchandise
- Maintain structured data using MySQL database

---

## User Roles

### Guest
- View race schedules
- View drivers information
- Browse merchandise

### Registered User
- User login and logout
- Book race tickets
- View race results
- Submit feedback
- Manage profile

### Admin
- Manage users
- Manage race schedules and results
- View feedback
- Manage merchandise
- Monitor ticket bookings

---

## Technologies Used
- Frontend: HTML, CSS, Bootstrap, JavaScript, jQuery
- Backend: PHP
- Database: MySQL
- Server: XAMPP (Apache & MySQL)
- Version Control: Git and GitHub

---

## Project Structure
Project/
- admin/
- User/
- assets/
- Image/
- css/
- js/
- index.php
- login.php
- logout.php
- ticket.php
- race.php
- drivers.php
- feedback.php
- README.md

---

## Database Configuration
- Database Name: tya_25
- Tables:
  - users
  - admin
  - races
  - tickets
  - drivers
  - feedback
  - merchandise

Database credentials are stored in `db.php` which is ignored in GitHub for security.

---

## How to Run the Project
1. Install XAMPP
2. Start Apache and MySQL
3. Copy project folder into `xampp/htdocs/
4. Create database in phpMyAdmin
5. Import database SQL file
6. Configure database connection in db.php
7. Open browser and run:
   http://localhost/Project/

---

## Academic Purpose
This project is created for educational purposes and demonstrates PHP-MySQL integration, CRUD operations, authentication, and admin panel functionality.

---

## Author
Simran Jadav  
BCA Student
