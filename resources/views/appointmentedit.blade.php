@extends('plantillas.layout')

@section('title','Editar cita')

@section('content')

<hr>

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar cita</h1>
    @isset($appointment)
    <!-- Formulario de edición del animal -->
        <form action="{{url('actualizarcita/' . $appointment->id )}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->

            <div class="mb-3">
                <label for="user" class="form-label">Usuario Registrado</label>
                <input type="text" class="form-control" id="user" name="user" value="{{ $user->name }}" readonly>
            </div>
            
            <div class="mb-3">
                <label for="animal" class="form-label">Nombre del Animal</label>
                <input type="text" class="form-control" id="animal" name="animal" value="{{ $animal->name }}" readonly>
            </div>
     
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la cita</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $appointment->name }}">
            </div>

            <!-- Campo Raza -->
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $appointment->description }}">
            </div>

            <!-- Campo Edad -->
                        
            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}">
            </div>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-primary mb-3">Actualizar</button>
            
        
        </form>
    @endisset
</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif
@endsection