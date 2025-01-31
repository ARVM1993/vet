<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'age', 'weight', 'description'];
    public function vet(){
       return $this->belongsTo(Vet::class); //relacion de un animal con un veterinario
    }

    //Animal va a ser el propietario de la relación 1 a1 con owner
    public function owner(){
       return $this->hasOne(Owner::class); //relacion de un animal con un usuario
}
}