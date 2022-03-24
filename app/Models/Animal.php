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
        'birthday_at'
    ];

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'type_id',
        'breed_id',
        'description',
        'birthday_at'
    ];
}
