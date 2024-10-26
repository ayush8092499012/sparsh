<?php
require_once 'app/Models/languages.php';
function LanguageController()
{
    checkUserNotLoggedInMiddleware();
    $db = getDatabaseConnection();
    
    $languages = fetchProgrammingLanguages($db);
    
    // Close the database connection
    $db = null;

    return [
        'view' => 'languages',
        'title' => SITE_NAME . '|' . "Languages",
        'description' => 'This is the language page of my awesome website.',
        'keyword' => 'Keyword',
       'data' => [
            'languages' => $languages // Ensure languages are passed under 'data'
        ], 
    ];

}
;
?>