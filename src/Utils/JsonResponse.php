<?php

namespace App\Utils;

use Psr\Http\Message\ResponseInterface;

class JsonResponse
{
    /**
     * Transform data into json.
     *
     * @param ResponseInterface $response
     * @param mixed $data
     * @return ResponseInterface
     */
    public static function transform(ResponseInterface $response, mixed $data): ResponseInterface
    {
        $response->getBody()->write(json_encode($data));
        return $response;
    }
}