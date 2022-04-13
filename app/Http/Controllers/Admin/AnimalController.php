<?php

namespace App\Http\Controllers\Admin;

use App\Models\Breed;
use App\Models\Image;
use App\Models\Animal;
use App\Models\Disease;
use App\Models\AnimalType;
use App\Models\Inoculation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\Animal\EditRequest;
use App\Http\Requests\Animal\CreateRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $age = [];
        $searchParams = $request->all();
        $animals = Animal::filter()->paginate(7)->withQueryString();
        $breeds = Breed::all();
        $animal_types = AnimalType::all();
        $diseases = Disease::all();
        $inoculations = Inoculation::all();
//        foreach ($diseases as $d){
//            dd($d->getOriginal());
//        }
        return view('admin.animals.index', [
            'animals' => $animals,
            'breeds' => $breeds,
            'animal_types' => $animal_types,
            'diseases' => $diseases,
            'inoculations' => $inoculations,
            'searchParams' => $searchParams,
//            'age' => $age,
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
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data_animal = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description', 'diseases', 'inoculations', 'files');
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
            'images' => $animal->images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Animal $animal
     * @param \App\Services\ImageUploadService $upload
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(EditRequest $request, Animal $animal, ImageUploadService $upload)
    {
        $data_animal = $request->only('name', 'type_id', 'breed_id', 'birthday_at', 'treatment_of_parasites', 'description', 'diseases', 'inoculations', 'files');

        $updated_animal = $animal->fill($data_animal)->save();

        $updated_disease = $animal->disease()->sync($request->input('diseases'));
        $updated_inoculation = $animal->inoculation()->sync($request->input('inoculations'));

        if ($request->hasfile('files')) {
            $upload->saveUploadedFile($request->file('files'), $animal);
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
        return $animal->delete()
            ? redirect()->route('admin.animals.index')->with('success', 'Запись успешно удалена')
            : back()->withErrors('Не удалось удалить запись')->withInput();
    }
}
