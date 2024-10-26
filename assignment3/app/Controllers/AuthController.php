<?php
require_once 'app/Models/users.php';
function LoginController()
{
    // checkUserLoggedInMiddleware();
    return [
        'view' => 'login',
        'title' => SITE_NAME . '|' . "Login",
        'description' => 'This is the home page of my awesome website.',
        'keyword' => 'Keyword',
        'data' => 'data',
    ];
}
;

/* Register */
function RegisterController()
{
    // checkUserLoggedInMiddleware();
    return [
        'view' => 'register',
        'title' => SITE_NAME . '|' . "Register",
        'description' => 'This is the home page of my awesome website.',
        'keyword' => 'Keyword',
        'data' => 'data',
    ];
}
;

function CreateUser()
{
    $db = getDatabaseConnection();

    $response = ['status' => 'error', 'message' => ''];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $firstName = trim($_POST['firstname'] ?? '');
        $lastName = trim($_POST['lastname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Check if the email already exists
        if (emailExists($email, $db)) {
            $response['message'] = "This email is already registered. Please use a different email.";
            $response['status'] = 'warning';
            echo json_encode($response);
            return;
        }

        $user_id = registerUser($firstName, $lastName, $email, $password, $db);
        // Register the user
        if ($user_id) {
            $response['status'] = 'success';
            $response['message'] = "Registration successful! Welcome, $firstName.";

            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['firstname'] = $firstName;
            $_SESSION['lastname'] = $lastName;
            $_SESSION['email'] = $email;

            // Set cookies to expire in 7 days
            $cookieExpiration = time() + (7 * 24 * 60 * 60); // 7 days from now
            setcookie('user_id', $user_id, $cookieExpiration, "/");
            setcookie('firstname', $firstName, $cookieExpiration, "/");
            setcookie('lastname', $lastName, $cookieExpiration, "/");
            setcookie('email', $email, $cookieExpiration, "/");
        } else {
            $response['message'] = "An error occurred during registration. Please try again later.";
            $response['status'] = 'error';
        }
    } else {
        $response['message'] = "Invalid request method. Please use POST.";
        $response['status'] = 'error';
    }

    // Close the database connection
    $db = null;

    // Return the response as JSON
    echo json_encode($response);
}

/* Logout */
function LogoutController()
{

    // Clear all session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();

    // Expire each user-related cookie by setting their expiration to a past time
    if (isset($_COOKIE['firstname'])) {
        setcookie('firstname', '', time() - 3600, "/"); // Expire 1 hour ago
    }
    if (isset($_COOKIE['lastname'])) {
        setcookie('lastname', '', time() - 3600, "/");
    }
    if (isset($_COOKIE['email'])) {
        setcookie('email', '', time() - 3600, "/");
    }

    header("Location: /login");
}

/* Login controller */
function LoginUser()
{
    $db = getDatabaseConnection();

    $response = ['status' => 'error', 'message' => ''];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');


        // Check if the email exists and validate password
        $user = getUserByEmail($email, $db);
        if ($user && password_verify($password, $user['password'])) {
            // Check if user status is active and not deleted
            if ($user['status'] == 1 && $user['is_deleted'] == 0) {
                // Set session variables
                $_SESSION['user_id'] = $user['candidate_id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['email'] = $user['email'];

                // Set cookies to expire in 7 days
                $cookieExpiration = time() + (7 * 24 * 60 * 60); // 7 days from now
                setcookie('user_id', $user['candidate_id'], $cookieExpiration, "/");
                setcookie('firstname', $user['firstname'], $cookieExpiration, "/");
                setcookie('lastname', $user['lastname'], $cookieExpiration, "/");
                setcookie('email', $user['email'], $cookieExpiration, "/");

                // Set success response
                $response['status'] = 'success';
                $response['message'] = "Login successful! Welcome back, {$user['firstname']}.";
            } else {
                $response['message'] = "Your account is inactive or has been deleted.";
                $response['status'] = 'error';
            }
        } else {
            $response['message'] = "Invalid email or password.";
            $response['status'] = 'error';
        }
    } else {
        $response['message'] = "Invalid request method. Please use POST.";
        $response['status'] = 'error';
    }

    // Close the database connection
    $db = null;

    // Return the response as JSON
    echo json_encode($response);
}
?>