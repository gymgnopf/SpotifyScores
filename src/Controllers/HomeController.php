<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\EntityManager;
use App\Services\TestService;
use App\Utils\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
     // constructor receives container instance
     public function __construct()
     {
     }

     public function getHome(ServerRequestInterface $request, ResponseInterface $response, array $args, ?int $id): ResponseInterface
     {
          $testService = new TestService();
          $test = $testService->saveTestEntry();
          return JsonResponse::transform($response, $test);
     }

     public function contact(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
     {
          // your code to access items in the container... $this->container->get('');

          return $response;
     }
}
