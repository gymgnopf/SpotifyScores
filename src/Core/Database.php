<?php

namespace App\Core;

use App\Utils\Singleton;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Database extends Singleton
{
    private $entityManger;

    public function __construct()
    {
        /** @var Settings */
        $settings = Settings::getInstance();

        $isDevMode = boolval($settings->get('DEV_MODE'));
        $config = ORMSetup::createAttributeMetadataConfiguration(
            array(__DIR__ . "/src"),
            $isDevMode
        );

        $conn = array(
            'driver'   => 'pdo_mysql',
            'host'     => $settings->get('DB_HOST'),
            'dbname'   => $settings->get('DB_NAME'),
            'user'     => $settings->get('DB_USER'),
            'password' => $settings->get('DB_PASSWORD'),
        );

        $connection = DriverManager::getConnection($conn, $config);

        $this->entityManger = new EntityManager($connection, $config);
    }

    /**
     * Return doctrine entity manager
     *
     * @return EntityManager
     */
    public function getEM(): EntityManager
    {
        return $this->entityManger;
    }
}
