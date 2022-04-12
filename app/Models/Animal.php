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
     * @return mixed
     */
    public function scopeFilter($query)
    {
        return $query->
        when(request("name"), function ($query, $value) {
            return $query->where("name", "LIKE", "%" . $value . "%");
        })->when(request("breed_id"), function ($query, $value) {
            return $query->where('breed_id', $value);
        })->when(request("type_id"), function ($query, $value) {
            return $query->where('type_id', $value);
        })->when(request("type"), function ($query, $value) {
            return $query->whereRelation('type', 'name', "LIKE", "%" . $value . "%");
        })->when(request("breed"), function ($query, $value) {
            return $query->whereRelation('breed', 'name', "LIKE", "%" . $value . "%");
        });
    }
}

