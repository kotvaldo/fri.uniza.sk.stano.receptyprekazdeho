<?php

namespace App\Models;

use App\Core\Model;

class Category extends Model
{
    protected ?int $id = null;
    protected ?string $nazov;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNazov(): ?string
    {
        return $this->nazov;
    }

    public function setNazov(?string $nazov): void
    {
        $this->nazov = $nazov;
    }
}