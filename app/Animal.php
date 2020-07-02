<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'type', 'name', 'breed', 'sex', 'age', 'color', 'size', 'description', 'status', 'price'
    ];

}
