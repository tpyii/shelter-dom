<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inoculation extends Model
{
    use HasFactory;

    public static $availabeFiedls = [
        'id',
        'name'
    ];

    protected $fillable = [
        'name'
    ];
}