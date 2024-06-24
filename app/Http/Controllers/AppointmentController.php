<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //$appointments = Appointment::all();

        //return view('appointmentlist', compact('appointments'));

        $user = Auth::user();
    
        
        $appointments = Appointment::whereHas('animal', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('animal')->get();
    
        return view('appointmentlist', ['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addnewappointment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Appointment::create([
            'animal_id' => $validatedData['animal_id'],
            'user_id' => $validatedData['user_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            
        ]);
        Session::flash('success','Cita registrada correctamente');

        return redirect()->route('vacuna.registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $appointment = Appointment::findOrFail($id);
            $appointment->name = $request->input('name');
            $appointment->description = $request->input('description');
            $appointment->date = $request->input('date');
    
            $appointment->save();
    
            Session::flash('success','Cita actualizada correctamente');
    
            return redirect()->route('animal.citas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        Session::flash('success', '¡Cita eliminada correctamente!');

        return redirect()->route('animal.citas');
    }

    public function mostrarForm()
    {
        $user = Auth::user();
        $userAnimals = $user->animal; // Asumiendo que tienes una relación definida en el modelo User
        return view('addnewappointment', compact('userAnimals'));
    }

    public function editarCita($id)
    {

         $appointment = Appointment::findOrFail($id);
         $user = auth()->user(); // Suponiendo que estás usando autenticación de Laravel
         $animal = $appointment->animal;

         return view('appointmentedit', compact('appointment', 'user', 'animal'));
    }
}

    

