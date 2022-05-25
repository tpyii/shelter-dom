<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'animal_id',
    ];
}
