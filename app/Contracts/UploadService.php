<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UploadService
{
    /**
     * @param array $files
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saveUploadedFile(array $files, Model $model);
}
