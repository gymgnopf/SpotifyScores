<?php
namespace App\Controllers;

use App\Core\Settings;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SpotifyAuthController
{
     public function getConnect(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
     {
          /** @var Settings */
          $settings = Settings::getInstance();
          
          $clientID = $settings->get('SPOTIFY_CLIENTID');
          $redirectUri = 'http:/localhost:8080/callback';
          $scope = 'user-read-private';

          $queryParams = http_build_query([
               'response_type' => 'code',
               'client_id' => $clientID,
               'scope' => $scope,
               'redirect_uri' => $redirectUri
           ]);
          
          $authUrl = "https://accounts.spotify.com/authorize?" . $queryParams;
          return $response->withHeader('Location', $authUrl)->withStatus(302);
     }
     public function getHandle(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
     {
          return $response;
     }
}
