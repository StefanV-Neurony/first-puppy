<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'name', 'animalname', 'animaldescription' ,'surveyanswer',
    ];
}
