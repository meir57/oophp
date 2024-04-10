<?php

declare(strict_types=1);

namespace App\Entity\Animal\Interface;

interface DogAction
{
    public function playWithBall(): string;
    
    public function bark(): string;
}
