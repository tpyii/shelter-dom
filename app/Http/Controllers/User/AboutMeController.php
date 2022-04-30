<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Services\UserImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('user_lk.about_me.index', [
            'user' => $user,
            'userProfile' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Profile $profile
     * @param UserImageUploadService $upload
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Profile $profile, UserImageUploadService $upload)
    {
        // dd( $request);
        $userProfileData = $request->only('firstName', 'lastName', 'birthday_at', 'phone', 'address', 'description', 'profile');
        $userData = $request->only('nickname', 'email');

        $userProfileUpdate = $profile->find($userProfileData['profile'])->fill([
            'name' => $userProfileData['firstName'],
            'surname' => $userProfileData['lastName'],
            'birthday_at' => $userProfileData['birthday_at'],
            'phone' => $userProfileData['phone'],
            'address' => $userProfileData['address'],
            'description' => $userProfileData['description'],
        ])->save();

        $userUpdate = $request->user()->fill([
            'name' => $userData['nickname'],
            'email' => $userData['email'],
        ])->save();

        if ($request->hasfile('files')) {
            $upload->saveUploadedFile($request->file('files'), $profile->find($userProfileData['profile']));
        }

        return $userProfileUpdate && $userUpdate
            ? redirect()->route('user.about_me.index')->with('success', 'Данные профиля сохранены')
            : back()->withErrors('Не удалось обновить данные профиля')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
