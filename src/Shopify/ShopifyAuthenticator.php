<?php

use App\Spotify\Interfaces\AuthenticatorInterface;

class ShopifyAuthenticator implements AuthenticatorInterface
{
    private $shop;
    private $api_key;
    private $api_secret;

    public function __construct($shop, $api_key, $api_secret) {
        $this->shop = $shop;
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
    }

    public function getAccessToken(): string {
        // Implementierung der Authentifizierung und Token-Abruf
        // ...
        return $access_token;
    }
}