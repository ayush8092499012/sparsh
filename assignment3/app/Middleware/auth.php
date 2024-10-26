<?php
session_start();
function checkUserNotLoggedInMiddleware() {
   
    if (!isset($_COOKIE['email']) && empty($_COOKIE['email'])) {      
        header("Location: /login");
        exit();
    }
}
?>