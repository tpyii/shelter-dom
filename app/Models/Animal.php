<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

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
        'type',
        'users',
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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFilter($query)
    {
        return $query
            ->when(request("name"), function ($query, $value) {
                return $query->where("name", "LIKE", "%" . $value . "%");
            })
            ->when(request("breed_id"), function ($query, $value) {
                return $query->where('breed_id', $value);
            })
            ->when(request("type_id"), function ($query, $value) {
                return $query->where('type_id', $value);
            })
            ->when(request("type"), function ($query, $value) {
                return $query->whereRelation('type', 'name', "LIKE", "%" . $value . "%");
            })
            ->when(request("breed"), function ($query, $value) {
                return $query->whereRelation('breed', 'name', "LIKE", "%" . $value . "%");
            })
            ->when(request("diseases"), function ($query, $value) {
                return $query->whereHas('disease', function ($query) use ($value) {
                    $query->whereIn('id', $value);
                });
            })
            ->when(request("inoculations"), function ($query, $value) {
                return $query->whereHas('inoculation', function ($query) use ($value) {
                    $query->whereIn('id', $value);
                });
            })
            ->when(request("treatment_of_parasites"), function ($query, $value) {
                return $query->where("treatment_of_parasites", $value);
            })
            ->when(request("age"), function ($query, $value) {

                $yearQuery = '(YEAR(CURRENT_DATE)-YEAR(birthday_at))-(RIGHT(CURRENT_DATE,5)<RIGHT(birthday_at,5))';

                switch ($value) {
                    case ($value == 1):
                        return $query->whereRaw($yearQuery . '< ?', [1]);
                    case ($value == 2):
                        return $query->whereRaw($yearQuery . ' >= ? AND' . $yearQuery . ' < ?', [1, 2]);
                    case ($value == 3):
                        return $query->whereRaw($yearQuery . ' >= ? AND' . $yearQuery . ' < ?', [2, 5]);
                    case ($value == 4):
                        return $query->whereRaw($yearQuery . ' >= ?', [5]);
                }
            });
    }
}
