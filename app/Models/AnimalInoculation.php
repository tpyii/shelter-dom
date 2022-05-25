<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalInoculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'inoculation_id',
        'animal_id',
    ];
}
