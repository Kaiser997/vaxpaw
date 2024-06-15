@extends('plantillas.layout')

@section('title','Agregar vacuna')

@section('content')
<hr>


<div class="container mt-5">
    <h1 class="text-center mb-4">Registro de Vacuna</h1>

    <form method="POST" action="{{ url('addvaccune') }}">
        @csrf

        <div class="mb-3">
            <label for="userName" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="userName" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="animalSelect" class="form-label">Seleccionar Animal</label>
            <select class="form-select" id="animalSelect" name="animal_id" required>
                <option value="">Seleccionar...</option>
                @foreach ($animales as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }} - {{ $animal->race }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vaccineName" class="form-label">Nombre de la Vacuna</label>
            <input type="text" class="form-control" id="vaccineName" name="name" placeholder="Ingrese el nombre de la vacuna" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="vaccineDate" class="form-label">Fecha de la Vacuna</label>
                <input type="date" class="form-control" id="vaccineDate" name="date" required>
            </div>
            <div class="col-md-3">
                <label for="vaccineDose" class="form-label">Dosis</label>
                <input type="text" class="form-control" id="vaccineDose" name="dose" placeholder="Ingrese la dosis de la vacuna">
            </div>
            <div class="col-md-6">
                <label for="vaccineDescription" class="form-label">Descripción de la Vacuna</label>
                <textarea class="form-control" id="vaccineDescription" name="description" rows="3" placeholder="Ingrese la descripción de la vacuna" required></textarea>
            </div>
        </div>

        

        <button type="submit" class="btn btn-primary mb-3">Agregar Vacuna</button>
    </form>
</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif


@endsection


