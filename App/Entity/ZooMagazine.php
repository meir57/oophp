<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Interface\AnimalHomeInterface;

class ZooMagazine
{
    public function __construct(
        private AnimalHomeInterface $animalHome,
    ) {
    }
    
    public function getAnimals(?string $type = null): array
    {
        return $this->animalHome->getAnimals($type);
    }
}
