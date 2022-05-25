<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $animals = auth()->user()->animals()->get();

        return view('user_lk.favourite_animals.index', [
            'animals' => $animals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer', 'numeric', 'exists:animals'],
        ]);

        return auth()->user()->animals()->attach($validated)
            ? redirect()->route('admin.animals.index')->with('success', 'Запись успешно добавлена')
            : back()->withErrors('Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Animal $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Animal $animal)
    {
        return auth()->user()->animals()->detach($animal)
            ? redirect()->route('user.favourite_animals.index')->with('success', 'Запись успешно удалена')
            : back()->withErrors('Не удалось удалить запись')->withInput();
    }
}
