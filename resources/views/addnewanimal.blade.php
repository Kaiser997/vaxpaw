@extends('plantillas.layout')

@section('title','Agregar animal')

@section('content')
<hr>
<div class="container mt-5">
    <h1 class="text-center mb-4">Registro de Animales</h1>

    <form method="POST" action="{{ url('addanimal') }}">
        @csrf

        <div class="mb-3">
            <label for="userName" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="userName" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="animalName" class="form-label">Nombre del Animal</label>
            <input type="text" class="form-control" id="animalName" name="name" placeholder="Ingrese el nombre del animal" required>
        </div>

        <div class="mb-3">
            <label for="animalRace" class="form-label">Raza del Animal</label>
            <input type="text" class="form-control" id="animalRace" name="race" placeholder="Ingrese la raza del animal" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="animalAge" class="form-label">Edad del Animal</label>
                <input type="text" class="form-control" id="animalAge" name="age" placeholder="Ingrese la edad del animal" required>
            </div>
            <div class="col-md-6">
                <label for="animalSex" class="form-label">Sexo del Animal</label>
                <input type="text" class="form-control" id="animalSex" name="sex" placeholder="Ingrese el sexo del animal" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<hr>
@endsection





   

