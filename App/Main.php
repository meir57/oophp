<?php

declare(strict_types=1);

namespace App;

use App\Entity\Animal\{
    Cat,
    Dog,
    Crocodile,
};

use App\Entity\{
    AnimalHome,
    ZooMagazine,
    AnimalHomeWrapper
};

final class Main
{
    public static function main(): void
    {
        // парсим данные из json объекта
        $animalsBase = json_decode('{
            "Dog": ["Bobik", "Hvostik"],
            "Cat": ["Barsik", "Vasilina"],
            "Crocodile": ["Gena"]
        }', true);
        
        //print_r($animalsBase); // отображаем распарсенные данные
        
        $animalHome = new AnimalHome(); // создаем приют для животных
        
        // разделяем список всех животных по типам и сохраняем в приюте
        foreach ($animalsBase as $animal => $animals) {
            $animal = 'App\Entity\Animal\\' . $animal;
            if (! class_exists($animal)) {
                continue;
            }
            array_walk($animals, static function ($animalName) use ($animal, $animalHome) {
                $animalHome->put(new $animal($animalName));
            });
        }
        
        // отображаем список всех животных приюта
        print_r($animalHome);
        
        // отображаем список собак приюта
        print_r($animalHome->getAnimals(Dog::class));
	   
	    // отображаем список VIP кошек зоо-магазина
        print_r((new ZooMagazine($animalHome))->getAnimals(Cat::class));
        
        // отображаем список VIP крокодилов зоо-магазина
        print_r((new ZooMagazine(new AnimalHomeWrapper($animalHome)))->getAnimals(Dog::class));
    }
}
