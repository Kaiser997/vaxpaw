<?php

namespace App\Http\Controllers;

use App\Models\Vaccune;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class VaccuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $user = Auth::user();
    
        // Suponiendo que la relación entre User y Vaccine es a través de Animal
        $vaccunelist = Vaccune::whereHas('animal', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('animal')->get();
    
        return view('vaccunelist', ['vaccunelist' => $vaccunelist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addnewvaccune');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Vaccune::create([
            'animal_id'=>$request->animal_id,
            'name' => $request->name,
            'description'=> $request->description,
            'dose'=>$request->dose,
            'date'=>$request->date,
        ]);
        Session::flash('success','Vacuna registrada correctamente');

        return redirect()->route('vacuna.registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccune $vaccune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccune $vaccune)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $vaccune = Vaccune::findOrFail($id);
            $vaccune->name = $request->input('name');
            $vaccune->description = $request->input('description');
            $vaccune->dose = $request->input('dose');
            $vaccune->date = $request->input('date');
    
            $vaccune->save();
    
            Session::flash('success','Vacuna actualizada correctamente');
    
            return redirect()->route('vacuna.lista');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vaccune = Vaccune::findOrFail($id);
        $vaccune->delete();

        Session::flash('success', '¡Vacuna eliminada correctamente!');

        return redirect()->route('vacuna.lista');
    }

    public function mostrarFormulario()
{
    $animales = Animal::where('user_id', auth()->id())->get();
    return view('addnewvaccune', ['animales' => $animales]);
}

public function vacunasEditar($id)
{
    $vaccune = Vaccune::findOrFail($id);
    return view('vaccuneedit', ['vaccune' => $vaccune]);
}


}
