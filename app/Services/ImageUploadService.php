<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\UploadService;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;


class ImageUploadService implements UploadService
{

    public function saveUploadedFile($file, Model $model)
    {
        $pathToDir = 'image';
        $imgToAdd = [];
        foreach ($file as $f) {
            $img = new Image();
            $id = $model->id;
            $breed = $model->breed->name;
            $type = $model->type->name;
            $path = $pathToDir . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $breed . DIRECTORY_SEPARATOR . $id;
            $img->path = self::PATH_TO_STORAGE . $f->storeAs($path, $f->hashName(), 'public');
            if (!$img->path) {
                throw new \Exception('File not loaded');
            }
            $img->save();
            $imgToAdd[] = $img->id;
        }
        $model->images()->sync($imgToAdd);
    }
}
