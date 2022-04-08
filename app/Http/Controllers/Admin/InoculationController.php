<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inoculation\CreateRequest;
use App\Http\Requests\Inoculation\EditRequest;
use App\Models\Inoculation;

class InoculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inoculations = Inoculation::paginate(7);

        return view('admin.inoculations.index', [
            'inoculations' => $inoculations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inoculations.create');
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

        $created = Inoculation::create($data);

        if($created) {
            return redirect()->route('admin.inoculations.index')
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
     * @param Inoculation $inoculation
     * @return \Illuminate\Http\Response
     */
    public function edit(Inoculation $inoculation)
    {
        return view('admin.inoculations.edit', [
            'inoculation' => $inoculation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Inoculation $inoculation
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Inoculation $inoculation)
    {
        $data = $request->only('name');

        $updated = $inoculation->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.inoculations.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->withErrors( 'Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inoculation $inoculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inoculation $inoculation)
    {
        $deleted = $inoculation->delete();

        if ($deleted) {
            return redirect()->route('admin.inoculations.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->withErrors( 'Не удалось удалить запись')
            ->withInput();
    }
}
