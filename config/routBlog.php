<?php 
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // BLOG
    
    $r->addRoute('GET', '/', ['App\controllers\BlogControllers', 'posts']);
    $r->addRoute('GET', '/blog', ['App\controllers\BlogControllers', 'posts']);
    $r->addRoute('GET', '/page/{id:\d+}', ['App\controllers\BlogControllers', 'posts']);
    $r->addRoute('GET', '/post/{id:\d+}', ['App\controllers\BlogControllers', 'post']);

    $r->addRoute('POST', '/posts/serarch/', ['App\controllers\BlogControllers', 'sea']);
});
// Fetch method and URI from somewhere
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
        // ... 404 Not Found
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        
        $controller = new $handler[0];
        call_user_func([$controller, $handler[1]], $vars);
        break;
}
