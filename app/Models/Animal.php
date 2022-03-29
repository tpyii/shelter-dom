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
    
    protected $fillable = [
        'name',
        'type_id',
        'breed_id',
        'description',
        'birthday_at',
        'treatment_of_parasites'
    ];

    public function images()
    {
        return $this->belongsTo(AnimalImage::class);
    }

    public function disease()
    {
        return $this->belongsToMany(AnimalDisease::class);
    }

    public function inoculation()
    {
        return $this->belongsToMany(AnimalInoculation::class);
    }

    public function breed()
    {
        return $this->hasMany(Breed::class);
    }

    public function type()
    {
        return $this->hasMany(AnimalType::class);
    }
}

