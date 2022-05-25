<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalStoreRequest;
use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\Response;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|Response
     */
    public function index()
    {
        return AnimalResource::collection(Animal::filter()->paginate(4));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AnimalStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalStoreRequest $request)
    {
        $crested_animal = Animal::create($request->validated());
        return new AnimalResource($crested_animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AnimalStoreRequest  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalStoreRequest $request, Animal $animal)
    {
        $animal->update($request->validated());

        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
