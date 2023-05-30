<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\City;

class Lead extends Model
{
    use HasFactory;
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function hobbie()
    {
        return $this->belongsTo(Hobbie::class);
    }

    protected $fillable = [
        'name',
        'email',
        'city_id',
        'state_id',
        'hobbie_id'
    ];
}
