<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'dateOfBirth',
    ];

    //inserire funzione per la relazione hasMany

}
