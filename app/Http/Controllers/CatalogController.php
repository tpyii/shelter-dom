<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Animal::query()->leftJoin(
            'animal_types', 'animals.type_id', '=', 'animal_types.id'
        )->leftJoin(
            'breeds', 'animals.breed_id', '=', 'breeds.id'
        )->select(
            Animal::$joinAvailableFields
        )->get();

        return view('catalog.index', [
            'catalog' => $catalog
        ]);
    }

    public function show(int $id)
    {
        $catalogItem = Animal::query()->leftJoin(
            'animal_types', 'animals.type_id', '=', 'animal_types.id'
        )->leftJoin(
            'breeds', 'animals.breed_id', '=', 'breeds.id'
        )->where(
            'animals.id', $id
        )->select(
            Animal::$joinAvailableFields
        )->get();

        return view('catalog.show', [
            'catalogItem' => $catalogItem
        ]);
    }
}
