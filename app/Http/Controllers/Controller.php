<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCatalog(): array
    {
        $faker = Factory::create();

        $catalog = [];

        for ($i = 0; $i < 10; $i++)
        {
            $catalog[] = [
                'id' => $i,
                'type' => $faker->word,
                'breed' => $faker->jobTitle,
                'name' => $faker->name,
                'description' => $faker->text(200),
                'birthday_at' => $faker->date()
            ];
        };

        return $catalog;
    }

    public function getCatalogItemById(int $id): array
    {
        $faker = Factory::create();

        $catalog[] = [
            'id' => $id,
            'type' => $faker->word,
            'breed' => $faker->jobTitle,
            'name' => $faker->name,
            'description' => $faker->text(200),
            'birthday_at' => $faker->date()
        ];

        return $catalog;
    }
}
