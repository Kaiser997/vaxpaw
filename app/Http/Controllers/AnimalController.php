<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Vaccune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {

        $user=Auth::user();
        $animallist = Animal::where('user_id', $user->id)->get();

        return view('animal',['animallist' => $animallist]);
        //return('holaaaaa');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addnewanimal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       

        Animal::create([
            'user_id'=>Auth::user()->id,
            'name' => $request->name,
            'race'=> $request->race,
            'age'=>$request->age,
            'sex'=>$request->sex,
            

        ]);
        return redirect('addnewanimal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('editaranimal', ['animal' => $animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $animal = Animal::findOrFail($id);
        $animal->name = $request->input('name');
        $animal->race = $request->input('race');
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex');

        $animal->save();

        Session::flash('success','Animal actualizado correctamente');

        return redirect()->route('animal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $animal = Animal::findOrFail($id);
        $animal->delete();

        Session::flash('success', '¡Animal eliminado correctamente!');

        return redirect()->route('animal.index');
    }

    public function animalesEliminar() 
    {
        
        $animals = Animal::all();
        return view('eliminaranimal', compact('animals'));
    }

}

