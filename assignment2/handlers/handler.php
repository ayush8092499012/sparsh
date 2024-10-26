<?php
require_once('phpMailer/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Home Handler */
function HomeHandler()
{
    return [
        'view' => 'home',
        'title' => SITE_NAME . '|' . "Home",
        'description' => 'This is the home page of my awesome website.',
        'keyword' => 'Keyword',
        'data' => 'data',
    ];
}
;


// Function to handle email sending via API
function handleSendEmail($data)
{
    // Decode the JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        return json_encode(['error' => 'Invalid JSON payload'], JSON_PRETTY_PRINT);
    }

    // Extract variables from the decoded JSON
    $candidateName = $data['candidateName'] ?? null;
    $candidateEmail = $data['candidateEmail'] ?? null;
    $position = $data['position'] ?? null;
    $status = $data['status'] ?? null;
    $action = $data['action'] ?? null;
    
    // Generate email body based on status
    $emailBody = ($status == 1)
        ? generateSelectedEmailTemplate($candidateName, $position)
        : generateRejectedEmailTemplate($candidateName, $position);

    if ($action == 0) {
        return json_encode(['message'=> $emailBody]);
    } else {
        $subject = ($status == 1)
            ? 'Congratulations on Your Selection'
            : 'Thank You for Your Application';

        // Send the email using PHPMailer
        $result = sendPHPMailerEmail($candidateEmail, $subject, $emailBody);

        if ($result === true) {
            return json_encode(['message' => 'Email sent successfully']);
        } else {
            return json_encode(['error' => $result], JSON_PRETTY_PRINT);
        }
    }
}


// PHPMailer setup and sending email
function sendPHPMailerEmail($toEmail, $subject, $body)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'spicypro5321@gmail.com';
        $mail->Password = 'pvjqjwvdewdplszr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('spicypro5321@gmail.com', 'Sparsh Innovatores HR Team');
        $mail->addAddress($toEmail);

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return $mail->ErrorInfo;
    }
}

// Function to generate selected candidate email template
function generateSelectedEmailTemplate($candidateName, $position)
{
    return "Dear {$candidateName},\n\nWe are pleased to inform you that you have been selected for the position of {$position}.\n\nPlease reply to this email to confirm your acceptance.\n\nBest regards,\nHR Team";
}

// Function to generate rejected candidate email template
function generateRejectedEmailTemplate($candidateName, $position)
{
    return "Dear {$candidateName},\n\nThank you for applying for the position of {$position}.\n\nWe regret to inform you that we have decided to move forward with other candidates.\n\nBest regards,\nHR Team";
}

?>