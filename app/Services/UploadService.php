<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AnimalImage;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


class UploadService
{
    public function saveUploadedFile(UploadedFile $file, Model $model)
    {
        /*создаем новую модель для изображения и парсим данные*/
        $img = new Image();
        $id = $model->id;
        $breed = $model->breed;
        $type = $model->type;
        /*вот он, вот он, путь моей мечты*/
        $path = $type . DIRECTORY_SEPARATOR . $breed . DIRECTORY_SEPARATOR . $id;
        $img->path = $file->storeAs($path, $file->hashName(), 'public');

        if (!$img->path) {
            throw new \Exception('File not loaded');
        }
        /*сохраняем картинку в базу, получаем ее id и по связи прокидываем в таблицу*/
        $img->save();
        $model->images()->attach($img->id);
    }
}
