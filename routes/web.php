<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VaccuneController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('auth.login');
});


//Route::get('/', function () {
//    return view('homevaxpaw');
//});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
        //consultar animales, vacunas y listas

       

        Route::get('/animallist',[AnimalController::class,'index'])->name('animal.index');
        Route::get('/vaccunelist',[VaccuneController::class,'index'])->name('vacuna.lista');
        Route::get('/appointmentlist',[AppointmentController::class,'index'])->name('animal.citas');

        //Agregar cita
        Route::get('/add',[AppointmentController::class,'mostrarForm']);
        Route::post('/addappointment',[AppointmentController::class,'store']);
        

        //agregar animal
        Route::get('/addnewanimal',[AnimalController::class,'create']);
        Route::post('/addanimal',[AnimalController::class,'store']);

        //agregar vacuna
        Route::get('/addnewvaccune',[VaccuneController::class,'mostrarFormulario'])->name('vacuna.registrada');
        Route::post('/addvaccune',[VaccuneController::class,'store']);

        //eliminar vacuna
        Route::delete('/deletevaccune/{id}',[VaccuneController::class,'destroy']);

        //eliminar cita

        Route::delete('/deleteappointment/{id}',[AppointmentController::class,'destroy']);

       

        //eliminar animal
        
        Route::delete('/deleteanimal/{id}',[AnimalController::class,'destroy']);

        //editar animal
        Route::get('/editaranimal/{id}',[AnimalController::class,'edit'])->name('animal.edit');
   
        Route::put('/actualizar/{id}',[AnimalController::class,'update']);

        //editar vacuna
        Route::get('/editarvacuna/{id}',[VaccuneController::class,'vacunasEditar'])->name('animal.edit');
        Route::put('/actualizarvacuna/{id}',[VaccuneController::class,'update']);

        //editar cita
        Route::get('/editappointment/{id}',[AppointmentController::class,'editarCita'])->name('animal.edit');
        Route::put('/actualizarcita/{id}',[AppointmentController::class,'update']);

    });


Route::get('/homevaxpaw',function(){
    return view('homevaxpaw');
});






//Route::get('/addanimal',[AnimalController::class,'create']);




//Route::resource('animal', AnimalController::Class)->parameters(['animal' => 'animal']);
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
