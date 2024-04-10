<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Animal\AbstractAnimal;
use App\Entity\Animal\Cat;
use App\Entity\Animal\Crocodile;
use App\Entity\Animal\Dog;
use App\Entity\Animal\VIP\VipCat;
use App\Entity\Animal\VIP\VipCrocodile;
use App\Entity\Animal\VIP\VipDog;
use App\Entity\Interface\AnimalHomeInterface;

class AnimalHomeWrapper implements AnimalHomeInterface
{
    public function __construct(
        private AnimalHome $animalHome,
    ) {
    }

    public function getAnimals(?string $type = null): array
    {
        return array_map(
            fn(AbstractAnimal $animal) => $this->makeVip($animal), 
            $this->animalHome->getAnimals($type)
        );
    }

    private function makeVip(AbstractAnimal $animal): mixed
    {
        return new (match($animal::class) {
            Cat::class => VipCat::class,
            Dog::class => VipDog::class,
            Crocodile::class => VipCrocodile::class,
        })(...$animal->toArray());
    }
}
