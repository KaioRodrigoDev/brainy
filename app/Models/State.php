<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function lead()
    {
        return $this->hasMany(Lead::class);
    }
}
