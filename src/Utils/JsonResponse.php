<?php

namespace App\Utils;

use App\Models\Base\BaseModel;
use Psr\Http\Message\ResponseInterface;

class JsonResponse
{
    /**
     * Transform data into json.
     *
     * @param ResponseInterface $response
     * @param BaseModel $data
     * @return ResponseInterface
     */
    public static function transform(ResponseInterface $response, BaseModel $data): ResponseInterface
    {
        $response->getBody()->write(json_encode($data->jsonSerialize()));
        return $response;
    }
}
