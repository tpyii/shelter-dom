<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UploadService
{
    /**
     * @param array|\Illuminate\Http\UploadedFile $files
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saveUploadedFile($files, Model $model);
}
