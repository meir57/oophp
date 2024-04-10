<?php

declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Animal\Interface\CatAction;

class Cat extends AbstractAnimal implements CatAction
{
    private const SLEEP_HOURS = 15;
    
    public function __construct(
        string $name,
        string $environment='land',
        ?string $poroda = null,
    ) {
        parent::__construct($name, $environment, $poroda);
    }
    
    public function playWithLaser(): string
    {
        return $this->getName() . ' is playing with laser';
    }
    
    public function meow(): string
    {
        return $this->getName() . ' is meowing';
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
