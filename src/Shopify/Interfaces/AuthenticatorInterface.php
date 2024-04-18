<?php

namespace App\Spotify\Interfaces;

interface AuthenticatorInterface
{
    public function getAccessToken(): string;
}
