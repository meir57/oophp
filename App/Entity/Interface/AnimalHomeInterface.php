<?php

declare(strict_types=1);

namespace App\Entity\Interface;

interface AnimalHomeInterface
{
    public function getAnimals(?string $type = null): array;
}