<?php

function DashboardController()
{
    checkUserNotLoggedInMiddleware();
    return [
        'view' => 'Dashboard',
        'title' => SITE_NAME . '|' . "Dashboard",
        'description' => 'This is the home page of my awesome website.',
        'keyword' => 'Keyword',
        'data' => 'data',
    ];
};
?>