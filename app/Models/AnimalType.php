<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFilter($query)
    {
        return $query->when(request("name"), function ($query, $value) {
            return $query->where("name", "LIKE", "%" . $value . "%");
        });
    }
}
