<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalTypeResource;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AnimalTypeResource::collection(AnimalType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(AnimalType $animalType)
    {
        return new AnimalTypeResource($animalType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimalType $animalType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimalType $animalType)
    {
        //
    }
}
