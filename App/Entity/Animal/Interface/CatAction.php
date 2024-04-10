<?php

declare(strict_types=1);

namespace App\Entity\Animal\Interface;

interface CatAction
{
    public function playWithLaser(): string;
    
    public function meow(): string;
    
    public function eatFish(): string;
}
