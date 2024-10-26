<?php
/* Login */
$r->addRoute('GET', '/', 'LoginController'); // login page
$r->addRoute('GET', '/login', 'LoginController'); // login page
$r->addRoute('GET', '/index', 'LoginController'); // login page

/* Register */
$r->addRoute('GET', '/register', 'RegisterController'); // register page
$r->addRoute('POST', '/api/create-user', 'CreateUser'); // registration
$r->addRoute('GET', '/api/logout', 'LogoutController'); // logout
$r->addRoute('POST', '/api/login-user', 'LoginUser'); // login

/* Dashboard */
$r->addRoute('GET', '/dashboard', 'DashboardController');

/* Language */
$r->addRoute('GET', '/language', 'LanguageController');
