<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UploadService
{
    const PATH_TO_STORAGE = 'storage' . DIRECTORY_SEPARATOR;

    public function saveUploadedFile($file, $oldFiles, Model $model);

}
