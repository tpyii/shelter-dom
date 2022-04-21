<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Arr;
use App\Contracts\UploadService;
use Illuminate\Database\Eloquent\Model;

class AnimalImageUploadService implements UploadService
{
    /**
     * @param array $files
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saveUploadedFile($files, Model $model)
    {
        $path = implode('/', [
            'image',
            $model->type->name,
            $model->breed->name,
            $model->id,
        ]);

        $paths = array_map(function ($file) use ($path) {
            return [
                'path' => $file->store($path, 'public'),
            ];
        }, $files);

        Image::upsert($paths, []);

        $ids = Image::whereIn('path', Arr::pluck($paths, 'path'))->pluck('id')->toArray();
        
        $model->images()->attach($ids);
    }
}
