@extends('plantillas.layout')

@section('title','Agregar cita')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Citas</h1>

    <form method="POST" action="{{url('addappointment')}}">
        @csrf

        <!-- Campo oculto para user_id -->
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div class="mb-3">
            <label for="userName" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="userName" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="animalSelect" class="form-label">Seleccionar Animal</label>
            <select class="form-control" id="animalSelect" name="animal_id" required>
                @foreach ($userAnimals as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="appointmentName" class="form-label">Nombre de la Cita</label>
            <input type="text" class="form-control" id="appointmentName" name="name" placeholder="Ingrese el nombre de la cita" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Ingrese la descripción" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Enviar</button>
    </form>
</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif
@endsection
