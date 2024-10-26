<?php
require_once 'vendor/autoload.php';
require_once("constants/constant.php");
require_once("handlers/handler.php");

echo "testing";

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    // Include routes from different files
    require 'routes/routes.php';
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        // echo '404 Not Found';
        include_once('templates/pages/404.php');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $pageData = $handler($vars);

        // Extracting data from $pageData if available
        $view = $pageData['view'] ?? null;
        $title = $pageData['title'] ?? '';
        $description = $pageData['description'] ?? '';
        $keyword = $pageData['keyword'] ?? '';
        $data = $pageData['data'] ?? '';

        // Check if the route starts with /api/
        if (strpos($uri, '/api/') === 0) {
            echo $pageData['content'] ?? ''; // Directly output the content for API routes
        } else {          
            require_once 'templates/layouts.php';
        }
        break;
    default:
        http_response_code(500);
        echo '500 Internal Server Error';
}
?>