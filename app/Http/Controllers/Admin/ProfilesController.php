<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\CreateRequest;
use App\Http\Requests\Profile\EditRequest;
use App\Models\Profile;
use App\Models\User;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $profiles = Profile::filter()->paginate(7)->withQueryString();
        $users = User::all();

        return view('admin.profiles.index', [
            'profiles' => $profiles,
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
        $profiles = Profile::query()->select('user_id')->get();

        $users = User::whereNotIn('id', $profiles)->get();

        return view('admin.profiles.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('user_id', 'name', 'surname', 'description', 'phone', 'address', 'birthday_at');

        $profile = Profile::create($data);

        return $profile
            ? redirect()->route('admin.profiles.index')->with('success', 'Запись успешно добавлена')
            : back()->withErrors('Не удалось добавить запись') ->withInput();
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
     * @param Profile $profile
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Profile $profile)
    {
        $profiles = Profile::query()->select('user_id')->get();

        $users = User::whereNotIn('id', $profiles)->get();

        return view('admin.profiles.edit', [
            'profile' => $profile,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Profile $profile)
    {
        $data = $request->only('user_id', 'name', 'surname', 'description', 'phone', 'address', 'birthday_at');

        $updated = $profile->fill($data)->save();

        return $updated
            ? redirect()->route('admin.profiles.index')->with('success', 'Запись успешно изменена')
            : back()->withErrors('Не удалось добавить запись') ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Profile $profile)
    {
        return $profile->delete()
            ? redirect()->route('admin.profiles.index')->with('success', 'Запись успешно удалена')
            : back()->withErrors( 'Не удалось удалить запись')->withInput();
    }
}
