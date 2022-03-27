<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalImage extends Model
{
    use HasFactory;

    public static $availableFields = [
        'img_id',
        'animal_id',
    ];

    protected $table = 'animal_images';

    protected $fillable = [
        'img_id',
        'animal_id',
    ];
}
