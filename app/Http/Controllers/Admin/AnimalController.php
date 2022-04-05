<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Breed;
use App\Models\Disease;
use App\Models\Inoculation;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $animals = Animal::paginate(7);
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();

        if ($request->input('type_id') !== null || $request->input('breed_id') !== null || $request->input('name') !== null) {

            if ($request->input('type_id') !== null) {
                $animals = Animal::where('type_id', $request->input('type_id'))->get();
            }
            if ($request->input('breed_id') !== null) {
                $animals = Animal::where('breed_id', $request->input('breed_id'))->get();
            }
            if ($request->input('name') !== null) {
                $animals = Animal::where('name', 'LIKE', '%' . $request->input('name') . '%')->get();
            }
            if ($request->input('name') !== null && $request->input('breed_id') !== null) {
                $animals = Animal::where('name', 'LIKE', '%' . $request->input('name') . '%')->
                where('breed_id', $request->input('breed_id'))->
                get();
            }
            if ($request->input('name') !== null && $request->input('type_id') !== null) {
                $animals = Animal::where('name', 'LIKE', '%' . $request->input('name') . '%')->
                where('type_id', $request->input('type_id'))->
                get();
            }
            if ($request->input('type_id') !== null && $request->input('breed_id') !== null) {
                $animals = Animal::where('breed_id', $request->input('breed_id'))->
                where('type_id', $request->input('type_id'))->
                get();
            }
            if ($request->input('type_id') !== null && $request->input('type_id') !== null && $request->input('name') !== null) {
                $animals = Animal::where('breed_id', $request->input('breed_id'))->
                where('type_id', $request->input('type_id'))->
                where('name', 'LIKE', '%' . $request->input('name') . '%')->
                get();
            }
        }

        return view('admin.animals.index', [
            'animals' => $animals,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'inoculations' => $inoculations
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
            'inoculations' => $inoculations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_animal = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description', 'diseases', 'inoculations');
        $created_animal = Animal::create($data_animal);
        $created_animal->disease()->attach($request->input('diseases'));
        $created_animal->inoculation()->attach($request->input('inoculations'));

        if ($request->hasfile('files')) {
            app(ImageUploadService::class)->saveUploadedFile($request->file('files'), $created_animal, []);
        }

        if ($created_animal) {
            return redirect()->route('admin.animals.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->withErrors('Не удалось добавить запись')
            ->withInput();
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

        foreach ($animal->disease as $diseaseItem) {
            $diseases_array[] = $diseaseItem->id;
        }

        foreach ($animal->inoculation as $inoculationItem) {
            $inoculations_array[] = $inoculationItem->id;
        }

        return view('admin.animals.edit', [
            'animal' => $animal,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'diseases_array' => $diseases_array,
            'inoculations' => $inoculations,
            'inoculations_array' => $inoculations_array,
            'imgIds' => $animal->images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $data_animal = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description', 'diseases', 'inoculations');

        $updated_animal = $animal->fill($data_animal)->save();

        $updated_disease = $animal->disease()->sync($request->input('diseases'));
        $updated_inoculation = $animal->inoculation()->sync($request->input('inoculations'));

        if ($request->hasfile('files') || $request->only('oldImgs')) {
            app(ImageUploadService::class)->saveUploadedFile($request->file('files'), $animal, $request->only('oldImgs'));
        }

        if ($updated_animal && $updated_disease && $updated_inoculation) {
            return redirect()->route('admin.animals.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->withErrors('Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Animal $animal
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $deleted_disease = $animal->disease()->detach();
        $deleted_inoculation = $animal->inoculation()->detach();

        $animal_deleted = $animal->delete();

        if ($animal_deleted && $deleted_disease && $deleted_inoculation) {
            return redirect()->route('admin.animals.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->withErrors('Не удалось удалить запись')
            ->withInput();
    }
}
