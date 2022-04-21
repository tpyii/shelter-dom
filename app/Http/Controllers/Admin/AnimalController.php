<?php

namespace App\Http\Controllers\Admin;

use App\Models\Breed;
use App\Models\Animal;
use App\Models\Disease;
use App\Models\AnimalType;
use App\Models\Inoculation;
use App\Http\Controllers\Controller;
use App\Services\AnimalImageUploadService;
use App\Http\Requests\Animal\EditRequest;
use App\Http\Requests\Animal\CreateRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::filter()->paginate(7)->withQueryString();
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();
        $ages_array = [
            '1',
            '1 - 2',
            '2 - 5',
            '> 5'
        ];
        $ages = array_map(
            function($value, $key) {
                return (object) [
                    'id' => $key,
                    'name' => $value,
                ];
            },
            $ages_array, 
            range(1, count($ages_array))
        );

        return view('admin.animals.index', [
            'animals' => $animals,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'inoculations' => $inoculations,
            'ages' => $ages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
            'inoculations' => $inoculations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param \App\Services\AnimalImageUploadService $upload
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(CreateRequest $request, AnimalImageUploadService $upload)
    {
        $data = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description');
        $animal = Animal::create($data);
        $animal->disease()->attach($request->input('diseases'));
        $animal->inoculation()->attach($request->input('inoculations'));

        if ($request->hasfile('files')) {
            $upload->saveUploadedFile($request->file('files'), $animal);
        }

        return $animal
            ? redirect()->route('admin.animals.index')->with('success', 'Запись успешно добавлена')
            : back()->withErrors('Не удалось добавить запись')->withInput();
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();

        return view('admin.animals.edit', [
            'animal' => $animal,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'inoculations' => $inoculations,
            'images' => $animal->images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Animal $animal
     * @param \App\Services\AnimalImageUploadService $upload
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(EditRequest $request, Animal $animal, AnimalImageUploadService $upload)
    {
        $data = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description');
        $updated_animal = $animal->fill($data)->save();
        $updated_disease = $animal->disease()->sync($request->input('diseases'));
        $updated_inoculation = $animal->inoculation()->sync($request->input('inoculations'));

        if ($request->hasfile('files')) {
            $upload->saveUploadedFile($request->file('files'), $animal);
        }

        return $updated_animal && $updated_disease && $updated_inoculation
            ? redirect()->route('admin.animals.index')->with('success', 'Запись успешно добавлена')
            : back()->withErrors('Не удалось добавить запись')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Animal $animal
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        return $animal->delete()
            ? redirect()->route('admin.animals.index')->with('success', 'Запись успешно удалена')
            : back()->withErrors('Не удалось удалить запись')->withInput();
    }
}
