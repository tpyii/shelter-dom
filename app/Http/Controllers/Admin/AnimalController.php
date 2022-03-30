<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalDisease;
use App\Models\AnimalInoculation;
use App\Models\AnimalType;
use App\Models\Breed;
use App\Models\Disease;
use App\Models\Inoculation;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();

        return view('admin.animals.index', [
            'animals' => $animals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();

        return view('admin.animals.create', [
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'inoculations' => $inoculations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();

        foreach ($animal->disease AS $diseaseItem){
            $diseases_array[] = $diseaseItem->id;
        }

        foreach ($animal->inoculation AS $inoculationItem){
            $inoculations_array[] = $inoculationItem->id;
        }

        return view('admin.animals.edit', [
            'animal' => $animal,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'diseases_array' => $diseases_array,
            'inoculations' => $inoculations,
            'inoculations_array' => $inoculations_array
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
