<?php

declare(strict_types=1);

namespace App\Entity\Animal;

abstract class AbstractAnimal
{
    protected function __construct(
        protected string $name,
        protected string $environment,
        protected ?string $poroda = null,
    ) {
    }
    
    abstract public function sleep(): string; 
    
    public function getName(): string
    {
        return static::class . ' ' . $this->name;
    }
    
    public function getEnvironment(): string
    {
        return $this->getName() . ' lives in ' . $this->environment;
    }
    
    public function getPoroda(): string
    {
        return $this->poroda ?? 'unknown';
    }
    
    public function is(string $animalType): bool
    {
        return static::class === $animalType;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'environment' => $this->getEnvironment(),
            'poroda' => $this->getPoroda(),
        ];
    }
}
