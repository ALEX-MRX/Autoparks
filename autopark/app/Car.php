<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name_driver', 'number', 'id_user', 'autopark'
    ];

//    protected $casts = [
//        'autopark' => 'array',
//    ];
}
