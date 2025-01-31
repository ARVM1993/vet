<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Owner;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //1. Pido al modelo que busque todos los animales en la BD
        $animals = Animal::all();   
        //2. Creo una vista con dichos animales
        return view('animal.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí suministro una vista con un formulario en blanco de creación
        return view('animal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aquí guardo el modelo en la BD
        $animal = Animal::create($request->all());

        //Opcion 1: crear un objeto owner, meterle en sus atributos los datos del formulario, guardar en db
        $owner= new Owner();
        $owner->name=$request->input('ownername');
        $owner->phone=$request->input('ownerphone');
        $owner->animal()->associate($animal);
        $owner->save();

        return redirect()->route('animal.index')->with('success', 'Animal created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //$request contiene los datos del formulario
        $animal->update($request->all());
        //Reenviamos al index:
        return redirect()->route('animal.index')->with('success', 'Animal updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
        $animal->delete();
        return redirect()->route('animal.index')->with('success', 'Animal deleted');
    }
}
