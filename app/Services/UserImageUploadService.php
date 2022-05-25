<?php

namespace App\Services;

use App\Contracts\UploadService;
use Illuminate\Database\Eloquent\Model;

class UserImageUploadService implements UploadService
{
    /**
     * @param \Illuminate\Http\UploadedFile $files
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saveUploadedFile($files, Model $model)
    {

        $path = implode('/', [
            'image',
            'Avatars',
            $model->id,
        ]);
        // dd($files->store($path, 'public'));

        $model->update([
            'avatar' => $files->store($path, 'public'),
        ]);
        // dd($files->store($path, 'public'));
    }
}
