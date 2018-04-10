<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'abbr',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }
}
