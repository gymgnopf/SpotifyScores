<?php

use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->any('/json/{controller}/{action}[/{id}]', function (Request $request, Response $response, array $args) {
    $controller = $args['controller'];
    $action = $args['action'];
    $id = $args['id'] ?? null;

    $controllerClass = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';
    if (!class_exists($controllerClass)) {
        $response->getBody()->write("Controller $controllerClass not found.");
        return $response->withStatus(404);
    }
    $controllerInstance = new $controllerClass();
    if (!method_exists($controllerInstance, $action)) {
        $response->getBody()->write("Unknown action $action in controller $controllerClass.");
        return $response->withStatus(404);
    }

    return $controllerInstance->$action($request, $response, $args, $id);
});

$app->run();
