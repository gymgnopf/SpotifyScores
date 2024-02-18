<?php

namespace App\Controllers;

use App\Utils\JsonResponse;
use Psr\Container\ContainerInterface;
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
        return JsonResponse::transform($response, ['hello world' => 'Hallo Welt']);
   }

   public function contact(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
   {
        // your code to access items in the container... $this->container->get('');
        
        return $response;
   }
}