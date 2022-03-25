<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public static $availableFields = [
        'id',
        'name',
        'type_id',
        'breed_id',
        'description',
        'birthday_at',
        'treatment_of_parasites'
    ];

    public static $joinAvailableFields = [
        'animals.id',
        'animals.name',
        'animals.description',
        'animals.birthday_at',
        'animals.treatment_of_parasites',
        'animal_types.name AS type_name',
        'breeds.name AS breeds_name'
    ];

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'type_id',
        'breed_id',
        'description',
        'birthday_at',
        'treatment_of_parasites'
    ];
}
