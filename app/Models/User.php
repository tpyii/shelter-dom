<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native animal_types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query)
    {
        return $query->
        when(request("name"), function ($query, $value) {
            return $query->where("name", "LIKE", "%" . $value . "%");
        })->when(request("email"), function ($query, $value) {
            return $query->where('email', "LIKE", "%" . $value . "%");
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}
