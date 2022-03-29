<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public static $availabeFiedls = [
        'id',
        'type_id',
        'name'
    ];

    protected $fillable = [
        'type_id',
        'name'
    ];
}
