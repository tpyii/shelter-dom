<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name'
    ];

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
        return $query->when(request("name"), function ($query, $value) {
            return $query->where("name", "LIKE", "%" . $value . "%");
        });
    }
}
