<?php

namespace App\Models;

use http\Env\Request;
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

    protected $with = [
        'disease',
        'images',
        'inoculation',
        'breed',
        'type'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function disease()
    {
        return $this->belongsToMany(Disease::class);
    }

    public function inoculation()
    {
        return $this->belongsToMany(Inoculation::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function type()
    {
        return $this->belongsTo(AnimalType::class);
    }

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeName($query, $request)
    {
        if ($request->input('name') !== null) {
            return $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
        return $query;
    }

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeType($query, $request)
    {
        if ($request->input('type_id') !== null) {
            return $query->where('type_id', $request->input('type_id'));
        }
        return $query;
    }

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeBreed($query, $request)
    {
        if ($request->input('breed_id') !== null) {
            return $query->where('breed_id', $request->input('breed_id'));
        }
        return $query;
    }
}

