@extends('plantillas.layout')

@section('title','Editar animal')

@section('content')

<hr>

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Animal</h1>
    @isset($animal)
    <!-- Formulario de edición del animal -->
        <form action="{{ url('actualizar/' . $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
     
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}">
            </div>

            <!-- Campo Raza -->
            <div class="mb-3">
                <label for="race" class="form-label">Raza</label>
                <input type="text" class="form-control" id="race" name="race" value="{{ $animal->race }}">
            </div>

            <!-- Campo Edad -->
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $animal->age }}">
            </div>
            
            <div class="mb-3">
                <label for="sex" class="form-label">sexo</label>
                <input type="text" class="form-control" id="sex" name="sex" value="{{ $animal->sex }}">
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