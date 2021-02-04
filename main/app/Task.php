<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
    ];

    //inserire funzione per la relazione belongsTo
    //un task è eseguito da un solo employee
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
