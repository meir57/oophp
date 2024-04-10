<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Animal\AbstractAnimal;
use App\Entity\Interface\AnimalHomeInterface;

class AnimalHome implements AnimalHomeInterface
{
    public function __construct(
        private array $animals = [],
    ) {
    }
    
    public function put(AbstractAnimal $animal): void
    {
        $this->animals[] = $animal;
    }
    
    public function getAnimals(?string $type = null): array
    {
        return match ($type) {
            null => $this->animals,
            default => array_filter($this->animals, fn($animal) => $animal->is($type)),
        };
    }
}
