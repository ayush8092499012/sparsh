<?php
$r->addRoute('GET', '/', 'HomeHandler');
$r->addRoute('GET', '/home', 'HomeHandler');
$r->addRoute('GET', '/index', 'HomeHandler');

/* SEND MAIL */

// Route to send email
$r->addRoute('POST', '/api/send-email', function () {
    // Call the handler
    echo handleSendEmail([]);
});

?>