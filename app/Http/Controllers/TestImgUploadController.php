<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Image;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class TestImgUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('testImgUpload/index');
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
        /* тут просто создается тестовая модель, у тебя в контроллере данные будут браться из инпутов
        моделька прокидывается в сервис, где сохраняются изображения по выбранному всеми :) пути
        тип/порода/id
       */
        $model = new Animal();
        $model->type = 'dog';
        $model->breed = 'retriver';
        $model->id =15;

        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $file)
            {
                app(ImageUploadService::class)->saveUploadedFile($file, $model);
            }
        }
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
