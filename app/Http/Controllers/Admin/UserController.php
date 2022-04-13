<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'email', 'password', 'is_admin');

        $created = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'is_admin' => $data['is_admin'],
                'password' => Hash::make($data['password'])
            ]
        );

        if ($created) {
            return redirect()->route('admin.users.index')
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
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $data = $request->only('name', 'email', 'is_admin');


        $updated = $user->fill($data)->save();

        if ($updated) {
            return redirect()->route('admin.users.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->withErrors('Не удалось изменить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();

        if ($deleted) {
            return redirect()->route('admin.users.index')
                ->with('success', 'Запись успешно удалена');
        }

        return back()->withErrors('Не удалось удалить запись')
            ->withInput();
    }
}
