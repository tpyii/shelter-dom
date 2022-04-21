<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'name',
        'surname',
        'description',
        'address',
        'birthday_at',
        'avatar'
    ];

    /**
     * Get the profile's avatar.
     *
     * @param  string  $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return empty($value) 
            ? 'image/Avatars/1/default-user.png' 
            : $value;
    }

    public function scopeFilter($query)
    {
        return $query
            ->when(request("name"), function ($query, $value) {
                return $query->where("name", "LIKE", "%" . $value . "%");
            })
            ->when(request("surname"), function ($query, $value) {
                return $query->where("surname", "LIKE", "%" . $value . "%");
            })
            ->when(request("user_id"), function ($query, $value) {
                return $query->where('user_id', $value);
            })
            ->when(request("user"), function ($query, $value) {
                return $query->whereRelation('user', 'name', "LIKE", "%" . $value . "%");
            })
            ->when(request("address"), function ($query, $value) {
                return $query->where("address", "LIKE", "%" . $value . "%");
            })
            ->when(request("phone"), function ($query, $value) {
                return $query->where("phone", "LIKE", "%" . $value . "%");
            })
            ->when(request("age"), function ($query, $value) {

                $yearQuery = '(YEAR(CURRENT_DATE)-YEAR(birthday_at))-(RIGHT(CURRENT_DATE,5)<RIGHT(birthday_at,5))';

                switch ($value) {
                    case ($value == 1):
                        return $query->whereRaw($yearQuery . '< ?', [18]);
                    case ($value == 2):
                        return $query->whereRaw($yearQuery . ' >= ?', [18]);
                }
            });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
