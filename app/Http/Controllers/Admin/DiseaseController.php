<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disease\CreateRequest;
use App\Http\Requests\Disease\EditRequest;
use App\Models\Disease;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::paginate(7);

        return view('admin.diseases.index', [
            'diseases' => $diseases
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diseases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name');

        $created = Disease::create($data);

        if($created) {
            return redirect()->route('admin.diseases.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->withErrors( 'Не удалось добавить запись')
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
     * @param Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        return view('admin.diseases.edit', [
            'disease' => $disease
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Disease $disease)
    {
        $data = $request->only('name');

        $updated = $disease->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.diseases.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->withErrors( 'Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Disease $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        return $disease->delete()
            ? redirect()->route('admin.diseases.index')->with('success', 'Запись успешно удалена')
            : back()->withErrors( 'Не удалось удалить запись')->withInput();
    }
}
