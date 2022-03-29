<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
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
        $types = Type::all();

        return view('admin.types.index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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

        $created = Type::create($data);

        if($created) {
            return redirect()->route('admin.types.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
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
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->only('name');

        $updated = $type->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.types.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->with('error', 'Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $deleted = $type->delete();

        if ($deleted) {
            return redirect()->route('admin.types.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->with('error', 'Не удалось удалить запись')
            ->withInput();
    }
}
