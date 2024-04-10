<?php

declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Animal\Interface\{
    CatAction,
    DogAction
};

class Crocodile extends AbstractAnimal implements CatAction, DogAction
{
    private const SLEEP_HOURS = 17;
    
    public function __construct(
        string $name,
        string $environment = 'water',
        string $poroda = 'alligator',
    ) {
        parent::__construct($name, $environment, $poroda);
    }
    
    public function playWithLaser(): string
    {
        return $this->getName() . ' is playing with laser';
    }
    
    public function playWithBall(): string
    {
        return $this->getName() . ' is playing with ball';
    }
    
    public function meow(): string
    {
        return $this->getName() . ' is meowing';
    }
    
    public function bark(): string
    {
        return $this->getName() . ' is barking';
    }
    
    public function sleep(): string
    {
        return $this->getName() . ' is sleeping for ' . self::SLEEP_HOURS . ' hours';
    }
    
    public function eatFish(): string
    {
        return $this->getName() . ' is eating fish';
    }
}
