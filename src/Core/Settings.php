<?php

namespace App\Core;

use App\Utils\Singleton;
use Dotenv\Dotenv;
use Exception;

class Settings extends Singleton
{
    private $dotenv;

    public function __construct(?string $path = null)
    {
        if ($path == null) {
            $path = __DIR__ . '/../..';
        }

        if (file_exists($path)) {
            $this->dotenv = Dotenv::createImmutable($path, ['config.env']);
            $this->dotenv->load();
        } else {
            throw new Exception("Could not find .env file at path: {$path}");
        }
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param string|null $default
     * @return string|null
     */
    public function get(string $key, ?string $default = null): ?string
    {
        return $_ENV[$key] ?? $default;
    }
}
