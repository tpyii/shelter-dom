<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

interface UploadService
{
    /**
     * @param array|UploadedFile $files
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saveUploadedFile($files, Model $model);
}
