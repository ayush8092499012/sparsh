Task Description:

Create a simple web application that helps HR send email responses to job candidates. The application should allow users to input candidate details, select their status (Selected/Rejected), and send appropriate email responses using predefined templates.

Technical Requirements:

Frontend: HTML, CSS, and JavaScript
Backend: PHP
Libraries: PHPMAILER
Simple form handling
Email sending functionality

Requirements:

PHP >= 8.2
Database: MYSQL
SMTP for mail sending

SMTP Configuration:
Step 1: Install PHP Mailer
composer require phpmailer/phpmailer

Step 2:
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'spicypro5321@gmail.com';
$mail->Password = 'pvjqjwvdewdplszr';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->setFrom('spicypro5321@gmail.com', 'Sparsh Innovatores HR Team');
$mail->addAddress($toEmail);

Start the server: php -S localhost:8000 -t public

Project Running Steps:

Step 1: Run this command on the terminal: php -S localhost:8000 
Step 2: Open this port on the browser <!-- localhost:8000 -->
Step 3: Fill the form and select the template 
