<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    protected $fillable = ['name', 'email', 'address', 'phone'];
    /*En la laravel no se hace asi, aunque el resultado será similar
    private $animals;
    Propiedad o atributo dinamico: a la clase Vet le creo un atributo llamado animals 
    que será un array de objetos de la clase Animal
    */
    public function animals(){
       return $this->hasMany(Animal::class);
    }
}
