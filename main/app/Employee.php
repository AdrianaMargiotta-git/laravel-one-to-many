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
    //un employee esegue più task
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
