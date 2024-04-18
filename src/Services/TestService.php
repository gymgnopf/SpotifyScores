<?php

namespace App\Services;

use App\Core\Database;
use App\Models\TestEntity;

class TestService
{
    private $em;

    public function __construct()
    {
        /** @var Database */
        $db = Database::getInstance();
        $this->em = $db->getEM();
    }

    public function saveTestEntry()
    {
        $testEntry = new TestEntity("Lorem ipsum");
        $this->em->persist($testEntry);
        $this->em->flush();
        return $testEntry;
    }
}