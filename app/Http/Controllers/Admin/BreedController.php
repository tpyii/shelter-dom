<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Breed\CreateRequest;
use App\Http\Requests\Breed\EditRequest;
use App\Models\Breed;
use App\Models\AnimalType;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::paginate(7);

        $animal_type = new AnimalType();
        return view('admin.breeds.index', [
            'breeds' => $breeds,
            'animal_type' => $animal_type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal_types = AnimalType::all();

        return view('admin.breeds.create', [
            'animal_types' => $animal_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name', 'type_id');

        $created = Breed::create($data);

        if($created) {
            return redirect()->route('admin.breeds.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->withErrors('Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Breed $breed
     * @return \Illuminate\Http\Response
     */
    public function edit(Breed $breed)
    {
        $animal_types = AnimalType::all();

        return view('admin.breeds.edit', [
            'breed' => $breed,
            'animal_types' => $animal_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Breed $breed
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Breed $breed)
    {
        $data = $request->only('name', 'type_id');

        $updated = $breed->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.breeds.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->withErrors('Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Breed $breed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breed $breed)
    {
        $deleted = $breed->delete();

        if ($deleted) {
            return redirect()->route('admin.breeds.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->withErrors('Не удалось удалить запись')
            ->withInput();
    }
}
