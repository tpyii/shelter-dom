<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use HasFactory;

    public static $availabeFiedls = [
        'id',
        'name'
    ];

    protected $table = 'animal_types';

    protected $fillable = [
        'name'
    ];
}
