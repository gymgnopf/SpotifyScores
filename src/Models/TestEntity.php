<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: 'test_entry')]
final class TestEntity extends BaseModel
{
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    protected int $id;

    #[Column(type: 'string')]
    protected string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Get the value of text
     *
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
}