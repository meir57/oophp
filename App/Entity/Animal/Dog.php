<?php

declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Animal\Interface\DogAction;

class Dog extends AbstractAnimal implements DogAction
{
    private const SLEEP_HOURS = 13;
    
    public function __construct(
        string $name,
        string $environment='land',
        ?string $poroda = 'husky',
    ) {
        parent::__construct($name, $environment, $poroda);
    }
    
    public function playWithBall(): string
    {
        return $this->getName() . ' is playing with ball';
    }
    
    public function bark(): string
    {
        return $this->getName() . ' is barking';
    }
    
    public function sleep(): string
    {
        return $this->getName() . ' is sleeping for ' . self::SLEEP_HOURS . ' hours';
    }
}
