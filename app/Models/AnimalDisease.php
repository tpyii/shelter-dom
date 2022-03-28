<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDisease extends Model
{
    use HasFactory;

    public static $availableFields = [
        'disease_id',
        'animal_id',
    ];

    protected $table = 'disease_animal';

    protected $fillable = [
        'disease_id',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
