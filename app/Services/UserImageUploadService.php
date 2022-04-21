<?php

namespace App\Services;

use App\Contracts\UploadService;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class UserImageUploadService implements UploadService
{
    /**
     * @param UploadedFile $files
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

        $model->update([
            'avatar' => $files->store($path, 'public'),
        ]);
    }
}
