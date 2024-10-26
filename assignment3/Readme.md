1) Candidate Technical Assessment System

This project is a PHP-based web application that allows users to register, log in, and select programming languages from a list. The project uses FastRoute for routing and a simple MVC pattern to organize the application.

Getting Started:

This application provides users with a simple interface to register, log in, and choose programming languages. The languages are displayed on a dedicated page after the user logs in.


Here's a sample README.md file for your PHP project:

Programming Languages Selector
This project is a PHP-based web application that allows users to register, log in, and select programming languages from a list. The project uses FastRoute for routing and a simple MVC pattern to organize the application.

Features:

User Registration: Users can create an account with a unique email.
User Login: Registered users can log in to access the application.
Programming Language Selection: Users can view and select from a list of available programming languages.
Authentication Middleware: Ensures only logged-in users can access certain pages.

Project Structure:

├── app/
│   ├── Controllers/
│   ├── Middleware/
│   └── Models/
├── config/
│   ├── config.php
│   └── database.php
├── css/
│   ├──components/
│   └── pages/
├── js/
│   ├──components/
│   └── pages/
├── public/
│   ├── assets/
│   └── fonts/
    ├── libs/
    ├── scss/ 
    ├── tasks/ 
├── routes/
│   ├── web.php
├── resources/
│   ├── Views/
│       ├── components/
│       ├── pages/
│       ├── layouts.php
├── vendor/
│   ├── composer/
│   ├── nikic/
│   ├── autoload.php
├── sql/
│   ├── sneat.sql
├── index.php
├── Readme.md│       

Requirements:

PHP >= 8.2
Database: MYSQL

Configure the database:

DB_HOST=localhost
DB_NAME=root
DB_USER=''
DB_PASSWORD='sneat'

Start the server:
php -S localhost:8000 -t public

Usage
User Registration: Visit the /register route to create a new account.
User Login: After registration, log in at the /login route.
Languages Page: After logging in, access /languages to view and select programming languages.

Credential:

Email: ayush@gmail.com
Password: 12345678