<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalInoculation extends Model
{
    use HasFactory;

    public static $availableFields = [
        'inoculation_id',
        'animal_id',
    ];

    protected $table = 'animal_inoculation';

    protected $fillable = [
        'inoculation_id',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
