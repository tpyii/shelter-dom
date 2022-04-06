<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = AnimalType::paginate(7);

        return view('admin.animal_types.index', [
            'animal_types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animal_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name');

        $created = AnimalType::create($data);

        if($created) {
            return redirect()->route('admin.animal_types.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->withErrors( 'Не удалось добавить запись')
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
     * @param AnimalType $animal_type
     * @return \Illuminate\Http\Response
     */
    public function edit(AnimalType $animal_type)
    {
        return view('admin.animal_types.edit', [
            'animal_type' => $animal_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param AnimalType $animal_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimalType $animal_type)
    {
        $data = $request->only('name');

        $updated = $animal_type->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.animal_types.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->withErrors( 'Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AnimalType $animal_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimalType $animal_type)
    {
        $deleted = $animal_type->delete();

        if ($deleted) {
            return redirect()->route('admin.animal_types.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->withErrors('Не удалось удалить запись')
            ->withInput();
    }
}
