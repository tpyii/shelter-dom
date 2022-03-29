<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalImage extends Model
{
    use HasFactory;

    public static $availableFields = [
        'image_id',
        'animal_id',
    ];

    protected $table = 'animal_image';

    protected $fillable = [
        'image_id',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
