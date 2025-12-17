# HairCut-BeautySalon-Booking-System
A fully functional Haircut and Beauty Salon Booking System designed to manage appointments, services, customers, and salon staff efficiently. This system allows clients to book appointments online, and admins/staff to manage services, schedules, and payments.

# Table of Contents

1. Purpose <br>
2. Features <br>
3. Technologies <br>
4. Architecture & Pattern <br>
5. Database <br>
6. Setup Instructions <br>
7. Usage <br>
8. License

# Purpose

The HairCut-BeautySalon-Booking-System is intended for small to medium-sized salons that want to manage appointments, services, and payments efficiently. <br>

It provides: <br>

* Online appointment booking for customers.<br>
* Service and category management.<br>
* Staff and admin dashboards.<br>
* Payment tracking and status updates.<br>
* Dynamic content like sliders and announcements.

# Features

* User roles: Admin, Staff, Customer.<br>
* Booking management: View, edit, delete appointments.<br>
* Service categories: Hairdressing, Nails, Face & Body, Wigs, Packages, Kiddies, Elderly.<br>
* Dynamic sliders: Display salon images on the homepage.<br>
* Notifications: Remind clients of upcoming appointments.<br>
* Payment system: Track deposits and full payments.<br>
* Responsive UI: Mobile and desktop friendly.

# Technologies

* Backend: PHP 8.x<br>
* Frontend: HTML5, CSS3, JavaScript, Bootstrap 5<br>
* Database: MySQL / MariaDB<br>
* Version Control: Git & GitHub<br>
* Libraries: AOS (Animate on Scroll), Ionicons, FontAwesome<br>
* Server Environment: XAMPP / LAMP / WAMP (local)

# Architecture & Pattern

The system follows the MVC (Model-View-Controller) pattern, which separates the application logic from the presentation and data layer:

* Model: Handles database operations (Salon, Users, Services, Appointments).<br>
* View: Frontend templates displaying data.<br>
* Controller: Receives user input, interacts with models, and renders views.

This structure allows scalability and maintainability of the code.

# Database

The database is built in MySQL/MariaDB and includes tables such as:

* users – Stores user credentials and roles.<br>
* salons – Stores salon information and slider images.<br>
* appointments – Stores customer appointments and status.<br>
* services – Stores service categories and descriptions.<br>
* payments – Tracks deposits and full payments.

The system also uses comma-separated strings for slider images and dynamic features.

# Setup Instructions

Clone the repository: git clone git@github.com:Sinethemba3/HairCut-BeautySalon-Booking-System.git

# Set up the database

* Create a database in MySQL (e.g., bookings-db).<br>
* Import the provided SQL dump (database.sql) if available.

# Configure the application

Update the database configuration in /app/config.php (or your config file):

define('DB_HOST', 'localhost');<br>
define('DB_USER', 'root');<br>
define('DB_PASS', '');<br>
define('DB_NAME', 'bookings-db');


# Set up the web server

* Place the project folder in htdocs (XAMPP) or /var/www/html (LAMP).<br>
* Start Apache and MySQL.<br>
* Access the app via http://localhost/HairCut-BeautySalon-Booking-System/.

# Optional

* Configure your .htaccess for clean URLs (if using Apache).<br>
* Make sure uploads/ folder is writable for image uploads.

# Usage

* Open the app in a browser.<br>
* Register as a user or login if you have credentials.<br>
* Customers can book appointments and select services.

Admins/Staff can:<br>
* Manage services, categories, and salon info.<br>
* View, accept, or reject appointments.<br>
* Upload slider images for the homepage.<br>
* Track payments and deposits.

# Project Structure

/app<br>
    /controllers<br>
    /core<br>
    /models<br>
    /views<br>
/assets<br>
    /images<br>
    /css<br>
    /js<br>
/uploads<br>
    # Uploaded images and sliders<br>
/public<br>
    index.php<br>
    htaccess<br>

#  Notes

* Slider images are stored as comma-separated strings in the database.<br>
* The system supports dynamic display of images and service updates.<br>
* Roles are enforced in the Dashboard for security and proper access.

# License

This project is open-source and free to use for educational and development purposes.







