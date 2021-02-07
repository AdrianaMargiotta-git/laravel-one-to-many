<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    //inserire funzione per la relazione belongsToMany
    //più typologies eseguono più task
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
}
